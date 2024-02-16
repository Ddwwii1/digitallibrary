<?php

namespace App\Models;

use App\Models\KategoriBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    public function kategori_buku(){
        return $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }
}
