@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Export Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Export Data</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                <label>Unduh data Ruangan</label>
                <form method="GET" action="{{ route('admin.export.ruangan') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Export Data Ruangan</button>
                </form>
          </div>
          <div class="card-body">
                <label>Unduh data barang Elektronik</label>
                <form method="GET" action="{{ route('admin.export.elektronik') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Export Data Elektronik</button>
                </form>
          </div>
          <div class="card-body">
                <label>Unduh data barang Mebeulair</label>
                <form method="GET" action="{{ route('admin.export.mebeulair') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-warning">Export Data Mebeulair</button>
                </form>
          </div>
          <div class="card-body">
                <label>Unduh data barang Praktikum</label>
                <form method="GET" action="{{ route('admin.export.praktik') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">Export Data Praktikum</button>
                </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
