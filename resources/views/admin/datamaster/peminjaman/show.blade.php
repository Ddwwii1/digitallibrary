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
                <h6>Nama: {{ $peminjaman->users->nama_lengkap }}</h6>
                <h6>Email: {{ $peminjaman->users->email }}</h6>
                <h6>Alamat: {{ $peminjaman->users->alamat }}</h6>
            </div>
            <div class="col-14" style="margin-left: 25px; margin-top: 4px;">

            </div>

              <div class="card-body">
                <div class="table-responsive">
                  <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="table-1_length"><label>Show <select name="table-1_length" aria-controls="table-1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="table-1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped dataTable no-footer" id="table-1" role="grid" aria-describedby="table-1_info">
                    <thead>
                      <tr role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                          #
                        : activate to sort column descending" style="width: 15.5938px;">
                          No
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Progress" style="width: 65.0625px;">Judul Buku</th>
                    </thead>
                    <tbody>

                    @foreach ($detail as $key => $d)
                    <tr role="row" class="odd">
                        <td class="sorting_1 align-middle">{{ $key+1 }}</td>
                        <td class="align-middle">{{ $d->buku->judul }}</td>
                    </tr>
                    @endforeach</tbody>
                  </table>

                  <label for="" class="form-label">Jumlah Hari Peminjaman</label>
                  <input type="text" class="form-control" value="{{ $jumHari->days }}" disabled>
                  @if ($peminjaman->status_peminjaman == 'selesai')
                      <label for="" class="form-label">Denda</label>
                      <input type="text" class="form-control" value="{{ number_format($peminjaman->denda_peminjaman) }}"
                          disabled>
                      @if ($peminjaman->denda != 0)
                          <label for="" class="form-label">Jumlah Hari Telat</label>
                          <input type="text" class="form-control" value="{{ $jumTelat->days }}" disabled>
                      @endif
                  @endif

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

