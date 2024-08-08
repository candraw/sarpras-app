@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Perbaikan Kerusakan Barang/Ruangan</h1>
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
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Perbaikan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.perbaikan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="nama_pekerjaan" style="color: black;">Nama Pekerjaan</label>
                                          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Nama Pekerjaan" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                            <label for="ruangan" style="color: black;">Ruangan</label>
                                            <select id="ruangan_e" name="ruangan_e" class="form-control">
                                                <option value="">Pilih Ruangan</option>
                                                @foreach($ruangans as $id => $namaRuangan)
                                                <option value="{{ $id }}">{{ $namaRuangan }}</option>
                                                @endforeach
                                            </select>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="petugas" style="color: black;">Petugas</label>
                                          <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Petugas yang Menangani" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="proses" style="color: black;">Progress</label>
                                          <select class="form-control" id="proses" name="proses" required>
                                              <option value="Belum Dikerjakan">Belum Dikerjakan</option>    
                                              <option value="Sedang Dikerjakan">Proses Pengerjaan</option>
                                              <option value="Selesai Dikerjakan">Selesai Dikerjakan</option> 
                                          </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan_perbaikan" style="color: black;">Keterangan</label>
                                        <input type="text" class="form-control" id="ket_e" name="ket_e" placeholder="Berikan Keterangan" required>
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
                        <th>Daftar Pekerjaan</th>
                        <th>Ruangan</th>
                        <th>Laporan Masuk</th>
                        <th>Petugas</th>
                        <th>Proses</th>
                        <th>Tgl Selesai</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($perbaikans as $perbaikan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perbaikan->pekerjaan }}</td>
                        <td>{{ $perbaikan->ruangan->nama_a ?? '-' }}</td>
                        <td>{{ $perbaikan->created_at->format('d-m-Y') }}</td>
                        <td>{{ $perbaikan->petugas }}</td>
                        <td class="@if($perbaikan->proses == 'Selesai Dikerjakan') bg-success text-white @elseif($perbaikan->proses == 'Sedang Dikerjakan') bg-warning text-dark @elseif($perbaikan->proses == 'Belum Dikerjakan') bg-danger text-white @endif">
                            <center>{{ $perbaikan->proses }}</center>
                        </td>
                        <td>{{ $perbaikan->tglselesai }}</td>
                        <td>{{ $perbaikan->ket_e }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $perbaikan->id }}"><i class="fas fa-edit"></i></button>
                            <form action="{{ route('admin.perbaikan.destroy', $perbaikan->id) }}" method="POST" style="display: inline-block;">
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

@foreach($perbaikans as $perbaikan)
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal{{ $perbaikan->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color: black;">Update Data Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data ruangan -->
                <form action="{{ route('admin.perbaikan.update', $perbaikan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nama_pekerjaan" style="color: black;">Nama Pekerjaan</label>
                          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $perbaikan->pekerjaan}}" required>
                      </div>
                        <div class="form-group col-md-6">
                            <label for="ruangan" style="color: black;">Ruangan</label>
                            <select id="ruangan_e" name="ruangan_e" class="form-control">
                                <option value="">Pilih Ruangan</option>
                                @foreach($ruangans as $id => $namaRuangan)
                                <option value="{{ $id }}">{{ $namaRuangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="petugas" style="color: black;">Petugas</label>
                          <input type="text" class="form-control" id="petugas" name="petugas" value="{{ $perbaikan->petugas}}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="proses" style="color: black;">Progress</label>
                          <select class="form-control" id="proses" name="proses" required>
                              <option value="Selesai Dikerjakan" {{ $perbaikan->proses == 'Selesai Dikerjakan' ? 'selected' : '' }}>Selesai Dikerjakan</option>
                              <option value="Sedang Dikerjakan" {{ $perbaikan->proses == 'Sedang Dikerjakan' ? 'selected' : '' }}>Proses Pengerjaan</option>
                              <option value="Belum Dikerjakan" {{ $perbaikan->proses == 'Belum Dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="tglselesai" style="color: black;">Tanggal Selesai</label>
                          <input type="date" class="form-control" id="tglselesai" name="tglselesai" value="{{ $perbaikan->tglselesai ?? '' }}" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="keterangan_perbaikan" style="color: black;">Keterangan</label>
                          <input type="text" class="form-control" id="ket_e" name="ket_e" value="{{ $perbaikan->ket_e}}" required>
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
                <form method="GET" action="{{ route('admin.perbaikan.print') }}" class="mb-3">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <button type="submit" class="btn btn-outline-warning" onclick="window.location.href='{{ route('admin.perbaikan.print') }}'">Cetak Semua Data</button>
                    </div>
                </form>
                <hr>
                <form method="POST" action="{{ route('admin.print.filtered') }}" class="mb-3">
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