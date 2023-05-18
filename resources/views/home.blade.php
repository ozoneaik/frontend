@extends('layouts.layout')
<link rel="stylesheet" href="{{ asset('style/css.css') }}">
@section('title')
    {{ 'ระบบการลา' }}
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">

            <div class="row">
                {{-- ลาป่วย --}}
                <div class="col-lg-3 mt-2">
                    <div class="card-box p-3" style="background-color: #E8533D;">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i
                                        class="fas fa-chevron-right" style="color:#E8533D" data-toggle="modal"
                                        data-target="#exampleModal"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal ลาป่วย --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลากิจ --}}
                <div class="col-lg-3 mt-2">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i
                                        class="fas fa-chevron-right" style="color:#5182FF"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาพักผ่อน --}}
                <div class="col-lg-3 mt-2">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i
                                        class="fas fa-chevron-right" style="color:#FEAD10"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ลาเพื่ออบรม --}}
                <div class="col-lg-3 mt-2">
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
                                <button class="button btn btn-sm btn-light mb-0" href=""><i
                                        class="fas fa-chevron-right" style="color:#1F998E"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <br>


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
                                <center class="d-flex justify-content-between mr-3 ml-3">
                                    <div class="d-inline">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="background-color:#fff7f0; width:60px; height:60px; border-radius:10px">
                                            <i class="fa-solid fa-person-rifle fa-lg" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="d-inline"></div>
                                    </div>
                                    <div class="d-inline p-2 text-left font-weight-bold text-secondary">
                                        ลารับการทหาร
                                        <br>
                                        3/10วัน
                                    </div>

                                    <div class="d-inline">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="background-color:#fff7f0; width:60px; height:60px; border-radius:10px">
                                            <i class="fa-solid fa-person-rifle fa-lg" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="d-inline"></div>
                                    </div>
                                    <div class="d-inline p-2 text-left font-weight-bold text-secondary">
                                        ลารับการทหาร
                                        <br>
                                        3/10วัน
                                    </div>

                                    <div class="d-inline">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="background-color:#fff7f0; width:60px; height:60px; border-radius:10px">
                                            <i class="fa-solid fa-person-rifle fa-lg" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="d-inline"></div>
                                    </div>
                                    <div class="d-inline p-2 text-left font-weight-bold text-secondary">
                                        ลารับการทหาร
                                        <br>
                                        3/10วัน
                                    </div>

                                    <div class="d-inline">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="background-color:#fff7f0; width:60px; height:60px; border-radius:10px">
                                            <i class="fa-solid fa-person-rifle fa-lg" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="d-inline"></div>
                                    </div>
                                    <div class="d-inline p-2 text-left font-weight-bold text-secondary">
                                        ลารับการทหาร
                                        <br>
                                        3/10วัน
                                    </div>

                                    <div class="d-inline">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="background-color:#fff7f0; width:60px; height:60px; border-radius:10px">
                                            <i class="fa-solid fa-person-rifle fa-lg" style="color:#ff6a00"></i>
                                        </div>
                                        <div class="d-inline"></div>
                                    </div>
                                    <div class="d-inline p-2 text-left font-weight-bold text-secondary">
                                        ลารับการทหาร
                                        <br>
                                        3/10วัน
                                    </div>
                                </center>
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
