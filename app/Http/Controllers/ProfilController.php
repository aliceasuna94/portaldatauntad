<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Traits\ProfilTrait;
use App\Traits\StatusPeriodeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    use StatusPeriodeTrait;
    use ProfilTrait;

    public function index()
    {
        //Permission Role Set
        $this->authorize('view profil');
        
        $periode = $this->cekperiode();

        if ($periode == false) {abort(403, "Periode Tidak Ditemukan");}

        $profil = auth()->user()->prodi->profil->first();

        return view('admin.profil.profil', ['profil' => $profil]);
    }

    public function store(Request $request)
    {
        //Permission Role Set
        $this->authorize('input profil');

        $rules = [
            'akreditasi' => 'nullable|integer',
            'berlaku' => 'nullable|date_format:Y-m-d',
            'nilai' => 'nullable|integer',
            'sk_akreditasi' => 'nullable|max:10000|mimes:pdf',
            'lembaga' => 'nullable|string|max:50',
            'akreditasi_internasional' => 'nullable|boolean',
            'berlaku_internasional' => 'nullable|date_format:Y-m-d',
            'sk_akreditasi_internasional' => 'nullable|max:10000|mimes:pdf',
            'lembaga_internasional' => 'nullable|string|max:50',
        ];

        $validasi = $request->validate($rules);

        //Cek periode dan Prodi
        $kodeprodi = auth()->user()->prodi['kode'];
        $periode = $this->cekperiode();

        //Cek apakah profil sudah ada
        $profil = Profil::whereTahun($periode)->where('kode', $kodeprodi)->first();

        if (!$profil) {
            $validasi['kode'] = $kodeprodi;
            $validasi['tahun'] = $periode;
            DB::transaction(function () use ($validasi, $request) {
                $validasi = $this->uploadDokumen($validasi, $request);
                Profil::create($validasi);
            });

        }else {
            DB::transaction(function () use ($profil, $validasi, $request) {
                $validasi = $this->hapusUploadProfil($profil, $request, $validasi);
                $validasi = $this->uploadDokumen($validasi, $request);
                $profil->update($validasi); 
            }); 
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbaharui.');
    }
}
