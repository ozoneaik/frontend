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
                        <li class="breadcrumb-item active">รายละเอียด</li>
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
                                {{-- ข้อมูลพนักงาน  --}}
                                <div class="col-md-6">
                                    {{-- รายละเอียด --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                รายละเอียด
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- รหัสพนักงาน --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน</label>
                                                        <input class="form-control" value="{{ $users->id }}" disabled>
                                                    </div>
                                                </div>
                                                {{--  ชื่อ-นามสกุล  --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ชื่อ-นามสกุล</label>
                                                        <input class="form-control" value="{{ $users->name }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- ชื่อเล่น --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ชื่อเล่น</label>
                                                        <input class="form-control" value="{{ $users->nick_name }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                {{-- ตำแหน่ง --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ตำแหน่ง</label>
                                                        <input class="form-control" value="{{ $users->possition }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                {{-- วันเดือนปีเกิด --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">วันเดือนปีเกิด</label>
                                                        <input class="form-control"
                                                            value="{{ \Carbon\Carbon::parse($users->birthday)->addYears(543)->format('d/m/Y') }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                {{-- email --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">อีเมล</label>
                                                        <input class="form-control" value="{{ $users->email }}" disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (หลัก) --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (หลัก)</label>
                                                        <input class="form-control" value="{{ $users->phone_no_1 }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                {{-- เบอร์โทรศัพท์ (รอง) --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์ (รอง)</label>
                                                        <input class="form-control" value="{{ $users->phone_no_2 }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                {{-- ที่อยู่ --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ที่อยู่</label>
                                                        <input class="form-control" value="{{ $users->address }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ข้อมูลการลา --}}
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fa-solid fa-server mr-2"></i>
                                                ข้อมูลการลา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id=""
                                                        class="table table-bordered table-hover text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>ประเภทการลา</th>
                                                                <th>ลาไปแล้ว</th>
                                                                <th>ลาคงเหลือ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $users->id }}</td>
                                                                <td>3 วัน 3 ชั่วโมง 3 นาที</td>
                                                                <td>3 วัน 3 ชั่วโมง 3 นาที</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @if (Auth::user()->type == '3')
                                                <div class="col-md-12">
                                                    {{-- ปุ่มบันทึกการลา --}}
                                                    <div class="col-md-12 justify-content-end d-flex ">
                                                        <button class="btn btn-primary ms-auto ml-2" type="button"
                                                            data-toggle="modal" data-target="#modal-edit-leave">
                                                            แก้ไขวันลา
                                                        </button>
                                                        {{-- Modal แก้ไขวันลา --}}
                                                        <form action="">
                                                            @csrf
                                                            <div class="modal fade" id="modal-edit-leave">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">แก้ไขวันลา</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table
                                                                                class="table table-bordered table-hover text-center">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ประเภทการลา</th>
                                                                                        <th>ลาไปแล้ว</th>
                                                                                        <th>ลาคงเหลือ</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @for ($i = 0; $i <= 8; $i++)
                                                                                        <tr>
                                                                                            <td>ลากิจ</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">วัน
                                                                                                    </p>
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">
                                                                                                        ชั่วโมง</p>
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">
                                                                                                        นาที</p>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">วัน
                                                                                                    </p>
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">
                                                                                                        ชั่วโมง</p>
                                                                                                    <input type="text"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        class="form-control col-md-2">
                                                                                                    <p class="col-md-2">
                                                                                                        นาที</p>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endfor
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default"
                                                                                data-dismiss="modal">Close
                                                                            </button>
                                                                            <button class="btn btn-primary ms-auto ml-2"
                                                                                type="button" data-toggle="modal"
                                                                                data-target="#save">
                                                                                บันทึก
                                                                            </button>
                                                                            {{-- Modal --}}
                                                                            <div class="modal fade" id="save">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">
                                                                                                บันทึกข้อมูล</h4>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>ต้องการบันทึกข้อมูลข้อมูลหรือไม่??
                                                                                            </p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="modal-footer justify-content-between">
                                                                                            <button type="button"
                                                                                                class="btn btn-default"
                                                                                                data-dismiss="modal">ยกเลิก</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary">บันทึก</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.modal-content -->
                                                                                </div>
                                                                                <!-- /.modal-dialog -->
                                                                            </div>
                                                                            {{-- end modal --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        {{-- end modal แก้ไขวันลา --}}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fa-solid fa-clock-rotate-left mr-2"></i>
                                ประวัติการลาพนักงาน
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="data_emp_table">
                                <thead>
                                    <tr>
                                        <th>วันที่ยื่นคำร้อง</th>
                                        <th>ประเภทการลา</th>
                                        <th>วันที่ลาตั้งแต่</th>
                                        <th>ถึง</th>
                                        <th>ลาทั้งหมด</th>
                                        <th>ผู้ปฏิบัติงานแทน</th>
                                        <th>สถานะ</th>
                                        <th>รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaveforms as $leaveform)
                                        @if ($leaveform->user_id == $users->id)
                                            <tr>
                                                <td>{{ $leaveform->created_at }}</td>
                                                <td>{{ $leaveform->leave_type }}</td>
                                                <td>{{ $leaveform->leave_start }}</td>
                                                <td>{{ $leaveform->leave_end }}</td>
                                                <td>{{ $leaveform->leave_total }}</td>
                                                <td>{{ $leaveform->sel_rep }}</td>
                                                <td>{{ $leaveform->status }}</td>
                                                <td>
                                                    <a href="">

                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>วันที่ยื่นคำร้อง</th>
                                        <th>ประเภทการลา</th>
                                        <th>วันที่ลาตั้งแต่</th>
                                        <th>ถึง</th>
                                        <th>ลาทั้งหมด</th>
                                        <th>ผู้ปฏิบัติงานแทน</th>
                                        <th>สถานะ</th>
                                        <th>รายละเอียด</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{--  end mian content  --}}
@endsection
