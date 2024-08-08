@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Elektronik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Elektronik</li>
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
                <!-- <h3 class="card-title">Elektronik</h3> -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary mr-2 float-left" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>
                </button>

                <a href="{{ route('admin.elektronik.print')}}" class="btn btn-outline-warning float-left"> 
                    <i class="fas fa-print"></i>
                </a>

                <!-- Modal Tambah Data-->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Elektronik</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.elektronik.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama" style="color: black;">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_b" name="nama_b" placeholder="Masukkan Nama Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kode" style="color: black;">Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_b" name="kode_b" placeholder="Masukkan Kode Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="sn" style="color: black;">Serial Number</label>
                                            <input type="text" class="form-control" id="sn_b" name="sn_b" placeholder="Masukkan Serial Number" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kondisi" style="color: black;">Kondisi</label>
                                            <select class="form-control" id="kondisi_b" name="kondisi_b" required>
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
                                            <input type="text" class="form-control" id="tahun_b" name="tahun_b" placeholder="Masukkan Tahun Perolehan" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="merk" style="color: black;">Merk</label>
                                            <input type="text" class="form-control" id="merk_b" name="merk_b" placeholder="Masukkan Merk Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="toko_b" style="color: black;">Toko</label>
                                            <input type="text" class="form-control" id="toko_b" name="toko_b" placeholder="Toko Pembelian Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sumberdana_b" style="color: black;">Sumber Dana</label>
                                            <input type="text" class="form-control" id="sumberdana_b" name="sumberdana_b" placeholder="Masukkan Sumber Dana" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="spek" style="color: black;">Spesifikasi</label>
                                            <input type="text" class="form-control" id="spek_b" name="spek_b" placeholder="Masukkan Spesifikasi" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ruangan" style="color: black;">Ruangan</label>
                                            <select id="ruangan_b" name="ruangan_b" class="form-control">
                                                <option value="">Pilih Ruangan</option>
                                                @foreach($ruangans as $id => $namaRuangan)
                                                <option value="{{ $id }}">{{ $namaRuangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="keterangan" style="color: black;">Keterangan</label>
                                            <input type="text" class="form-control" id="ket_b" name="ket_b" placeholder="Berikan Keterangan" required>
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
                        <!-- <th>No.</th> -->
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <!-- <th>Serial Number</th> -->
                        <th>Merk</th>
                        <!-- <th>Spesifikasi</th> -->
                        <th>Kondisi</th>
                        <th>Tahun</th>
                        <th>Ruangan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody">
                  @foreach($elektroniks as $elektronik)
                    <tr>
                        <!-- <td>{{ $loop->iteration }}</td> -->
                        <td>{{ $elektronik->kode_b }}</td>
                        <td>{{ $elektronik->nama_b }}</td>
                        <!-- <td>{{ $elektronik->sn_b }}</td> -->
                        <td>{{ $elektronik->merk_b }}</td>
                        <!-- <td>{{ $elektronik->spek_b }}</td> -->
                        <td>{{ $elektronik->kondisi_b}}</td>
                        <td>{{ $elektronik->tahun_b }}</td>
                        <td>{{ $elektronik->ruangan->nama_a ?? '-' }}</td> <!-- Mengambil nama ruangan dari relasi -->
                        <td>{{ $elektronik->ket_b }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $elektronik->id }}"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#detailModal{{ $elektronik->id }}"><i class="fas fa-info-circle"></i></button>
                            <form action="{{ route('admin.elektronik.destroy', $elektronik->id) }}" method="POST" style="display: inline-block;">
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
                
                <form id="delete-form" action="#" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

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
<div>

<script>
    @if (Session::has('pesan'))
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    @endif
</script>

@foreach($elektroniks as $elektronik)
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal{{ $elektronik->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color: black;">Edit Barang Elektronik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data ruangan -->
                <form action="{{ route('admin.elektronik.update', $elektronik->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nama" style="color: black;">Nama Barang</label>
                          <input type="text" class="form-control" id="nama_b" name="nama_b" value="{{ $elektronik->nama_b}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kode" style="color: black;">Kode Barang</label>
                          <input type="text" class="form-control" id="kode_b" name="kode_b" value="{{ $elektronik->kode_b}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="bahan" style="color: black;">Serial Number</label>
                          <input type="text" class="form-control" id="sn_b" name="sn_b" value="{{ $elektronik->sn_b}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kondisi" style="color: black;">Kondisi</label>
                          <select class="form-control" id="kondisi_b" name="kondisi_b" required>
                              <option value="">Pilih Kondisi</option>
                              <option value="Baik" {{ $elektronik->kondisi_b == 'Baik' ? 'selected' : '' }}>Baik</option>
                              <option value="Sedang" {{ $elektronik->kondisi_b == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Rusak" {{ $elektronik->kondisi_b == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tahun" style="color: black;">Tahun</label>
                          <input type="text" class="form-control" id="tahun_b" name="tahun_b" value="{{ $elektronik->tahun_b}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="merk" style="color: black;">Merk</label>
                          <input type="text" class="form-control" id="merk_b" name="merk_b" value="{{ $elektronik->merk_b}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="toko" style="color: black;">Toko</label>
                          <input type="text" class="form-control" id="toko_b" name="toko_b" value="{{ $elektronik->toko_b}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="sumberdana" style="color: black;">Sumber Dana</label>
                          <input type="text" class="form-control" id="sumberdana_b" name="sumberdana_b" value="{{ $elektronik->sumberdana_b}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="spesifikasi" style="color: black;">Spesifikasi</label>
                          <input type="text" class="form-control" id="spek_b" name="spek_b" value="{{ $elektronik->spek_b}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ruangan" style="color: black;">Ruangan</label>
                          <select id="ruangan_b" name="ruangan_b" class="form-control" required>
                              <option value="">Pilih Ruangan</option>
                              @foreach($ruangans as $id => $namaRuangan)
                              <option value="{{ $id }}" {{ $elektronik->ruangan_id == $id ? 'selected' : '' }}>{{ $namaRuangan }}</option>
                              @endforeach   
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="keterangan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_b" name="ket_b" value="{{ $elektronik->ket_b}}" required>
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

<div class="modal fade" id="detailModal{{ $elektronik->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel" style="color: black;">Detail Barang Elektronik</h5>
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
                          <input type="text" class="form-control" id="nama_b" name="nama_b" value="{{ $elektronik->nama_b}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kode" style="color: black;">Kode Barang</label>
                          <input type="text" class="form-control" id="kode_b" name="kode_b" value="{{ $elektronik->kode_b}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="bahan" style="color: black;">Serial Number</label>
                          <input type="text" class="form-control" id="sn_b" name="sn_b" value="{{ $elektronik->sn_b}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kondisi" style="color: black;">Kondisi</label>
                          <input type="text" class="form-control" id="kondisi_b" name="kondisi_b" value="{{ $elektronik->kondisi_b}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tahun" style="color: black;">Tahun</label>
                          <input type="text" class="form-control" id="tahun_b" name="tahun_b" value="{{ $elektronik->tahun_b}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="merk" style="color: black;">Merk</label>
                          <input type="text" class="form-control" id="merk_b" name="merk_b" value="{{ $elektronik->merk_b}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="spesifikasi" style="color: black;">Spesifikasi</label>
                          <input type="text" class="form-control" id="spek_b" name="spek_b" value="{{ $elektronik->spek_b}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ruangan" style="color: black;">Ruangan</label>
                          <input type="text" class="form-control" id="ruangan_b" name="ruangan_b" value="{{ $elektronik->ruangan->nama_a ?? '-'}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="toko_b" style="color: black;">Toko</label>
                            <input type="text" class="form-control" id="toko_b" name="toko_b" value="{{ $elektronik->toko_b}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sumberdana_b" style="color: black;">Sumber Dana</label>
                            <input type="text" class="form-control" id="sumberdana_b" name="sumberdana_b" value="{{ $elektronik->sumberdana_b}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="keterangan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_b" name="ket_b" value="{{ $elektronik->ket_b}}" readonly>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection