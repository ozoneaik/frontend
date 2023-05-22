<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use App\Models\User;
use Illuminate\Http\Request;
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
        $leaves = LeaveForm::latest()->get();
        $users_data = users_leave_data::all();
        // dd($leaves);
        return view('home', compact('leaves', 'users','users_data'));
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
        $users = User::findOrFail($id);
        $leaveforms = LeaveForm::all();

        return view('data_user_detail', compact( 'users','leaveforms'));
    }
}
