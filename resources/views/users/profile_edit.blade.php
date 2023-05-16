@extends('layouts.layout')

@section('title')
    {{ 'BDA Leave system' }}
@endsection

@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">Human Resources (HR)</li>
                        <li class="breadcrumb-item active"><a href="">ข้อมูลพนักงาน</a></li>
                        <li class="breadcrumb-item active">รายละเอียด นายภุวเดช พารชยโสภา</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-file-medical mr-2"></i>
                                ข้อมูลพนักงาน
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <style>
                                                .image-container {
                                                    position: relative;
                                                }

                                                .edit-icon {
                                                    position: absolute;
                                                    top: 10px;
                                                    right: 10px;
                                                    color: rgb(0, 0, 0);
                                                    padding: 5px;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                            <center>
                                                <img class="rounded-circle d-flex justify-content-end"
                                                    src="{{ asset('dist/img/avatar5.png') }}" alt=""
                                                    onerror="this.src='https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg';"
                                                    style="max-width: 200px; height: 200px;">
                                                <div class="edit-icon">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                                <br>
                                                <span>
                                                    <span class="font-weight-bold">รหัสพนักงาน : </span>
                                                    {{$user->id}}
                                                </span>
                                                <br>
                                                <span>
                                                    <span class="font-weight-bold">ชื่อ-นามสกุล : </span>
                                                    {{$user->name}} ({{$user->nick_name}})
                                                </span>
                                                <br>
                                                <span>
                                                    <span class="font-weight-bold">ตำแหน่ง : </span>
                                                    {{ $user->possition }}
                                                </span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-12">
                                            <a href="{{ route('profile.edit', Auth::user()->id) }}">
                                                <button type="submit" class="btn btn-outline-primary btn-block"
                                                    style="float: right;max-width:100%">บันทึก</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- ข้อมูลพนักงาน  --}}
                                <div class="col-md-6">
                                    {{-- รายละเอียด --}}
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">

                                                {{-- วันเดือนปีเกิด --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">วันเดือนปีเกิด</label>
                                                        <input type="text" class="form-control" name="birthday"
                                                            value="{{ \Carbon\Carbon::parse($user->birthday)->addYears(543)->format('d/m/Y') }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- email --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">อีเมล</label>
                                                        <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (หลัก) --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (หลัก)</label>
                                                        <input type="text" class="form-control" value="{{ $user->phone_no_1 }}" name="phone_no_1">
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (รอง) --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (รอง)</label>
                                                        <input type="text" class="form-control" value="{{ $user->phone_no_2 }}" name="phone_no_2">
                                                    </div>
                                                </div>
                                                {{-- ที่อยู่ --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ที่อยู่</label>
                                                        <input type="text" class="form-control" value="{{ $user->address }}" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{--  end mian content  --}}
@endsection
