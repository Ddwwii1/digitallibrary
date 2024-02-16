<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $judul = "Petugas";
    protected $menu = "datamaster";
    protected $sub_menu = "petugas";
    protected $direktori = "admin.datamaster.petugas";

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['users'] = Users::where('level_user', 'Petugas')->get();

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
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $nama_lengkap = $request->nama_lengkap;
        $alamat = $request->alamat;

        if (empty($username)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom username Harus diisi');
        }
        if (empty($email)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom email Harus diisi');
        }
        if (empty($password)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom password Harus diisi');
        }
        if (empty($nama_lengkap)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom nama lengkap Harus diisi');
        }
        if (empty($alamat)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom alamat Harus diisi');
        }

        $users = new Users();
        $users->username = $username;
        $users->email = $email;
        $users->password = Hash::make($password);
        $users->nama_lengkap = $nama_lengkap;
        $users->level_user = 'Petugas';
        $users->alamat = $alamat;
        $users->save();

        if ($users){
            $request->session()->flash('success', 'Berhasil Menambah Data');
            return redirect()->route('users');
        } else {
            $request->session()->flash('error', 'Gagal Menambah Data');
                    return redirect()->route('userCreate');
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

        $data['users'] = Users::where('id', $id)->first();
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

        $data['users'] = Users::where('id', $id)->first();
        return view($this->direktori.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $nama_lengkap = $request->nama_lengkap;
        $alamat = $request->alamat;

        if (empty($username)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom username Harus diisi');
        }
        if (empty($email)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom email Harus diisi');
        }
        if (empty($password)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom password Harus diisi');
        }
        if (empty($nama_lengkap)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom nama lengkap Harus diisi');
        }
        if (empty($alamat)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom alamat Harus diisi');
        }
        $cek_username = Users::where('username', $username)->where('id', '!=', $id)->first();
        $cek_email = Users::where('email', $email)->where('id', '!=', $id)->first();

        if (!empty($cek_username)){
            return back()->withInput()->with('message', 'Username Sudah terdaftar di Sistem');
        }
        if (!empty($cek_email)){
            return back()->withInput()->with('status', 'error')->with('message', 'Email Sudah Terdaftar di sistem');
        }

        $users = Users::where('id', $id)->first();
        $users->username = $username;
        $users->email = $email;
        $users->email = $email;
        if (!empty($password)){
            $users->password = Hash::make($password);
        }        $users->nama_lengkap = $nama_lengkap;
        $users->level_user = 'Petugas';
        $users->alamat = $alamat;
        $users->save();

        if ($users){
            $request->session()->flash('success', 'Berhasil Mengubah Data');
            return redirect()->route('users');
        } else {
            $request->session()->flash('error', 'Gagal Mengubah Data');
                    return redirect()->route('usersEdit');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $users = Users::where('id', $id)->first();
        if (!empty($users)) {
            $users->delete();

            if ($users){
                $request->session()->flash('success', 'Berhasil Menghapus Data');
                return redirect()->route('users');
            } else {
                $request->session()->flash('error', 'Gagal Menghapus Data');
                        return redirect()->route('users');
            }
        }
    }
}
