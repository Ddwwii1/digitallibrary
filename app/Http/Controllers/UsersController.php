<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $judul = "Peminjam";
    protected $menu = "datamaster";
    protected $sub_menu = "peminjam";
    protected $direktori = "admin.datamaster.peminjam";

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['users'] = Users::where('level_user', 'Peminjam')->get();

        return view($this->direktori.'.main', $data);
    }

    public function destroy(Request $request, string $id)
    {
        $users = Users::where('id', $id)->first();
        if (!empty($users)) {
            $users->delete();

            if ($users){
                $request->session()->flash('success', 'Berhasil Menghapus Data');
                return redirect()->route('peminjam');
            } else {
                $request->session()->flash('error', 'Gagal Menghapus Data');
                        return redirect()->route('peminjam');
            }
        }
    }
}
