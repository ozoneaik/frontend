@extends('layouts.layout')

@section('title')
    {{ 'รายการคำขอใบลา/รายละเอียด' }}
@endsection

@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">โอนสิทธิ์อนุมัติใบลาพนักงาน /</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    {{-- Mian Content --}}
    <section class="content">
        {{-- Container Fluid --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">โอนสิทธิ์อนุมัติใบลาพนักงาน</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="select_hr">เลือก HR ที่ต้องการโอนสิทธิ์ให้</label>
                                <select class="form-control select2" name="select_hr">
                                    @for($i=0;$i<3;$i++)
                                        <option value="">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end container fluid --}}
    </section>
    {{-- end mian content --}}
@endsection
