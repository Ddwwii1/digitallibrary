<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $judul = "Kategori Buku";
    protected $menu = "datamaster";
    protected $sub_menu = "kategori";
    protected $direktori = "admin.datamaster.kategori";

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['kategori_buku'] = KategoriBuku::orderBy('created_at', 'DESC')->get();

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

        return view($this->direktori.'.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_kategori = $request->nama_kategori;

        if (empty($nama_kategori)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom nama kategori Harus diisi');
        }

        $kategori_buku = new KategoriBuku();
        $kategori_buku->nama_kategori = $nama_kategori;
        $kategori_buku->save();

        if ($kategori_buku){
            $request->session()->flash('success', 'Berhasil Menambah Data');
            return redirect()->route('kategori');
        } else {
            $request->session()->flash('error', 'Gagal Menambah Data');
                    return redirect()->route('kategoriCreate');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_buku'] = KategoriBuku::where('id_kategori', $id)->first();
        return view($this->direktori.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_buku'] = KategoriBuku::where('id_kategori', $id)->first();
        return view($this->direktori.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_kategori = $request->nama_kategori;

        if (empty($nama_kategori)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom nama kategori Harus diisi');
        }

        $users = Users::where('id', $id)->first();
        $kategori_buku = KategoriBuku::where('id_kategori', $id)->first();
        $kategori_buku->nama_kategori = $nama_kategori;
        $kategori_buku->save();

        if ($kategori_buku){
            $request->session()->flash('success', 'Berhasil Mengubah Data');
            return redirect()->route('kategori');
        } else {
            $request->session()->flash('error', 'Gagal Mengubah Data');
                    return redirect()->route('kategoriEdit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $kategori_buku = KategoriBuku::where('id_kategori', $id)->first();
        if (!empty($kategori_buku)) {
            $kategori_buku->delete();

            if ($kategori_buku){
                $request->session()->flash('success', 'Berhasil Menghapus Data');
                return redirect()->route('kategori');
            } else {
                $request->session()->flash('error', 'Gagal Menghapus Data');
                        return redirect()->route('kategori');
            }
        }
    }
}
