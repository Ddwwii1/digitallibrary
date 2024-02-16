@extends('admin.layoutad.app')
@section('content')

<div class="main-content" style="min-height: 503px;">
    <section class="section">
      <div class="section-header">
        <h1>Data {{ $judul }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="{{ route('kategori') }}">Kategori</a></div>
          <div class="breadcrumb-item">Data</div>
        </div>
      </div>
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>×</span>
            </button>
            {{ session('success') }}
          </div>
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible show fade mb-2">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('error') }}
            </div>
        </div>
      @endif

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data {{ $judul }}</h4>
            </div>
            <div class="col-13" style="margin-left: 25px;">
                <a class="btn btn-primary" href="{{ route('kategoriCreate') }}">Tambah Data {{ $judul }}</a>
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
                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 123.677px;">Nama Kategori</th>
                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 57.0625px;">Action</th></tr>
                    </thead>
                    <tbody>

                    @foreach ($kategori_buku as $key => $kb)
                    <tr role="row" class="odd">
                        <td class="sorting_1 align-middle">
                          {{ $key+1 }}
                        </td>
                        <td class="align-middle">{{ $kb->nama_kategori }}</td>
                        <td class="d-flex">
                            <a href="{{ route('kategoriShow', $kb->id_kategori) }}" style="margin-right: 2px;" class="btn btn-primary"><i class="menu-icon fa fa-eye"></i></a>
                                <a href="{{ route('kategoriEdit', $kb->id_kategori) }}" style="margin-right: 2px;" class="btn btn-warning"><i class="menu-icon fa fa-edit"></i></a>
                                <a href="{{ route('kategoriDelete', $kb->id_kategori) }}" style="margin-right: 2px;" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data')"><i class="fa fa-trash"></i></a>
                        </td>

                      </tr>
                    @endforeach</tbody>
                  </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div></div>
                  <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="table-1_previous"><a href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="table-1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="table-1_next"><a href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
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
