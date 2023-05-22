@extends('layouts.layout')
{{-- <link rel="stylesheet" href="{{ asset('style/css.css') }}"> --}}
@section('title')
    {{ 'ระบบการลา' }}
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mt-2">
                <link rel="stylesheet" href="{{ asset('style/css.css') }}">
                {{-- ลาป่วย --}}
                <div class="col-lg-4 mb-2">
                    <div class="card-box" style="background-color: #E8533D;">
                        <div class="content1">
                            <div class="icon-card" style="background-color:#F37762">
                                <i class="fa-solid fa-stethoscope" style="width: 50px; height:50px; color:white"></i>
                            </div>
                            <div class="day">
                                <span class="Hday">10</span><span class="Sday">/30</span> <span
                                    class="SSday">วัน</span>
                            </div>
                        </div>
                        <br>
                        <div class="content1">
                            <div class="title">
                                <p class="mb-0">ลาป่วย</p>
                            </div>
                            <div class="detail">
                                <button class="btn btn-link pr-0" href="">
                                    <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลากิจ --}}
                <div class="col-lg-4 mb-2">
                    <div class="card-box" style="background-color: #5182FF;">
                        <div class="content1">
                            <div class="icon-card" style="background-color:#759CFF">
                                <i class="fa-solid fa-business-time" style="width: 50px; height:50px; color:white"></i>
                            </div>
                            <div class="day">
                                <span class="Hday">10</span><span class="Sday">/30</span> <span
                                    class="SSday">วัน</span>
                            </div>
                        </div>
                        <br>
                        <div class="content1">
                            <div class="title">
                                <p class="mb-0">ลากิจ</p>
                            </div>
                            <div class="detail">
                                <button class="btn btn-link pr-0" href="">
                                    <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาพักผ่อน --}}
                <div class="col-lg-4 mb-2">
                    <div class="card-box" style="background-color: #FEAD10;">
                        <div class="content1">
                            <div class="icon-card" style="background-color:#FFCA62">
                                <i class="fa-solid fa-umbrella-beach" style="width: 50px; height:50px; color:white"></i>
                            </div>
                            <div class="day">
                                <span class="Hday">10</span><span class="Sday">/30</span> <span
                                    class="SSday">วัน</span>
                            </div>
                        </div>
                        <br>
                        <div class="content1">
                            <div class="title">
                                <p class="mb-0">ลาพักผ่อน</p>
                            </div>
                            <div class="detail">
                                <button class="btn btn-link pr-0" href="">
                                    <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาเพื่ออบรม --}}
                {{-- <div class="col-lg-4 mb-2">
                    <div class="card-box" style="background-color: #1F998E;">
                        <div class="content1">
                            <div class="icon-card" style="background-color:#50BDB3">
                                <i class="fa-solid fa-book" style="width: 50px; height:50px; color:white"></i>
                            </div>
                            <div class="day">
                                <span class="Hday">10</span><span class="Sday">/30</span> <span
                                    class="SSday">วัน</span>
                            </div>
                        </div>
                        <br>
                        <div class="content1">
                            <div class="title">
                                <p class="mb-0">ลาฝึกอบรม</p>
                            </div>
                            <div class="detail ">
                                <button class="btn btn-link pr-0" href="">
                                    <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <br>

            {{-- ลาอื่นๆ --}}
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseExample"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            ประเภทการลาเพิ่มเติม
                        </a>
                    </p>
                </div>
                <div class="col-lg-12">

                    <div class="collapse" id="collapseExample">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @php
                                        $bg = ['#f9e3ff;', '#f1fbff', '#f1fbff', '#f1fbff', '#f1fbff', '#f1fbff'];
                                        $name = ['ลาคลอดบุตร', 'ลาเพื่อสมรส', 'ลาเพื่อทำหมัน', 'ลารับราชการทหาร', 'ลาอุปสมบท', 'ลาเพื่อฝึกอบรม'];
                                    @endphp
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="col-md-2">
                                            <div class="card-box-other d-flex justify-content-between align-items-center">
                                                <div class="d-flex justify-content-between">
                                                    <div class="align-items-center d-flex justify-content-center"
                                                        style="background-color: {{ $bg[$i] }}; height:70px;width:70px;border-radius:50px">
                                                        <i class="fa-solid fa-hospital-user fa-2xl"
                                                            style="color:#c600fe"></i>
                                                    </div>
                                                    <div class="ml-2 d-flex flex-column justify-content-center">
                                                        <p class="text-dark font-weight-bold mb-0"
                                                            style="font-size: 18px;">
                                                            {{ $name[$i] }}
                                                        </p>
                                                        <p class="mb-0" style="color:black">3/10 วัน</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <div class="col-12 d-flex justify-content-end d-flex">
                <a href="{{ route('create') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>
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
                                    @php
                                        $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
                                    @endphp
                                    <tr>
                                        <th>วันที่ยื่น</th>
                                        <th style="{{ $style }} max-width: 80px;">ประเภทการลา</th>
                                        <th style="{{ $style }} max-width: 80px;">ลาตั้งแต่ - ถึง</th>
                                        <th style="{{ $style }} max-width: 80px;">ลาทั้งหมด</th>
                                        <th style="{{ $style }} max-width: 80px;">ผู้ปฏิบัติงานแทน</th>
                                        <th style="{{ $style }} max-width: 50px;">อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                        <th style="{{ $style }} max-width: 50px;">อนุมัติ(PM)</th>
                                        <th style="{{ $style }} max-width: 50px;">อนุมัติ(HR)</th>
                                        <th style="{{ $style }} max-width: 50px;">อนุมัติ(CEO)</th>
                                        <th>สถานะ</th>
                                        <th
                                            style="{{$style}} max-width: 50px;">
                                            รายละเอียด</th>
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
                                                    <td style="{{ $style }} max-width: 80px;">
                                                        {{ $row->created_at->addYears(543)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td>{{ $row->leave_type }}</td>
                                                    <td style="{{ $style }} max-width: 100px;">
                                                        {{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                                        ถึง
                                                        {{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td style="{{ $style }} max-width: 100px;">
                                                        {{ $row->leave_total }}</td>
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
                                                    <td style="{{ $style }} max-width: 50px;"
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
