<?php

namespace App\Http\Controllers\User;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    protected $judul = "Perpustakaan Digital";
    protected $menu = "dashboard";
    protected $sub_menu = "dashboard";
    protected $direktori = "user.dashboard";

    public function main(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['buku'] = Buku::with(['kategori_buku'])->get();

        return view($this->direktori.'.main', $data);
    }
}
