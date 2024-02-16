<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Pertal</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Pt</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ $menu == 'dashboard' ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown {{ $menu == 'dashboard' ? 'active' : '' }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a></li>
            {{-- <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> --}}
          </ul>
        </li>
        <li class="menu-header">Data Master</li>
        <li class="dropdown {{ $menu == 'datamaster' ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data Master</span></a>
          <ul class="dropdown-menu">
            @can('admin')
            <li class="{{ $sub_menu == 'petugas' ? 'active' : '' }}"><a class="nav-link" href="{{ route('users') }}"><i class="fas fa-user-tie"></i> Data Petugas</a></li>
            @endcan
            <li class="{{ $sub_menu == 'peminjam' ? 'active' : '' }}"><a class="nav-link" href="{{ route('peminjam') }}"><i class="fas fa-users"></i> Data Peminjam</a></li>
            <li class="{{ $sub_menu == 'kategori' ? 'active' : '' }}"><a class="nav-link" href="{{ route('kategori') }}"><i class="fas fa-bars"></i> Data Kategori</a></li>
            <li class="{{ $sub_menu == 'buku' ? 'active' : '' }}"><a class="nav-link" href="{{ route('buku') }}"><i class="fas fa-book"></i> Data Buku</a></li>
          </ul>
        </li>

        <li class="menu-header">Data Peminjaman</li>
        <li class="dropdown {{ $menu == 'peminjaman' ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown {{ $menu == 'peminjaman' ? 'active' : '' }}"><i class="fas fa-boxes"></i><span>Data Peminjaman</span></a>
            <ul class="dropdown-menu">
                <li class="{{ $sub_menu == 'peminjaman' ? 'active' : '' }}"><a class="nav-link" href="{{ route('dipinjam') }}">Dipinjam</a></li>
                <li class="{{ $sub_menu == 'selesai' ? 'active' : '' }}"><a class="nav-link" href="{{ route('selesai') }}">Selesai</a></li>
            </ul>
        </li>

        <li class="menu-header">Laporan</li>
        <li class="dropdown {{ $menu == 'laporan' ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown {{ $menu == 'laporan' ? 'active' : '' }}"><i class="fas fa-clipboard"></i><span>Laporan</span></a>
            <ul class="dropdown-menu">
              <li class="{{ $menu == 'laporan' ? 'active' : '' }}"><a class="nav-link" href="{{ route('laporan') }}">Laporan</a></li>
            </ul>
        </li>


      </ul>


      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

      </div>        </aside>
  </div>
