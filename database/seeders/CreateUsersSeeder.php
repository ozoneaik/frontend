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
               'name'=>'john',
               'last_name' => 'stark',
               'nick_name' => 'aof',
               'possition' => 'Developer',
               'birthday' => '2023-04-28 09:31:56',
               'address' => '147 mu 3 phufa bokluea nan 55220',
               'phone_no_1' => '0895570655',
               'phone_no_2' => '0895570355',
               'email'=>'emp@gmail.com',
               'type'=>0,
               'password'=> bcrypt('1111'),
            ],
            [
                'name'=>'Minaria',
                'last_name' => 'momoshigi',
               'nick_name' => 'mina',
               'possition' => 'project manager',
               'birthday' => '2023-04-28 09:31:56',
               'address' => '147 mu 3 phufa bokluea nan 55220',
               'phone_no_1' => '0895570655',
               'phone_no_2' => '0895570355',
                'email'=>'pm@gmail.com',
                'type'=>1,
                'password'=> bcrypt('1111'),
             ],
             [
                'name'=>'Batman',
                'last_name' => 'artisan',
               'nick_name' => 'batman',
               'possition' => 'humans resource',
               'birthday' => '2023-04-28 09:31:56',
               'address' => '147 mu 3 phufa bokluea nan 55220',
               'phone_no_1' => '0895570655',
               'phone_no_2' => '0895570355',
                'email'=>'hr@gmail.com',
                'type'=>2,
                'password'=> bcrypt('1111'),
             ],
             [
                'name'=>'Boss',
                'last_name' => 'Bigdata',
               'nick_name' => 'pea',
               'possition' => 'CEO',
               'birthday' => '2023-04-28 09:31:56',
               'address' => '147 mu 3 phufa bokluea nan 55220',
               'phone_no_1' => '0895570655',
               'phone_no_2' => '0895570355',
                'email'=>'ceo@gmail.com',
                'type'=>3,
                'password'=> bcrypt('1111'),
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}