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
                                <span class="text-danger">{{ $errors->first('approve_rep') }}</span>
                            @endif
                            <div class="row">
                                <div class="col-md-8">
                                    {{-- รายละเอียดใบลา --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                รายละเอียดใบลาของผู้ลา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            @php
                                                $user = $users->firstWhere('id', $leaveforms->user_id);
                                            @endphp
                                            <div class="row">
                                                {{-- รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง --}}
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน</label>
                                                        <p class="form-control" readonly>
                                                            {{ $leaveforms->user_id }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ชื่อ-นามสกุล --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ชื่อ-นามสกุล</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ชื่อเล่น --}}
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">ชื่อเล่น</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->nick_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ตำแหน่ง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ตำแหน่ง</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->position }}
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
                                                        <p class="form-control" readonly>
                                                            {{ \Carbon\Carbon::parse($leaveforms->leave_start)->addYears(543)->format('d/m/Y                                                                                                                                                                                                                                                                                                         H:i') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- ถึง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>ถึง :</label>
                                                        <p class="form-control" readonly>
                                                            {{ \Carbon\Carbon::parse($leaveforms->leave_end)->addYears(543)->format('d/m/Y                                                                                                                                                                                                                                                                                              H:i') }}
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
                                                        @if ($leaveforms->reason)
                                                            <textarea class="form-control p-2" rows="4" readonly>{{ $leaveforms->reason }}</textarea>
                                                        @else
                                                            <textarea class="form-control p-2" rows="4" readonly>ไม่ได้กรอกเหตุผลการลา</textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- เอกสารประกอบการลา --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">เอกสารประกอบการลา</label>
                                                        <br>
                                                        @if ($leaveforms->file1)
                                                            <a href="{{ asset($leaveforms->file1) }}" download>ดาวน์โหลด</a>
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
                                            <h1 class="pb-4 display-3 font-weight-bold {{ $leaveforms->status == 'อนุมัติ' ? 'text-success' : ($leaveforms->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger') }}">
                                                {{ $leaveforms->status }}
                                            </h1>
                                            @if ($leaveforms->status == 'อนุมัติ')
                                                <h6 class="pb-3 text-muted font-weight-light">
                                                    อนุมัติเมื่อ
                                                    {{ \Carbon\Carbon::parse($leaveforms->updated_at)->addYears(543)->format('d/m/Y H:i:s') }}
                                                </h6>
                                                <h5 class="pb-3">ผู้อนุมัติ</h5>
                                                <h5 class="pb-3 text-muted font-weight-light">นายณัฐดนัย หอมดง</h5>
                                                <h5 class="pb-3">
                                                    ตำแหน่ง
                                                    <span class="text-muted font-weight-light">
                                                        Solution Architect Director
                                                    </span>
                                                </h5>
                                            @else
                                                @if ($leaveforms->approve_pm == 'in_progress')
                                                    <p>
                                                        Project manager (PM)
                                                        <button class="btn btn-sm btn-secondary">กำลังดำเนินการ</button>
                                                    </p>
                                                @elseif($leaveforms->approve_pm == 'approve' || $leaveforms->approve_pm == '-')
                                                    @if ($leaveforms->approve_pm == 'approve')
                                                        <p>
                                                            Project manager (PM)
                                                            <button class="btn btn-sm btn-success">อนุมัติ</button>
                                                        </p>
                                                    @else
                                                        <p>
                                                            Project manager (PM)
                                                            <button class="btn btn-sm btn-secondary">-</button>
                                                        </p>
                                                    @endif
                                                    @if ($leaveforms->approve_hr == 'in_progress')
                                                        <p>
                                                            Human Resources(HR)
                                                            <button class="btn btn-sm btn-secondary">กำลังดำเนินการ
                                                            </button>
                                                        </p>
                                                    @elseif($leaveforms->approve_hr == 'approve' || $leaveforms->approve_hr == '-')
                                                        @if ($leaveforms->approve_hr == 'approve')
                                                            <p>
                                                                Human Resources(HR)
                                                                <button class="btn btn-sm btn-success">อนุมัติ</button>
                                                            </p>
                                                        @else
                                                            <p>Human Resources(HR)
                                                                <button class="btn btn-sm btn-secondary">-</button>
                                                            </p>
                                                        @endif
                                                        @if ($leaveforms->approve_ceo == 'in_progress')
                                                            <p>
                                                                Solution Architect Director
                                                                <button class="btn btn-sm btn-secondary">
                                                                    กำลังดำเนินการ
                                                                </button>
                                                            </p>
                                                        @elseif($leaveforms->approve_ceo == 'disapproval')
                                                            <p>
                                                                Solution Architect Director
                                                                <button class="btn btn-sm btn-danger">ไม่อนุมัติ
                                                                </button>
                                                            </p>
                                                        @endif
                                                    @elseif($leaveforms->approve_hr == 'disapproval')
                                                        <p>
                                                            Human Resources(HR)
                                                            <button class="btn btn-sm btn-danger">ไม่อนุมัติ</button>
                                                        </p>
                                                    @endif
                                                @elseif($leaveforms->approve_pm == 'disapproval')
                                                    <p>
                                                        Project manager (PM)
                                                        <button class="btn btn-sm btn-danger">ไม่อนุมัติ</button>
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    {{-- ความเห็น Project manager --}}
                                    @if ($leaveforms->approve_pm != 'in_progress' && $leaveforms->approve_pm != '-')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-comment mr-2"></i>
                                                    ความเห็น Project manager (PM)
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
                                    @if ($leaveforms->approve_hr != 'in_progress' && $leaveforms->approve_hr != '-')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-message mr-2"></i>
                                                    ความเห็น Human Resources (HR)
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <span>
                                                    @if ($leaveforms->approve_hr != 'disapproval')
                                                        @if ($leaveforms->reason_hr)
                                                            {!! $leaveforms->reason_hr !!}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                    @if ($leaveforms->approve_hr != 'approve')
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
                                    @if ($leaveforms->approve_ceo != 'in_progress' && $leaveforms->approve_ceo != '-')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-comment-dots mr-2"></i>
                                                    ความเห็น Solution Architect Director
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <span>
                                                    @if ($leaveforms->approve_ceo != 'disapproval')
                                                        @if ($leaveforms->reason_ceo)
                                                            {{ $leaveforms->reason_ceo }}
                                                        @else
                                                            ไม่มีความเห็น
                                                        @endif
                                                    @endif
                                                    @if ($leaveforms->approve_ceo != 'approve')
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
                            <form action="{{ route('rep.update', $leaveforms->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $leaveforms->user_id }}">

                                {{-- ปุ่มปฏิบัติงานแทน --}}
                                <div class="col-md-12 justify-content-end d-flex pr-0">
                                    @if ($leaveforms->approve_rep != 'in_progress')
                                        <span class="text-danger">ไม่สามารถแก้ไขได้ เนื่องจากคุณได้ดำเนินการแล้ว</span>
                                    @endif
                                </div>

                                <div class="col-md-12 justify-content-end d-flex pr-0">
                                    <button type="button" class="btn btn-danger mr-3 " name="approve_rep" value="disapproval" @if ($leaveforms->approve_rep != 'in_progress') disabled @endif>
                                        ปฏิเสธการปฏิบัติงานแทน
                                    </button>
                                    <button type="button" class="btn btn-primary" name="approve_rep" value="approve" @if ($leaveforms->approve_rep != 'in_progress') disabled @endif>
                                        ยินยอมปฏิบัติงานแทน
                                    </button>
                                    <input type="hidden" name="approve_rep" value="{{ $leaveforms->approve_rep }}"/>
                                </div>

                                <!-- Modal ยอมรับปฏิบัติงานแทน -->
                                <div class="modal fade" id="confirmModal_rep" tabindex="-1" role="dialog"
                                     aria-labelledby="confirmModalLabel_rep" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel_rep">บันทึกข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="content"></span>
                                                <br>
                                                <span class="text-danger">*เมื่อกดยืนยันคุณจะไม่สามารถกลับมาแก้ไขได้</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    ปิด
                                                </button>


                                                <!-- Modal HR ลา -->
                                                @if ($leaveforms->relation_user->type == 'hr')
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        ยืนยัน
                                                    </button>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <div class="form-group allowed">
                                                                        <label for="allowed_hr_admin">เลือกตัวเลือกดังต่อไปนี้</label>

                                                                        @if ($errors->has('allowed_hr_admin'))
                                                                            <br>
                                                                            <span class="text-danger">{{ $errors->first('allowed_hr_admin') }}</span>
                                                                        @endif
                                                                        <br>
                                                                        <input type="hidden" name="allowed_hr_admin" value="approve">
                                                                        <div class="icheck-primary d-block">
                                                                            <input type="radio" name="allowed_hr_admin" id="0" value="อนุญาตตามสิทธิ์พนักงาน" required>
                                                                            <label class="font-weight-normal" for="0">อนุญาตตามสิทธิ์พนักงาน</label>
                                                                        </div>

                                                                        <div class="icheck-primary d-block">
                                                                            <input type="radio" name="allowed_hr_admin" id="3" value="ไม่รับค่าแรงตามจำนวนวันที่ลา" required>
                                                                            <label for="3" class="font-weight-normal">ไม่รับค่าแรงตามจำนวนวันที่ลา</label>
                                                                        </div>

                                                                        <div class="icheck-primary d-block">
                                                                            <input type="radio" name="allowed_hr_admin" id="2" value="ทำงานชดเชยเป็นจำนวน" onchange="showInputFields()" required>
                                                                            <label class="font-weight-normal" for="2">ทำงานชดเชยเป็นจำนวน</label>
                                                                            <input type="number" name="day" id="day" style="width: 10%; display: none;" min="0" max="150">วัน
                                                                            <input type="number" name="hour" id="hour" style="width: 10%; display: none;" min="0" max="8">ชั่วโมง
                                                                            <input type="number" name="minutes" id="minutes" style="width: 10%; display: none;" min="0" max="59">นาที
                                                                        </div>
                                                                        <div class="icheck-primary d-block">
                                                                            <input type="radio" name="allowed_hr_admin" id="4" value="อื่นๆ...">
                                                                            <label class="font-weight-normal" for="4">
                                                                                อื่นๆ
                                                                                <input type="text" name="other" style="width: 350px">
                                                                            </label>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success">
                                                                        ยืนยัน
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                @endif
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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var radio = document.getElementsByName('allowed_hr_admin');
            var otherInput = document.getElementsByName('other')[0];
            var day = document.getElementsByName('day')[0];
            var hour = document.getElementsByName('hour')[0];
            var minutes = document.getElementsByName('minutes')[0];

            for (var i = 0; i < radio.length; i++) {
                radio[i].addEventListener('change', function () {
                    if (this.checked && this.value === 'อื่นๆ...') {
                        otherInput.setAttribute('required', 'required');
                    } else if (this.checked && this.value === 'ทำงานชดเชยเป็นจำนวน') {
                        day.setAttribute('required', 'required');
                        hour.setAttribute('required', 'required');
                        minutes.setAttribute('required', 'required');
                    } else {
                        otherInput.removeAttribute('required');
                    }
                });
            }
        });
    </script>
    <script>
        function showInputFields() {
            var radio = document.querySelector('input[name="allowed_hr_admin"]:checked');
            if (radio && radio.value === "ทำงานชดเชยเป็นจำนวน") {
                document.getElementById("day").style.display = "inline-block"; // show day input field
                document.getElementById("hour").style.display = "inline-block"; // show hour input field
                document.getElementById("minutes").style.display = "inline-block"; // show minutes input field
            } else {
                document.getElementById("day").style.display = "none"; // hide day input field
                document.getElementById("hour").style.display = "none"; // hide hour input field
                document.getElementById("minutes").style.display = "none"; // hide minutes input field
            }

        }
    </script>
@endsection
