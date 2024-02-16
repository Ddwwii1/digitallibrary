<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->Middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        return view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        //dd($request->all());

        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        if (empty($email)){
            return redirect()->route('login');
        }
        if (empty($password)){
            return redirect()->route('login');
        }

        $users = Users::where('email', $email)->first();

        if(!empty($users)){
            $data = [
                'email' => $users->email,
                'password' => $password
            ];

            if (Auth::attempt($data)) {
                if($users->level_user == 'Admin' || 'Petugas'){
                    // $request->session()->regenerate();
                    $request->session()->regenerate();
                    $request->session()->flash('success', 'Selamat Datang ' . $users->nama_lengkap);
                    return redirect()->route('dashboard');
                }
            } else {
                $request->session()->flash('error', 'Anda Sedang Bermasalah! ');
                return redirect()->route('login');
            }
        } else {
            $request->session()->flash('error', 'Anda Sedang Bermasalah! ');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session_start();
        session_destroy();

       $request ->session()->flash('success', 'Berhasil Logout');
        return redirect()->route('login');
    }
}
