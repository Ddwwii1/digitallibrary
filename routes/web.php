<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\User\AuthUserController as AuthUserController;
use App\Http\Controllers\User\UserDashboardController as UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return redirect()->route('userDashboard');
});
Route::get('/dashboard', [UserDashboardController::class, 'main'])->name('userDashboard');
Route::get('/Userlogin', [AuthUserController::class, 'Userlogin'])->name('Userlogin');
Route::post('/UserpostLogin', [AuthUserController::class, 'UserpostLogin'])->name('UserpostLogin');
Route::get('/Userregister', [AuthUserController::class, 'Userregister'])->name('Userregister');
Route::post('/UserpostRegister', [AuthUserController::class, 'UserpostRegister'])->name('UserpostRegister');
Route::get('/Userlogout', [AuthUserController::class, 'Userlogout'])->name('Userlogout');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function (){
        return redirect()
->route('dashboard');
});

    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth']], function (){
        Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');

        Route::group(['prefix' => 'datamaster'], function (){
           Route::group(['middleware' => ['admin']], function (){
               Route::group(['prefix' => 'users'], function (){
                   Route::get('/', [PetugasController::class, 'index'])->name('users');
                   Route::get('/create', [PetugasController::class, 'create'])->name('usersCreate');
                   Route::post('/store', [PetugasController::class, 'store'])->name('usersStore');
                   Route::get('/show{id}', [PetugasController::class, 'show'])->name('usersShow');
                   Route::get('/edit{id}', [PetugasController::class, 'edit'])->name('usersEdit');
                   Route::post('/update{id}', [PetugasController::class, 'update'])->name('usersUpdate');
                   Route::get('/delete{id}', [PetugasController::class, 'destroy'])->name('usersDelete');

               });
           });

           Route::group(['prefix' => 'peminjam'], function (){
            Route::get('/', [UsersController::class, 'index'])->name('peminjam');
            Route::get('/delete{id}', [UsersController::class, 'destroy'])->name('peminjamDelete');
            });

            Route::group(['prefix' => 'kategori'], function (){
                Route::get('/', [KategoriBukuController::class, 'index'])->name('kategori');
                Route::get('/create', [KategoriBukuController::class, 'create'])->name('kategoriCreate');
                Route::post('/store', [KategoriBukuController::class, 'store'])->name('kategoriStore');
                Route::get('/show{id}', [KategoriBukuController::class, 'show'])->name('kategoriShow');
                Route::get('/edit{id}', [KategoriBukuController::class, 'edit'])->name('kategoriEdit');
                Route::post('/update{id}', [KategoriBukuController::class, 'update'])->name('kategoriUpdate');
                Route::get('/delete{id}', [KategoriBukuController::class, 'destroy'])->name('kategoriDelete');

            });

            Route::group(['prefix' => 'buku'], function (){
                Route::get('/', [BukuController::class, 'index'])->name('buku');
                Route::get('/create', [BukuController::class, 'create'])->name('bukuCreate');
                Route::post('/store', [BukuController::class, 'store'])->name('bukuStore');
                Route::get('/show{id}', [BukuController::class, 'show'])->name('bukuShow');
                Route::get('/edit{id}', [BukuController::class, 'edit'])->name('bukuEdit');
                Route::post('/update{id}', [BukuController::class, 'update'])->name('bukuUpdate');
                Route::get('/delete{id}', [BukuController::class, 'destroy'])->name('bukuDelete');

            });

            Route::group(['prefix' => 'peminjaman'], function () {
                Route::get('/dipinjam', [PeminjamanController::class, 'dipinjam'])->name('dipinjam');
                Route::get('/selesai', [PeminjamanController::class, 'selesai'])->name('selesai');
                Route::post('/ubah_status/{id}', [PeminjamanController::class, 'ubah_status'])->name('ubah_status');
                Route::get('showPeminjaman/{id}', [PeminjamanController::class, 'showPeminjaman'])->name('showPeminjaman');
            });

            Route::group(['prefix' => 'laporan'], function () {
                Route::get('/', [PeminjamanDetailController::class, 'main'])->name('laporan');
            });

        });

    });
});
