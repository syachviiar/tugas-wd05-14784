@extends('layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Obat</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Obat</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kemasan</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Kemasan">
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">List Obat</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID obat</th>
                        <th>Nama Obat</th>
                        <th>Harga</th>
                        <th>Kemasan</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>183</td>
                        <td>Paracetamol</td>
                        <td>20000</td>
                        <td><span class="tag tag-success">Pil</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                        <td>219</td>
                        <td>Obat Batuk</td>
                        <td>25000</td>
                        <td><span class="tag tag-warning">Sirup</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                        <td>657</td>
                        <td>Obat Flu</td>
                        <td>10000</td>
                        <td><span class="tag tag-primary">Kapsul</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                        <td>175</td>
                        <td>Obat Pusing</td>
                        <td>30000</td>
                        <td><span class="tag tag-danger">Kapsul</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        </div><!-- /.container-fluid -->
      </section>

  </div>
@endsection