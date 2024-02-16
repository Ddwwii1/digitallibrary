@extends('admin.layoutad.app')
@section('content')

<div class="main-content" style="min-height: 503px;">
    <section class="section">
        <div class="section-header">
          <h1>Update Data {{ $judul }}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('kategori') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Data</div>
          </div>
        </div>

      <div class="section-body">
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible show fade mb-2">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('error') }}
            </div>
        </div>
    @elseif (session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade mb-2">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
    @endif
        <div class="row">
            <div class="col-12 col-md- col-lg">
              <div class="card">
                <div class="card-header">
                  <h4>Update Data {{ $judul }}</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('kategoriUpdate', $kategori_buku->id_kategori) }}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required value="{{ (old('nama_kategori')) ? old('nama_kategori') : $kategori_buku->nama_kategori }}">
                    <div class="invalid-feedback">
                        masukkan nama kategori
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </form>
                  <a href="{{ route('kategori') }}"><button class="btn btn-secondary" >Kembali</button></a>
                </div>
              </div>

          </div>

      </div>
    </section>
  </div>

  @endsection
