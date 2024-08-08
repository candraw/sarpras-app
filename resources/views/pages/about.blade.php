@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="image">
          <img src="{{ asset('/img/popcat1.jpg')}}" width="200">
        </div><br>
        <h3><b>Aplikasi</b>SarPras</h3>
        <br>
        <h6>Dibangun oleh <b>@dimasgtcndr</b></h6>
        <!-- <ul>
            <li><h6>Backend : PHP 8.2</h6></li>
            <li><h6>Framework : Laravel 11</h6></li>
            <li><h6>Template : AdminLTE3</h6></li>
            <li><h6>Library : Bootstrap5, AJAX/JQuery, Font Awesome, Sweet Alert3</h6></li>
        </ul> -->
        <h6>For Technical Issue, contact <b>dimasigitcw@gmail.com</b></h6>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection