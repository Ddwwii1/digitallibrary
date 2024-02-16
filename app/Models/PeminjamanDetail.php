<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
