<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LeaveFormController extends Controller
{
    //
    public function create()
    {
        $users = DB::table('users')->get();
        return view('form', compact('users'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'leave_type' => 'required',
                'leave_start' => 'required',
                'leave_end' => 'required',
                'reason' => 'nullable|max:255',
                'file1' => 'nullable|mimes:pdf,png,jpg',
                'file2' => 'nullable|mimes:pdf,png,jpg',
                'sel_rep' => 'nullable',
                'sel_pm' => 'required',
                'case_no_rep' => 'nullable|numeric|digits_between:9,10',
            ],
            [
                'reason.max' => 'ข้อความต้องไม่เกิน 255 ตัวอักษร',
                'case_no_rep.numeric' => 'กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น',
                'case_no_rep.digits_between' => 'กรุณากรอกเบอร์โทรศัพท์ที่มีความยาว 9-10 หลัก',
                'leave_start.required' => 'กรุณากรอกวันที่เริ่มต้นการลา',
                'leave_end.required' => 'กรุณากรอกวันที่สิ้นสุดการลา',
                'file1.mimes' => 'ไฟล์ที่อัพโหลดต้องเป็นไฟล์ PDF, PNG, หรือ JPG เท่านั้น',
                'file2.mimes' => 'ไฟล์ที่อัพโหลดต้องเป็นไฟล์ PDF, PNG, หรือ JPG เท่านั้น'
            ]
        );
        // dd($request->file1,$request->file2);

        $leaveform = new LeaveForm();

        if ($request->hasFile('file1')) {
            $leaveform->file1 = 'storage/' . $request->file('file1')->storeAs('file1', hexdec(uniqid()) . '.' . strtolower($request->file('file1')->getClientOriginalExtension()), 'public');
        }
        if ($request->hasFile('file2')) {
            $leaveform->file2 = 'storage/' . $request->file('file2')->storeAs('file2', hexdec(uniqid()) . '.' . strtolower($request->file('file2')->getClientOriginalExtension()), 'public');
        }

        $leaveform->user_id = Auth::user()->id;
        $leaveform->leave_type = $request->input('leave_type');

        //config leave_date
        $start = strtotime($request->input('leave_start'));
        $end = strtotime($request->input('leave_end'));
        $duration = $end - $start;
        $days = floor($duration / 86400);
        $hours = floor(($duration % 86400) / 3600);
        $minutes = floor(($duration % 3600) / 60);
        $leaveform->leave_start = date('Y-m-d H:i:s', $start);
        $leaveform->leave_end = date('Y-m-d H:i:s', $end);
        $leaveform->leave_total = "{$days} วัน {$hours} ชั่วโมง {$minutes} นาที";
        $leaveform->reason = $request->input('reason');

        $leaveform->sel_rep = $request->input('sel_rep');
        $leaveform->case_no_rep = $request->input('case_no_rep');
        $leaveform->sel_pm = $request->input('sel_pm');

        if (!$leaveform->sel_rep) {
            $leaveform->approve_rep = '❌';
        }else{
            $leaveform->approve_rep = '⌛';
        }

        if ($leaveform->approve_pm == '❌' || $leaveform->approve_hr == '❌' || $leaveform->approve_ceo == '❌') {
            $leaveform->status = 'ไม่อนุมัติ';
        } else if ($leaveform->approve_pm == '✔️' && $leaveform->approve_hr == '✔️' && $leaveform->approve_ceo == '✔️') {
            $leaveform->status = 'อนุมัติ';
        } else if ($leaveform->approve_pm == '✔️' || $leaveform->approve_hr == '✔️' || $leaveform->approve_ceo == '✔️') {
            $leaveform->status = 'กำลังดำเนินการ';
        } else {
            $leaveform->status = 'กำลังดำเนินการ';
        }
        $leaveform->save();
        return redirect()->route('home')->with('success', 'บันทึกข้อมูลใบลาเสร็จสมบูรณ์');
    }

    public function show($id)
    {
        $users = User::all();
        $leaveforms = LeaveForm::findOrFail($id);
        return view('req_list_detail', compact('leaveforms', 'users'));
    }
}

// if (isset($file1)) {
        //     $file1 = $request->file('file1');
        //     $name_gen1 = hexdec(uniqid());
        //     $file_ext1 = strtolower($file1->getClientOriginalExtension());
        //     $file_1 = $name_gen1.'.'.$file_ext1;
        //     $upload_location_file1 = 'image/file1/';
        //     $full_part_file1 = $upload_location_file1.$file_1;
        //     $file1->move($upload_location_file1,$file_1);
        //     $leaveform->file1 = $full_part_file1;
        // }

        // if (isset($file2)) {
        //     $file2 = $request->file('file2');
        //     $name_gen2 = hexdec(uniqid());
        //     $file_ext2 = strtolower($file2->getClientOriginalExtension());
        //     $file_2 = $name_gen2 . '.' . $file_ext2;
        //     $upload_location_file2 = 'image/file2/';
        //     $full_part_file2 = $upload_location_file2 . $file_2;
        //     $file2->move($upload_location_file2, $file_2);
        //     $leaveform->file2 = $full_part_file2;
        // }
