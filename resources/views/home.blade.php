@extends('layouts.layout')

@section('title')
    {{ 'ระบบการลา' }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content-header">
        {{-- Container-fluid --}}
        <div class="container-fluid">
            {{-- ปุ่มเพิ่มใบลา --}}
            <div class="col-12 d-flex justify-content-end d-flex mb-4">
                <a href="{{ route('create') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>
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
            {{-- end small boxes --}}

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
                            <table id="data-table1" class="table table-bordered table-hover text-center">
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
                                    @foreach ($leaves as $row)
                                        @if ($counter_rep < 10)
                                            @if ($row->sel_rep == Auth::user()->id)
                                                <tr>
                                                    <td>{{ $row->created_at->addYears(543)->format('d/m/Y H:i:s') }}
                                                    </td>
                                                    <td>{{ $row->leave_type }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td>{{ $row->leave_total }}</td>
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $row->user_id)
                                                            <td>{{ $user->name }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $row->approve_rep }}</td>
                                                    <td>{{ $row->approve_pm }}</td>
                                                    <td>{{ $row->approve_hr }}</td>
                                                    <td>{{ $row->approve_ceo }}</td>
                                                    <td
                                                        class="{{ $row->status == 'อนุมัติ' ? 'text-success table-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger table-danger') }}">
                                                        {{ $row->status }}</td>
                                                    <td>
                                                        <a href="{{ route('rep.detail', $row->id) }}">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @else
                                                @php
                                                    $counter_rep--;
                                                @endphp
                                            @endif
                                            @php
                                                $counter_rep++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($counter_rep == 0)
                                <p>ไม่มีข้อมูลในตาราง</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- end รายการคำขอปฏิบัติแทน --}}
        </div>

    </section>
    {{-- end Container-fluid --}}

    </div>

    <!-- end main content -->

@endsection
