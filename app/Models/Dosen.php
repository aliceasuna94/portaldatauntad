<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'kode', 'tahun', 'nidn', 'nama', 'kelamin', 'pendidikan', 'golongan', 'fungsional', 'upload'
    ];
}
