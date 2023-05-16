@extends('layouts.layout')
​
@section('title')
    {{ 'รายการคำขอใบลา' }}
@endsection
@if (Auth::user()->type == 'hr(admin)' || Auth::user()->type == 'ceo')
    @section('content')
        {{-- Part --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb text-start">
                            <li class="breadcrumb-item">รายการคำขอ</li>
                            <li class="breadcrumb-item active">รายการคำขอใบลา</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- end part --}}

        {{--  Mian Content  --}}
        <section class="content">
            {{-- Container Fluid --}}
            <div class="container-fluid">
                <div class="row">


                    {{-- end ปุ่มเพิ่มใบลา --}}
                    {{-- ตารางรายการคำขอใบลา --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">
                                    <i class="fas fa-list-alt mr-2"></i>
                                    รายการคำขอใบลา
                                </h3>
                            </div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <span>{{ $message }}</span>
                                    </div>
                                @endif
                                <table id="data_emp_table" class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>ตำแหน่ง</th>
                                            <th>อีเมล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ข้อมูลการลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->nick_name }}</td>
                                                <td>{{ $user->possition }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_no_1 }}</td>
                                                <td>
                                                    <a href="{{ route('data.user.detail', $user->id) }}">
                                                        <i class="fas fa-file-invoice"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                    <tfoot>
                                        <th>รหัสพนักงาน</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>ชื่อเล่น</th>
                                        <th>ตำแหน่ง</th>
                                        <th>อีเมล</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>ข้อมูลการลา</th>
                                    </tfoot>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end ตารางรายการคำขอใบลา --}}
                </div>
            </div>
            {{-- end container fluid --}}
        </section>
        {{--  end mian content  --}}
    @endsection
@endif
