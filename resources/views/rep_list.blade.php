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
                        <li class="breadcrumb-item active">รายการคำขอปฏิบัติแทน</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    {{--  Mian Content  --}}
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
                                รายการคำขอใบลา</h3>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <span>{{ $message }}</span>
                                </div>
                            @endif
                            <table id="rep_list_table" class="table table-bordered table-hover text-center">
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
                                @foreach($leaves as $row)
                                    @if($row->sel_rep == Auth::user()->id)
                                        <tr>
                                            <td>{{$row->created_at->addYears(543)->format('d/m/Y H:i:s') }}</td>
                                            <td>{{$row->leave_type}}</td>
                                             <td>{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}</td>
                                            <td>{{$row->leave_total}}</td>
                                            @foreach($users as $user)
                                                @if($user->id == $row->user_id)
                                                    <td>{{$user->name}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$row->approve_rep}}</td>
                                            <td>{{$row->approve_pm}}</td>
                                            <td>{{$row->approve_hr}}</td>
                                            <td>{{$row->approve_ceo}}</td>
                                            <td class="{{ $row->status == 'อนุมัติ' ? 'text-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger') }}">
                                                {{ $row->status }}
                                            </td>
                                            <td>
                                                <a href="{{route('rep_list_detail',$row->id)}}">
                                                    <i class="fas fa-file-invoice"></i>
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
    {{--  end mian content  --}}
@endsection
