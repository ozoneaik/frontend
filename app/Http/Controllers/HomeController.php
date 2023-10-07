<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\users_leave_data;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // หน้าเมนูหลัก
    public function index()
    {
        $users = User::all();
        $leaves = LeaveForm::where('user_id', Auth::user()->id)->latest()->get();
        $users_data = users_leave_data::where('user_id', Auth::user()->id)->get();
        $leaves_rep = LeaveForm::where('sel_rep', Auth::user()->id)->latest()->get();



        $leave_chart_of_years = LeaveForm::selectRaw("COUNT(*) as count, MONTHNAME(created_at) as month_name")
            ->whereYear('created_at', date('Y'))
            ->groupByRaw("MONTH(created_at), MONTHNAME(created_at)")
            ->pluck('count', 'month_name');
        $labels = $leave_chart_of_years->keys();
        $data = $leave_chart_of_years->values();
        // dd($labels,$data);


        return view('home', compact('leaves', 'users', 'users_data', 'leaves_rep', 'labels', 'data'));
    }

    // โปรไฟล์ตัวเอง
    public function profile($id)
    {
        $user = User::findOrFail($id);

        if ($id != Auth::user()->id) {
            abort(403, 'การกระทำที่ไม่ได้รับอนุญาต');
        }

        return view('users.profile', compact('user'));
    }

    public function profile_update(Request $request, $id)
    {

        if ($request->profile_img) {
            //การเข้ารหัสรูปภาพ
            $service_image = $request->file('profile_img');
            //Generate ชื่อภาพ
            $name_gen = hexdec(uniqid());
            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($service_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            //อัพโหลดและบันทึกข้อมูล
            $upload_location = 'profile_img/';
            $full_path = $upload_location . $img_name;
            $service_image->move($upload_location, $img_name);

            User::find($id)->update([
                'profile_img' => $full_path,
            ]);
        }
        if ($request->signature) {
            //การเข้ารหัสรูปภาพ
            $service_image1 = $request->file('signature');
            //Generate ชื่อภาพ
            $name_gen1 = hexdec(uniqid());
            // ดึงนามสกุลไฟล์ภาพ
            $img_ext1 = strtolower($service_image1->getClientOriginalExtension());
            $img_name1 = $name_gen1 . '.' . $img_ext1;
            //อัพโหลดและบันทึกข้อมูล
            $upload_location1 = 'signature/';
            $full_path1 = $upload_location1 . $img_name1;
            $service_image1->move($upload_location1, $img_name1);

            User::find($id)->update([
                'signature' => $full_path1
            ]);
        }


        User::find($id)->update([
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'position' => $request->position,
            'phone_no_1' => $request->phone_no_1,
            'phone_no_2' => $request->phone_no_2,
            'address' => $request->address,
        ]);

        if ($request->has('birthday')) {
            User::find($id)->update([
                'birthday' => $request->birthday,
            ]);
        }
        return back()->with('success', 'แก้ไขโปรฟายแล้ว');
    }

    // ดูข้อมูลของพนักงานทั้งหมด
    public function data_users()
    {
        $users = User::all();
        return view('users.data_users', compact('users'));
    }

    // ดูรายละเอียดของพนักงานคนนั้น
    public function data_user_detail($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        $leaves = LeaveForm::where('user_id', $id)->get();
        $leave_datas = users_leave_data::where('user_id', $id)->get();
        //        dd($leaveforms);

        return view('users.data_user_detail', compact('user', 'users', 'leave_datas', 'leaves'));
    }

    public function data_user_history($id)
    {
        $leaveforms = LeaveForm::findOrFail($id);
        $users = User::all();
        return view('users.data_user_history', compact('leaveforms', 'users'));
    }

    public function update_leave_data(Request $request, $id)
    {

        $leaveDatas = DB::table('users_leave_datas')
            ->where('user_id', $id)
            ->get();
        $i = 0;
        foreach ($leaveDatas as $leaveData) {
            $dr = $request->input('D_remain' . $i);
            $hr = $request->input('H_remain' . $i);
            $mr = $request->input('M_remain' . $i);
            $du = $request->input('D_used' . $i);
            $hu = $request->input('H_used' . $i);
            $mu = $request->input('M_used' . $i);
            DB::table('users_leave_datas')
                ->where('id', $leaveData->id)
                ->update([
                    'time_remain' => $dr . ' วัน ' . $hr . ' ชั่วโมง ' . $mr . ' นาที ',
                    'time_already_used' => $du . ' วัน ' . $hu . ' ชั่วโมง ' . $mu . ' นาที '
                ]);
            $i++;
        }

        return back();
    }

    public function switch_per()
    {
        $HRs = User::where('type', 3)->get();
        return view('hr.hr_switch_per', compact('HRs'));
    }

    public function update_per(Request $request)
    {

        User::find($request->select_hr)->update([
            'type' => 2,
        ]);
        User::find(Auth::user()->id)->update([
            'type' => 3,
        ]);

        return redirect('home');
    }

    public function destroy($id)
    {
        $Users = User::find($id);

        if ($Users) {
            $Users->delete();
            return redirect()->route('data.users')->with('success', 'การลบบัญชีผู้ใช้สำเร็จ');
        } else {
            return redirect()->route('data.users')->with('error', 'การลบบัญชีผู้ใช้มีข้อผิดพลาด');
        }
    }
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        return redirect()->route('data.users')->with('success', 'User restored successfully.');
    }

    public function recovery()
    {
        $softDeletedUsers = User::onlyTrashed()->get();
        return view('users.restore_user', compact('softDeletedUsers'));
    }
}
