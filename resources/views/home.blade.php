@extends('layouts.layout'){{-- <link rel="stylesheet" href="{{ asset('style/css.css') }}"> --}}
@section('title')
    {{ 'ระบบการลา' }}
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            {{-- ลา 4 อันแรก --}}
            <div class="row mb-3">
                <link rel="stylesheet" href="{{ asset('style/css.css') }}">

                @php
                    $colors = ['#E8533D', '#5182FF', '#FEAD10', '#6d99c5'];
                    $colors1 = ['#F37762', '#759CFF', '#FFCA62', '#92b3d4'];
                    $icon = ['fa-solid fa-stethoscope', 'fa-solid fa-business-time', 'fa-solid fa-umbrella-beach', 'fa-solid fa-book'];
                    $count = 0;
                    $chartdata = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                    $maxchartdata = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                @endphp

                @foreach ($users_data as $row)
                    @if ($row->user_id == Auth::user()->id)
                        @if ($count == 0 || $count == 1 || $count == 2 || $count == 3)
                            <div class="col-lg-3 mb-2">
                                <div class="card-box" style="background-color: {{ $colors[$count % count($colors)] }};">
                                    <div class="content1">
                                        <div class="icon-card" style="background-color:{{ $colors1[$count % count($colors1)] }}">
                                            <i class="{{ $icon[$count % count($icon)] }}" style="width: 50px; height:50px; color:white"></i>
                                        </div>
                                        @php
                                            $parts = explode(' ', $row->time_already_used);
                                            $D = (int) $parts[0];
                                            $H = (int) $parts[2];
                                            $parts = explode(' ', $row->time_remain);
                                            $D1 = (int) $parts[0];
                                            $H1 = (int) $parts[2];
                                            $D2 = $D1 + $D;
                                            if ($H1 != 0 || $H != 0) {
                                                $D2 += 1;
                                            }
                                        @endphp
                                        <div class="day">
                                            <span class="Hday">{{ $D }}</span><span class="Sday">/{{ $D2 }}</span>
                                            <span class="SSday">วัน</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="content1">
                                        <div class="title">
                                            <p class="mb-0">{{ $row->leave_type_name }}</p>
                                        </div>
                                        <div class="detail">
                                            <button class="btn btn-link pr-0" href="" data-toggle="modal" data-target="#card{{ $count }}">
                                                <i class="fas fa-file-lines fa-xl" style="color:white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal ลาป่วย --}}
                                <div class="modal fade" id="card{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ $row->leave_type_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ลาไปแล้ว {{ $row->time_already_used }}
                                                <br>
                                                คงเหลือ {{ $row->time_remain }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $chartdata[$count] = $D;
                                $maxchartdata[$count] = $D2;
                                $count++;
                            @endphp
                        @endif
                    @endif
                    {{-- @if ($count >= 4) --}}
                    {{-- @break --}}
                    {{-- @endif --}}
                @endforeach
            </div>

            {{-- ลาอื่นๆ --}}
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline-secondary btn-block mb-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        ประเภทการลาเพิ่มเติม
                    </a>
                </div>
                {{-- collaps ลาอิ่นๆ --}}
                <div class="col-lg-12">
                    <div class="collapse" id="collapseExample">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    @php
                                        $bg = ['', '', '', '#eef7ff', '#f1fbff;', '#ffe6f5', '#f9e3ff', '#e2f5de', '#fff7f0'];
                                        $icon_color = ['', '', '', '#6d99c5', '#00b7fe', '#ff009b', '#c600fe', '#1fb500', '#ff6a00'];
                                        $icon = ['', '', '', 'fa-solid fa-book', 'fa-solid fa-baby', 'fa-solid fa-heart', 'fa-solid fa-hospital-user', 'fa-solid fa-person-rifle', 'fa-solid fa-hands-praying'];
                                        $count = 0;
                                    @endphp
                                    @foreach ($users_data as $row)
                                        @if ($count >= 3 && $count < 9)
                                            {{-- ลาอื่นๆ --}}
                                            <div class="col-md-2">
                                                <div class="card-box-other d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#modal{{ $count }}">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="align-items-center d-flex justify-content-center" style="background-color: {{ $bg[$count] }}; height:70px;width:70px;border-radius:50px">
                                                            <i class="{{ $icon[$count] }} fa-2xl" style="color:{{ $icon_color[$count] }}"></i>
                                                        </div>
                                                        @php
                                                            $parts = explode(' ', $row->time_already_used);
                                                            $D = (int) $parts[0];
                                                            $H = (int) $parts[2];
                                                            $parts = explode(' ', $row->time_remain);
                                                            $D1 = (int) $parts[0];
                                                            $H1 = (int) $parts[2];
                                                            $D2 = $D1 + $D;
                                                            if ($H1 != 0 || $H != 0) {
                                                                $D2 += 1;
                                                            }
                                                        @endphp

                                                        <div class="ml-2 d-flex flex-column justify-content-center">
                                                            <p class="text-dark font-weight-bold mb-0" style="font-size: 18px;">{{ $row->leave_type_name }}</p>
                                                            <p class="text-dark mb-0" style="color:black">{{ $D }}
                                                                /{{ $D2 }}วัน</p>
                                                            @php
                                                                $chartdata[$count] = $D;
                                                                $maxchartdata[$count] = $D2;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal ลาอื่นๆ -->
                                            <div class="modal fade" id="modal{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $count }}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal{{ $count }}Label">
                                                                {{ $row->leave_type_name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ลาไปแล้ว {{ $row->time_already_used }}
                                                            <br>
                                                            คงเหลือ {{ $row->time_remain }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $count++;
                                            if ($count >= 9) {
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end d-flex pr-0">
                <a href="{{ route('create') }}" class="btn btn-primary ms-auto">+ เพิ่มใบลา</a>
            </div>
        </div>
    </section>
    @php
        $style = 'white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
        foreach ($users as $user) {
            $usersMap[$user->id] = $user->name;
        }
        $name = ['ลาป่วย', 'ลากิจ', 'ลาพักผ่อนประจำปี', 'ลาเพื่อฝึกอบรม', 'ลาคลอดบุตร', 'ลาเพื่อสมรส', 'ลาเพื่อทำหมัน', 'ลารับราชการทหาร', 'ลาอุปสมบท'];
    @endphp
    <section class="content">
        <div class="container-fluid">


            {{-- สรุปผลข้อมูลการลา ChartJS --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <i class="fas fa-chart-bar mr-2"></i>
                                สรุปผลข้อมูลจำนวนการลาในเดือนนั้นๆ
                            </h3>
                            <div class="card-body">
                                <canvas id="leave_chart_of_years" style="min-height: 250px; height: 250px; max-height: 400px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <div class="row">
            @for ($i = 0; $i < 9; $i++)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <i class="fas fa-chart-bar mr-2"></i>
                                สรุปผลข้อมูลการ{{ $name[$i] }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart{{ $i }}" style="min-height: 250px; height: 250px; max-height: 400px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            @endfor
        </div>


        {{-- ตารางรายการคำขอใบลา --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">
                            <i class="fas fa-list-alt mr-2"></i>
                            รายการคำขอใบลา
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- data-table --}}
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
                                    <td style="{{ $style }} max-width: 40px;">
                                        {{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                    <td style="{{ $style }} max-width:40px;">
                                        {{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">
                                        {{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                    @if (!$row->sel_rep || $row->approve_rep == '❌')
                                        <td style="{{ $style }} max-width: 40px;">
                                            ไม่มีผู้ปฏิบัติแทน
                                            @if ($row->approve_rep == '❌')
                                                ถูกปฏิเสธ
                                            @endif
                                        </td>
                                    @else
                                        <td style="{{ $style }} max-width: 40px;">
                                            {{ $row->representative->name }}</td>
                                    @endif
                                    <td style="{{ $style }} max-width: 40px;" class="">
                                        <button class="btn btn-sm rounded-pill text-dark" style="background-color: @if ($row->status == 'อนุมัติ') #c8ffd5;width: 80px @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
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
            {{-- end รายการคำขอใบลา --}}
        </div>
        {{-- end ตารางรายการคำขอใบลา --}}

        {{-- ตารางรายการคำขอปฏิบัติแทน --}}
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">
                            <i class="fas fa-list-alt mr-2"></i>
                            รายการคำขอปฏิบัติแทน
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
                        <table id="data-table1" class="table table-bordered table-hover text-center">
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
                            @foreach ($leaves_rep as $row)
                                <tr>
                                    <td style="{{ $style }} max-width: 40px;">
                                        {{ \Carbon\Carbon::parse($row->created_at)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">{{ $row->leave_type }}</td>
                                    <td style="{{ $style }} max-width:40px;">
                                        {{ \Carbon\Carbon::parse($row->leave_start)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">
                                        {{ \Carbon\Carbon::parse($row->leave_end)->addYears(543)->format('d/m/Y H:i') }}
                                    </td>
                                    <td style="{{ $style }} max-width: 40px;">{{ $row->leave_total }}</td>
                                    <td style="{{ $style }} max-width: 50px;">
                                        {{ $row->relation_user->name }}</td>
                                    <td style="{{ $style }} max-width: 40px;" class="">
                                        <button class="btn btn-sm rounded-pill text-dark" style="background-color: @if ($row->status == 'อนุมัติ') #c8ffd5 @elseif($row->status == 'กำลังดำเนินการ') #efefef @else #ff9292 @endif;">
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
        </div>
        {{-- end ตารางรายการคำขอปฏิบัติแทน --}}
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Define separate label arrays for each column
        const labels = ['ลาป่วย', 'ลากิจ', 'ลาพักผ่อนประจำปี', 'ลาเพื่อฝึกอบรม', 'ลาคลอดบุตร', 'ลาเพื่อสมรส', 'ลาเพื่อทำหมัน', 'ลารับราชการทหาร', 'ลาอุปสมบท'];
        const colors = ['#e8533d', '#5182ff', '#fead10', '#6d99c5', '#00b7fe', '#ff009b', '#c600fe', '#1fb500', '#ff6a00'];
        const max = [30 + 1, 5 + 1, 6 + 1, 7 + 1, 98 + 1, 7 + 1, 5 + 1, 60 + 1, 5 + 1];

        @for ($i = 0; $i < 9; $i++)
        const mychart{{ $i }} = document.getElementById('myChart{{ $i }}');
        new Chart(mychart{{ $i }}, {
            type: 'bar',
            data: {
                labels: [labels[{{ $i }}]], // Use the appropriate label array for each column
                datasets: [{
                    label: '# ลาไปแล้ว',
                    data: [
                        {{ $chartdata[$i] }},
                    ],
                    borderWidth: 1,
                    backgroundColor: [colors[{{ $i }}]] // Adjust the colors as needed
                },
                    {
                        label: 'ลาได้สูงสุด',
                        data: [{{ $maxchartdata[$i] }},],
                        borderWidth: 0,
                        backgroundColor: 'lightgray'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: max[{{ $i }}]
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        font: {
                            size: 20,
                        },
                    }
                }
            }
        });
        console.log(labels[{{ $i }}])
        @endfor
    </script>










    <script type="text/javascript">
        var xValues = @json($labels);
        var yValues = {{ $data }};
        var barColors = ["red", "green", "blue", "orange", "purple", "pink", "yellow", "cyan", "magenta", "teal", "lime"];

        new Chart("leave_chart_of_years", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'จำนวนการลาในเดือนนั้นๆ(/ครั้ง)',
                    backgroundColor: barColors,
                    data: yValues,
                    pointStyle: 'circle', // Add the pointStyle property here
                    pointRadius: 5, // Adjust the pointRadius as needed
                    pointBorderColor: 'rgba(0,0,0,0)', // Set the point border color to transparent
                    pointBackgroundColor: barColors, // Set the point background color to match the bar color
                    pointHitRadius: 10,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 6
                    }
                },
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                    },
                }
            },
        });
    </script>
@endsection
