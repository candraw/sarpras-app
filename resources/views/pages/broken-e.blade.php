@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Peralatan / Elektronik / Mesin Rusak</h1>
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

    <!-- Main content -->
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
                  <table id="myTable1" class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Merk</th>
                      <th>Tahun</th>
                      <th>Ruangan</th>
                      <th>Kondisi</th>
                      <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($brokenElektronik as $barang)
                      <tr>
                        <td>{{ $barang->kode_b }}</td>
                        <td>{{ $barang->nama_b }}</td>
                        <td>{{ $barang->merk_b }}</td>
                        <td>{{ $barang->tahun_b }}</td>
                        <td>{{ $barang->ruangan->nama_a ?? '-' }}</td>
                        <td>{{ $barang->kondisi_b }}</td>
                        <td>{{ $barang->ket_b }}</td>
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
    <!-- /.content -->
  </div>
<div>
@endsection