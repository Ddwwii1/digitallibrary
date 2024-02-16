@extends('admin.layoutad.app')
@section('content')

<div class="main-content" style="min-height: 503px;">
    <section class="section">
        <div class="section-header">
          <h1>Tambah Data {{ $judul }}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('buku') }}">Dashboard</a></div>
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
                  <h4>Tambah Data {{ $judul }}</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('bukuStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required autofocus>
                    <div class="invalid-feedback">
                        masukkan judul buku
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Cover Buku</label>
                    <input type="file" name="cover" class="form-control" required>
                    <div class="invalid-feedback">
                        masukkan cover
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                    <div class="invalid-feedback">
                        masukkan penulis
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                    <div class="invalid-feedback">
                        masukkan penerbit
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control" required>
                    <div class="invalid-feedback">
                        masukkan tahun
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" required>
                    <div class="invalid-feedback">
                        masukkan stok
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Kategori Buku</label>
                    <select required class="form-control select2 select2-hidden-accessible" name="kategori_id" tabindex="-1" aria-hidden="true">
                      <option value="">. :: Pilih Kategori Buku :: .</option>
                      @foreach ($kategori_buku as $kb)
                      <option value="{{ $kb->id_kategori }}">{{ $kb->nama_kategori }}</option>
                      @endforeach
                    </select><span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" style="width: 388.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-trc9-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                  </div>

                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </form>
                  <a href="{{ route('buku') }}"><button class="btn btn-secondary" >Kembali</button></a>
                </div>
              </div>

          </div>

      </div>
    </section>
  </div>

  @endsection
