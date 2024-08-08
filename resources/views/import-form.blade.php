@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Data</h1>
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
            <h3 class="card-title">Import Data Menggunakan File .csv</h3>

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
              <label>Upload file .CSV data Ruangan</label>
              <form action="{{ route('admin.import.ruangan') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="csv_file">
                  <button type="submit" class="btn btn-outline-primary">Import Data Ruangan</button>
              </form>
          </div>
          <div class="card-body">
              <label>Upload file .CSV data barang Elektronik</label>
              <form action="{{ route('admin.import.elektronik') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="csv_file">
                  <button type="submit" class="btn btn-outline-primary">Import Data Elektronik</button>
              </form>
          </div>
          <div class="card-body">
              <label>Upload file .CSV data barang Mebeulair</label>
              <form action="{{ route('admin.import.mebeulair') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="csv_file">
                  <button type="submit" class="btn btn-outline-warning">Import Data Mebeulair</button>
              </form>
          </div>
          <div class="card-body">
              <label>Upload file .CSV data barang Praktikum</label>
              <form action="{{ route('admin.import.praktik') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="csv_file">
                  <button type="submit" class="btn btn-outline-success">Import Data Praktikum</button>
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