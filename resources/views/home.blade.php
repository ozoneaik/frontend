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
                <div class="col-lg-3 mb-2">
                    <div class="card-box p-3" style="background-color: #E8533D;">
                        <div class="content1">
                            <div class="icon-card" style="background-color:#F37762">
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
                                <p class="mb-0">ลาป่วย</p>
                            </div>
                            <div class="detail">
                                <button class="button btn btn-sm btn-light mb-0" href="">
                                    <i class="fas fa-file-lines" style="color:#E8533D"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลากิจ --}}
                <div class="col-lg-3 mb-2">
                    <div class="card-box p-3" style="background-color: #5182FF;">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i class="fas fa-file-lines"
                                        style="color:#5182FF"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาพักผ่อน --}}
                <div class="col-lg-3 mb-2">
                    <div class="card-box p-3" style="background-color: #FEAD10;">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i class="fas fa-file-lines"
                                        style="color:#FEAD10"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาเพื่ออบรม --}}
                <div class="col-lg-3 mb-2">
                    <div class="card-box p-3" style="background-color: #1F998E;">
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
                            <div class="detail">
                                <button class="button btn btn-sm btn-light mb-0" href=""><i class="fas fa-file-lines"
                                        style="color:#1F998E"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <div class="d-flex flex-row">
                                    <div class="other d-flex flex-row pl-0" data-toggle="modal" data-target="#myModal">
                                        <div class="align-items-center d-flex justify-content-center"
                                            style="background-color: #f1fbff; height:70px;width:70px;border-radius:50px">
                                            <i class="fa-solid fa-baby fa-2xl" style="color:#00b7fe"></i>
                                        </div>
                                        <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 24px">ลาคลอดบุตร</p>
                                            <p class="mb-0" style="color:black">3/10 วัน</p>
                                        </div>
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
                                <div class="separator"></div>

                                {{-- ลาสมรส --}}
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="other d-flex flex-row bd-highlight">
                                        <div class="align-items-center d-flex justify-content-center"
                                            style="background-color: #FFE6F5; height:70px;width:70px;border-radius:50px">
                                            <i class="fa-solid fa-heart fa-2xl" style="color:#FF009B"></i>
                                        </div>
                                        <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 24px">ลาเพื่อสมรส</p>
                                            <p class="mb-0" style="color:black">3/10 วัน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                {{-- ลาทำหมัน --}}
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="other d-flex flex-row bd-highlight">
                                        <div class="align-items-center d-flex justify-content-center"
                                            style="background-color: #f9e3ff; height:70px;width:70px;border-radius:50px">
                                            <i class="fa-solid fa-hospital-user fa-2xl" style="color:#c600fe"></i>
                                        </div>
                                        <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 24px">ลาเพื่อทำหมัน</p>
                                            <p class="mb-0" style="color:black">3/10 วัน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                {{-- ลาราชการหาร --}}
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="other d-flex flex-row bd-highlight">
                                        <div class="align-items-center d-flex justify-content-center"
                                            style="background-color: #1fb50021; height:70px;width:70px;border-radius:50px">
                                            <i class="fa-solid fa-person-rifle fa-2xl" style="color:#1fb500"></i>
                                        </div>
                                        <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 24px">ลารับการทหาร</p>
                                            <p class="mb-0" style="color:black">3/10 วัน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                {{-- ลาบวช --}}
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="other d-flex flex-row bd-highlight">
                                        <div class="align-items-center d-flex justify-content-center"
                                            style="background-color: #fff7f0; height:70px;width:70px;border-radius:50px">
                                            <i class="fa-solid fa-hands-praying fa-2xl" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="ml-3 d-flex flex-column justify-content-center bd-highlight">
                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 24px">ลาอุปสมบท</p>
                                            <p class="mb-0" style="color:black">3/10 วัน</p>
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
