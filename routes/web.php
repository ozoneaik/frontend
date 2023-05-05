<?php

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
        $users = DB::table('users')->get();
        return view('profile', compact('users'));
    })->name('profile');

    Route::get('/form', [LeaveFormController::class, 'create'])->name('create_leave_form');
    Route::post('/store',[LeaveFormController::class, 'store'])->name('leaveform.store');
    Route::match(['get', 'post'],'/req_list_detail/{id}',[LeaveFormController::class, 'show'])->name('leaveform.show');



    //emp route list
    Route::middleware('user-access:emp')->group(function () {
        Route::get('/emp/home', [HomeController::class, 'empHome'])->name('emp.home');
    });

    Route::middleware('user-access:pm')->group(function () {
        Route::get('/pm/home', [HomeController::class, 'pmHome'])->name('pm.home');
    });

    Route::middleware('user-access:hr')->group(function () {
        Route::get('/hr/home', [HomeController::class, 'hrHome'])->name('hr.home');
    });

    Route::middleware('user-access:ceo')->group(function () {
        Route::get('/ceo/home', [HomeController::class, 'ceoHome'])->name('ceo.home');
    });
});
