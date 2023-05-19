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
                    $colors = array('#E8533D', '#5182FF', '#FEAD10', '#1F998E');
                    $colors1 = array('#F37762', '#759CFF', '#FFCA62', '#50BDB3');
                    $icon = array('fa-solid fa-business-time','fa-solid fa-business-time', 'fa-solid fa-umbrella-beach', 'fa-solid fa-book');
                    $colors2 = array('#E8533D', '#5182FF', '#FEAD10', '#1F998E');
                    $count = 0;
                @endphp

                @foreach($users_data as $row)
                    @if($row->user_id == Auth::user()->id)
                        @if ($count < 4)
                            <div class="col-lg-3 mb-2">
                                <div class="card-box p-3" style="background-color: {{ $colors[$count % count($colors)] }};">
                                    <div class="content1">
                                        <div class="icon-card" style="background-color:{{ $colors1[$count % count($colors1)] }}">
                                            <i class="{{ $icon[$count % count($icon)] }}" style="width: 50px; height:50px; color:white"></i>
                                        </div>
                                        @php
                                            $parts = explode(' ', $row->time_already_used);
                                            $D = (int)$parts[0];
                                            $parts = explode(' ', $row->time_remain);
                                            $D1 = (int)$parts[0];
                                        @endphp
                                        <div class="day">
                                            <span class="Hday">{{ $D }}</span><span class="Sday">/{{ $D1 }}</span> <span
                                                class="SSday">วัน</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="content1">
                                        <div class="title">
                                            <p class="mb-0">{{ $row->leave_type_name }}</p>
                                        </div>
                                        <div class="detail">
                                            <button class="button btn btn-sm btn-light mb-0" href="">
                                                <i class="fas fa-file-lines" style="color:{{ $colors2[$count % count($colors2)] }}"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endif
                    @if ($count >= 4)
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
                            <div class="card-body d-flex justify-content-center">
                                <style>
                                    .separator {
                                        width: 2px;
                                        background-color: #ececec;
                                        margin: 0px 10px;
                                        margin-left: 75px;
                                        margin-right: 20px;
                                    }

                                    .h5 {
                                        color: #424242;
                                        font-weight: bold
                                    }

                                    .other {
                                        padding: 10px
                                    }

                                    .other:hover {
                                        background-color: #0000002e;
                                        cursor: pointer;
                                        border-radius: 10px
                                    }

                                    @media (max-width: 576px) {
                                        .card-body {
                                            flex-direction: column;
                                            align-items: flex-start;
                                        }

                                        .separator {
                                            margin-left: 0;
                                            margin-top: 10px;
                                        }
                                    }
                                </style>
                                {{-- ลาคลอดบุตร --}}
                                @php
                                    $colors = array('#FFE6F5', '#f9e3ff', '#1fb50021', '#fff7f0', '#f1fbff');
                                    $colors1 = array('#FF009B', '#c600fe', '#1fb500', '#ff6a00', '#00b7fe');
                                    $icon = array('fa-solid fa-heart fa-2xl', 'fa-solid fa-hospital-user fa-2xl', 'fa-solid fa-person-rifle fa-2xl', 'fa-solid fa-hands-praying fa-2xl', 'fa-solid fa-baby fa-2xl');
                                    $count = 0;
                                @endphp
                                @foreach($users_data as $row)
                                    @if($row->user_id == Auth::user()->id)
                                        @if ($count >= 4 && $count < 9)
                                            <div class="d-flex flex-row">
                                                <div class="other d-flex flex-row pl-0" data-toggle="modal" data-target="#myModal">
                                                    <div class="align-items-center d-flex justify-content-center"
                                                         style="background-color: {{ $colors[$count % count($colors)] }}; height:70px;width:70px;border-radius:50px">
                                                        <i class="{{ $icon[$count % count($icon)] }}" style="color:{{ $colors1[$count % count($colors1)] }}"></i>
                                                    </div>
                                                    @php
                                                        $parts = explode(' ', $row->time_already_used);
                                                        $D = (int)$parts[0];
                                                        $parts = explode(' ', $row->time_remain);
                                                        $D1 = (int)$parts[0];
                                                    @endphp
                                                    <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                                        <p class="text-dark font-weight-bold mb-0" style="font-size: 18px">{{ $row->leave_type_name }}</p>
                                                        <p class="mb-0" style="color:black">{{ $D }}/{{ $D1 }} วัน</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator"></div>
                                        @endif
                                        @php
                                            $count++;
                                            if ($count >= 9) {
                                                break;
                                            }
                                        @endphp
                                    @endif
                                @endforeach
                                <!-- Bootstrap Modal ลาคลอดบุตร -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal Title</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>This is the modal content.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
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
