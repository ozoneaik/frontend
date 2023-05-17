@extends('layouts.layout')

@section('title')
    {{'เพิ่มใบลา'}}
@endsection

@section('content')
    {{-- Part --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb text-start">
                        <li class="breadcrumb-item">รายการคำขอ</li>
                        <li class="breadcrumb-item active"><a href="{{route('req')}}">รายการคำขอใบลา</a></li>
                        <li class="breadcrumb-item active">เพิ่มใบลา</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- end part --}}

    {{-- Mian Content --}}
    <section class="content">
        {{-- Example data --}}
        <?php
        $leave = array('ลาป่วย', 'ลากิจ', 'ลาคลอด', 'ลาฉุกเฉิน');
        ?>
        {{-- end example data --}}

        {{-- Container Fluid--}}
        <div class="container-fluid">
            <form action="{{ route('leaveform.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">
                                    <i class="fas fa-file-medical mr-2"></i>
                                    เพิ่มใบลา
                                </h3>
                            </div>
                            <div class="card-body">
                                {{-- รายละเอียดใบลา --}}
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">
                                            <i class="fas fa-file-invoice mr-2"></i>
                                            รายละเอียดใบลา
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง</label>
                                                    <input class="form-control"
                                                           value="{{Auth::user()->id}} {{Auth::user()->name}} {{Auth::user()->possition}}"
                                                           disabled>
                                                </div>
                                            </div>
                                            {{-- ประเภทการลา --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">ประเภทการลา</label>
                                                    <select name="leave_type" id="" class="form-control select2"
                                                            style="width:100%;">
                                                        @foreach($leave as $row)
                                                            <option value="{{ $row }}">{{$row}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- ลาตังแต่ --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>ลาตั้งแต่ :</label>
                                                    <div class="input-group">
                                                        <input type="datetime-local"
                                                               class="form-control @error('leave_start') is-invalid @enderror"
                                                               name="leave_start" id="start-date" onchange="calculate()"
                                                               value="{{ old('leave_start')}}"
                                                               placeholder="เลือกวันที่ลาตั้งแต่..."/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('leave_start'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('leave_start') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- ถึง --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>ถึง :</label>
                                                    <div class="input-group">
                                                        <input type="datetime-local"
                                                               class="form-control @error('leave_end') is-invalid @enderror"
                                                               name="leave_end" id="end-date" onchange="calculate()"
                                                               value="{{ old('leave_end') }}"
                                                               placeholder="เลือกวันที่ลาถึง..."/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('leave_end'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('leave_end') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- ลาทั้งหมด --}}
                                            <div class="col-md-12">
                                                <label>ลาทั้งหมด</label>
                                                <p id="result" class="form-control"></p>
                                            </div>
                                            {{-- เหตุผลการลา --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>
                                                        เหตุผลการลา
                                                        <span id="reason-count"
                                                              class="text-secondary text-secondary font-weight-normal">
                                                            0/255
                                                        </span>
                                                    </label>

                                                    <textarea id="reason" class="form-control @error('reason') is-invalid @enderror" rows="5" name="reason"
                                                              placeholder="กรอกเหตุผลการลาที่นี่...">{{ old('reason') }}</textarea>

                                                    @if ($errors->has('reason'))
                                                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            {{-- เอกสารประกอบการลา --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">เอกสารประกอบการลา</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file1"
                                                                   name="file1" value="{{ old('file1', '') }}">
                                                            <label class="custom-file-label"
                                                                   for="file1">อัปโหลด</label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('file1'))
                                                        <span class="text-danger">{{ $errors->first('file1') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- เอกสารประกอบการลาเพิ่มเติม (ถ้ามี) --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">เอกสารประกอบการลาเพิ่มเติม (ถ้ามี)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file2"
                                                                   name="file2" value="{{ old('file2', '') }}">
                                                            <label class="custom-file-label" for="file2">อัปโหลด</label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('file2'))
                                                        <span class="text-danger">{{ $errors->first('file2') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(Auth::user()->type != 'pm')
                                    {{-- ระหว่างการลามอบหมายให้ --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">
                                                <i class="fa-solid fa-user mr-2"></i>
                                                ระหว่างการลามอบหมายให้
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง</label>
                                                        <select name="sel_rep" id="" class="form-control select2"
                                                                style="width:100%;">
                                                            @if(Auth::user()->type != 'hr' && Auth::user()->type != 'hr(admin)')
                                                                <option value="">ไม่มีผู้ปฏิบัติงานแทน</option>
                                                            @endif
                                                                @foreach($users as $user_rep)
                                                                    @php
                                                                        $isDisabled = ($user_rep->id == Auth::user()->id) ? 'disabled="disabled"' : '';
                                                                    @endphp

                                                                    @if(Auth::user()->type == 'emp' && $user_rep->type == '0' ||
                                                                        (in_array(Auth::user()->type, ['hr', 'hr(admin)']) && in_array($user_rep->type, ['4', '2'])))
                                                                        <option value="{{$user_rep->id}}" {{ old('sel_rep') == $user_rep->id ? 'selected' : '' }} {{$isDisabled}}>
                                                                            {{$user_rep->id}} {{$user_rep->name}} {{$user_rep->possition}}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">กรณีไม่มีผู้ปฏิบัติงานแทนสามารถ(ติดต่อ)</label>
                                                        <input
                                                            class="form-control @error('case_no_rep') is-invalid @enderror"
                                                            type="text" name="case_no_rep"
                                                            value="{{ old('case_no_rep', Auth::user()->phone_no_1) }}">
                                                        @if ($errors->has('case_no_rep'))
                                                            <span class="text-danger">
                                                            {{ $errors->first('case_no_rep') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::user()->type != 'hr' && Auth::user()->type != 'hr(admin)')
                                        {{-- เลือก Project manager --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title font-weight-bold">
                                                    <i class="fa-solid fa-user-gear mr-2"></i>
                                                    เลือก Project manager
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">รหัสพนักงาน ชื่อ-นามสกุล ตำแหน่ง</label>
                                                            <select name="sel_pm" id="" class="form-control select2"
                                                                    style="width:100%;">
                                                                @foreach($users as $user_pm)
                                                                    @if ($user_pm->type == '1')
                                                                        <option
                                                                            value="{{$user_pm->id}}">{{$user_pm->id}} {{$user_pm->name}} {{$user_pm->nick_name}}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                {{-- ปุ่มบันทึกการลา --}}
                                <div class="col-md-12 justify-content-end d-flex ">
                                    <a href="{{route('home')}}" class="btn btn-danger">ยกเลิก</a>
                                    <button class="btn btn-primary ml-2" type="button" data-toggle="modal"
                                            data-target="#modal-default">บันทึก
                                    </button>
                                    {{-- Modal --}}
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">บันทึกข้อมูล</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>ต้องการบันทึกข้อมูลข้อมูลหรือไม่??</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">ยกเลิก
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    {{-- end modal --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- end container fluid--}}
    </section>
    {{-- end mian content --}}

    {{-- นับตัวอักษร Reason --}}
    <script>
        var reason = document.getElementById('reason');
        var reasonCount = document.getElementById('reason-count');

        reason.addEventListener('input', function () {
            var count = reason.value.length;
            reasonCount.innerHTML = count + '/255';
            if (count >= 255) {
                reasonCount.classList.add('text-danger');
                reasonCount.innerHTML = 'คุณพิมพ์เกิน 255';
            } else {
                reasonCount.classList.remove('text-danger');
            }
        });
    </script>
    {{-- Upload Files --}}
    <script>
        document.querySelectorAll('input[type="file"]').forEach((fileInput, index) => {
            fileInput.addEventListener('change', () => {
                document.querySelectorAll('.custom-file-label')[index].innerText = fileInput.files[0]?.name || '';
            });
        });
    </script>

    {{--end upload fliles--}}
@endsection
