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
                <!-- <h3 class="card-title">Elektronik</h3> -->
                
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table id="myTable" class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Bahan</th>
                        <th>Kondisi</th>
                        <th>Tahun</th>
                        <th>Sumber Dana</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($brokenPraktik as $barang)
                      <tr>
                        <td>{{ $barang->nama_d }}</td>
                        <td>{{ $barang->merk_d }}</td>
                        <td>{{ $barang->bahan_d }}</td>
                        <td>{{ $barang->kondisi}}</td>
                        <td>{{ $barang->tahun_d }}</td>
                        <td>{{ $barang->sumber_d }}</td>
                        <td>{{ $barang->ket_d }}</td>
                      </tr>
                    @endforeach
s                    </tbody>
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