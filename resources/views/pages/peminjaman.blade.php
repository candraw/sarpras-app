@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Peminjaman Barang/Ruangan</h1>
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
                <!-- <h2 class="card-title"><b>INFORMASI DATA RUANGAN USAMAH</b></h2> -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary mr-2 float-left" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>
                </button>

                <button type="button" class="btn btn-outline-warning mr-2 float-left" data-toggle="modal" data-target="#printModal">
                    <i class="fas fa-print"></i>
                </button>

                <!-- Modal Tambah Data-->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Peminjaman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="peminjam" style="color: black;">Nama Peminjam</label>
                                          <input type="text" class="form-control" id="peminjam" name="peminjam" placeholder="Masukkan Nama Peminjam" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="instansi" style="color: black;">Asal Instansi</label>
                                          <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Masukkan Asal Instansi" required>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="barang" style="color: black;">Barang/Ruangan</label>
                                          <input type="text" class="form-control" id="barang" name="barang" placeholder="Barang yg Dipinjam" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="kontak" style="color: black;">Kontak</label>
                                          <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak peminjam" required>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="status" style="color: black;">Status</label>
                                          <select class="form-control" id="status" name="status" required>
                                              <option value="Belum Dikembalikan">Belum Dikembalikan</option>    
                                              <option value="Dikembalikan">Dikembalikan</option> 
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="keterangan_peminjaman" style="color: black;">Keterangan</label>
                                          <input type="text" class="form-control" id="ket_f" name="ket_f" placeholder="Berikan Keterangan" required>
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
                        <th>Nama Peminjam</th>
                        <th>Asal Instansi</th>
                        <th>Barang</th>
                        <th>Kontak</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjaman->peminjam }}</td>
                        <td>{{ $peminjaman->instansi }}</td>
                        <td>{{ $peminjaman->barang }}</td>
                        <td>{{ $peminjaman->kontak }}</td>
                        <td>{{ $peminjaman->created_at->format('d-m-Y') }}</td>
                        <td>{{ $peminjaman->tglkembali }}</td>
                        <td class="@if($peminjaman->status == 'Dikembalikan') bg-success text-white @elseif($peminjaman->status == 'Belum Dikembalikan') bg-danger text-white @endif">
                            <center>{{ $peminjaman->status }}</center>
                        </td>
                        <td>{{ $peminjaman->ket_f }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $peminjaman->id }}"><i class="fas fa-edit"></i></button>
                            <form action="{{ route('admin.peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: inline-block;">
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

@foreach($peminjamans as $peminjaman)
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal{{ $peminjaman->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color: black;">Update Data peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data ruangan -->
                <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="peminjam" style="color: black;">Nama Peminjam</label>
                            <input type="text" class="form-control" id="peminjam" name="peminjam" value="{{ $peminjaman->peminjam}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instansi" style="color: black;">Asal Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" value="{{ $peminjaman->instansi}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="barang" style="color: black;">Barang/Ruangan</label>
                            <input type="text" class="form-control" id="barang" name="barang" value="{{ $peminjaman->barang}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kontak" style="color: black;">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $peminjaman->kontak}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status" style="color: black;">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Belum Dikembalikan" {{ $peminjaman->status == 'Belum Dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>    
                                <option value="Dikembalikan" {{ $peminjaman->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option> 
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tglkembali" style="color: black;">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tglkembali" name="tglkembali" value="{{ $peminjaman->tglkembali}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="keterangan_peminjaman" style="color: black;">Keterangan</label>
                            <input type="text" class="form-control" id="ket_f" name="ket_f" value="{{ $peminjaman->ket_f}}" required>
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
@endforeach

<!-- Modal Print Data-->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Cetak Data Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('admin.peminjaman.print') }}" class="mb-3">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <button type="submit" class="btn btn-outline-warning" onclick="window.location.href='{{ route('admin.peminjaman.print') }}'">Cetak Semua Data</button>
                    </div>
                </form>
                <hr>
                <form method="POST" action="{{ route('admin.print.filtered_peminjaman') }}" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <label for="selectedDate">Cetak Data berdasarkan Bulan Tahun</label>
                        <input type="date" id="selectedDate" name="selectedDate" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    @if (Session::has('pesan'))
        toastr.{{ Session::get('alert') }}("{{ Session::get('pesan') }}");
    @endif
</script>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            document.getElementById('delete-form').action = "{{ url('admin/ruangan') }}/" + id;
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endsection