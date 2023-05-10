<?php

namespace Database\Seeders;

use App\Models\LeaveForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //✔️❌⌛
        $leaveforms = [
            [
                'user_id' => '1',
                'leave_type' => 'ลาป่วย',
                'leave_start' => '2023-05-09 12:00:00',
                'leave_end' => '2023-05-10 12:00:00',
                'leave_total' => '1 วัน 0 ชั่วโมง 0 นาที',
                'reason' => 'แผนกทรัพยากรมนุษย์ หรือ Human Resources (HR) ถือเป็นแผนกที่มีความสำคัญยิ่งต่อองค์กร',
                'sel_rep' => '2',
                'case_no_rep' => '0895570655',
                'approve_rep' => '✔️',
                'sel_pm' => '5',
                'allowed_pm' => 'ไม่ต้องชดเชยวันลา',
                'reason_pm' => 'ลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะ',
                'approve_pm' => '✔️',
                'reason_hr' => 'ลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะ',
                'approve_hr' => '✔️',
            ],
            [
                'user_id' => '1',
                'leave_type' => 'ลากิจ',
                'leave_start' => '2023-05-10 12:00:00',
                'leave_end' => '2023-05-20 12:00:00',
                'leave_total' => '10 วัน 0 ชั่วโมง 0 นาที',
                'reason' => 'แผนกทรัพยากรมนุษย์ หรือ Human Resources (HR) ถือเป็นแผนกที่มีความสำคัญยิ่งต่อองค์กร',
                'sel_rep' => '2',
                'case_no_rep' => '0895570655',
                'approve_rep' => '✔️',
                'sel_pm' => '5',
                'allowed_pm' => 'ไม่ต้องชดเชยวันลา',
                'reason_pm' => 'ลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะ',
                'approve_pm' => '✔️',
                'reason_hr' => 'ลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะลาๆไปเหอะ',
                'approve_hr' => '✔️',
            ]
        ];

        foreach($leaveforms as $key => $leaveform){
            LeaveForm::create($leaveform);
        }
    }
}
