<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    protected $judul = "Peminjaman";
    protected $menu = "peminjaman";
    protected $sub_menu = "peminjaman";
    protected $direktori = "admin.datamaster.peminjaman";

    public function dipinjam(){

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['dipinjam'] = Peminjaman::where('status_peminjaman', 'dipinjam')->get();

        return view($this->direktori.'.dipinjam', $data);

        // $dipinjam = Peminjaman::where('status_peminjaman', 'dipinjam')->get();
        // return view('admin.peminjaman.dipinjam', compact('dipinjam'));
    }

    public function showPeminjaman($id_peminjaman){

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $peminjaman = peminjaman::where('id_peminjaman', $id_peminjaman)->first();
        $detail = PeminjamanDetail::where('peminjaman_id', $id_peminjaman)->get();
        $tgl_pinjam = new DateTime($peminjaman['tanggal_peminjaman']);
        $tgl_pengembalian = new DateTime($peminjaman['tanggal_pengembalian']);
        $tgl_kembali = new DateTime($peminjaman['tanggal_kembali']);
        $jumHari = $tgl_kembali->diff($tgl_pinjam);
        if ($peminjaman->denda_terlambat != 0){
            $jumTelat = $tgl_kembali->diff($tgl_pengembalian);
        }    else{
            $jumTelat = 0;
        }
        return view($this->direktori.'.show', $data, compact('detail', 'peminjaman', 'jumHari', 'jumTelat'));
    }

    public function ubah_status(Request $request, $id_peminjaman){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $hasil_denda = 0;
        $str_status = (string)$request->status;
        $tanggal_pengembalian = Carbon::now()->toDateString();
        $status_peminjaman = Peminjaman::where('id_peminjaman', $id_peminjaman)->first();
        $status_peminjaman['total_denda'] = 0;

        if ($str_status == 'selesai'){
            $status_peminjaman['tanggal_pengembalian'] = $tanggal_pengembalian;
            if ($status_peminjaman['tanggal_kembali'] < $tanggal_pengembalian){
                $tgl_kembali = new DateTime($status_peminjaman['tanggal_kembali']);
                $t_pengembalian = new DateTime($tanggal_pengembalian);
                $telat = $t_pengembalian->diff($tgl_kembali);

                $detail = PeminjamanDetail::where('peminjaman_id', $id_peminjaman)->first();

                foreach ($detail as $d){
                    $dendaPerHari = 10000;
                    // $buku = buku::where('bukuId', $d->bukuId)->first();
                    $hasil[] = $dendaPerHari * $telat->days;
                    $hasil_denda = array_sum($hasil);
                }
                $status_peminjaman['total_denda'] = $hasil_denda;
                $total = $status_peminjaman['total_denda'] + $hasil_denda;
                $status_peminjaman['total_denda'] = $total;
            }

            $detail = PeminjamanDetail::where('peminjaman_id', $id_peminjaman)->get();
            foreach ($detail as $d){
                $buku = Buku::where('id_buku', $d->buku_id)->first();
                $buku['stok'] = $buku['stok'] + 1;
            }

            // if ($str_status == 'ditolak') {
            //     $detail = peminjaman_detail::where('peminjaman_id', $id_peminjaman)->get();
            //     foreach ($detail as $d) {
            //         $buku = Buku::where('id_buku', $d->buku_id)->first();
            //         $buku['stok'] = $buku['stok'] + $d->qty;
            //         $buku->save();
            //     }
            // }
            $status_peminjaman['status_peminjaman'] = $str_status;
            $status_peminjaman->save();

            return redirect()->back()->with('success', 'Berhasil mengubah status');
        }
    }

    public function selesai(){

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['selesai'] = Peminjaman::where('status_peminjaman', 'selesai')->get();

        return view($this->direktori.'.selesai', $data);

    }
}
