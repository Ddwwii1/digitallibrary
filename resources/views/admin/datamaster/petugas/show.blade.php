@extends('admin.layoutad.app')
@section('content')

<div class="main-content" style="min-height: 503px;">
    <section class="section">
        <div class="section-header">
          <h1>Lihat Data {{ $judul }}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('users') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Data</div>
          </div>
        </div>

      <div class="section-body">

        <div class="row">
            <div class="col-12 col-md- col-lg">
              <div class="card">
                <div class="card-header">
                  <h4>Lihat Data {{ $judul }}</h4>
                </div>
                <div class="card-body">
                <form action="" method="POST">
                    @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required disabled value="{{ (old('username')) ? old('username') : $users->username }}">
                    <div class="invalid-feedback">
                        masukkan username
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required disabled value="{{ (old('email')) ? old('email') : $users->email }}">
                      <div class="invalid-feedback">
                        masukkan email
                    </div>
                    </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" required disabled value="{{ (old('password')) ? old('password') : $users->password }}">
                    <div class="invalid-feedback">
                        masukkan password
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required disabled value="{{ (old('nama_lengkap')) ? old('nama_lengkap') : $users->nama_lengkap }}">
                    <div class="invalid-feedback">
                        masukkan nama
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" required disabled value="{{ (old('alamat')) ? old('alamat') : $users->alamat }}">
                    <div class="invalid-feedback">
                        masukkan alamat
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  {{-- <button class="btn btn-primary mr-1" type="submit">Submit</button> --}}
                </form>
                  <a href="{{ route('users') }}"><button class="btn btn-secondary" >Kembali</button></a>
                </div>
              </div>

          </div>

      </div>
    </section>
  </div>

  @endsection
