<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'kode', 
        'tahun', 
        'akreditasi', 
        'berlaku', 
        'nilai', 
        'sk_akreditasi', 
        'lembaga', 
        'akreditasi_internasional', 
        'berlaku_internasional', 
        'sk_akreditasi_internasional', 
        'lembaga_internasional'
    ];

    public function akreditasi_rincian()
    {
        return $this->hasOne(Akreditasi::class, 'code', 'akreditasi');
    }
}
