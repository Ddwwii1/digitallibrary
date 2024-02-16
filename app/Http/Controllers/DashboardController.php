<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Users;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $judul = "Dashboard";
    protected $menu = "dashboard";
    protected $sub_menu = "";
    protected $direktori = "admin.dashboard";

    public function main(Request $request){


        $users= Users::where('level_user', 'Petugas')->get();
        $buku = Buku::with(['kategori_buku'])->orderBy('created_at', 'DESC');
        $peminjaman = Peminjaman::where('status_peminjaman', 'dipinjam')->get();

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['direktori'] = $this->direktori;

        return view($this->direktori.'.main', $data, compact('users','buku', 'peminjaman'));
    }
}
