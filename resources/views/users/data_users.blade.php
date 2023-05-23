@extends('layouts.layout')
@section('title', 'ข้อมูลพนักงาน')

@section('content')
    <div class="content">
        {{-- Part --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb text-start">
                            <li class="breadcrumb-item">ข้อมูลพนักงาน</li>
                            <li class="breadcrumb-item active"><a href=""></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- end part --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold"><i class="fa-solid fa-users mr-3"></i>ข้อมูลพนักงาน
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="data_emp_table">
                                    <thead>
                                        <tr>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>อีเมล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->nick_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone_no_1}}</td>
                                                <td><a href="{{route('data.user.detail', $user->id)}}">
                                                        <i class="fas fa-file-invoice"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>อีเมล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
