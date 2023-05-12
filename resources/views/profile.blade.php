@extends('layouts.layout')

@section('title')
    {{'BDA Leave system'}}
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
        {{-- Container Fluid--}}
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
                                {{-- ข้อมูลพนักงาน  --}}
                                <div class="col-md-12">
                                    {{-- รายละเอียด --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                รายละเอียด</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- รหัสพนักงาน --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->id }}" disabled>
                                                    </div>
                                                </div>
                                                {{--  ชื่อ-นามสกุล  --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ชื่อ-นามสกุล</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->name }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- ชื่อเล่น --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ชื่อเล่น</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->nick_name }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- ตำแหน่ง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ตำแหน่ง</label>
                                                        <input class="form-control"
                                                               value="{{Auth::user()->possition}}" disabled>
                                                    </div>
                                                </div>
                                                {{-- วันเดือนปีเกิด --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">วันเดือนปีเกิด</label>
                                                        <input class="form-control"
                                                               value="{{ \Carbon\Carbon::parse(Auth::user()->birthday)->addYears(543)->format('d/m/Y') }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- email --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">อีเมล</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->email }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (หลัก) --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (หลัก)</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->phone_no_1 }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (รอง) --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (รอง)</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->phone_no_2 }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- ที่อยู่ --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ที่อยู่</label>
                                                        <input class="form-control"
                                                               value="{{ Auth::user()->address }}" disabled>
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
        {{-- end container fluid--}}
    </section>
    {{--  end mian content  --}}
@endsection
