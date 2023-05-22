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
    {{--    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">

    {{-- Sidebar Scrollbars --}}
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    {{-- Data tables --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    {{-- Tempusdominus Bootstrap 4 --}}
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    {{-- iCheck for checkboxes and radio inputs --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}


    {{-- Date Picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        * {
            font-family: 'Sarabun', sans-serif;
        }

        .inner h3 {
            white-space: pre-wrap;
        }

        @media (max-width: 1100px) {
            .text-hide-md {
                display: none;
            }
        }
    </style>
</head>
{{-- sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed --}}

<body class="hold-transition layout-fixed layout-navbar-fixed">

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
                <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
                </li>
                </ul>
                
            {{-- Left Navbar Links --}}

            {{-- Right Navbar Links --}}
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('profile') }}">
                            <img src="https://www.w3schools.com/bootstrap4/newyork.jpg" class="rounded-circle"
                                alt="Cinque Terre" width="40px" height="40px">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link text-hide-md">[ID : {{ Auth::user()->id }}]
                            {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item ml-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn bg-danger">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </li>
                </ul>

            </ul>
            {{-- end Right navbar links --}}
        </nav>
        {{-- end navbar --}}

        {{-- Main Sidebar Container --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link text-center">
                <span class="brand-text font-weight-bold mx-auto">
                    <img src="{{ asset('img/logosidebar1.png') }}" height="54px" width="184px" alt="no picture">
                </span>
            </a>
            <!-- end Brand Logo -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <br>
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- เมนูหลัก --}}
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>เมนูหลัก</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('req', 'req.detail', 'rep', 'rep.detail', 'create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    รายการคำขอ
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('req') }}"
                                        class="nav-link {{ Request::routeIs('req', 'req.detail', 'create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำขอใบลา</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('rep') }}"
                                        class="nav-link {{ Request::routeIs('rep', 'rep.detail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการคำปฏิบัติแทน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Project manager --}}
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('pm.req.emp', 'pm.req.emp.detail') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Project manager
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">1</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ route('pm.req.emp') }}"
                                        class="nav-link {{ Request::routeIs('pm.req.emp', 'pm.req.emp.detail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- HR --}}
                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('hr.req.emp', 'hr.req.emp.detail') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    HR
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('hr.req.emp') }}"
                                        class="nav-link {{ Request::routeIs('hr.req.emp', 'hr.req.emp.detail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ขอใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- CEO --}}

                        <li class="nav-item menu-open">
                            <a href="#"
                                class="nav-link {{ Request::routeIs('ceo.req.emp', 'ceo.req.emp.detail') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>
                                    CEO
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('ceo.req.emp') }}"
                                        class="nav-link {{ Request::routeIs('ceo.req.emp', 'ceo.req.emp.detail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ขอใบลาพนักงาน</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="{{ route('data.users') }}"
                                class="nav-link {{ Request::routeIs('data.users', 'data.user.detail') ? 'active' : '' }}">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>ข้อมูลพนักงาน</p>
                            </a>
                        </li>
                        </li>
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
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    {{-- Bootstrap 4 --}}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- overlayScrollbars --}}
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    {{-- Font Awesome script cdn --}}
    <script src="{{ asset('icon/js/all.min.js') }}"></script>


    {{-- DataTables & Plugins --}}
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>



    <script>
        $(document).ready(function() {
            function initDataTable(tableId) {
                var table = $("#" + tableId).DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "order": [
                        [0, "desc"]
                    ],

                    initComplete: function() {

                        this.api().columns().every(function(index) {
                            if (index !== 11) {
                                var column = this;
                                var select = $(
                                        '<select class="custom-select"><option value=""></option></select>'
                                    )
                                    .appendTo($(column.footer()).empty()).on('change',
                                        function() {
                                            var val = $.fn.dataTable.util.escapeRegex($(this)
                                                .val());
                                            column.search(val ? '^' + val + '$' : '', true,
                                                false).draw();
                                        });

                                column.data().unique().sort().each(function(d, j) {
                                    var option = $(
                                        '<option class="my-option-class" value="' +
                                        d + '">' + d + '</option>');

                                    select.append(option);
                                });
                            }
                        });
                    }
                });
            }

            $(function() {
                initDataTable("req_list_table");
                initDataTable("rep_list_table");
                initDataTable("data_emp_table");
            });
        });
    </script>
    <script>
        $("#data-table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "order": [
                [0, "desc"]
            ],
        });
    </script>
    <script>
        $("#data-table1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "order": [
                [0, "desc"]
            ],
        });
    </script>


    {{-- end DataTables & Plugins --}}

    {{-- Datatime Picker --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
    <script>
        flatpickr("input[type=datetime-local]", {
            "locale": "th",
            allowInput: true,
            altInput: false,
            enableTime: true,
            dateFormat: "d/m/Y H:i",
            minDate: "today",
            minDate: new Date(),
            defaultDate: "now",
            time_24hr: true,
            disableMobile: "true",


        });
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

    {{-- Form Select 2 --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
    {{-- end form select 2 --}}

    {{-- modal ปฏิบัติงานแทน --}}
    <script>
        $(document).ready(function() {
            $('button[name=approve_rep]').click(function() {
                var value = $(this).val();
                var confirmModal = $('#confirmModal_rep');
                console.log(value);
                confirmModal.find('input[name=approve_rep]').val(value);
                if (value === '❌') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิเสธงานแทน[❌]หรือไม่?');
                } else if (value === '✔️') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิบัติงานแทน[✔️]หรือไม่?');
                }
                confirmModal.modal('show');

            });
            console.log($("form").serialize());
            $('#confirmModal form').submit(function(e) {
                console.log("Form submitted");
                $('#confirmModal').modal('hide');
            });
        });
    </script>

    {{-- modal PM --}}
    <script>
        $(document).ready(function() {
            $('button[name=approve_pm]').click(function() {
                var value = $(this).val();
                var confirmModal = $('#confirmModal_pm');
                console.log(value);
                confirmModal.find('input[name=approve_pm]').val(value);
                if (value === '❌') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะไม่อนุมัติ[❌]หรือไม่?');
                    confirmModal.find('.allowed').hide();
                    confirmModal.find('.modal-body #not_allowed').show();
                    confirmModal.find('.reason_pm').hide();

                } else if (value === '✔️') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะอนุมัติ[✔️]หรือไม่?');
                    confirmModal.find('.modal-body .form-group').show();
                    confirmModal.find('#not_allowed').hide();
                }
                confirmModal.modal('show');

            });
            console.log($("form").serialize());
            $('#confirmModal form').submit(function(e) {
                console.log("Form submitted");
                $('#confirmModal_pm').modal('hide');
            });
        });
    </script>

    {{-- modal HR --}}
    <script>
        $(document).ready(function() {
            $('button[name=approve_hr]').click(function() {
                var value = $(this).val();
                var confirmModal = $('#confirmModal_hr');
                console.log(value);
                confirmModal.find('input[name=approve_hr]').val(value);
                if (value === '❌') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิเสธงานแทน[❌]หรือไม่?');
                    confirmModal.find('.reason_hr').hide();
                    confirmModal.find('#not_allowed_hr').show();
                } else if (value === '✔️') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิบัติงานแทน[✔️]หรือไม่?');
                    confirmModal.find('.modal-body .form-group').show();
                    confirmModal.find('#not_allowed_hr').hide();
                }
                confirmModal.modal('show');

            });
            console.log($("form").serialize());
            $('#confirmModal form').submit(function(e) {
                console.log("Form submitted");
                $('#confirmModal').modal('hide');
            });
        });
    </script>

    {{-- modal CEO --}}
    <script>
        $(document).ready(function() {
            $('button[name=approve_ceo]').click(function() {
                var value = $(this).val();
                var confirmModal = $('#confirmModal_ceo');
                console.log(value);
                confirmModal.find('input[name=approve_ceo]').val(value);
                if (value === '❌') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิเสธงานแทน[❌]หรือไม่?');
                    confirmModal.find('.reason_ceo').hide();
                    confirmModal.find('#not_allowed_ceo').show();
                } else if (value === '✔️') {
                    confirmModal.find('.modal-body .content').text('ยืนยันที่จะปฏิบัติงานแทน[✔️]หรือไม่?');
                    confirmModal.find('.modal-body .form-group').show();
                    confirmModal.find('#not_allowed_ceo').hide();
                }
                confirmModal.modal('show');

            });
            console.log($("form").serialize());
            $('#confirmModal form').submit(function(e) {
                console.log("Form submitted");
                $('#confirmModal').modal('hide');
            });
        });
    </script>

    {{-- Theme App --}}
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>

</html>
