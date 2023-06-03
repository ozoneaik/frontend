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
                        <li class="breadcrumb-item active">รายการคำขอใบลา</li>
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
                {{-- ปุ่มเพิ่มใบลา --}}
                {{-- col-12 d-flex justify-content-end d-flex mb-4 --}}
                <div class="col-md-12 d-flex justify-content-end mb-3">
                    <a href="{{ route('create') }}">
                        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> เพิ่มใบลา</button>
                    </a>
                </div>
                {{-- end ปุ่มเพิ่มใบลา --}}

                {{-- ตารางรายการคำขอใบลา --}}
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
                            @php
                                $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
                                $usersMap = [];
                                foreach ($users as $user) {
                                    $usersMap[$user->id] = $user->name;
                                }
                            @endphp

                            {{-- data rnage filter --}}
                            <form action="{{route('filter.req')}}" method="get">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">ลาตั้งแต่</label>
                                            <div class="input-group">
                                                <input type="datetime-local" class="form-control"
                                                       placeholder="{{ $start}}"
                                                       name="start">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <div class="form-group">
                                            -
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">ถึง</label>
                                            <div class="input-group">
                                                <input type="datetime-local" class="form-control"
                                                       placeholder="{{$end}}" name="end">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <table id="req_list_table" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th style="{{ $style }} max-width: 40px;">วันที่ยื่นคำร้อง</th>
                                    <th style="{{ $style }} max-width: 40px;">ประเภทการลา</th>
                                    <th style="{{ $style }} max-width: 40px;">วันที่ลาตั้งแต่</th>
                                    <th style="{{ $style }} max-width: 40px;">ถึง</th>
                                    <th style="{{ $style }} max-width: 40px;">ลาทั้งหมด</th>
                                    <th style="{{ $style }} max-width: 30px;">ผู้ปฏิบัติงานแทน</th>
                                    <th style="{{ $style }} max-width: 90px;">อนุมัติ(ผู้ปฏิบัติงานแทน)</th>
                                    <th style="{{ $style }} max-width: 90px;">อนุมัติ(PM)</th>
                                    <th style="{{ $style }} max-width: 90px;">อนุมัติ(HR)</th>
                                    <th style="{{ $style }} max-width: 90px;">อนุมัติ(CEO)</th>
                                    <th style="{{ $style }} max-width: 50px;">สถานะ</th>
                                    <th style="{{ $style }} max-width: 50px;">รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($leaves as $row)
                                    <tr>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                        <td style="{{ $style }} max-width:40px;">{{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                        @if (!$row->sel_rep)
                                            <td style="{{ $style }} max-width: 40px;">ไม่มีผู้ปฏิบัติแทน</td>
                                        @else
                                            <td style="{{ $style }} max-width: 40px;">{{ $usersMap[$row->sel_rep] }}</td>
                                        @endif
                                        {{-- <td>{{$row->sel_rep}}</td> --}}
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->approve_rep }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->approve_pm }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->approve_hr }}</td>
                                        <td style="{{ $style }} max-width: 40px;">{{ $row->approve_ceo }}</td>
                                        <td style="{{ $style }} max-width: 40px;"
                                            class="{{ $row->status == 'อนุมัติ' ? 'text-success table-success' : ($row->status == 'กำลังดำเนินการ' ? 'text-secondary' : 'text-danger table-danger') }}">
                                            {{ $row->status }}</td>
                                        <td style="{{ $style }} max-width: 20px;">
                                            <a href="{{ route('req.detail', $row->id) }}">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
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
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- end ตารางรายการคำขอใบลา --}}
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{--  end mian content  --}}
@endsection
