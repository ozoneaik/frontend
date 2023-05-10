<?php

use App\Models\LeaveForm;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveFormController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        $users = User::all();
        return view('profile', compact('users'));
    })->name('profile');

    Route::get('/req_list',function (){
        $leaves = LeaveForm::all();
        $users = User::all();
        return view('req_list',compact('leaves','users'));
    })->name('req.list');

    Route::get('/rep_list',function (){
        $leaves = LeaveForm::all();
        $users = User::all();
        return view('rep_list',compact('leaves','users'));
    })->name('rep.list');

    Route::get('/form', [LeaveFormController::class, 'create'])->name('create_leave_form');
    Route::post('/store',[LeaveFormController::class, 'store'])->name('leaveform.store');
    Route::match(['get', 'post'],'/req_list_detail/{id}',[LeaveFormController::class, 'req_list_detail'])->name('req_list_detail');
    Route::match(['get', 'post'],'/rep_list_detail/{id}',[LeaveFormController::class, 'rep_list_detail'])->name('rep_list_detail');
    Route::match(['get', 'post'],'/rep_list_detail_update/{id}',[LeaveFormController::class, 'rep_list_detail_update'])->name('rep_list_detail_update');

    //Normal Employee route list
    Route::middleware('user-access:emp')->group(function () {
        Route::get('/emp/home', [HomeController::class, 'empHome'])->name('emp.home');
    });

    //Project manager route list
    Route::middleware('user-access:pm')->group(function () {
        Route::get('/pm/home', [HomeController::class, 'pmHome'])->name('pm.home');

        Route::get('/req_list_emp_pm',function(){
            $leaves = leaveform::all();
            $users = User::all();
            return view('pm.req_list_emp',compact('leaves','users'));
        })->name('req.list.emp.pm');

        Route::match(['get','post'],'/req_list_emp_detail/{id}',[LeaveFormController::class, 'req_list_emp_detail'])->name('req_list_emp_detail');
        Route::match(['get','post'],'/req_list_emp_detail_update/{id}',[LeaveFormController::class,'req_list_emp_detail_update'])->name('req_list_emp_detail_update');
    });

    //HR route list
    Route::middleware('user-access:hr')->group(function () {
        Route::get('/hr/home', [HomeController::class, 'hrHome'])->name('hr.home');

        Route::get('/req_list_emp_hr',function(){
            $leaves = LeaveForm::all();
            $users = User::all();
            return view('hr.hr_req_list_emp',compact('leaves','users'));
        })->name('req.list.emp.hr');

        Route::match(['get','post'],'/hr_req_list_emp_detail/{id}',[LeaveFormController::class, 'hr_req_list_emp_detail'])->name('hr_req_list_emp_detail');
        Route::match(['get','post'],'/hr_req_list_emp_detail_update/{id}',[LeaveFormController::class,'hr_req_list_emp_detail_update'])->name('hr_req_list_emp_detail_update');
    });

    //CEO route list
    Route::middleware('user-access:ceo')->group(function () {
        Route::get('/ceo/home', [HomeController::class, 'ceoHome'])->name('ceo.home');

        Route::get('/req_list_emp_ceo',function(){
            $leaves = LeaveForm::all();
            $users = User::all();
            return view('ceo.ceo_req_list_emp',compact('leaves','users'));
        })->name('req.list.emp.ceo');

        Route::match(['get','post'],'/ceo_req_list_emp_detail/{id}',[LeaveFormController::class, 'ceo_req_list_emp_detail'])->name('ceo_req_list_emp_detail');
        Route::match(['get','post'],'/ceo_req_list_emp_detail_update/{id}',[LeaveFormController::class,'ceo_req_list_emp_detail_update'])->name('ceo_req_list_emp_detail_update');
    });
});
