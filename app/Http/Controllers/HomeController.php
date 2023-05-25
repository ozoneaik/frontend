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
        $users_data = users_leave_data::where('user_id',Auth::user()->id)->get();
        $leaves_rep = LeaveForm::where('sel_rep',Auth::user()->id)->latest()->get();
        // dd($leaves);
        return view('home', compact('leaves', 'users','users_data','leaves_rep'));
    }

    // โปรไฟล์ตัวเอง
    public function profile(){
        $users = User::all();
        return view('users.profile', compact('users'));
    }

    public function profile_edit($id){
        $user = User::findOrFail($id);
        return view('users.profile_edit',compact('user'));
    }

    // ดูข้อมูลของพนักงานทั้งหมด
    public function data_users(){
        $users = User::all();
        return view('users.data_users', compact('users'));
    }

    // ดูรายละเอียดของพนักงานคนนั้น
    public function data_user_detail($id){
        $user = User::findOrFail($id);
        $leaveforms = LeaveForm::all();
        $leave_datas = users_leave_data::where('user_id', $id)->get();

        return view('users.data_user_detail', compact( 'user','leave_datas','leaveforms'));
    }

    public function update_leave_data(Request $request, $id){
//        dd($request->all());
        $leaveDatas = DB::table('users_leave_datas')
            ->where('user_id', $id)
            ->get();
        $i=0;
        foreach ($leaveDatas as $leaveData) {
            $dr = $request->input('D_remain'.$i);
            $hr = $request->input('H_remain'.$i);
            $mr = $request->input('M_remain'.$i);
            $du = $request->input('D_used'.$i);
            $hu = $request->input('H_used'.$i);
            $mu = $request->input('M_used'.$i);
//            dd($dr);
//dd($leaveDatas);
            DB::table('users_leave_datas')
                ->where('id', $leaveData->id)
                ->update([
                    'time_remain' => $dr.' วัน '.$hr.' ชั่วโมง '.$mr.' นาที ',
                    'time_already_used' =>  $du.' วัน '.$hu.' ชั่วโมง '.$mu.' นาที '
                ]);
            $i++;
        }

        return back();
    }
}
