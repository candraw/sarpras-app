@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pilih Ruangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Pilih Ruangan untuk melihat Penggunaan Barang</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <form action="{{ route('admin.ruangan.collect', ['ruangan_id' => 'placeholder']) }}" method="POST" id="form-ruangan">
                        @csrf
                        <select name="ruangan_id" id="ruangan" onchange="submitForm()" class="form-control select2" style="width: 100%;">
                            <option value="disable">Pilih Ruangan</option>
                            @foreach ($daftarRuangan as $ruangan)
                                <option value="{{ $ruangan->id }}">{{ $ruangan->nama_a }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<a href="{{ route('admin.dashboard')}}">Kembali</a>
<script>
    function submitForm() {
        var ruanganId = document.getElementById('ruangan').value;
        var form = document.getElementById('form-ruangan');
        form.action = form.action.replace('placeholder', ruanganId);
        form.submit();
    }
</script>
@endsection