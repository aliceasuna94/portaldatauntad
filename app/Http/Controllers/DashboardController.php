<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Traits\StatusPeriodeTrait;

class DashboardController extends Controller
{
    use StatusPeriodeTrait;

    public function index()
    {
        //Cek periode
        $periode = $this->cekperiode();
        if ($periode == false) {abort(403, "Periode Tidak Ditemukan");}

        $mahasiswa = [];
        $dosen = [];

        $mahasiswa = Mahasiswa::whereTahun($periode)->get();
        $collection = collect([
            'baru' => $mahasiswa->sum('baru') ?? 0,
            'aktif' => $mahasiswa->sum('aktif') ?? 0,
            'nonaktif' => $mahasiswa->sum('nonaktif') ?? 0,
            'cuti' => $mahasiswa->sum('cuti') ?? 0,
            'lulus' => $mahasiswa->sum('lulus') ?? 0,
            'tepat_waktu' => $mahasiswa->sum('tepat_waktu') ?? 0,
            'bidikmisi' => $mahasiswa->sum('bidikmisi') ?? 0,
            'tugas_akhir' => $mahasiswa->sum('tugas_akhir') ?? 0,
        ]);
        $mahasiswa = $collection->all();

        $dosen = Dosen::whereTahun($periode)->get();
        $collection = collect([
            'jumlah' => $dosen->count(),
            'magister' => $dosen->where('pendidikan', 2)->count(),
            'doctoral' => $dosen->where('pendidikan', 3)->count(),
            'profesor' => $dosen->where('pendidikan', 4)->count(),
        ]);
        $dosen = $collection->all();

        //Return Halaman Dashboard
        return view('admin.dashboard.index', ['mahasiswa'=>$mahasiswa, 'dosen'=> $dosen, 'periode'=>$periode]);
    }
}
