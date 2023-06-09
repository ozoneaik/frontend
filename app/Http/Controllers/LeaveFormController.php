<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use app\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\users_leave_data;

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
                'case_no_rep' => 'nullable|numeric|digits:10',
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
        $startDate->hours(max(9, min(18, $startDate->hour)))->minutes(0)->seconds(0);
        $endDate->hours(max(9, min(18, $endDate->hour)))->minutes(0)->seconds(0);
        $duration = $endDate->diff($startDate);
        $days = $duration->days;
        $remainingHours = $duration->h % 24;
        $minutes = $duration->i;

        for ($i = 0; $i <= $days; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            if ($currentDate->isoWeekday() === 6 || $currentDate->isoWeekday() === 7) {
                $days -= 1;
            }
        }
        if ($startDate->hour <= 12 && $endDate->hour >= 13) {
            $remainingHours -= 1;
        }
        if ($startDate->hour >= 13 && $endDate->hour <= 12){
            $remainingHours -= 15;
        }

        if ($remainingHours >= 8) {
            $days += 1;
            $remainingHours -= 8;
        }

        $leaveform->leave_start = $startDate;
        $leaveform->leave_end = $endDate;
        $leaveform->leave_total = "{$days} วัน {$remainingHours} ชั่วโมง {$minutes} นาที";
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
        // dd($request->all());

        $request->validate(
            [
                'approve_pm' => 'required',
                'reason_pm' => 'nullable|max:255',
                'allowed_pm' => 'nullable',
                'not_allowed_pm' => 'nullable|max:255',
                'day' => 'nullable|numeric|min:0|max:99',
                'hour' => 'nullable|numeric|min:0|max:8',
                'minutes' => 'nullable|numeric|min:0|max:60',
            ],
            [
                'approve_pm.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
                'reason_pm.max' => 'ป้อนเกิน 255',
                'not_allowed_pm' => 'ป้อนเกิน 255',

                'day.numeric' => 'ป้อนตัวเลขเท่านั้น',
                'hour.numeric' => 'ป้อนตัวเลขเท่านั้น',
                'minutes.numeric' => 'ป้อนตัวเลขเท่านั้น',
                'day.min' => 'ป้อนเลข 2 ตัว',
                'hour.min' => 'ป้อนเลข 2 ตัว',
                'minutes.min' => 'ป้อนเลข 2 ตัว',
                'day.max' => 'ป้อนเลข 2 ตัว',
                'hour.max' => 'ป้อนเลข 2 ตัว',
                'minutes.max' => 'ป้อนเลข 2 ตัว',
            ]
        );

        if($request->approve_pm == '✔️'){
            $request->validate(
                [ 'allowed_pm' => 'required'],['allowed_pm.required' => '👇ถ้ากดอนุมัติโปรดเลือกตรงนี้ด้วยครับ',]
            );
        }

        $day = $request->day;
        $hour = $request->hour;
        $minutes = $request->minutes;
        $allowed_pm = '';
        if(!$day){
            $day = '0';
        }
        if(!$hour){
            $hour = '0';
        }
        if(!$minutes){
            $minutes = '0';
        }

        if ($request->allowed_pm == 'ทำงานชดเชยเป็นจำนวน') {
            $allowed_pm = $request->allowed_pm . ' ' . $day . ' วัน ' . $hour . ' ชั่วโมง ' . $minutes . ' นาที ';
        } else if ($request->allowed_pm == 'อื่นๆ...') {
            $request->validate([
                'other' => 'required'],['other.required'=>'ป้อนด้วย']);
            $allowed_pm = $request->allowed_pm.' -> '.$request->other;
        } else {
            $allowed_pm = $request->allowed_pm;
        }
        // dd($allowed_pm);

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
                'reason_hr' => 'nullable|max:255',
                'not_allowed_hr' => 'nullable|max:255',
            ],
            [
                'approve_hr.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
                'reason_hr.max' => 'ป้อนอักขระเกิน 255',
                'not_allowed_hr.max' => 'ป้อนเกิน 255',
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
                'reason_ceo' => 'nullable|max:255',
                'not_allowed_ceo' => 'nullable|max:255',
            ],
            [
                'approve_ceo.required' => 'no requ',
                // 'allowed_pm.required' => 'โปรดเลือก',
                'reason_ceo.max' => 'ป้อนเกิน 255',
                'not_allowed_ceo.max' => 'ป้อนเกิน 255',
            ]
        );
        $leaveForm = LeaveForm::find($id);
        $item = users_leave_data::all();
        if ($request->approve_ceo == '❌') {
            $status = 'ไม่อนุมัติ';
        } else {
            $status = 'อนุมัติ';

            foreach ($item as $time) {

                if ($leaveForm->leave_type == $time->leave_type_name && $leaveForm->id >= $id && $time->user_id == $leaveForm->user_id) {
                    // Calculate remaining time
                    $parts = explode(' ', $time->time_remain);
                    $D = (int)$parts[0];
                    $H = (int)$parts[2];
                    $M = (int)$parts[4];
                    $totalMinutes = ($D * 8 * 60) + ($H * 60) + $M;

                    // Calculate used time
                    $parts1 = explode(' ', $time->time_already_used);
                    $D1 = (int)$parts1[0];
                    $H1 = (int)$parts1[2];
                    $M1 = (int)$parts1[4];
                    $totalMinutes1 = ($D1 * 8 * 60) + ($H1 * 60) + $M1;

                    // Calculate total leave time
                    $parts2 = explode(' ', $leaveForm->leave_total);
                    $D2 = (int)$parts2[0];
                    $H2 = (int)$parts2[2];
                    $M2 = (int)$parts2[4];
                    $totalMinutes2 = ($D2 * 8 * 60) + ($H2 * 60) + $M2;

                    // Subtract leave time from remaining time
                    $difference = $totalMinutes - $totalMinutes2;
                    $D = floor($difference / (8 * 60));
                    $H = floor(($difference % (8 * 60)) / 60);
                    $M = $difference % 60;

                    // Add leave time to used time
                    $sum = $totalMinutes1 + $totalMinutes2;
                    $D1 = floor($sum / (8 * 60));
                    $H1 = floor(($sum % (8 * 60)) / 60);
                    $M1 = $sum % 60;

                    // Update time remaining and used
                    $parts[0] = $D;
                    $parts[2] = $H;
                    $parts[4] = $M;
                    $parts1[0] = $D1;
                    $parts1[2] = $H1;
                    $parts1[4] = $M1;

                    $time_remain = implode(' ', $parts);
                    $time_already_used = implode(' ', $parts1);
                    $time->time_remain = $time_remain;
                    $time->time_already_used = $time_already_used;
                    $time->save();
                }
            }
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
