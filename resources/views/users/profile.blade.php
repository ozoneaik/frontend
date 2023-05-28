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
                                        <div
                                            class="card-body d-flex justify-content-center align-items-center flex-column">
                                            <div class="">
                                                <img class="rounded-circle d-flex justify-content-end"
                                                     src="{{ asset('dist/img/avatar5.png') }}" alt=""
                                                     style="max-width: 200px; height: 200px;">
                                            </div>
                                            <br>
                                            <div class="text-center">
                                                <span>
                                                        <span class="font-weight-bold">รหัสพนักงาน : </span>
                                                        {{ $user->id }}
                                                </span>
                                                <br>
                                                <span>
                                                        <span class="font-weight-bold">ชื่อ-นามสกุล : </span>
                                                        {{ $user->name }} ({{$user->nick_name}})
                                                    </span>
                                                <br>
                                                <span>
                                                        <span class="font-weight-bold">ตำแหน่ง : </span>
                                                        {{ $user->possition }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-outline-primary btn-block"
                                                    style="float: right;max-width:100%" data-toggle="modal"
                                                    data-target="#EditProfile">
                                                แก้ไขข้อมูลส่วนตัว
                                            </button>
                                        </div>
                                    </div>
                                    <div id="EditProfile" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                            <img class="rounded-circle"
                                                                 src="{{ asset('dist/img/avatar5.png') }}" alt=""
                                                                 style="max-width: 200px; height: 200px;">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">อัปโหลดรูปโปรฟาย</label>
                                                                <input type="file" class="form-control" name="profile_img" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-3 ">
                                                            <div class="form-group">
                                                                <label for="">รหัสพนักงาน</label>
                                                                <input class="form-control" value="{{$user->id}}"
                                                                       type="text" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="name">ชื่อ-นามสกุล</label>
                                                                <input class="form-control" name="name"
                                                                       value="{{$user->name}}" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="nick_name">ชื่อเล่น</label>
                                                                <input class="form-control" name="nick_name"
                                                                       value="{{$user->nick_name}}" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="possition">ตำแหน่ง</label>
                                                                <input class="form-control" name="possition"
                                                                       value="{{$user->possition}}" type="text"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="birthday">วันเดือนปีเกิด</label>
                                                                <input class="form-control" type="date" name="birthday"
                                                                       value="{{$user->birthday}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone_no_1">เบอร์โทรศัพท์ (หลัก)</label>
                                                                <input class="form-control" type="text"
                                                                       name="phone_no_1" value="{{$user->phone_no_1}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone_no_2">เบอร์โทรศัพท์ (รอง)</label>
                                                                <input class="form-control" type="text"
                                                                       name="phone_no_2" value="{{$user->phone_no_2}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="address">ที่อยู่</label>
                                                                <input class="form-control" type="text" name="address"
                                                                       value="{{$user->address}}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">บันทึก</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
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
                                                        <input class="form-control"
                                                               value="{{ \Carbon\Carbon::parse($user->birthday)->addYears(543)->format('d/m/Y') }}"
                                                               disabled>
                                                    </div>
                                                </div>
                                                {{-- email --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">อีเมล</label>
                                                        <input class="form-control" value="{{ $user->email }}"
                                                               disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (หลัก) --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (หลัก)</label>
                                                        <input class="form-control"
                                                               value="{{ $user->phone_no_1 }}"
                                                               disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (รอง) --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (รอง)</label>
                                                        <input class="form-control"
                                                               value="{{ $user->phone_no_2 }}"
                                                               disabled>
                                                    </div>
                                                </div>
                                                {{-- ที่อยู่ --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ที่อยู่</label>
                                                        <input class="form-control" value="{{ $user->address }}"
                                                               disabled>
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
