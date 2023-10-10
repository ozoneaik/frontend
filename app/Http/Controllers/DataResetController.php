<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
class DataResetController extends Controller
{
    public function resetData()
    {
        // Reset data logic
        DB::table('users_leave_datas')->truncate();

        // Call the db:seed command
        Artisan::call('db:seed', ['--class' => 'Users_data_Seeder']);

        // Redirect back with a success message
        return redirect()->back()->with('สำเร็จ', 'ข้อมูลการลารีเซตเรียบร้อย');
    }
}
