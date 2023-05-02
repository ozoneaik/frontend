@extends("layouts.layout")

@section('content')
{{-- Part --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb text-start">
                    <li class="breadcrumb-item"><a href="#">ข้อมูลส่วนตัว</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div>
</div>
{{-- end part --}}
<section class="content">
    <div class="container-fluid">
        <table class="table">
            <tr>
                <th>user id</th>
                <th>name</th>
                <th>lastname</th>
                <th>nick name</th>
                <th>email</th>
                <th>type</th>
                <th>possition</th>
                <th>birthday</th>
                <th>address</th>
                <th>phone1</th>
                <th>phone2</th>
                <th>signature</th>
            </tr>
            @foreach ($users as $row)
            @if ($row->id == Auth::user()->id)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->last_name}}</td>
                    <td>{{$row->nick_name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->possition}}</td>
                    <td>{{$row->birthday}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->phone_no_1}}</td>
                    <td>{{$row->phone_no_2}}</td>
                    <td>
                        {{$row->signature}}
                        <img src="{{asset($row->signature)}}" alt="no picture" width="200px" height="200px">
                    </td>
                </tr>
            @endif
            @endforeach
        </table>
    </div>
</section>

@endsection