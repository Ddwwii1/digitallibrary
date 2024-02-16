 @extends('admin.layoutad.app')
 @section('content')
 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $judul }}</h1>
    </div>
    <div class="col">
        @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
    @endif
    </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Petugas</h4>
              </div>
              <div class="card-body">
                {{ $users->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Buku</h4>
              </div>
              <div class="card-body">
                {{ $buku->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Laporan</h4>
              </div>
              <div class="card-body">
                Belum
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Peminjaman</h4>
              </div>
              <div class="card-body">
                {{ $peminjaman->count() }}
              </div>
            </div>
          </div>
        </div> --}}
      </div>

    </section>
  </div>
@endsection
