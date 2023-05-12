<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $users = User::all();
        $leaves = LeaveForm::all();
        return view('home', compact('leaves', 'users'));
    }

    public function profile(){
        $users = User::all();
        return view('profile', compact('users'));
    }

    public function data_users(){
        $users = User::all();
        return view('data_users', compact('users'));
    }

    public function data_user_detail($id){
        $users = User::findOrFail($id);
        $leaveforms = LeaveForm::all();

        return view('data_user_detail', compact( 'users','leaveforms'));
    }
}
