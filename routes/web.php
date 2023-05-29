<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveFormController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\UserAccess;
use App\Http\Controllers\PDFController;



Route::get('/', function () {
    return view('auth.login');
});


Route::get('pdf', [PDFController::class, 'generatePDF']);

Route::get('pdf/{id}', [PDFController::class, 'pdf'])->name('pdf');


//Auth::routes([
//    'verify' => true
//]);

Auth::routes();

Route::get('/test',function(){
    return view('test');
});
//['auth', 'verified']
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'user-access:hr(admin),ceo'])->group(function () {
        Route::get('/data_users',[HomeController::class,'data_users'])->name('data.users');
        Route::get('/data_user_detail/{id}',[HomeController::class,'data_user_detail'])->name('data.user.detail');
        Route::match(['get', 'post'],'/leave_update/{id}',[HomeController::class, 'update_leave_data'])->name('leave.update');
    })->middleware(UserAccess::class);

    Route::get('/profile/{id}', [HomeController::class,'profile'])->name('profile');
    Route::post('/profile_update/{id}',[HomeController::class,'profile_update'])->name('profile.update');

    Route::get('/req_list',[LeaveFormController::class,'req'])->name('req');
    Route::match(['get', 'post'],'/req_list_detail/{id}',[LeaveFormController::class, 'req_list_detail'])->name('req.detail');
    Route::get('/form', [LeaveFormController::class, 'create'])->name('create');
    Route::post('/store',[LeaveFormController::class, 'store'])->name('leaveform.store');

    Route::get('/rep_list',[LeaveFormController::class,'rep'])->name('rep');
    Route::match(['get', 'post'],'/rep_list_detail/{id}',[LeaveFormController::class, 'rep_list_detail'])->name('rep.detail');
    Route::match(['get', 'post'],'/rep_list_detail_update/{id}',[LeaveFormController::class, 'rep_list_detail_update'])->name('rep.update');


    //Normal Employee route list
    Route::middleware('user-access:emp')->group(function () {
        Route::get('/emp/home', [HomeController::class, 'empHome'])->name('emp.home');
    });

    //Project manager route list
    Route::middleware('user-access:pm')->group(function () {
        Route::get('/pm/home', [HomeController::class, 'pmHome'])->name('pm.home');
        Route::get('/req_list_emp_pm',[LeaveFormController::class, 'PM_req'])->name('pm.req.emp');
        Route::match(['get','post'],'/req_list_emp_detail/{id}',[LeaveFormController::class, 'req_list_emp_detail'])->name('pm.req.emp.detail');
        Route::match(['get','post'],'/req_list_emp_detail_update/{id}',[LeaveFormController::class,'req_list_emp_detail_update'])->name('pm.req.emp.update');
//        Route::match(['get','post'],'/req_list_emp_detail_update1/{id}',[LeaveFormController::class,'req_list_emp_detail_update'])->name('pm.req.emp.update1');
    });

    //HR route list
    Route::middleware('user-access:hr(admin)')->group(function () {
        Route::get('/hr/home', [HomeController::class, 'hrHome'])->name('hr.home');
        Route::get('/req_list_emp_hr',[LeaveFormController::class,'HR_req'])->name('hr.req.emp');
        Route::match(['get','post'],'/hr_req_list_emp_detail/{id}',[LeaveFormController::class, 'hr_req_list_emp_detail'])->name('hr.req.emp.detail');
        Route::match(['get','post'],'/hr_req_list_emp_detail_update/{id}',[LeaveFormController::class,'hr_req_list_emp_detail_update'])->name('hr.req.emp.update');
    });

    //CEO route list
    Route::middleware('user-access:ceo')->group(function () {
        Route::get('/ceo/home', [HomeController::class, 'ceoHome'])->name('ceo.home');
        Route::get('/req_list_emp_ceo',[LeaveFormController::class,'CEO_req'])->name('ceo.req.emp');
        Route::match(['get','post'],'/ceo_req_list_emp_detail/{id}',[LeaveFormController::class, 'ceo_req_list_emp_detail'])->name('ceo.req.emp.detail');
        Route::match(['get','post'],'/ceo_req_list_emp_detail_update/{id}',[LeaveFormController::class,'ceo_req_list_emp_detail_update'])->name('ceo.req.emp.update');
    });
});
