<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use app\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveFormController extends Controller
{
    //
    public function create(){
        $users = DB::table('users')->get();
        return view('form', compact('users'));
    }

    public function store(Request $request){

        $request->validate(
            [
                'leave_type' => 'required',
                'leave_start' => 'required',
                'leave_end' => 'required',
                'reason' => 'nullable|max:255',
                'file1' => 'nullable|mimes:pdf,png,jpg',
                'file2' => 'nullable|mimes:pdf,png,jpg',
                'sel_rep' => 'nullable',
                'sel_pm' => 'nullable',
                'case_no_rep' => 'required|numeric|digits:10',
            ],
            [
                'reason.max' => 'ข้อความต้องไม่เกิน 255 ตัวอักษร',
                'case_no_rep.required' => 'กรุณากรอกเบอร์โทร',
                'case_no_rep.numeric' => 'กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น',
                'case_no_rep.digits' => 'กรุณากรอกเบอร์โทรศัพท์ที่มีความยาว 10 หลัก',
                'leave_start.required' => 'กรุณากรอกวันที่เริ่มต้นการลา',
                'leave_end.required' => 'กรุณากรอกวันที่สิ้นสุดการลา',
                'file1.mimes' => 'ไฟล์ที่อัพโหลดต้องเป็นไฟล์ PDF, PNG, หรือ JPG เท่านั้น',
                'file2.mimes' => 'ไฟล์ที่อัพโหลดต้องเป็นไฟล์ PDF, PNG, หรือ JPG เท่านั้น'
            ]
        );

        $leaveform = new LeaveForm();
        $leaveform->user_id = Auth::user()->id;
        $leaveform->leave_type = $request->input('leave_type');

        // คำนวณหาจำนวนวันลาทั้งหมด
        $startDate = Carbon::createFromFormat('d/m/Y H:i', $request->input('leave_start'));
        $endDate = Carbon::createFromFormat('d/m/Y H:i', $request->input('leave_end'));
        $diffMinutes = $startDate->floatDiffInRealMinutes($endDate);
        $days = floor($diffMinutes / 1440);
        $hours = floor(($diffMinutes - $days * 1440) / 60);
        $minutes = round($diffMinutes - $days * 1440 - $hours * 60);
        $leaveform->leave_start = $startDate;
        $leaveform->leave_end = $endDate;
        $leaveform->leave_total = "{$days} วัน {$hours} ชั่วโมง {$minutes} นาที";
        // dd($leaveform->leave_total,$request->leave_start,$request->leave_end);

        $leaveform->reason = $request->input('reason');

        //generete file เก็บเป็นสตริง เป็นแบบ part เก็บไฟล์ไว้ที่ public/stored/file1หรือ2/
        if ($request->hasFile('file1')) {
            $leaveform->file1 = 'storage/' . $request->file('file1')
                ->storeAs('file1', hexdec(uniqid()) . '.' . strtolower($request->file('file1')
                    ->getClientOriginalExtension()), 'public');
        }
        if ($request->hasFile('file2')) {
            $leaveform->file2 = 'storage/' . $request->file('file2')
                ->storeAs('file2', hexdec(uniqid()) . '.' . strtolower($request->file('file2')
                    ->getClientOriginalExtension()), 'public');
        }

        $leaveform->sel_rep = $request->input('sel_rep');
        $leaveform->case_no_rep = $request->input('case_no_rep');




        if (!$leaveform->sel_rep) {
            $leaveform->approve_rep = '-';
            if (Auth::user()->type == 'pm'){
                $leaveform->approve_pm = $leaveform->approve_rep;
            }
        } else {

            if (Auth::user()->type == 'hr(admin)' || Auth::user()->type == 'hr'){
                $leaveform->approve_pm = '-';
                $leaveform->approve_hr = '-';
            }else{
                $leaveform->approve_rep = '⌛';
            }

        }

        $leaveform->sel_pm = $request->input('sel_pm');

        if ($leaveform->approve_pm == '❌' || $leaveform->approve_hr == '❌' || $leaveform->approve_ceo == '❌') {
            $leaveform->status = 'ไม่อนุมัติ';
        } else if ($leaveform->approve_pm == '✔️' && $leaveform->approve_hr == '✔️' && $leaveform->approve_ceo == '✔️') {
            $leaveform->status = 'อนุมัติ';
        } else if ($leaveform->approve_pm == '✔️' || $leaveform->approve_hr == '✔️' || $leaveform->approve_ceo == '✔️') {
            $leaveform->status = 'กำลังดำเนินการ';
        } else {
            $leaveform->status = 'กำลังดำเนินการ';
        }

        // dd($request->all(),$leaveform->all());
        $leaveform->save();
        return redirect()->route('req')->with('success', 'บันทึกข้อมูลใบลาเสร็จสมบูรณ์');
    }
    
    //ตารางแสดงขอใบลา
    public function req(){
        $leaves = LeaveForm::all();
        $users = User::all();
        return view('req_list',compact('leaves','users'));
    }
    // เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลารายละเอียด
    public function req_list_detail($id){
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        return view('req_list_detail', compact('leaveforms', 'users'));
    }

    //ตารางแสดงขอปฏิบัติแทน
    public function rep(){
        $leaves = LeaveForm::all();
        $users = User::all();
        return view('rep_list',compact('leaves','users'));
    }

    // เอาข้อมูลไปแสดงในหน้ารายการคำขอปฎิบัติแทน
    public function rep_list_detail($id){
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        // dd($leaveforms->all());
        return view('rep_list_detail', compact('leaveforms', 'users'));
    }

    // ทำการอัปเดทข้อมูลการอนุมัติของผู้ปฏิบัติงานแทน
    public function rep_list_detail_update(Request $request, $id){
        // dd($request->all());
        $request->validate(
            ['approve_rep' => 'required',],
            ['approve_rep.required' => 'no requ']
        );

        $approve_ceo = '⌛';
        if (Auth::user()->type == 'hr(admin)' || Auth::user()->type == 'hr'){
            if ($request->approve_rep == '❌'){
                $request->status = 'ไม่อนุมัติ';
                $approve_ceo = '-';
                LeaveForm::find($id)->update(['approve_ceo' => $approve_ceo]);
            }else{
                $request->status = 'กำลังดำเนินการ';
            }
            LeaveForm::find($id)->update([
                'approve_rep' => $request->approve_rep,
                'approve_hr' => $request->approve_rep,
                'status' => $request->status
            ]);
        }else{
            LeaveForm::find($id)->update([
                'approve_rep' => $request->approve_rep,
            ]);
        }


        return redirect()->route('rep')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }





    //เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงาน[Project manager]
    public function PM_req(){
        $leaves = leaveform::all();
        $users = User::all();
        return view('pm.req_list_emp',compact('leaves','users'));
    }
    // เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงานคนนั้น[Project manager]
    public function req_list_emp_detail($id){
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        return view('pm.req_list_emp_detail', compact('leaveforms', 'users'));
    }
    // ทำการอัปเดทข้อมูลการอนุมัติของ Project manager
    public function req_list_emp_detail_update(Request $request, $id){
        dd($request->all());

        $request->validate(
            [
                'approve_pm' => 'required',
                'reason_pm' => 'nullable',
                'allowed_pm' => 'nullable',
                'not_allowed_pm' => 'nullable',
            ],
            [
                'approve_pm.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
            ]
        );

        $day = $request->day;
        $hour = $request->hour;
        $minutes = $request->minutes;
        $allowed_pm = '';
        if ($request->allowed_pm == 'ทำงานชดเชยเป็นจำนวน') {
            $allowed_pm = $request->allowed_pm . ' ' . $day . ' วัน ' . $hour . ' ชั่วโมง ' . $minutes . ' นาที ';
        } else if ($request->allowed_pm == 'อื่นๆ...') {
            $allowed_pm = $request->other;
        } else {
            $allowed_pm = $request->allowed_pm;
        }

        // dd($request->approve_pm,$allowed_pm,$request->reason_pm,$request->not_allowed_pm);
        $approve_hr = '⌛';
        $approve_ceo = '⌛';
        $status = 'กำลังดำเนินการ';
        if ($request->approve_pm == '❌') {
            $status = 'ไม่อนุมัติ';
            $approve_ceo = '-';
            $approve_hr = '-';
        }
        LeaveForm::find($id)->update([
            'reason_pm' => $request->reason_pm,
            'approve_pm' => $request->approve_pm,
            'allowed_pm' => $allowed_pm,
            'not_allowed_pm' => $request->not_allowed_pm,
            'approve_hr' => $approve_hr,
            'approve_ceo' => $approve_ceo,
            'status' => $status,
        ]);
        return redirect()->route('pm.req.emp')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }




    //เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงาน[HR]
    public function HR_req(){
        $leaves = LeaveForm::all();
        $users = User::all();
        return view('hr.hr_req_list_emp',compact('leaves','users'));
    }
    // เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงานคนนั้น [HR]
    public function hr_req_list_emp_detail($id){
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        return view('hr.hr_req_list_emp_detail', compact('leaveforms', 'users'));
    }
    // ทำการอัปเดทข้อมูลการอนุมัติของ HR
    public function hr_req_list_emp_detail_update(Request $request, $id){
        $request->validate(
            [
                'approve_hr' => 'required',
                'reason_hr' => 'nullable',
                'not_allowed_hr' => 'nullable',
            ],
            [
                'approve_hr.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
            ]
        );

        $approve_ceo = '⌛';
        if ($request->approve_hr == '❌') {
            $status = 'ไม่อนุมัติ';
            $approve_ceo = '-';
        } else {
            $status = 'กำลังดำเนินการ';
        }
        LeaveForm::find($id)->update([
            'reason_hr' => $request->reason_hr,
            'approve_hr' => $request->approve_hr,
            'not_allowed_hr' => $request->not_allowed_hr,
            'approve_ceo' => $approve_ceo,
            'status' => $status,
        ]);
        // dd(LeaveForm::find($id)->not_allowed_hr);
        // dd($request->not_allowed_hr);
        return redirect()->route('hr.req.emp')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }




    // เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงาน [CEO]
    public function CEO_req(){
        $leaves = LeaveForm::all();
        $users = User::all();
//        dd($leaves);
        return view('ceo.ceo_req_list_emp',compact('leaves','users'));
    }
    // เอาข้อมูลไปแสดงในหน้ารายการคำขอใบลาพนักงานคนนั้น [CEO]
    public function ceo_req_list_emp_detail($id){
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        return view('ceo.ceo_req_list_emp_detail', compact('leaveforms', 'users'));
    }
    // ทำการอัปเดทข้อมูลการอนุมัติของ CEO
    public function ceo_req_list_emp_detail_update(Request $request, $id){
        $request->validate(
            [
                'approve_ceo' => 'required',
                'reason_ceo' => 'nullable',
                'not_allowed_ceo' => 'nullable',
            ],
            [
                'approve_ceo.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
            ]
        );
        if ($request->approve_ceo == '❌') {
            $status = 'ไม่อนุมัติ';
        } else {
            $status = 'อนุมัติ';
        }
        LeaveForm::find($id)->update([
            'reason_ceo' => $request->reason_ceo,
            'approve_ceo' => $request->approve_ceo,
            'not_allowed_ceo' => $request->not_allowed_ceo,
            'status' => $status,
        ]);
        // dd(LeaveForm::find($id)->not_allowed_ceo);

        return redirect()->route('ceo.req.emp')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }

}
