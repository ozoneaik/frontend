@extends('layouts.layout'){{-- <link rel="stylesheet" href="{{ asset('style/css.css') }}"> --}}
@section('title')
    {{ 'ระบบการลา' }}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            {{-- ลา 4 อันแรก--}}
            <div class="row mb-3">
                <link rel="stylesheet" href="{{ asset('style/css.css') }}">

                @php
                    $colors = array('#E8533D', '#5182FF', '#FEAD10','#6d99c5');
                    $colors1 = array('#F37762', '#759CFF', '#FFCA62','#92b3d4');
                    $icon = array('fa-solid fa-stethoscope','fa-solid fa-business-time', 'fa-solid fa-umbrella-beach','fa-solid fa-book',);
                    $count = 0;
                @endphp

                @foreach($users_data as $row)
                    @if($row->user_id == Auth::user()->id)
                        @if ($count == 0 ||$count == 1||$count == 2||$count == 3)

                            <div class="col-lg-3 mb-2">
                                <div class="card-box" style="background-color: {{ $colors[$count % count($colors)] }};">
                                    <div class="content1">
                                        <div class="icon-card"
                                             style="background-color:{{ $colors1[$count % count($colors1)] }}">
                                            <i class="{{ $icon[$count % count($icon)] }}"
                                               style="width: 50px; height:50px; color:white"></i>
                                        </div>
                                        @php
                                            $parts = explode(' ', $row->time_already_used);
                                            $D = (int)$parts[0];
                                            $H = (int)$parts[2];
                                            $parts = explode(' ', $row->time_remain);
                                            $D1 = (int)$parts[0];
                                            $H1 = (int)$parts[2];
                                            $D2 = $D1 + $D;
                                            if ($H1 != 0 || $H != 0){
                                                $D2 += 1;
                                            }
                                        @endphp
                                        <div class="day">
                                            <span class="Hday">{{ $D }}</span><span class="Sday">/{{ $D2 }}</span>
                                            <span class="SSday">วัน</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="content1">
                                        <div class="title">
                                            <p class="mb-0">{{ $row->leave_type_name }}</p>
                                        </div>
                                        <div class="detail">
                                            <button class="btn btn-link pr-0" href="" data-toggle="modal"
                                                    data-target="#card{{$count}}">
                                                <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{--                                 modal ลาป่วย--}}
                                <div class="modal fade" id="card{{$count}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLongTitle">{{ $row->leave_type_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ลาไปแล้ว {{ $row->time_already_used }}
                                                <br>
                                                คงเหลือ {{ $row->time_remain }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endif
                    @endif
                    {{--                    @if ($count >= 4)--}}
                    {{--                        @break--}}
                    {{--                    @endif--}}
                @endforeach
            </div>

            {{-- ลาอื่นๆ --}}
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline-primary btn-block mb-3" data-toggle="collapse" href="#collapseExample"
                       role="button" aria-expanded="false" aria-controls="collapseExample">
                        ประเภทการลาเพิ่มเติม
                    </a>
                </div>
                {{-- collaps ลาอิ่นๆ --}}
                <div class="col-lg-12">
                    <div class="collapse" id="collapseExample">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    @php
                                        $bg = ['','','','#eef7ff','#f1fbff;', '#ffe6f5', '#f9e3ff', '#e2f5de', '#fff7f0'];
                                        $icon_color = ['','','','#6d99c5','#00b7fe', '#ff009b', '#c600fe', '#1fb500', '#ff6a00'];
                                        $icon = ['','','','fa-solid fa-book','fa-solid fa-baby', 'fa-solid fa-heart', 'fa-solid fa-hospital-user', 'fa-solid fa-person-rifle', 'fa-solid fa-hands-praying'];
                                        $count = 0;
                                    @endphp
                                    @foreach($users_data as $row)

                                        @if ($count >= 3 && $count < 9)
                                            {{-- ลาอื่นๆ --}}
                                            <div class="col-md-2">
                                            <div class="card-box-other d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#modal{{ $count }}">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="align-items-center d-flex justify-content-center"
                                                             style="background-color: {{ $bg[$count] }}; height:70px;width:70px;border-radius:50px">
                                                            <i class="{{ $icon[$count] }} fa-2xl"
                                                               style="color:{{ $icon_color[$count] }}"></i>
                                                        </div>
                                                        @php
                                                            $parts = explode(' ', $row->time_already_used);
                                                            $D = (int)$parts[0];
                                                            $H = (int)$parts[2];
                                                            $parts = explode(' ', $row->time_remain);
                                                            $D1 = (int)$parts[0];
                                                            $H1 = (int)$parts[2];
                                                            $D2 = $D1 + $D;
                                                            if ($H1 != 0 || $H != 0){
                                                                $D2 += 1;
                                                            }
                                                        @endphp
                                                        <div class="ml-2 d-flex flex-column justify-content-center">
                                                            <p class="text-dark font-weight-bold mb-0"
                                                               style="font-size: 18px;">
                                                                {{ $row->leave_type_name }}
                                                            </p>
                                                            <p class="text-dark mb-0" style="color:black">{{ $D }}
                                                                /{{ $D2 }}
                                                                วัน</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal ลาอื่นๆ -->
                                            <div class="modal fade" id="modal{{ $count }}" tabindex="-1" role="dialog"
                                                 aria-labelledby="modal{{ $count }}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal{{ $count }}Label">
                                                                {{ $row->leave_type_name  }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ลาไปแล้ว {{ $row->time_already_used }}
                                                            <br>
                                                            คงเหลือ {{ $row->time_remain }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $count++;
                                            if ($count >= 9) {
                                                break;
                                            }
                                        @endphp

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end d-flex pr-0">
                <a href="{{ route('create') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>
            </div>
        </div>
    </section>
    @php
        $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
        foreach ($users as $user) {
            $usersMap[$user->id] = $user->name;
        }
    @endphp
    <section class="content">
        <div class="container-fluid">
            {{-- ตารางรายการคำขอใบลา --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                รายการคำขอใบลา </h3>
                        </div>
                        <div class="card-body">
                            {{-- data-table --}}
                            <table id="req_list_table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="{{ $style }} max-width: 40px;">วันที่ยื่นคำร้อง</th>
                                    <th style="{{ $style }} max-width: 40px;">ประเภทการลา</th>
                                    <th style="{{ $style }} max-width: 40px;">วันที่ลาตั้งแต่</th>
                                    <th style="{{ $style }} max-width: 40px;">ถึง</th>
                                    <th style="{{ $style }} max-width: 40px;">ลาทั้งหมด</th>
                                    <th style="{{ $style }} max-width: 30px;">ผู้ปฏิบัติงานแทน</th>
                                    <th style="{{ $style }} max-width: 50px;">สถานะ</th>
                                    <th style="{{ $style }} max-width: 10px;">รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($leaves as $row)
                                    <tr>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                        <td style="{{ $style }} max-width:40px;">{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                        @if (!$row->sel_rep || $row->approve_rep == '❌')
                                            <td style="{{ $style }} max-width: 40px;">
                                                ไม่มีผู้ปฏิบัติแทน
                                                @if($row->approve_rep == '❌') ถูกปฏิเสธ @endif
                                            </td>
                                        @else
                                            <td style="{{ $style }} max-width: 40px;">{{ $row->representative->name }}</td>
                                        @endif
                                        <td style="{{ $style }} max-width: 40px;" class="">
                                            <button class="btn btn-sm rounded-pill text-dark"
                                                    style="background-color: @if($row->status == 'อนุมัติ') #c8ffd5;width: 80px @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
                                                {{ $row->status }}
                                            </button>
                                        </td>
                                        <td style="{{ $style }} max-width: 20px;">
                                            <a href="{{ route('req.detail', $row->id) }}">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                {{-- end รายการคำขอใบลา --}}
            </div>
            {{-- end ตารางรายการคำขอใบลา --}}

            {{-- ตารางรายการคำขอปฏิบัติแทน --}}
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                รายการคำขอปฏิบัติแทน </h3>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <span>{{ $message }}</span>
                                </div>
                            @endif
                            @php
                                $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
                                $usersMap = [];
                                foreach ($users as $user) {
                                    $usersMap[$user->id] = $user->name;
                                }
                            @endphp
                            <table id="data-table1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="{{ $style }} max-width: 80px;">วันที่ยื่นคำร้อง</th>
                                    <th style="{{ $style }} max-width: 40px;">ประเภทการลา</th>
                                    <th style="{{ $style }} max-width: 80px;">วันที่ลาตั้งแต่</th>
                                    <th style="{{ $style }} max-width: 80px;">ถึง</th>
                                    <th style="{{ $style }} max-width: 80px;">ลาทั้งหมด</th>
                                    <th style="{{ $style }} max-width: 50px;">จาก</th>
                                    <th style="{{ $style }} max-width: 30px;">สถานะ</th>
                                    <th style="{{ $style }} max-width: 10px;">รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($leaves_rep as $row)
                                    <tr>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                        <td style="{{ $style }} max-width:40px;">{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                        <td style="{{ $style }} max-width: 50px;">{{$row->relation_user->name}}</td>
                                        <td style="{{ $style }} max-width: 40px;" class="">
                                            <button class="btn btn-sm rounded-pill text-dark" style="background-color: @if($row->status == 'อนุมัติ') #c8ffd5 @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
                                                {{ $row->status }}
                                            </button>
                                        </td>
                                        <td style="{{ $style }} max-width: 10px;">
                                            <a href="{{ route('rep.detail', $row->id) }}">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end ตารางรายการคำขอปฏิบัติแทน --}}
        </div>
    </section>

@endsection
