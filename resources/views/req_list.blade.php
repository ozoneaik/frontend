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

    {{--  Mian Content  --}}
    <section class="content">
        {{-- Container Fluid--}}
        <div class="container-fluid">
            <div class="row">

                {{-- ปุ่มเพิ่มใบลา --}}
                <div class="col-12 d-flex justify-content-end d-flex mb-4">
                    <a href="{{route('create')}}">
                        <button class="btn btn-primary ms-auto">+ เพิ่มใบลา</button>
                    </a>
                </div>
                {{-- end ปุ่มเพิ่มใบลา --}}

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
                            <div class="" id="table-container">
                                <table id="req_list_table" class="table table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>วันที่ยื่นคำร้อง</th>
                                        <th>ประเภทการลา</th>
                                        <th>วันที่ลาตั้งแต่</th>
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
                                    @foreach ($leaves as $row)
                                        @if($row->user_id == Auth::user()->id)
                                            <tr>
                                                <td>{{$row->created_at}}</td>
                                                <td>{{$row->leave_type}}</td>
                                                <td>{{$row->leave_start}}</td>
                                                <td>{{$row->leave_end}}</td>
                                                <td>{{$row->leave_total}}</td>
                                                @if(!$row->sel_rep)
                                                    <td>ไม่มีผู้ปฏิบัติแทน</td>
                                                @else
                                                    @foreach($users as $user)
                                                        @if($user->id == $row->sel_rep)
                                                            <td>{{$user->name}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                {{-- <td>{{$row->sel_rep}}</td> --}}
                                                <td>{{$row->approve_rep}}</td>
                                                <td>{{$row->approve_pm}}</td>
                                                <td>{{$row->approve_hr}}</td>
                                                <td>{{$row->approve_ceo}}</td>
                                                <td class="{{ $row->status == 'อนุมัติ' ? 'text-success table-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger table-danger') }}">{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{route('req.detail',$row->id)}}">
                                                        <i class="fas fa-file-invoice"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>วันที่ยื่นคำร้อง</th>
                                        <th>ประเภทการลา</th>
                                        <th>วันที่ลาตั้งแต่</th>
                                        <th>ถึง</th>
                                        <th>ลาทั้งหมด</th>
                                        <th>ผู้ปฏิบัติงานแทน</th>
                                        <th>อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                        <th>อนุมัติ(PM)</th>
                                        <th>อนุมัติ(HR)</th>
                                        <th>อนุมัติ(CEO)</th>
                                        <th>สถานะ</th>
                                        <th> </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

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
