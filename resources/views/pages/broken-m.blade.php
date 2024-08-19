@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Rusak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card card">
              <div class="card-header">
                <!-- <h3 class="card-title"><b>Mebeulair</b></h3> -->

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table id="myTable2" class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                          <th>Nama Barang</th>
                          <th>Kode Barang</th>
                          <th>Bahan</th>
                          <th>Tahun</th>
                          <th>Kondisi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($brokenMebeulair as $barang)
                      <tr>
                          <td>{{ $barang->nama_c }}</td>
                          <td>{{ $barang->kode_c }}</td>
                          <td>{{ $barang->bahan_c}}</td>
                          <td>{{ $barang->tahun_c}}</td>
                          <td>{{ $barang->kondisi_c}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                </div>
              <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
<div>
@endsection