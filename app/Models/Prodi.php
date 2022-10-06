<?php

namespace App\Models;

use App\Traits\StatusPeriodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use StatusPeriodeTrait;

    protected $fillable = [
        'nama', 'kode', 'fakultas', 'jenjang'
    ];

    public function profil()
    {
        //Cek periode
        $periode = $this->cekperiode();
        if ($periode == false) {abort(403, "Periode Tidak Ditemukan");}

        return $this->hasMany(Profil::class, 'kode', 'kode')->where('tahun',$periode)->with('akreditasi_rincian');
    }

    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'code', 'fakultas');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'account');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kode_prodi', 'kode');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'kode', 'kode');
    }

    public function isian()
    {
        return $this->hasMany(IsianPengaturan::class, 'kode_prodi', 'kode');
    }
}
