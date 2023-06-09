@extends('layouts.layout')

@section('title')
    {{ 'รายการคำขอใบลา/รายละเอียด' }}
@endsection

@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">รายการคำขอ</li>
                        <li class="breadcrumb-item active"><a href="{{ route('rep') }}">รายการคำขอปฏิบัติแทน</a></li>
                        <li class="breadcrumb-item active">รายละเอียด</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    {{-- Mian Content --}}
    <section class="content">
        {{-- Container Fluid --}}
        <div class="container-fluid">
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
                            @if ($errors->has('approve_rep'))
                                <span class="text-danger">{{ $errors->first('approve_rep') }}
                                </span>
                            @endif
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
                                                        <label for="">รหัสพนักงาน ชื่อ-นามสกุล ชื่อเล่น ตำแหน่ง
                                                            ผู้ลา</label>
                                                        @php
                                                            $user = $users->firstWhere('id', $leaveforms->user_id);
                                                        @endphp
                                                        @if ($user)
                                                            <p class="form-control" readonly>
                                                                [{{ $leaveforms->user_id }}] {{ $user->name }}
                                                                {{ $user->possition }}
                                                            </p>
                                                        @endif
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
                                                        <p class="form-control" readonly>
                                                            {{ \Carbon\Carbon::parse($leaveforms->leave_start)->addYears(543)->format('d/m/Y
                                                                                                                                                                                                                                                                                                                                                                    H:i') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ถึง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>ถึง :</label>
                                                        <p class="form-control" readonly>
                                                            {{ \Carbon\Carbon::parse($leaveforms->leave_end)->addYears(543)->format('d/m/Y
                                                                                                                                                                                                                                                                                                                                                                    H:i') }}
                                                        </p>
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
                                                        <textarea class="form-control p-2" rows="4" readonly>
@if ($leaveforms->reason)
{{ $leaveforms->reason }}
@else
ไม่ได้กรอกเหตุผลการลา
@endif
</textarea>
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
                                                            <p>ไม่มีเอกสารประกอบการลา</p>
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
                                                            <p>ไม่มีเอกสารประกอบการลาเพิ่มเติม</p>
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
                                                {{ $leaveforms->status }}
                                            </h1>
                                            @if ($leaveforms->status == 'อนุมัติ')
                                                <h6 class="pb-3 text-muted font-weight-light">
                                                    อนุมัติเมื่อ {{ $leaveforms->updated_at }}
                                                </h6>
                                                <h5 class="pb-3">ผู้อนุมัติ</h5>
                                                <h5 class="pb-3 text-muted font-weight-light">นายณัฐดนัย หอมดง</h5>
                                                <h5 class="pb-3">
                                                    ตำแหน่ง
                                                    <span class="text-muted font-weight-light">
                                                        Solution Architect Director
                                                    </span>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- ความเห็น Project manager --}}
                                    @if ($leaveforms->approve_pm != '⌛' && $leaveforms->approve_pm != '-')
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
                                                        {{ $leaveforms->reason_pm }}
                                                    @else
                                                        ไม่มีความเห็น
                                                    @endif
                                                    @if ($leaveforms->allowed_pm)
                                                        <hr>
                                                        <span class="font-weight-bold text-success">อนุญาตตามสิทธิ์พนักงาน
                                                            โดย:</span>
                                                        <br>
                                                        {{ $leaveforms->allowed_pm }}
                                                    @elseif ($leaveforms->not_allowed_pm)
                                                        <hr>
                                                        <span class="font-weight-bold text-danger">ไม่อนุญาตเนื่องจาก
                                                            :</span>
                                                        <br>
                                                        {{ $leaveforms->not_allowed_pm }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- ความเห็น Human Resources (HR) --}}
                                    @if ($leaveforms->approve_hr != '⌛' && $leaveforms->approve_hr != '-')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-message mr-2"></i>
                                                    ความเห็น Human Resources (HR)
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <span>
                                                    @if ($leaveforms->approve_hr != '❌')
                                                        @if ($leaveforms->reason_hr)
                                                            {{ $leaveforms->reason_hr }}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                    @if ($leaveforms->approve_hr != '✔️')
                                                        @if ($leaveforms->not_allowed_hr)
                                                            {{ $leaveforms->not_allowed_hr }}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- ความเห็น Solution Architect Director --}}
                                    @if ($leaveforms->approve_ceo != '⌛' && $leaveforms->approve_ceo != '-')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-comment-dots mr-2"></i>
                                                    ความเห็น Solution Architect Director
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <span>
                                                    @if ($leaveforms->approve_ceo != '❌')
                                                        @if ($leaveforms->reason_ceo)
                                                            {{ $leaveforms->reason_ceo }}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                    @if ($leaveforms->approve_ceo != '✔️')
                                                        @if ($leaveforms->not_allowed_ceo)
                                                            {{ $leaveforms->not_allowed_ceo }}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('rep.update', $leaveforms->id) }}" method="post">
                                @csrf
                                {{-- ปุ่มปฏิบัติงานแทน --}}
                                <div class="col-md-12 justify-content-end d-flex pr-0">
                                    @if ($leaveforms->approve_rep != '⌛')
                                        <span class="text-danger">ไม่สามารถแก้ไขได้ เนื่องจากคุณได้ดำเนินการแล้ว</span>
                                    @endif
                                </div>

                                <div class="col-md-12 justify-content-end d-flex pr-0">
                                    <button type="button" class="btn btn-danger mr-3 " name="approve_rep" value="❌"
                                        @if ($leaveforms->approve_rep != '⌛') disabled @endif>
                                        ปฏิเสธการปฏิบัติงานแทน
                                    </button>
                                    <button type="button" class="btn btn-primary" name="approve_rep" value="✔️"
                                        @if ($leaveforms->approve_rep != '⌛') disabled @endif>
                                        ยินยอมปฏิบัติงานแทน
                                    </button>
                                    <input type="hidden" name="approve_rep" value="{{ $leaveforms->approve_rep }}" />
                                </div>

                                <!-- Modal ยอมรับปฏิบัติงานแทน -->
                                <div class="modal fade" id="confirmModal_rep" tabindex="-1" role="dialog"
                                    aria-labelledby="confirmModalLabel_rep" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel_rep">บันทึกข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="content"></span>
                                                <br>
                                                <span class="text-danger">*เมื่อกดยืนยันคุณจะไม่สามารถกลับมาแก้ไขได้</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด
                                                </button>
                                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                            </div>
                                            <input type="hidden" name="approve_rep" value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{-- end mian content --}}
@endsection
