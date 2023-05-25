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
                        <li class="breadcrumb-item"><a href="#">เมนูหลัก</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    <!-- Main content -->
    <section class="content">
        {{-- Container-fluid --}}
        <div class="container-fluid">

            {{-- ปุ่มเพิ่มใบลา --}}
            <div class="col-12 d-flex justify-content-end d-flex mb-4">
                <a href="">
                    <button class="btn btn-primary ms-auto">+ เพิ่มใบลา</button>
                </a>
            </div>
            {{-- end ปุ่มเพิ่มใบลา --}}

            {{-- Small boxes (Stat box) --}}
            <div class="row">
                <div class="col-lg-4">
                    {{-- ลาเพื่อทำหมัน --}}
                    <div class="small-box pt-2" style="background-color: #af3a94; ">
                        <div class="inner">
                            <h3>ลาเพื่อทำหมัน</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชม. 3 น.</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
            </div>
            {{-- end small boxes--}}

            {{-- รายการคำขอใบลา --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                รายการคำขอใบลา</h3>
                        </div>
                        <div class="card-body">
                            <table id="req_list_table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>วันที่ยื่นคำร้อง</th>
                                    <th>ประเภทการลา</th>
                                    <th>วันที่ลาตั้งแต่</th>
                                    <th>ถึง</th>
                                    <th>ลาทั้งหมด</th>
                                    <th>ผู้ปฏิบัติงานแทน</th>
                                    <th>อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                    <th>อนุมัติ(PM)</th>
                                    <th>อนุมัติ(HR)</th>
                                    <th>อนุมัติ(CEO)</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>john canobee</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td class="text-success">อนุมัติ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>ไม่มีผู้ปฏิบัติงานแทน</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>⌛</td>
                                    <td>⌛</td>
                                    <td class="text-secondary">กำลังดำเนินการ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>john canobee</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>❌</td>
                                    <td>⌛</td>
                                    <td class="text-danger">ไม่อนุมัติ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end รายการคำขอใบลา --}}

            {{-- รายการคำขอปฏิบัติแทน --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                รายการคำขอปฏิบัติแทน</h3>
                        </div>
                        <div class="card-body">
                            <table id="rep_list_table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>วันที่ยื่นคำร้อง</th>
                                    <th>ประเภทการลา</th>
                                    <th>วันที่ลาตั้งแต่</th>
                                    <th>ถึง</th>
                                    <th>ลาทั้งหมด</th>
                                    <th>จาก</th>
                                    <th>อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                    <th>อนุมัติ(PM)</th>
                                    <th>อนุมัติ(HR)</th>
                                    <th>อนุมัติ(CEO)</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>john canobee</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td class="text-success">อนุมัติ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>joker on the rock</td>
                                    <td>✔️</td>
                                    <td>✔️</td>
                                    <td>⌛</td>
                                    <td>⌛</td>
                                    <td class="text-secondary">กำลังดำเนินการ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>john canobee</td>
                                    <td>❌</td>
                                    <td>✔️</td>
                                    <td>❌</td>
                                    <td>⌛</td>
                                    <td class="text-danger">ไม่อนุมัติ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>ลาป่วย</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>12-3-3 12:00 AM</td>
                                    <td>3 วัน 3 ชม. 3 นาที</td>
                                    <td>john canobee</td>
                                    <td>⌛</td>
                                    <td>⌛</td>
                                    <td>⌛</td>
                                    <td>⌛</td>
                                    <td class="text-secondary">กำลังดำเนินการ</td>
                                    <td>
                                        <a href=""><i class="fas fa-file-invoice"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end รายการคำขอปฏิบัติแทน --}}
        </div>
        {{-- end Container-fluid --}}
    </section>
    <!-- end main content -->
@endsection
