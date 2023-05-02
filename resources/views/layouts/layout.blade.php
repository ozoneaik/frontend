<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Google Font: TH sarabun --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Sidebar Scrollbars --}}
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    {{-- Data tables --}}
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    {{-- Tempusdominus Bootstrap 4 --}}
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    {{-- iCheck for checkboxes and radio inputs --}}
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    {{-- Theme style --}}
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <style>
        * {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>
{{-- sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed --}}

<body class="hold-transition sidebar-mini layout-fixed ">

    {{-- Main Wrapper --}}
    <div class="wrapper">

        {{-- Nav bar --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            {{-- Left Navbar Links --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link font-weight-bold" style="color: black">ระบบการลาบริษัท บิ๊ก ดาต้า
                        เอเจนซี่
                        จำกัด (สาขาเชียงใหม่)</a>
                </li>
            </ul>
            {{-- Left Navbar Links --}}

            {{-- Right Navbar Links --}}
            <ul class="navbar-nav ml-auto">
                <div class="dropdown dropdown-menu-right">
                    <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        [ID : {{Auth::user()->id}}] {{Auth::user()->name}} ตำแหน่ง {{Auth::user()->type}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile') }}">โปรฟายส่วนตัว</a>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </ul>
            {{-- end Right navbar links --}}
        </nav>
        {{-- end navbar --}}

        {{-- Main Sidebar Container --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-bold mx-auto">
                    <img src="{{ asset('img/logosidebar.png') }}" height="54px" width="184px" alt="no picture">
                </span>
            </a>
            <!-- end Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- เมนูหลัก --}}
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{Request::routeIs('index') || Request::routeIs('home') ? 'active' : ''}}">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>เมนูหลัก</p>
                            </a>
                        </li>
                        {{-- รายการคำขอ --}}
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link
                        {{ Request::routeIs('req_list') || Request::routeIs('req_list_detail') || Request::routeIs('form') || Request::routeIs('rep_list') || Request::routeIs('rep_list_detail') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    รายการคำขอ
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{Request::routeIs('req_list') || Request::routeIs('req_list_detail') || Request::routeIs('form') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำขอใบลา</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{ Request::routeIs('rep_list') || Request::routeIs('rep_list_detail') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำปฏิบัติแทน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Project manager --}}
                        @if (Auth::user()->type == "pm")    
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('pm.req_list_emp') || Request::routeIs('pm.req_list_emp_detail') ? 'active':'' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Project manager
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">1</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{ Request::routeIs('pm.req_list_emp') || Request::routeIs('pm.req_list_emp_detail') ? 'active':'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำขอใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        {{-- HR --}}
                        @if (Auth::user()->type == "hr")
                            
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link
                        {{Request::routeIs('hr.req_list_emp') || Request::routeIs('hr.req_list_emp_detail') || Request::routeIs('hr.data_emp') || Request::routeIs('hr.data_emp_detail') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    HR
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{Request::routeIs('hr.req_list_emp') || Request::routeIs('hr.req_list_emp_detail') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำขอใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{Request::routeIs('hr.data_emp') || Request::routeIs('hr.data_emp_detail') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ข้อมูลพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        {{-- CEO --}}
                        @if (Auth::user()->type == "ceo")    
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{Request::routeIs('ceo.req_list_emp') || Request::routeIs('ceo.req_list_emp_detail') || Request::routeIs('ceo.data_emp') || Request::routeIs('ceo.data_emp_detail') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>
                                    CEO
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{ Request::routeIs('ceo.req_list_emp') || Request::routeIs('ceo.req_list_emp_detail') ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำขอใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link {{ Request::routeIs('ceo.data_emp') || Request::routeIs('ceo.data_emp_detail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ข้อมูลพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- end sidebar-menu -->
            </div>
            <!-- end sidebar -->
        </aside>
        {{-- end main sidebar container --}}

        {{-- Content Wrapper --}}
        <section class="content-wrapper">
            @yield('content')
        </section>
        {{-- end content-wrapper --}}

    </div>
    {{-- end Main Wrapper --}}

    {{-- jQuery --}}
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    {{-- Bootstrap 4 --}}
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- overlayScrollbars --}}
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    {{-- Font Awesome script cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- DataTables & Plugins --}}
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
        $("#req_list_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function () {
        $("#rep_list_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function () {
        $("#data_emp_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    {{-- end DataTables & Plugins --}}

    {{-- Form Select 2 --}}
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
    {{-- end form select 2 --}}

    {{-- Datatime Picker --}}
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('#datetime-picker-start').datetimepicker({icons: {time: 'far fa-clock'}, format: 'DD/MM/YYYY HH:mm'});
    $('#datetime-picker-end').datetimepicker({icons: {time: 'far fa-clock'}, format: 'DD/MM/YYYY HH:mm'});
    </script>
    <script>
        function calculate() {
        var startDate = moment(document.getElementById("start-date").value, 'DD/MM/YYYY HH:mm');
        var endDate = moment(document.getElementById("end-date").value, 'DD/MM/YYYY HH:mm');
        var delta = endDate.diff(startDate);
        var days = Math.floor(delta / (1000 * 60 * 60 * 24));
        var hours = Math.floor((delta % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((delta % (1000 * 60 * 60)) / (1000 * 60));
        console.log("value is " + days + hours + minutes);
        if (isNaN(days) || isNaN(hours) || isNaN(minutes)) {
            console.log("เกิดข้อผิดพลาดในการคำนซณเนื่องจากไม่ได้เลือกเวลา ดั้งนั้นเลยเซตค่าเท่ากับ 0");
            days = 0;
            hours = 0;
            minutes = 0;
        }
        var result = days + " วัน " +
            hours + " ชั่วโมง " +
            minutes + " นาที";
        document.getElementById("result").innerHTML = result;
    }
    </script>
    {{-- end datatime picker --}}

    {{-- Upload Files --}}
    <script>
        var fileInputs = document.querySelectorAll('input[type="file"]');
    var labels = document.querySelectorAll('.custom-file-label');
    fileInputs.forEach(function (fileInput, index) {
        fileInput.addEventListener('change', function () {
            var fileName = this.files[0].name;
            labels[index].innerText = fileName;
        });
    });
    </script>
    {{--end upload fliles--}}

    {{-- Theme App --}}
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
</body>

</html>