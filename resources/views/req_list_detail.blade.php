@extends('layouts.layout')

@section('title')
{{'รายการคำขอใบลา/รายละเอียด'}}
@endsection

@section('content')
{{-- Part --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb text-start">
                    <li class="breadcrumb-item">รายการคำขอ</li>
                    <li class="breadcrumb-item active"><a href="{{route('req')}}">รายการคำขอใบลา</a></li>
                    <li class="breadcrumb-item active">รายละเอียด</li>
                </ol>
            </div>
        </div>
    </div>
</div>
{{-- end part --}}

{{-- Mian Content --}}
<section class="content">
    {{-- Container Fluid--}}
    <div class="container-fluid">
        <form action="" method="">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-file-medical mr-2"></i>
                                รายละเอียด
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    {{-- รายละเอียดใบลา --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                รายละเอียดใบลา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง</label>
                                                        <p class="form-control" readonly>
                                                            {{Auth::user()->id}} {{Auth::user()->name}}{{Auth::user()->possition}}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ประเภทการลา --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ประเภทการลา</label>
                                                        <p class="form-control" readonly>
                                                            {{ $leaveforms->leave_type }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ลาตังแต่ --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>ลาตั้งแต่ :</label>
                                                        <div class="input-group">
                                                            <p class="form-control" readonly>
                                                                {{ $leaveforms->leave_start }}
                                                            </p>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ถึง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>ถึง :</label>
                                                        <div class="input-group">
                                                            <p class="form-control" readonly>
                                                                {{ $leaveforms->leave_end }}
                                                            </p>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- ลาทั้งหมด --}}
                                                <div class="col-md-12">
                                                    <label>ลาทั้งหมด</label>
                                                    <p class="form-control" readonly>
                                                        {{ $leaveforms->leave_total }}
                                                    </p>
                                                </div>
                                                {{-- เหตุผลการลา --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>เหตุผลการลา</label>
                                                        <textarea class="form-control" rows="5" readonly>{{$leaveforms->reason}}</textarea>
                                                    </div>
                                                </div>
                                                {{-- เอกสารประกอบการลา --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เอกสารประกอบการลา</label>
                                                        <br>
                                                        @if ($leaveforms->file1)
                                                        <a href="{{ asset($leaveforms->file1) }}" download>
                                                            ดาวน์โหลด
                                                        </a>
                                                        @else
                                                        <p class="text-secondary">ไม่มีเอกสารประกอบการลา</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                {{-- เอกสารประกอบการลาเพิ่มเติม (ถ้ามี) --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เอกสารประกอบการลาเพิ่มเติม (ถ้ามี)</label>
                                                        <br>
                                                        @if ($leaveforms->file2)
                                                        <a href="{{ asset($leaveforms->file2) }}" download>
                                                            ดาวน์โหลด
                                                        </a>
                                                        @else
                                                        <p class="text-secondary">ไม่มีเอกสารประกอบการลาเพิ่มเติม</p>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- ระหว่างการลามอบหมายให้ --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fa-solid fa-user mr-2"></i>
                                                ระหว่างการลามอบหมายให้
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง</label>
                                                        @php
                                                        $user = $users->firstWhere('id', $leaveforms->sel_rep);
                                                        @endphp
                                                        @if ($user)
                                                        <p class="form-control " readonly>
                                                            [{{ $leaveforms->sel_rep }}] {{$user->name}}{{$user->possition}}
                                                        </p>
                                                        @else
                                                        <p class="form-control" readonly>ไม่มี</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">กรณีไม่มีผู้ปฏิบัติงานแทนสามารถ(ติดต่อ)</label>
                                                        @if ($leaveforms->case_no_rep)
                                                        <p class="form-control" readonly>
                                                            {{$leaveforms->case_no_rep}}
                                                        </p>
                                                        @else
                                                        <p class="form-control" readonly>-</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{-- สถานะ --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">
                                            <i class="fa-solid fa-file-waveform mr-2"></i>
                                            สถานะ
                                        </h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <h1
                                            class="pb-4 display-3 font-weight-bold {{ $leaveforms->status == 'อนุมัติ' ? 'text-success' : ($leaveforms->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger') }}">
                                            {{$leaveforms->status}}
                                        </h1>
                                        <h5 class="pb-3 text-muted font-weight-light"></h5>
                                        <h5 class="pb-3">ผู้อนุมัติ</h5>
                                        <h5 class="pb-3 text-muted font-weight-light">นายณัฐดนัย หอมดง</h5>
                                        <h5 class="pb-3">
                                            ตำแหน่ง
                                            <span class="text-muted font-weight-light">
                                                Solution Architect Director
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                {{-- ความเห็น Project manager --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">
                                            <i class="fa-solid fa-comment mr-2"></i>
                                            ความเห็น Project manager
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <span>
                                            @if ($leaveforms->reason_pm)
                                            {{$leaveforms->reason_pm}}
                                            @else
                                            ไม่มีความเห็น
                                            <br>
                                            @endif
                                            @if ($leaveforms->allowed_pm)
                                            <hr>
                                            <span class="font-weight-bold text-success">อนุญาติตามสิทธิ์พนักงาน โดย:</span>
                                            <br>
                                            {{$leaveforms->allowed_pm}}
                                            @elseif ($leaveforms->not_allowed_pm)
                                            <hr>
                                            <span class="font-weight-bold text-danger">ไม่อนุญาติเนื่องจาก :</span>
                                            <br>
                                            {{$leaveforms->not_allowed_pm}}
                                            @endif
                                            <br>
                                        </span>
                                    </div>
                                </div>
                                {{-- ความเห็น Human Resources (HR) --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">
                                            <i class="fa-solid fa-message mr-2"></i>
                                            ความเห็น Human Resources (HR)
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <span>
                                            {{$leaveforms->reason_hr}}
                                        </span>
                                    </div>
                                </div>
                                {{-- ความเห็น Solution Architect Director --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">
                                            <i class="fa-solid fa-comment-dots mr-2"></i>
                                            ความเห็น Solution Architect Director
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <span>
                                            {{$leaveforms->reason_ceo}}
                                        </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- ปุ่มบันทึกการลา --}}
                            <div class="col-md-12 justify-content-end d-flex ">
                                <a href="" class="btn btn-info mr-3">พิมพ์ใบลา</a>
                                <a href="{{route('req')}}" class="btn btn-primary">กลับสู่หน้าหลัก</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- end container fluid--}}
</section>
{{-- end mian content --}}
@endsection
