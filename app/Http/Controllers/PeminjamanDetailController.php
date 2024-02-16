<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanDetailController extends Controller
{

    protected $judul = "Laporan";
    protected $menu = "laporan";
    protected $sub_menu = "laporan";
    protected $direktori = "admin.datamaster.laporan";

    public function main(Request $request)
    {

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        if($request->status == "selesai")
        {
            $laporan = Peminjaman::whereBetween('tanggal_kembali', [$request->tanggal_awal, $request->tanggal_akhir])->where('status_peminjaman',$request->status_peminjaman)->get();
        }else{
            $laporan = Peminjaman::whereBetween('tanggal_peminjaman', [$request->tanggal_awal, $request->tanggal_akhir])->where('status_peminjaman',$request->status_peminjaman)->get();
        }

        return view($this->direktori.'.main',$data, compact('laporan'));

    }
}
