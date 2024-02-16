<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected  $fillable = [
        'id_peminjaman',
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'tanggal_kembali',
        'status_peminjaman',
        'denda_tambahan',
        'denda_terlambat',
        'total_denda',
        'alasan_denda',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function stasiun(){
        return $this->hasOne(Stasiun::class, 'id_stasiun', "nama_stasiun");
    }

    public function buku(){
        return $this->hasMany(Buku::class, 'buku_id');
    }
}
