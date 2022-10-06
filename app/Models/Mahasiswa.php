<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'kode_prodi',
        'tahun',
        'baru',
        'aktif',
        'nonaktif',
        'cuti',
        'lulus',
        'tepat_waktu',
        'bidikmisi',
        'tugas_akhir',
        'upload1',
        'upload2',
        'upload3',
        'upload4',
        'upload5',
        'upload6',
        'upload7',
        'upload8'
    ];
}
