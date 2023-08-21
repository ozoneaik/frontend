@extends('layouts.layout')

@section('title')
    {{'รายการคำขอใบลา'}}
@endsection

@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">Human Resources</li>
                        <li class="breadcrumb-item active">ใบลาพนักงาน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    {{-- Mian Content --}}
    <section class="content">
        {{-- Container Fluid--}}
        <div class="container-fluid">
            <div class="row">
                {{--ตารางรายการคำขอใบลา--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                ใบลาพนักงาน
                            </h3>
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
                            <table id="req_list_table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="{{ $style }} max-width: 50px;">วันที่ยื่นคำร้อง</th>
                                    <th style="{{ $style }} max-width: 50px;">ผู้ลา</th>
                                    <th style="{{ $style }} max-width: 50px;">วันที่ลาตั้งแต่</th>
                                    <th style="{{ $style }} max-width: 50px;">ถึง</th>
                                    <th style="{{ $style }} max-width: 50px;">ลาทั้งหมด</th>
                                    <th style="{{ $style }}">ผู้ปฏิบัติแทน</th>
                                    <th style="{{ $style }} max-width: 50px;">สถานะ</th>
                                    <th style="{{ $style }} max-width: 50px;">รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($leaves as $leave)
                                    @if (($leave->approve_pm == 'approve' || $leave->approve_pm == '-') || $leave->approve_hr == '-')
                                        <tr>
                                            <td style="{{ $style }} max-width: 50px;">{{$leave->created_at->addYears(543)->format('d/m/Y H:i:s') }}</td>
                                            <td style="{{ $style }} max-width: 50px;">{{ $usersMap[$leave->user_id] }}</td>
                                            <td style="{{ $style }} max-width: 50px;">{{ \Carbon\Carbon::parse($leave->leave_start)->addYears(543)->format('d/m/Y H:i')}}</td>
                                            <td style="{{ $style }} max-width: 50px;">{{ \Carbon\Carbon::parse($leave->leave_end)->addYears(543)->format('d/m/Y H:i')}}</td>
                                            <td style="{{ $style }} max-width: 50px;">{{$leave->leave_total}}</td>
                                            @if (!$leave->sel_rep || $leave->approve_rep == 'disapproval')
                                                <td style="{{ $style }} max-width: 40px;">
                                                    ไม่มีผู้ปฏิบัติแทน @if($leave->approve_rep == 'disapproval')
                                                        ถูกปฏิเสธ
                                                    @endif</td>
                                            @else
                                                <td style="{{ $style }} max-width: 40px;">{{$leave->representative->name}}</td>
                                            @endif
                                            <td style="{{ $style }} max-width: 40px;" class="">
                                                <button class="btn btn-sm rounded-pill text-dark" style="background-color: @if($leave->status == 'อนุมัติ') #c8ffd5 @elseif($leave->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
                                                    {{ $leave->status }}
                                                </button>
                                            </td>
                                            <td style="{{ $style }} max-width: 50px;">
                                                <a href="{{route('hr.req.emp.detail',$leave->id)}}"><i
                                                        class="fas fa-file-invoice"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                {{-- end ตารางรายการคำขอใบลา --}}

            </div>
        </div>
        {{-- end container fluid--}}
    </section>
    {{-- end mian content --}}
@endsection
