@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Mebeulair</h1>
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
              <div class="card-header mb-3">
                <!-- <h3 class="card-title">Mebeulair</h3> -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary mr-2 float-left" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>
                </button>

                <a href="{{ route('admin.mebeulair.print')}}" class="btn btn-outline-warning float-left"> 
                    <i class="fas fa-print"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Mebeulair</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.mebeulair.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama" style="color: black;">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_c" name="nama_c" placeholder="Masukkan Nama Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kode" style="color: black;">Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_c" name="kode_c" placeholder="Masukkan Kode Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="bahan" style="color: black;">Bahan</label>
                                            <input type="text" class="form-control" id="bahan_c" name="bahan_c" placeholder="Masukkan Material/Bahan" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kondisi" style="color: black;">Kondisi</label>
                                            <select class="form-control" id="kondisi_c" name="kondisi_c" placeholder="Masukkan Kondisi Barang" required>
                                                <option value="">Pilih Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Rusak">Rusak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tahun" style="color: black;">Tahun</label>
                                            <input type="text" class="form-control" id="tahun_c" name="tahun_c" placeholder="Masukkan Tahun Perolehan" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ruangan" style="color: black;">Ruangan</label>
                                            <select id="ruangan_c" name="ruangan_c" class="form-control">
                                                <option value="">Pilih Ruangan</option>
                                                @foreach($ruangans as $id => $namaRuangan)
                                                <option value="{{ $id }}">{{ $namaRuangan }}</option>
                                                @endforeach   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="toko" style="color: black;">Toko</label>
                                            <input type="text" class="form-control" id="toko_c" name="toko_c" placeholder="Toko Pembelian Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sumberdana_c" style="color: black;">Sumber Dana</label>
                                            <input type="text" class="form-control" id="sumberdana_c" name="sumberdana_c" placeholder="Masukkan Sumber Dana" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="keterangan" style="color: black;">Keterangan</label>
                                            <input type="text" class="form-control" id="ket_c" name="ket_c" placeholder="Berikan Keterangan" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 pt-3">
                <table id="myTable" class="table table-hover text-nowrap">
                  <thead style="background-color: #343a40; color:white;">
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Bahan</th>
                        <th>Kondisi</th>
                        <th>Tahun</th>
                        <th>Ruangan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($mebeulairs as $mebeulair)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mebeulair->kode_c }}</td>
                        <td>{{ $mebeulair->nama_c }}</td>
                        <td>{{ $mebeulair->bahan_c }}</td>
                        <td>{{ $mebeulair->kondisi_c}}</td>
                        <td>{{ $mebeulair->tahun_c }}</td>
                        <td>{{ $mebeulair->ruangan->nama_a ?? '-' }}</td> <!-- Mengambil nama ruangan dari relasi -->
                        <td>{{ $mebeulair->ket_c }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $mebeulair->id }}"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#detailModal{{ $mebeulair->id }}"><i class="fas fa-info-circle"></i></button>
                            <form action="{{ route('admin.mebeulair.destroy', $mebeulair->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

<script>
    @if (Session::has('pesan'))
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    @endif
</script>

@foreach($mebeulairs as $mebeulair)
<!-- Modal -->
<div class="modal fade" id="editModal{{ $mebeulair->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color: black;">Edit Barang Mebeulair</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data ruangan -->
                <form action="{{ route('admin.mebeulair.update', $mebeulair->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nama" style="color: black;">Nama Barang</label>
                          <input type="text" class="form-control" id="nama_c" name="nama_c" value="{{ $mebeulair->nama_c}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kode" style="color: black;">Kode Barang</label>
                          <input type="text" class="form-control" id="kode_c" name="kode_c" value="{{ $mebeulair->kode_c}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="bahan" style="color: black;">Bahan</label>
                          <input type="text" class="form-control" id="bahan_c" name="bahan_c" value="{{ $mebeulair->bahan_c}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kondisi" style="color: black;">Kondisi</label>
                          <select class="form-control" id="kondisi_c" name="kondisi_c" required>
                              <option value="">Pilih Kondisi</option>
                              <option value="Baik" {{ $mebeulair->kondisi_c == 'Baik' ? 'selected' : '' }}>Baik</option>
                              <option value="Sedang" {{ $mebeulair->kondisi_c == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Rusak" {{ $mebeulair->kondisi_c == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tahun" style="color: black;">Tahun</label>
                          <input type="text" class="form-control" id="tahun_c" name="tahun_c" value="{{ $mebeulair->tahun_c}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ruangan" style="color: black;">Ruangan</label>
                          <select id="ruangan_c" name="ruangan_c" class="form-control" required>
                              <option value="">Pilih Ruangan</option>
                              @foreach($ruangans as $id => $namaRuangan)
                              <option value="{{ $id }}" {{ $mebeulair->ruangan_id == $id ? 'selected' : '' }}>{{ $namaRuangan }}</option>
                              @endforeach   
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="toko_c" style="color: black;">Toko</label>
                          <input type="text" class="form-control" id="toko_c" name="toko_c" value="{{ $mebeulair->toko_c}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="sumberdana_c" style="color: black;">Sumber Dana</label>
                          <input type="text" class="form-control" id="sumberdana_c" name="sumberdana_c" value="{{ $mebeulair->sumberdana_c}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="keterangan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_c" name="ket_c" value="{{ $mebeulair->ket_c}}" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal{{ $mebeulair->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel" style="color: black;">Detail Barang Mebeulair</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data ruangan -->
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama" style="color: black;">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_c" name="nama_c" value="{{ $mebeulair->nama_c}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kode" style="color: black;">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_c" name="kode_c" value="{{ $mebeulair->kode_c}}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bahan" style="color: black;">Bahan</label>
                        <input type="text" class="form-control" id="bahan_c" name="bahan_c" value="{{ $mebeulair->bahan_c}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kondisi" style="color: black;">Kondisi</label>
                        <input type="text" class="form-control" id="kondisi_c" name="kondisi_c" value="{{ $mebeulair->kondisi_c}}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tahun" style="color: black;">Tahun</label>
                        <input type="text" class="form-control" id="tahun_c" name="tahun_c" value="{{ $mebeulair->tahun_c}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ruangan" style="color: black;">Ruangan</label>
                        <input type="text" id="ruangan_c" name="ruangan_c" class="form-control" value="{{ $mebeulair->ruangan->nama_a ?? '-'}}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="toko_c" style="color: black;">Toko</label>
                        <input type="text" class="form-control" id="toko_c" name="toko_c" value="{{ $mebeulair->toko_c}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sumberdana_c" style="color: black;">Sumber Dana</label>
                        <input type="text" class="form-control" id="sumberdana_c" name="sumberdana_c" value="{{ $mebeulair->sumberdana_c}}" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="keterangan" style="color: black;">Keterangan</label>
                        <input type="text" class="form-control" id="ket_c" name="ket_c" value="{{ $mebeulair->ket_c}}" readonly>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection