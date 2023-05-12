<?php

namespace Database\Seeders;

use App\Models\users_leave_data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users_data_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users_data_leave = [
            [
                'user_id' => 1,
                'leave_type_id' => 1,
                'leave_type_name' => 'ลากิจ',
            ],
            [
                'user_id' => 1,
                'leave_type_id' => 2,
                'leave_type_name' => 'ลาป่วย',
            ],
            [
                'user_id' => 1,
                'leave_type_id' => 3,
                'leave_type_name' => 'ลากิจ',
            ],
            [
                'user_id' => 2,
                'leave_type_id' => 1,
                'leave_type_name' => 'ลากิจ',
            ],
            [
                'user_id' => 2,
                'leave_type_id' => 2,
                'leave_type_name' => 'ลาป่วย',
            ],
            [
                'user_id' => 2,
                'leave_type_id' => 3,
                'leave_type_name' => 'ลากิจ',
            ],
        ];
        foreach($users_data_leave as $key => $data_leave){
            users_leave_data::create($data_leave);
        }
    }
}
