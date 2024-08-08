@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Praktikum</h1>
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
                <!-- <h3 class="card-title">Praktikum</h3> -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary mr-2 float-left" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>
                </button>

                <a href="{{ route('admin.praktik.print')}}" class="btn btn-outline-warning float-left"> 
                    <i class="fas fa-print"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Praktikum</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.praktik.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama" style="color: black;">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_d" name="nama_d" placeholder="Masukkan Nama Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kode" style="color: black;">Kode Barang</label>
                                            <input type="text" class="form-control" id="kode_d" name="kode_d" placeholder="Masukkan Kode Barang" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="merk" style="color: black;">Merk</label>
                                            <input type="text" class="form-control" id="merk_d" name="merk_d" placeholder="Masukkan Merk Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bahan" style="color: black;">Bahan</label>
                                            <input type="text" class="form-control" id="bahan_d" name="bahan_d" placeholder="Masukkan Material/Bahan" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kondisi" style="color: black;">Kondisi</label>
                                            <select class="form-control" id="kondisi_d" name="kondisi_d" required>
                                                <option value="">Pilih Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Rusak">Rusak</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tahun" style="color: black;">Tahun</label>
                                            <input type="text" class="form-control" id="tahun_d" name="tahun_d" placeholder="Masukkan Tahun Perolehan" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="ruangan" style="color: black;">Ruangan</label>
                                            <select id="ruangan_d" name="ruangan_d" class="form-control">
                                                <option value="">Pilih Ruangan</option>
                                                @foreach($ruangans as $id => $namaRuangan)
                                                <option value="{{ $id }}">{{ $namaRuangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="keterangan" style="color: black;">Sumber Dana</label>
                                            <input type="text" class="form-control" id="sumber_d" name="sumber_d" placeholder="Sumber Dana" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="toko" style="color: black;">Toko</label>
                                            <input type="text" class="form-control" id="toko_d" name="toko_d" placeholder="Toko Pembelian Barang" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="keterangan" style="color: black;">Keterangan</label>
                                            <input type="text" class="form-control" id="ket_d" name="ket_d" placeholder="Berikan Keterangan" required>
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
                        <th>Merk</th>
                        <th>Bahan</th>
                        <th>Kondisi</th>
                        <th>Tahun</th>
                        <th>Toko</th>
                        <th>Sumber Dana</th>
                        <th>Ruangan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($praktiks as $praktik)
                    <tr>
                        <!-- <td>{{ $loop->iteration }}</td> -->
                        <td>{{ $praktik->kode_d }}</td>
                        <td>{{ $praktik->nama_d }}</td>
                        <td>{{ $praktik->merk_d }}</td>
                        <td>{{ $praktik->bahan_d }}</td>
                        <td>{{ $praktik->kondisi_d}}</td>
                        <td>{{ $praktik->tahun_d }}</td>
                        <td>{{ $praktik->toko_d }}</td>
                        <td>{{ $praktik->sumber_d }}</td>
                        <td>{{ $praktik->ruangan->nama_a ?? '-' }}</td> <!-- Mengambil nama ruangan dari relasi -->
                        <td>{{ $praktik->ket_d }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $praktik->id }}"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#detailModal{{ $praktik->id }}"><i class="fas fa-info-circle"></i></button>
                            <form action="{{ route('admin.praktik.destroy', $praktik->id) }}" method="POST" style="display: inline-block;">
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

@foreach($praktiks as $praktik)
<!-- Modal -->
<div class="modal fade" id="editModal{{ $praktik->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <form action="{{ route('admin.praktik.update', $praktik->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nama" style="color: black;">Nama Barang</label>
                          <input type="text" class="form-control" id="nama_d" name="nama_d" value="{{ $praktik->nama_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kode" style="color: black;">Kode Barang</label>
                          <input type="text" class="form-control" id="kode_d" name="kode_d" value="{{ $praktik->kode_d}}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="merk" style="color: black;">Merk</label>
                          <input type="text" class="form-control" id="merk_d" name="merk_d" value="{{ $praktik->merk_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kondisi" style="color: black;">Kondisi</label>
                          <select class="form-control" id="kondisi_d" name="kondisi_d" value="{{ $praktik->kondisi_d}}" required>
                              <option value="">Pilih Kondisi</option>
                              <option value="Baik" {{ $praktik->kondisi_d == 'Baik' ? 'selected' : '' }}>Baik</option>
                              <option value="Sedang" {{ $praktik->kondisi_d == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                              <option value="Rusak" {{ $praktik->kondisi_d == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tahun" style="color: black;">Tahun</label>
                          <input type="text" class="form-control" id="tahun_d" name="tahun_d" value="{{ $praktik->tahun_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="merk" style="color: black;">Bahan</label>
                          <input type="text" class="form-control" id="bahan_d" name="bahan_d" value="{{ $praktik->bahan_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="sumber" style="color: black;">Sumber Dana</label>
                          <input type="text" class="form-control" id="sumber_d" name="sumber_d" value="{{ $praktik->sumber_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ruangan" style="color: black;">Ruangan</label>
                          <select id="ruangan_d" name="ruangan_d" class="form-control" value="{{ $praktik->ruangan->nama_a ?? '-'}}" required>
                              <option value="">Pilih Ruangan</option>
                              @foreach($ruangans as $id => $namaRuangan)
                              <option value="{{ $id }}" {{ $praktik->ruangan_id == $id ? 'selected' : '' }}>{{ $namaRuangan }}</option>
                              @endforeach   
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="toko_d" style="color: black;">Toko</label>
                          <input type="text" class="form-control" id="toko_d" name="toko_d" value="{{ $praktik->toko_d}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="keterangan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_d" name="ket_d" value="{{ $praktik->ket_d}}" required>
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

<div class="modal fade" id="detailModal{{ $praktik->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel" style="color: black;">Detail Barang Praktikum</h5>
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
                          <input type="text" class="form-control" id="nama_d" name="nama_d" value="{{ $praktik->nama_d}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kode" style="color: black;">Kode Barang</label>
                          <input type="text" class="form-control" id="kode_d" name="kode_d" value="{{ $praktik->kode_d}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="merk" style="color: black;">Merk</label>
                          <input type="text" class="form-control" id="merk_d" name="merk_d" value="{{ $praktik->merk_d}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="kondisi" style="color: black;">Kondisi</label>
                          <input type="text" class="form-control" id="kondisi_d" name="kondisi_d" value="{{ $praktik->kondisi_d}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tahun" style="color: black;">Tahun</label>
                          <input type="text" class="form-control" id="tahun_d" name="tahun_d" value="{{ $praktik->tahun_d}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="bahan" style="color: black;">Bahan</label>
                          <input type="text" class="form-control" id="bahan_d" name="bahan_d" value="{{ $praktik->bahan_d}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="sumber" style="color: black;">Sumber Dana</label>
                          <input type="text" class="form-control" id="sumber_d" name="sumber_d" value="{{ $praktik->sumber_d}}" readonly>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ruangan" style="color: black;">Ruangan</label>
                          <input type="text" class="form-control" id="ruangan_d" name="ruangan_d" value="{{ $praktik->ruangan->nama_a ?? '-'}}" readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="toko_d" style="color: black;">Toko</label>
                          <input type="text" class="form-control" id="toko_d" name="toko_d" value="{{ $praktik->toko_d}}" readonly>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="keterangan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_d" name="ket_d" value="{{ $praktik->ket_d}}" readonly>
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