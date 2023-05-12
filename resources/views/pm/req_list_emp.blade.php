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
                    <li class="breadcrumb-item">รายการคำขอ</li>
                    <li class="breadcrumb-item active">รายการคำขอใบลา</li>
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
                            รายการคำขอใบลา
                        </h3>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <span>{{ $message }}</span>
                        </div>
                        @endif

                        <table id="req_list_table" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>วันที่ยื่นคำร้อง</th>
                                    <th>ผู้ลา</th>
                                    <th>วันที่ลาตั้งแต่</th>
                                    <th>ถึง</th>
                                    <th>ลาทั้งหมด</th>
                                    <th>อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                    <th>อนุมัติ(PM)</th>
                                    <th>อนุมัติ(HR)</th>
                                    <th>อนุมัติ(CEO)</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                @if ($leave->sel_pm == Auth::user()->id)
                                @if ($leave->approve_rep != '⌛')
                                <tr>
                                    <td>{{$leave->created_at->addYears(543)->format('d/m/Y H:i:s') }}</td>
                                    @foreach($users as $user)
                                    @if ($leave->user_id == $user->id)
                                    <td>{{$user->name}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{ \Carbon\Carbon::parse($leave->leave_start)->addYears(543)->format('d/m/Y
                                        H:i')
                                        }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->leave_end)->addYears(543)->format('d/m/Y H:i')
                                        }}
                                    </td>
                                    <td>{{$leave->leave_total}}</td>
                                    <td>{{$leave->approve_rep}}</td>
                                    <td>{{$leave->approve_pm}}</td>
                                    <td>{{$leave->approve_hr}}</td>
                                    <td>{{$leave->approve_ceo}}</td>
                                    <td
                                        class="{{ $leave->status == 'อนุมัติ' ? 'text-success' : ($leave->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger') }}">
                                        {{ $leave->status }}</td>
                                    <td>
                                        <a href="{{route('pm.req.emp.detail',$leave->id)}}"><i
                                                class="fas fa-file-invoice"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
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
