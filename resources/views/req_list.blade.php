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
                            <a href="{{ route('req') }}" class= "float-right text-info">↻ รีเฟรชข้อมูล</a>
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

                            {{-- data range filter --}}
                            <form action="{{route('filter.req')}}" method="get">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="datetime-local" class="form-control filter" placeholder="ลาตั้งแต่ {{Request::routeIs('filter.req') ? $start_format : ''}}" name="start" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="datetime-local" class="form-control filter" placeholder="ถึง {{Request::routeIs('filter.req') ? $end_format : ''}}" name="end" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <div class="form-group mr-2">
                                            <button type="submit" class="btn btn-success">ค้นหา</button>
                                        </div>
                                        @if(Request::RouteIs('filter.req'))

                                            <div class="form-group">
                                                <a href="{{route('req')}}">
                                                    <button type="button" class="btn btn-warning">ล้าง</button>
                                                </a>
                                            </div>
                                        @endif
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
                                    <th style="{{ $style }} max-width: 50px;">สถานะ</th>
                                    <th style="{{ $style }} max-width: 10px;">รายละเอียด</th>
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
                                        @if (!$row->sel_rep || $row->approve_rep == '❌')
                                            <td style="{{ $style }} max-width: 40px;">
                                                ไม่มีผู้ปฏิบัติแทน @if($row->approve_rep == '❌')
                                                    ถูกปฏิเสธ
                                                @endif</td>
                                        @else
                                            <td style="{{ $style }} max-width: 40px;">{{ $row->representative->name }}</td>
                                        @endif
                                        <td style="{{ $style }} max-width: 40px;" class="">
                                            <button class="btn btn-sm rounded-pill text-dark" style="background-color: @if($row->status == 'อนุมัติ') #c8ffd5 @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
                                                {{ $row->status }}
                                            </button>
                                        </td>
                                        <td style="{{ $style }} max-width: 20px;">
                                            <a href="{{ route('req.detail', $row->id) }}">
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
                {{-- end ตารางรายการคำขอใบลา --}}
            </div>
        </div>
        {{-- end container fluid --}}
    </section>

    {{-- Datatime Picker ใช้ flatpickr--}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
    <script>
        flatpickr(".filter", {
            "locale": "th",
            allowInput: true,
            altInput: false,
            enableTime: true,
            dateFormat: "d/m/Y H:i",
            // minDate: "today",
            minTime: '09:00',
            maxTime: '18:00',

        });
    </script>
    {{-- end datatime picker --}}

    {{--  end mian content  --}}
@endsection
