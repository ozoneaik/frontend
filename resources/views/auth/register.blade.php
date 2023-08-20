@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">สร้างบัญชีพนักงานใหม่</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">ชื่อ - นามสกุล</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>ชื่อผิด</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- nick_name --}}
                            <div class="row mb-3">
                                <label for="nick_name" class="col-md-4 col-form-label text-md-end">ชื่อเล่น</label>

                                <div class="col-md-6">
                                    <input id="nick_name" type="text"
                                           class="form-control @error('nick_name') is-invalid @enderror"
                                           name="nick_name"
                                           value="{{ old('nick_name') }}" required autocomplete="nick_name" autofocus>

                                    @error('nick_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>ชื่อเล่นผิด</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- possition --}}
                            <div class="row mb-3">
                                <label for="possition" class="col-md-4 col-form-label text-md-end">ตำแหน่ง</label>

                                <div class="col-md-6">
                                    <input id="possition" type="text"
                                           class="form-control @error('possition') is-invalid @enderror"
                                           name="possition"
                                           value="{{ old('possition') }}" required autocomplete="possition" autofocus>

                                    @error('possition')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>ตำแหน่ง</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- birthday --}}
                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">วันเดือนปีเกิด</label>
                                <div class="col-md-6">
                                    <input id="birthday" type="date"
                                           class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                           value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- address --}}
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">ที่อยู่</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- phone_no_1 --}}
                            <div class="row mb-3">
                                <label for="phone_no_1"
                                       class="col-md-4 col-form-label text-md-end">เบอร์โทรศัพท์</label>
                                <div class="col-md-6">
                                    <input id="phone_no_1" type="text"
                                           class="form-control @error('phone_no_1') is-invalid @enderror"
                                           name="phone_no_1"
                                           value="{{ old('phone_no_1') }}" required autocomplete="phone_no_1" autofocus>

                                    @error('phone_no_1')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- phone_no_2 --}}
                            <div class="row mb-3">
                                <label for="phone_no_2"
                                       class="col-md-4 col-form-label text-md-end">เบอร์โทรศัพท์(สำรอง)</label>
                                <div class="col-md-6">
                                    <input id="phone_no_2" type="text"
                                           class="form-control @error('phone_no_2') is-invalid @enderror"
                                           name="phone_no_2"
                                           value="{{ old('phone_no_2') }}" required autocomplete="phone_no_2" autofocus>

                                    @error('phone_no_2')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">อีเมล</label>

                                <div class="col-md-6">
                                    {{-- pattern=".+@bda.co.th" --}}
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required
                                           title="อีเมลต้องเป็น @bda.co.th เท่านั้น" pattern=".+@bda.co.th" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>อีเมลซ้ำ</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- password --}}
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">รหัสผ่าน</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- comfirm password --}}
                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">ยืนยันรหัสผ่าน</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- type --}}
                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">สิทธิ์</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control" name="type" required autocomplete="type">
                                        <option value="">-- Select Type --</option>
                                        <option value="0">พนักงานทั่วไป</option>
                                        <option value="1">Project Manager</option>
                                        <option value="2">HR (รับผิดชอบในส่วนของใบลา)</option>
                                        <option value="4">HR</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        สร้างบัญชี
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
