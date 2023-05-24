@extends('layouts.layout')
@section('title','ข้อมูลพนักงาน')
@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">ข้อมูลพนักงาน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                รายละเอียด
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                ข้อมูลพนักงาน
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง --}}
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">ชื่อ - นามสกุล</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">ชื่อเล่น</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->nick_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ตำแหน่ง</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->possition }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">วันเดือนปีเกิด</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->birthday }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">อีเมล</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->email }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->phone_no_1 }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">เบอร์โทรศัพท์(สำรอง)</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->phone_no_2 }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">ที่อยู่</label>
                                                        <p class="form-control" readonly>
                                                            {{ $user->address }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fas fa-file-invoice mr-2"></i>
                                                ข้อมูลการลา
                                            </h3>
                                            <style>
                                                .b1:hover
                                                {
                                                    background: greenyellow !important;
                                                    border-radius: 10px;
                                                }
                                            </style>
                                            <button data-toggle="modal" data-target=".bd-example-modal-lg" type="button" class="float-right b1" style="border:none; background: none">
                                                <i class="fa-solid fa-pen-to-square "></i>
                                            </button>
                                            <form action="{{route('leave.update',$user->id)}}" method="post">
                                                @csrf
                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered mb-0 text-center">
                                                                    <thead>
                                                                    <tr>
                                                                        <th rowspan="2" colspan="1" class="table-danger ">
                                                                            ประเภทการลา
                                                                        </th>
                                                                        <th rowspan="1" colspan="3" class="table-warning ">
                                                                            ลาไปแล้ว
                                                                        </th>
                                                                        <th rowspan="1" colspan="3" class="table-info ">
                                                                            ลาคงเหลือ
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="table-warning ">วัน</th>
                                                                        <th class="table-warning ">ชั่วโมง</th>
                                                                        <th class="table-warning ">นาที</th>
                                                                        <th class="table-info ">วัน</th>
                                                                        <th class="table-info ">ชั่วโมง</th>
                                                                        <th class="table-info ">นาที</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php
                                                                        $i = -1;
                                                                    @endphp
                                                                    @foreach($leave_datas as $leave_data)
                                                                        <?php
                                                                            $i = $i + 1;
                                                                            ?>
                                                                        <tr>
                                                                            <td class="table-danger ">{{ $leave_data->leave_type_name }}</td>
                                                                            @php
                                                                                $parts = explode(' ', $leave_data->time_already_used);
                                                                                $D = (int)$parts[0];
                                                                                $H = (int)$parts[2];
                                                                                $M = (int)$parts[4];
                                                                                $parts = explode(' ', $leave_data->time_remain);
                                                                                $D1 = (int)$parts[0];
                                                                                $H1 = (int)$parts[2];
                                                                                $M1 = (int)$parts[4];
                                                                                $style = 'width:50px;border-radius: 5px; border:red';
                                                                                $D2 = $D + $D1;
                                                                                $H2 = $H + $H1;
                                                                                $M2 = $M + $M1;
                                                                            @endphp
                                                                            <td class="table-warning ">
                                                                                <input type="number" min="0" value="{{ $D }}" style="{{$style}}" name="D_used{{$i}}">
                                                                            </td>
                                                                            <td class="table-warning ">
                                                                                <input type="number" min="0" max="7" value="{{ $H }}" style="{{$style}}" name="H_used{{$i}}">
                                                                            </td>
                                                                            <td class="table-warning ">
                                                                                <input type="number" min="0" max="59" value="{{ $M }}" style="{{$style}}" name="M_used{{$i}}">
                                                                            </td>
                                                                            <td class="table-info ">
                                                                                <input type="number" min="0" value="{{ $D1 }}" style="{{$style}}" name="D_remain{{$i}}">
                                                                            </td>
                                                                            <td class="table-info ">
                                                                                <input type="number" min="0" max="7" value="{{ $H1 }}" style="{{$style}}" name="H_remain{{$i}}">
                                                                            </td>
                                                                            <td class="table-info ">
                                                                                <input type="number" min="0" max="59" value="{{ $M1 }}" style="{{$style}}" name="M_remain{{$i}}">
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>ประเภทการลา</th>
                                                                <th>ลาไปแล้ว</th>
                                                                <th>ลาคงเหลือ</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($leave_datas as $leave_data)
                                                                <tr>
                                                                    <td>{{ $leave_data->leave_type_name }}</td>
                                                                    <td>{{ $leave_data->time_already_used }}</td>
                                                                    <td>{{ $leave_data->time_remain }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ประวัติการของ </h3>
                            </div>
                            @php
                                $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
                        @endphp
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
                                @foreach ($leaveforms as $row)
                                    @if ($counter_req < 10)
                                        @if ($row->user_id == $user->id)
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
            </div>
        </div>
    </div>
@endsection
