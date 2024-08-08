@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Ruangan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Ruangan</li>
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

                <a href="{{ route('admin.ruangan.print')}}" class="btn btn-outline-warning float-left"> 
                    <i class="fas fa-print"></i>
                </a>

                <a href="{{ route('admin.ruangan.print')}}" class="btn btn-outline-success float-left"> 
                    <i class="fas fa-print"></i>Report
                </a>

                <!-- Modal Tambah Data-->
                <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel" style="color: black;">Tambah Data Ruangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form tambah data ruangan -->
                                <form action="{{ route('admin.ruangan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_ruangan" style="color: black;">Nama Ruangan</label>
                                        <input type="text" class="form-control" id="nama_a" name="nama_a" placeholder="Masukkan Nama Ruangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_ruangan" style="color: black;">Kode Ruangan</label>
                                        <input type="text" class="form-control" id="kode_a" name="kode_a" placeholder="Masukkan Kode Ruangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="luas_ruangan" style="color: black;">Luas Ruangan</label>
                                        <input type="text" class="form-control" id="luas_a" name="luas_a" placeholder="Masukkan Luas Ruangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kondisi_ruangan" style="color: black;">Kondisi</label>
                                        <select class="form-control" id="kondisi_a" name="kondisi_a" required>
                                            <option value="Baik">Baik</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan_ruangan" style="color: black;">Keterangan</label>
                                        <input type="text" class="form-control" id="ket_a" name="ket_a" placeholder="Berikan Keterangan" required>
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
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Luas</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($ruangans as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ruangan->kode_a }}</td>
                        <td>{{ $ruangan->nama_a }}</td>
                        <td>{{ $ruangan->luas_a }}</td>
                        <td>{{ $ruangan->kondisi_a}}</td>
                        <td>{{ $ruangan->ket_a }}</td>
                        <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal{{ $ruangan->id }}"><i class="fas fa-edit"></i></button>
                            <!-- <a href="{{ route('admin.ruangan.show', $ruangan->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a> -->
                            <form action="{{ route('admin.ruangan.destroy', $ruangan->id) }}" method="POST" style="display: inline-block;">
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

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            document.getElementById('delete-form').action = "{{ url('admin/ruangan') }}/" + id;
            document.getElementById('delete-form').submit();
        }
    }
</script>

@foreach($ruangans as $ruangan)
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal{{ $ruangan->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color: black;">Edit Data Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit data ruangan -->
                <form action="{{ route('admin.ruangan.update', $ruangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_ruangan" style="color: black;">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_a" name="nama_a" value="{{ $ruangan->nama_a}}" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_ruangan" style="color: black;">Kode Ruangan</label>
                        <input type="text" class="form-control" id="kode_a" name="kode_a" value="{{ $ruangan->kode_a}}" required>
                    </div>
                    <div class="form-group">
                        <label for="luas_ruangan" style="color: black;">Luas Ruangan</label>
                        <input type="text" class="form-control" id="luas_a" name="luas_a" value="{{ $ruangan->luas_a}}" required>
                    </div>
                    <div class="form-group">
                        <label for="kondisi_ruangan" style="color: black;">Kondisi</label>
                        <select class="form-control" id="kondisi_a" name="kondisi_a" required>
                            <option value="Baik" {{ $ruangan->kondisi_a == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Sedang" {{ $ruangan->kondisi_a == 'Sedang' ? 'selected' : ''}}>Sedang</option>
                            <option value="Rusak" {{ $ruangan->kondisi_a == 'Rusak' ? 'selected' : ''}}>Rusak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_ruangan" style="color: black;">Keterangan</label>
                        <input type="text" class="form-control" id="ket_a" name="ket_a" value="{{ $ruangan->ket_a}}" required>
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
@endsection