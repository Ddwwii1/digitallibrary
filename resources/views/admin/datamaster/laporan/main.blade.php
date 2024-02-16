@extends('admin.layoutad.app')
@section('content')

<div class="main-content" style="min-height: 503px;">
    <section class="section">
      <div class="section-header">
        <h1>Data {{ $judul }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="">Peminjaman</a></div>
          <div class="breadcrumb-item">Data</div>
        </div>
      </div>


      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data {{ $judul }}</h4>
            </div>
            <div class="col-13" style="margin-left: 25px;">

            </div>
            <div class="col-14" style="margin-left: 25px; margin-top: 4px;">

            </div>

              <div class="card-body">
                <div class="table-responsive">
                  <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="table-1_length"><label>Show <select name="table-1_length" aria-controls="table-1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="table-1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">

                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Awal</label>
                                    <input type="date" name="tanggal_awal" class="form-control"
                                        id="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Akhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control"
                                        id="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="">Pilih Status</option>
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success form-control mb-3">Submit</button>
                    </form>

                  </table>

                  <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Laporan Transaksi</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Id Peminjaman</th>
                                            <th scope="col">Tanggal Ambil</th>
                                            <th scope="col">Tanggal Kembali</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporan as $lp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lp->id_peminjaman }}</td>
                                                <td>{{ $lp->tanggal_peminjaman }}</td>
                                                <td>{{ $lp->tanggal_kembali }}</td>
                                                <td><span
                                                        @if ($lp->status_peminjaman == 'ditolak') class="btn btn-danger"
                                                @else
                                                class="btn btn-success" @endif>{{ $lp->status_peminjaman }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('showPeminjaman', $lp->id_peminjaman) }}"
                                                        class="btn btn-info"><i class="ti-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                </div></div>
                  <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                </div>
                  <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="table-1_previous"><a href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="table-1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="table-1_next"><a href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                        <li><a href="{{ route('dipinjam') }}" style="margin-left: 210px;" class="btn btn-danger">Kembali</a>
                        </li>
                    </ul></div></div></div></div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

@endsection

