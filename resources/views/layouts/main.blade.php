<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AppSarPras - SMP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- CSS Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- Panggil jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Panggil toastr.js dan toastr.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/smpit.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li>
          <a href="#" onclick="confirmLogout()" class="btn btn-danger">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard')}}" class="brand-link">
      <!-- <img src="{{ asset('img/digit1.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <center><span class="brand-text font-weight-light"><b>App</b>SarPras - SMP</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/img/popcat.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block" ><b>{{ Auth::user()->name }} (Admin)</b></a></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Data Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-secondary">
              <li class="nav-item">
                <a href="{{ route('admin.ruangan.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.elektronik.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-bolt"></i>
                  <p>Elektronik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.mebeulair.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-couch"></i>
                  <p>Mebeulair</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.praktik.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-flask"></i>
                  <p>Praktikum</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Stok Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-secondary">
              <li class="nav-item">
                <a href="{{ route('admin.stock.groupE')}}" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Elektronik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.stock.groupM')}}" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Mebeulair</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.stock.groupP')}}" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Praktikum</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Kondisi Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-secondary">
              <li class="nav-item">
                <a href="{{ route('admin.stock.groupE')}}" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Kerusakan Sedang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.collect-broken')}}" class="nav-link">
                  <i class="nav-icon fas fa-cube"></i>
                  <p>Rusak</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Maintenance/Perawatan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-primary">
              <li class="nav-item">
                <a href="{{ route('admin.ruangan.index')}}" class="nav-link">
                  <i class="nav-icon fa-solid fa-screwdriver-wrench"></i>
                  <p>Perawatan AC</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a href="{{ route('admin.perbaikan')}}" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Maintenance
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.peminjaman')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Peminjaman Barang
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>
                Import & Export
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview bg-secondary">
              <li class="nav-item">
                <a href="{{ route('admin.import.form')}}" class="nav-link">
                  <i class="nav-icon fas fa-upload"></i>
                  <p>Import</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.export.form')}}" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Export</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.ruangan.select')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Penggunaan Barang
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.about')}}" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                About
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="">@dimasgtcndr</a></strong>
    <!-- All rights reserved. -->
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Konfirmasi Logout -->
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin Logout?',
            text: "Anda akan keluar dari sesi saat ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    }
</script>
<!-- ./Konfirmasi Logout -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes
<script src="{{ asset('lte/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('lte/dist/js/pages/dashboard.js')}}"></script> -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!--import JQuery -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Pagination JQuery -->
<script>
    $(document).ready(function() {
        $('#myTable, #myTable1, #myTable2, #myTable3').DataTable({
            "paging": true,
            "lengthMenu": [10, 25, 50, 75, 100], // Jumlah data per halaman
            "pageLength": 10 // Jumlah data awal per halaman
        });
    });
</script>

</body>
</html>
