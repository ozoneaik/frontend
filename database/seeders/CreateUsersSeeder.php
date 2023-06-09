<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'ภูวเดช พาณิชยโสภา',
                'nick_name' => 'ออฟ',
                'possition' => 'Developer',
                'birthday' => '2023-10-21 09:31:56',
                'address' => '174 หมู่3 อ.เมือง จ.น่าน 55220',
                'phone_no_1' => '0895570655',
                'phone_no_2' => '0895570355',
                'email' => 'emp@gmail.com',
                'type' => 0,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'อรอุมา จันศรีเกิด',
                'nick_name' => 'แอ๋ม',
                'possition' => 'Developer',
                'birthday' => '2023-04-28 09:31:56',
                'address' => '174 หมู่3 อ.เมือง จ.น่าน 55220',
                'phone_no_1' => '0895570655',
                'phone_no_2' => '0895570355',
                'email' => 'emp1@gmail.com',
                'type' => 0,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'สุดใจ ความสุข',
                'nick_name' => 'เจ๋ง',
                'possition' => 'Developer',
                'birthday' => '2023-04-28 09:31:56',
                'address' => '174 หมู่3 อ.เมือง จ.น่าน 55220',
                'phone_no_1' => '0895570655',
                'phone_no_2' => '0895570355',
                'email' => 'emp2@gmail.com',
                'type' => 0,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'วิไล กิจวัฒนา',
                'nick_name' => 'ออม',
                'possition' => 'Developer',
                'birthday' => '2023-04-28 09:31:56',
                'address' => '174 หมู่3 อ.เมือง จ.น่าน 55220',
                'phone_no_1' => '0895570655',
                'phone_no_2' => '0895570355',
                'email' => 'emp3@gmail.com',
                'type' => 0,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'ธนกฤต นักเตะ',
                'nick_name' => 'โต๊ะ',
                'possition' => 'Project Manager',
                'birthday' => '2023-04-28 09:31:56',
                'address' => '56 หมู่4 อ.เมือง จ.น่าน 55220',
                'phone_no_1' => '0568845622',
                'phone_no_2' => '0854421366',
                'email' => 'pm@gmail.com',
                'type' => 1,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'ญาณิศา บู๊ม',
                'nick_name' => 'บู๊',
                'possition' => 'Project Manager',
                'birthday' => '1990-02-14 10:00:00',
                'address' => '15 หมู่10 ต.หนองหญ้าปล้อง อ.บางใหญ่ จ.นนทบุรี 11140',
                'phone_no_1' => '0842154331',
                'phone_no_2' => '0628421673',
                'email' => 'pm1@gmail.com',
                'type' => 1,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'รัฐพล แคร์',
                'nick_name' => 'พลอย',
                'possition' => 'Project Manager',
                'birthday' => '1987-06-23 09:00:00',
                'address' => '157 หมู่6 ต.ท่าช้าง อ.เมือง จ.เชียงใหม่ 50000',
                'phone_no_1' => '0865472315',
                'phone_no_2' => '0532425687',
                'email' => 'pm2@gmail.com',
                'type' => 1,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'สุภาพ จินต์พงศ์',
                'nick_name' => 'ฟอน',
                'possition' => 'Human Resources',
                'birthday' => '1995-08-22 14:45:00',
                'address' => '123 ถ.สุขุมวิท กรุงเทพ 10110',
                'phone_no_1' => '0912345678',
                'phone_no_2' => '0812345678',
                'email' => 'hr@gmail.com',
                'type' => 2,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'ณัฐพล คงไม่ลืม',
                'nick_name' => 'โบ',
                'possition' => 'Human Resources',
                'birthday' => '1989-01-02 09:15:00',
                'address' => '789 ถ.เพชรเกษม นนทบุรี 11000',
                'phone_no_1' => '0923456789',
                'phone_no_2' => '0823456789',
                'email' => 'hr1@gmail.com',
                'type' => 4,
                'password' => bcrypt('1111'),
            ],
            [
                'name' => 'นายณัฐดนัย หอมดง',
                'nick_name' => 'เป้',
                'possition' => 'Solution Architect Director (CEO)',
                'birthday' => '1990-01-02 09:15:00',
                'address' => '789 ถ.เพชรเกษม นนทบุรี 11111',
                'phone_no_1' => '0947856789',
                'phone_no_2' => '0562386951',
                'email' => 'ceo@gmail.com',
                'type' => 3,
                'password' => bcrypt('1111'),
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
