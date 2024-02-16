<?php

namespace App\Http\Controllers\User;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{

    public function Userlogin(Request $request)
    {
        return view('user.auth.login');
    }
    public function UserpostLogin(Request $request)
    {
        // return $request->all();

        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        if (empty($email)){
            return redirect()->route('Userlogin');
        }
        if (empty($password)){
            return redirect()->route('Userlogin');
        }

        $users = Users::where('email', $email)->first();

        if(!empty($users)){
            $data = [
                'email' => $users->email,
                'password' => $password
            ];

            if (Auth::attempt($data)) {
                if($users->level_user == 'Peminjam'){
                    $request->session()->flash('success', 'Selamat Datang ' . $users->nama_lengkap);
                    return redirect()->route('userDashboard');
                }
            } else {
                $request->session()->flash('error', 'Akun Tidak Terdaftar atau Password Salah! ');
                return redirect()->route('Userlogin');
            }
        } else {
            $request->session()->flash('error', 'Akun Tidak Terdaftar atau Password Salah! ');
            return redirect()->route('Userlogin');
        }
    }

    public function Userregister(Request $request)
    {
        return view('user.auth.register');
    }

    public function UserpostRegister(Request $request)
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
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Nama Lengkap Harus diisi');
        }
        if (empty($alamat)){
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Alamat Harus diisi');
        }


        $users = new Users();
        $users->username = $username;
        $users->email = $email;
        $users->password = Hash::make($password);
        $users->nama_lengkap = $nama_lengkap;
        $users->level_user = 'Peminjam';
        $users->alamat = $alamat;
        $users->save();

        if ($users){
            $request->session()->flash('success', 'Berhasil Register, silahkan Login!');
            return redirect()->route('Userlogin');
        } else {
            $request->session()->flash('error', 'Gagal Register, coba lagi!');
                    return redirect()->route('Userregister');
        }
    }

    public function Userlogout()
    {
        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('userDashboard')->with('status', 'success')->with('message', 'Berhasil logout');
    }


}
