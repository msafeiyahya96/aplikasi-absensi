<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Aplikasi Absensi</title>
    @include('template.head')
    <script src="{{ asset('js/clock.js') }}"></script>
    <style>
        #wacth {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            --webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                4px 4px 20px rgba(210, 45, 26, 0.4),
                4px 4px 30px rgba(210, 25, 16, 0.4),
                4px 4px 40px rgba(210, 15, 6, 0.4),
        }
    </style>
</head>

<body class="hold-transition sidebar-mini" onload="realTimeClock()">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.leftSideBar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Absensi Masuk Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Absensi Masuk</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="row justify-content-center">
                    <div class="card card-info card-outline">
                        <div class="card-header">Absensi Masuk</div>
                        <div class="card-body">
                            <form action="{{ route('simpanAbsensi') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <center>
                                        <label id="clock" style="font-size: 100px;
                                            color: #0A77DE;
                                            --webkit-text-stroke: 3px #00ACFE;
                                            text-shadow: 4px 4px 10px #36D6FE,
                                                4px 4px 20px #36D6FE,
                                                4px 4px 30px #36D6FE,
                                                4px 4px 40px #36D6FE;">
                                        </label>
                                    </center>
                                </div>
                                <center>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Klik untuk Absensi Masuk</button>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('template.script')
</body>

</html>