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
                <a href="{{ route('create_leave_form') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>

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
                    {{-- ลาอุปสมบท --}}
                    <div class="small-box pt-2 bg-danger">
                        <div class="inner">
                            <h3>ลาอุปสมบท</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-church"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                    {{-- ลารับราชการทหาร --}}
                    <div class="small-box pt-2 bg-dark">
                        <div class="inner">
                            <h3>ลารับราชการทหาร</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fighter-jet"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- ลาเพื่อฝึกอบรม --}}
                    <div class="small-box pt-2" style="background-color: #7952b3;">
                        <div class="inner">
                            <h3>ลาเพื่อการฝึกอบรม</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                    {{-- ลาป่วย --}}
                    <div class="small-box pt-2 bg-info">
                        <div class="inner">
                            <h3>ลาป่วย</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                    {{-- ลากิจ --}}
                    <div class="small-box pt-2 bg-success">
                        <div class="inner">
                            <h3>ลากิจ</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- ลาคลอดบุตร --}}
                    <div class="small-box pt-2 bg-primary">
                        <div class="inner">
                            <h3>ลาคลอดบุตร</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                    {{-- ลาพักผ่อนประจำปี --}}
                    <div class="small-box pt-2 bg-warning">
                        <div class="inner">
                            <h3>ลาพักผ่อนประจำปี</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-umbrella"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                    {{-- ลาเพื่อสมรส --}}
                    <div class="small-box pt-2" style="background-color: #6c757d;">
                        <div class="inner">
                            <h3>ลาเพื่อสมรส</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heart"></i>
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

                                @foreach ($leaves as $row)
                                    <tr>
                                        <td>{{$row->created_at->addYears(543)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{$row->leave_type}}</td>
                                        <td>{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y
                                        H:i') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y
                                        H:i') }}
                                        </td>
                                        <td>{{$row->leave_total}}</td>
                                        @if(!$row->sel_rep)
                                            <td>ไม่มีผู้ปฏิบัติแทน</td>
                                        @else
                                            @foreach($users as $user)
                                                @if($user->id == $row->sel_rep)
                                                    <td>{{$user->name}} {{$user->last_name}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        {{-- <td>{{$row->sel_rep}}</td> --}}
                                        <td>{{$row->approve_rep}}</td>
                                        <td>{{$row->approve_pm}}</td>
                                        <td>{{$row->approve_hr}}</td>
                                        <td>{{$row->approve_ceo}}</td>
                                        <td class="{{ $row->status == 'อนุมัติ' ? 'text-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger') }}">
                                            {{ $row->status }}
                                        </td>
                                        <td>
                                            <a href="{{route('leaveform.show',$row->id)}}"><i
                                                    class="fas fa-file-invoice"></i></a>
                                        </td>


                                    </tr>
                                @endforeach

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
                                รายการคำขอปฏิบัติแทน
                            </h3>
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
