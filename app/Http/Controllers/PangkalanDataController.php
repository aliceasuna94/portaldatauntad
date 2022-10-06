<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Traits\PangkalanDataTrait;
use App\Traits\StatusPeriodeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PangkalanDataController extends Controller
{
    use StatusPeriodeTrait;
    use PangkalanDataTrait;

    public function index()
    {
        //Permission Role Set
        $this->authorize('view pangkalan data');

        //Cek periode dan Prodi
        $kodeprodi = auth()->user()->prodi['kode'];
        $periode = $this->cekperiode();

        if ($periode == false) {abort(403, "Periode Tidak Ditemukan");}

        $mahasiswa = Mahasiswa::whereTahun($periode)->whereKodeProdi($kodeprodi)->first();

        $dosen = Dosen::whereTahun($periode)->whereKode($kodeprodi)->get();

        return view('admin.profil.data', ['mahasiswa'=>$mahasiswa, 'dosen'=>$dosen]);
        
    }

    public function store(Request $request)
    {
        //Permission Role Set
        $this->authorize('view pangkalan data');
        
        $rules = [
            'baru' => 'nullable|integer|max:10000',
            'aktif' => 'nullable|integer|max:10000',
            'nonaktif' => 'nullable|integer|max:10000',
            'cuti' => 'nullable|integer|max:10000',
            'lulus' => 'nullable|integer|max:10000',
            'tepat_waktu' => 'nullable|integer|max:10000',
            'bidikmisi' => 'nullable|integer|max:10000',
            'tugas_akhir' => 'nullable|integer|max:10000',
        ];

        $validasi = $request->validate($rules);

        //Cek periode dan Prodi
        $kodeprodi = auth()->user()->prodi['kode'];
        $periode = $this->cekperiode();

        $mahasiswa = Mahasiswa::whereTahun($periode)->whereKodeProdi($kodeprodi)->first();

        if (!$mahasiswa) {
            $validasi['tahun'] = $periode;
            $validasi['kode_prodi'] = $kodeprodi;

            DB::transaction(function () use ($validasi,$request,$mahasiswa) {
                $validasi = $this->uploadMahasiswaDokumen($validasi, $request, $mahasiswa);
                Mahasiswa::create($validasi);
            });
        } else {
            DB::transaction(function () use ($validasi,$request,$mahasiswa){
                $validasi = $this->uploadMahasiswaDokumen($validasi, $request, $mahasiswa);
                $mahasiswa->update($validasi);
            }); 
        }
        
        return redirect()->back()->with('success', 'Berhasil menyimpan data.');
    }

    public function storeDosen(Request $request)
    {
        //Permission Role Set
        $this->authorize('view pangkalan data');

        $rules = [
            'nidn' => 'required|numeric|digits_between:5,12|unique:dosens,nidn',
            'nama' => 'required|string|max:50',
            'kelamin' => 'required|boolean',
            'pendidikan' => 'required|integer',
            'golongan' => 'required|string|max:5',
            'fungsional' => 'required|integer|max:10',
            'upload' => 'required|max:10000|mimes:pdf',
        ];

        $validasi = $request->validate($rules);

        //Cek periode dan Prodi
        $kodeprodi = auth()->user()->prodi['kode'];
        $periode = $this->cekperiode();

        $validasi['tahun'] = $periode;
        $validasi['kode'] = $kodeprodi;

        DB::transaction(function () use ($validasi, $request){
            $validasi = $this->uploadSkDosen($validasi, $request);
            Dosen::create($validasi);
        });
        
        return redirect()->back()->with('success', 'Berhasil menambahkan dosen.');

    }

    public function destroyDosen(Request $request)
    {
        //Permission Role Set
        $this->authorize('view pangkalan data');

        $rules = ['id' => 'required|integer'];

        $validasi = $request->validate($rules);

        //Cek periode dan Prodi
        $kodeprodi = auth()->user()->prodi['kode'];
        $periode = $this->cekperiode();

        $data = Dosen::whereId($request->id)->whereKode($kodeprodi)->whereTahun($periode)->first();

        DB::transaction(function () use ($data){
            if ($data->upload ?? null) {
                Storage::delete($data->upload);
            }
            $data->delete();
        });
        
        return redirect()->back()->with('success', 'Berhasil menghapus dosen.');

    }
}
