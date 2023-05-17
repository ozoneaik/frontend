@extends('layouts.layout')
@section('title')
    {{ 'ระบบการลา' }}
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-12 d-flex justify-content-end d-flex mb-4">
                <a href="{{ route('create') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>
            </div>
            <style>
                .small-box{
                    background-color: white;
                }
                .small-box h3{
                    color: #3b3b3b;
                }
                .small-box h4{
                    color: #3b3b3b;
                }
            </style>
            <div class="row">
                <div class="col-lg-4">
                    <div class="small-box pt-2" style="background-color: #86a5c4">
                        <div class="inner">
                            <h3>ลาพักผ่อนประจำปี</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-umbrella-beach"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="small-box pt-2" style="background-color: #c4b3c3">
                        <div class="inner">
                            <h3>ลาป่วย</h3>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-stethoscope"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="small-box pt-2" style="background-color: #aad4e0">
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
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #eeb189">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลาเพื่อทำหมัน</h4>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-venus-mars"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #c1c1c1">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลาอุปสมบท</h4>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-band-aid"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #f9eeb6">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลาเพื่อการฝึกอบรม</h4>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #d9debb">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลารับราชการทหาร</h4>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-rifle"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #faae9f">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลาคลอดบุตร</h4>
                            <p>ลาไปแล้ว 3 วัน 3 ชั่วโมง 3 นาที</p>
                            <p class="mb-0">คงเหลือ 3 วัน 3 ชั่วโมง 3 นาที</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-baby"></i>
                        </div>
                        <div class="small-box-footer pb-3"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="small-box pt-2" style="background-color: #f9acc0">
                        <div class="inner">
                            <h4 class="font-weight-bold">ลาเพื่อสมรส</h4>
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

        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
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
                            <table id="data-table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>วันที่ยื่นคำร้อง</th>
                                    <th>ประเภทการลา</th>
                                    <th>ลาตั้งแต่</th>
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
                                @php
                                    $counter_req = 0;
                                    $counter_rep = 0;
                                @endphp
                                @foreach ($leaves as $row)
                                    @if ($counter_req < 10)
                                        @if ($row->user_id == Auth::user()->id)
                                            <tr>
                                                <td>{{ $row->created_at->addYears(543)->format('d/m/Y H:i') }}
                                                </td>
                                                <td>{{ $row->leave_type }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                                </td>
                                                <td>{{ $row->leave_total }}</td>
                                                @if (!$row->sel_rep)
                                                    <td>ไม่มีผู้ปฏิบัติแทน</td>
                                                @else
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $row->sel_rep)
                                                            <td>{{ $user->name }}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                {{-- <td>{{$row->sel_rep }}</td> --}}
                                                <td>{{ $row->approve_rep }}
                                                <td>{{ $row->approve_pm }}</td>
                                                <td>{{ $row->approve_hr }}</td>
                                                <td>{{ $row->approve_ceo }}</td>
                                                <td
                                                    class="{{ $row->status == 'อนุมัติ' ? 'text-success table-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger table-danger') }}">
                                                    {{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ route('req.detail', $row->id) }}"><i
                                                            class="fas fa-file-invoice"></i></a>
                                                </td>
                                            </tr>
                                        @else
                                            @php
                                                $counter_req--;
                                            @endphp
                                        @endif
                                    @endif
                                    @php
                                        $counter_req++;
                                    @endphp
                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                {{-- end รายการคำขอใบลา --}}
            </div>
        </div>
    </section>

@endsection
