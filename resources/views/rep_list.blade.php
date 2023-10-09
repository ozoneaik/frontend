@extends('layouts.layout')

@section('title')
    {{ 'รายการคำขอใบลา' }}
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
        {{-- Container Fluid --}}
        <div class="container-fluid">
            <div class="row">
                {{-- ตารางรายการคำขอปฏิบัติแทน --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-list-alt mr-2"></i>
                                รายการคำขอปฏิบัติแทน
                            </h3>
                            <a href="{{ route('refresh') }}" class= "float-right text-info">↻ รีเฟรชข้อมูล</a>
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
                            @endphp
                            <table id="rep_list_table" class="table table-bordered table-hover text-center">
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
                                @foreach ($leaves as $row)
                                    <tr>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                        <td style="{{ $style }} max-width:40px;">{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                        <td style="{{ $style }} max-width: 50px;">{{ $row->relation_user->name }}</td>
                                        <td style="{{ $style }} max-width: 40px;" class="">
                                            <button class="btn btn-sm rounded-pill text-dark"
                                                    style="background-color: @if ($row->status == 'อนุมัติ') #c8ffd5 @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
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
                {{-- end ตารางรายการคำขอปฏิบัติแทน --}}
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{--  end mian content  --}}
@endsection
