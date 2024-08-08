@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang - {{ $ruangan->nama_a }}</h1>
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
      <div class="text-right">
        <a href="{{ route('admin.ruangan.printAll', ['ruangan_id' => $ruangan->id])}}" class="btn btn-outline-warning">
          <i class="fas fa-print"></i>
        </a>
      </div>
      <div class="col-sm-6">
        <h5>Elektronik</h5>
      </div>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card card">
              <div class="card-header">
              <br>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table id="myTable1" class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                      <th>Nama Barang</th>
                      <th>Kode Barang</th>
                      <th>Serial Number</th>
                      <th>Merk</th>
                      <th>Tahun</th>
                      <th>Spesifikasi</th>
                      <th>Kondisi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($barangElektronik as $barang)
                      <tr>
                          <td>{{ $barang->nama_b }}</td>
                          <td>{{ $barang->kode_b }}</td>
                          <td>{{ $barang->sn_b }}</td>
                          <td>{{ $barang->merk_b }}</td>
                          <td>{{ $barang->tahun_b }}</td>
                          <td>{{ $barang->spek_b }}</td>
                          <td>{{ $barang->kondisi_b }}</td>
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

    <section class="content">
      <div class="col-sm-6">
        <h5>Mebeulair</h5>
      </div>
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
                    @foreach ($barangMebeulair as $barang)
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

    <section class="content">
      <div class="col-sm-6">
        <h5>Praktik</h5>
      </div>
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
                    @foreach ($barangPraktik as $barang)
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