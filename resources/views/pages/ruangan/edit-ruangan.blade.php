@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Ruangan</h1>
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
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Ruangan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.ruangan.update', $ruangan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Ruangan</label>
                                <input type="text" id="nama_a" name="nama_a" class="form-control" value="{{ $ruangan->nama_a }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Ruangan</label>
                                <input type="text" id="kode_a" name="kode_a" class="form-control"  value="{{ $ruangan->kode_a }}">
                            </div>
                            <div class="form-group">
                                <label for="bahan">Luas</label>
                                <input type="text" id="luas_a" name="luas_a" class="form-control"  value="{{ $ruangan->luas_a }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select id="kondisi_a" name="kondisi_a" class="form-control">
                                    <option value="">Pilih Kondisi</option>
                                    <option value="baik">Baik</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="rusak">Rusak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" id="ket_a" name="ket_a" class="form-control" value="{{ $ruangan->ket_a }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    <a href="{{ route('admin.ruangan.index')}}" type="submit" class="btn btn-outline-danger">Batal</a>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>
@endsection