<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use App\Models\users_leave_data;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nick_name' => ['required', 'string', 'max:255'],
            'possition' => ['required', 'string', 'max:255'],
            'birthday' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'phone_no_1' => ['required', 'string', 'max:11'],
            'phone_no_2' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'type' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'nick_name' => $data['nick_name'],
            'possition' => $data['possition'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'phone_no_1' => $data['phone_no_1'],
            'phone_no_2' => $data['phone_no_2'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
        ]);
        $users_leave_datas = [
            [
                'leave_type_id' => 1,
                'leave_type_name' => 'ลาป่วย',
                'time_remain' => '30 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 2,
                'leave_type_name' => 'ลากิจ',
                'time_remain' => '5 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 3,
                'leave_type_name' => 'ลาพักผ่อนประจำปี',
                'time_remain' => '6 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 4,
                'leave_type_name' => 'ลาคลอดบุตร',
                'time_remain' => '98 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 5,
                'leave_type_name' => 'ลาเพื่อสมรส',
                'time_remain' => '7 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 6,
                'leave_type_name' => 'ลาเพื่อทำหมัน',
                'time_remain' => '5 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 7,
                'leave_type_name' => 'ลารับราชการทหาร',
                'time_remain' => '60 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 8,
                'leave_type_name' => 'ลาอุปสมบท',
                'time_remain' => '5 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ],
            [
                'leave_type_id' => 9,
                'leave_type_name' => 'ลาเพื่อฝึกอบรม',
                'time_remain' => '7 วัน 0 ชั่วโมง 0 นาที',
                'time_already_used' => '0 วัน 0 ชั่วโมง 0 นาที',
            ]
        ];
        foreach ($users_leave_datas as $type) {
            DB::table('users_leave_datas')->insert([
                'user_id' => $user->id,
                'leave_type_id' => $type['leave_type_id'],
                'leave_type_name' => $type['leave_type_name'],
                'time_remain' => $type['time_remain'],
                'time_already_used' => $type['time_already_used'],
            ]);
        }
        return $user;
    }
}
