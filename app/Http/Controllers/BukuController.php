<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $judul = "Buku";
    protected $menu = "datamaster";
    protected $sub_menu = "buku";
    protected $direktori = "admin.datamaster.buku";

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['buku'] = Buku::with(['kategori_buku'])->orderBy('created_at', 'DESC')->get();

        return view($this->direktori.'.main', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['kategori_buku'] = KategoriBuku::all();

        return view($this->direktori.'.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $judul = $request->judul;
        $cover = $request->cover;
        $penulis = $request->penulis;
        $penerbit = $request->penerbit;
        $tahun_terbit = $request->tahun_terbit;
        $stok = $request->stok;
        $kategori_id = $request->kategori_id;

        if (empty($judul)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Judul Harus diisi');
        }
        if (empty($cover)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom cover Harus diisi');
        }
        if (empty($penulis)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom penulis Harus diisi');
        }
        if (empty($penerbit)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom penerbit Harus diisi');
        }
        if (empty($tahun_terbit)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom tahun terbit Harus diisi');
        }
        if (empty($stok)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom stok Harus diisi');
        }
        if (empty($kategori_id)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom kategori Harus diisi');
        }

        $buku = new Buku();
        $buku->judul = $judul;

        $nama_foto = str_replace([' ', '/'], '-', $judul);
        $ext_foto = $cover->getClientOriginalExtension();
        $filename = $nama_foto . "-" . date('Ymdhis') . "." . $ext_foto;
        $temp_foto = 'template-admin/dist/assets/img/buku';
        $proses = $cover->move($temp_foto, $filename);

        $buku->cover = $filename;
        $buku->penulis = $penulis;
        $buku->penerbit = $penerbit;
        $buku->tahun_terbit = $tahun_terbit;
        $buku->stok = $stok;
        $buku->kategori_id = $kategori_id;
        $buku->save();

        if ($buku){
            $request->session()->flash('success', 'Berhasil Menambah Data');
            return redirect()->route('buku');
        } else {
            $request->session()->flash('error', 'Gagal Menambah Data');
                    return redirect()->route('bukuCreate');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->menu;
        $data['kategori_buku'] = KategoriBuku::all();
        $data['buku'] = Buku::where('id_buku', $id)->first();

        return view($this->direktori.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->menu;

        $data['kategori_buku'] = KategoriBuku::all();
        $data['buku'] = Buku::where('id_buku', $id)->first();

        return view($this->direktori.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $judul = $request->judul;
        $cover = $request->cover;
        $penulis = $request->penulis;
        $penerbit = $request->penerbit;
        $tahun_terbit = $request->tahun_terbit;
        $stok = $request->stok;
        $kategori_id = $request->kategori_id;

        if (empty($judul)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Judul Harus diisi');
        }
        if (empty($cover)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom cover Harus diisi');
        }
        if (empty($penulis)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom penulis Harus diisi');
        }
        if (empty($penerbit)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom penerbit Harus diisi');
        }
        if (empty($tahun_terbit)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom tahun terbit Harus diisi');
        }
        if (empty($stok)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom stok Harus diisi');
        }
        if (empty($kategori_id)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom kategori Harus diisi');
        }

        $buku = Buku::where('id_buku', $id)->first();
        $buku->judul = $judul;

        if (isset($cover)) {
            if (!empty($cover) && $cover != '0'){
                if (!empty($buku) && $buku->cover != ''){
                    $path = "template-admin/dist/assets/img/buku/" . $buku->cover;
                    if (file_exists($path)){
                        unlink($path);
                    }
                }

                $nama_foto = str_replace([' ', '/'], '-', $judul);
                $ext_foto = $cover->getClientOriginalExtension();
                $filename = $nama_foto . "-" . date('Ymdhis'). "." . $ext_foto;
                $temp_foto = 'template-admin/dist/assets/img/buku';
                $proses = $cover->move($temp_foto, $filename);

                $buku->cover = $filename;
            }
        }

        $buku->penulis = $penulis;
        $buku->penerbit = $penerbit;
        $buku->tahun_terbit = $tahun_terbit;
        $buku->stok = $stok;
        $buku->kategori_id = $kategori_id;
        $buku->save();

        if ($buku){
            $request->session()->flash('success', 'Berhasil Mengubah Data');
            return redirect()->route('buku');
        } else {
            $request->session()->flash('error', 'Gagal Mengubah Data');
                    return redirect()->route('bukuEdit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $buku = buku::where('id_buku', $id)->first();
        if (!empty($buku)) {
           if ($buku->cover != ''){
            $path = "template-admin/dist/assets/img/buku/" . $buku->cover;
            if (file_exists($path)){
                unlink($path);
            }
           }
           $buku->delete();

           $request->session()->flash('success', 'Berhasil Menghapus Data');
           return redirect()->route('buku');
        } else {
            $request->session()->flash('error', 'Gagal Menghapus Data');
                    return redirect()->route('buku');
        }
    }
}
