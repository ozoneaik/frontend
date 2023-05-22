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
                @php
                    $colors = array('#E8533D', '#5182FF', '#FEAD10');
                    $colors1 = array('#F37762', '#759CFF', '#FFCA62');
                    $icon = array('fa-solid fa-stethoscope','fa-solid fa-business-time', 'fa-solid fa-umbrella-beach');

                    $count = 0;
                @endphp
                @foreach($users_data as $row)
                    @if($row->user_id == Auth::user()->id)
                        @if ($count < 3)
                            <div class="col-lg-4 mb-2">
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
                                            <span class="Hday">{{ $D }}</span><span class="Sday">/{{ $D2 }}</span> <span
                                                class="SSday">วัน</span>
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
                                {{-- modal ลาป่วย --}}
                                @php
                                    error_log($row->leave_type_name);
                                @endphp
                                <div class="modal fade" id="card{{$count}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $row->leave_type_name }}</h5>
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
                            </div>@php
                                $count++;
                            @endphp
                        @endif
                    @endif
                    @if ($count >= 3)
                        @break
                    @endif
                @endforeach
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
                                        $bg = [' ',' ',' ', '#f1fbff;', '#ffe6f5', '#f9e3ff', '#e2f5de', '#fff7f0', '#eff4f9'];
                                        $icon_color = [' ',' ',' ','#00b7fe', '#ff009b', '#c600fe', '#1fb500', '#ff6a00', '#507090'];
                                        $icon = [' ',' ',' ','fa-solid fa-baby', 'fa-solid fa-heart', 'fa-solid fa-hospital-user', 'fa-solid fa-person-rifle', 'fa-solid fa-hands-praying', 'fa-solid fa-book'];
                                        $count = 0;
                                    @endphp
                                    @foreach($users_data as $row)
                                        @if($row->user_id == Auth::user()->id)
                                            @if ($count >= 3 && $count < 9)
                                                {{-- ลาอื่นๆ --}}
                                                <div class="col-md-2">
                                                    <div
                                                        class="card-box-other d-flex justify-content-between align-items-center"
                                                        data-toggle="modal" data-target="#modal{{ $count }}">
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
                                                                <p class="mb-0" style="color:black">{{ $D }}/{{ $D2 }} วัน</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal ลาอื่นๆ -->
                                                <div class="modal fade" id="modal{{ $count }}" tabindex="-1"
                                                     role="dialog" aria-labelledby="modal{{ $count }}Label"
                                                     aria-hidden="true">
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
                                        @endif
                                    @endforeach
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
    @php
        $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
    @endphp
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
                                    <th style="{{ $style }} max-width: 50px;">
                                        รายละเอียด
                                    </th>
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
