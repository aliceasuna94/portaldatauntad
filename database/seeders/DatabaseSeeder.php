<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Activation;
use App\Models\Prodi;
use App\Models\Profil;
use App\Models\Akreditasi;
use App\Models\Faculty;
use App\Models\Dosen;
use App\Models\Pengaturan;
use App\Models\Subpengaturan;
use App\Models\Periode;
use App\Models\Mahasiswa;
use App\Models\IsianPengaturan;
use App\Models\IsianEvaluasiTambahan;
use App\Traits\ImportSpmiTrait;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     use ImportSpmiTrait;

    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProdiSeeder::class);

        //Menambahkan Aktivasi
        Activation::create(['activation' => 1]);

        //Menambahkan Akreditasi
        Akreditasi::create(['code' => 0,'name' => 'Tidak Terakreditasi','singkatan' => '0',]); 
        Akreditasi::create(['code' => 1, 'name' => 'Terakreditasi A', 'singkatan' => 'A', ]); 
        Akreditasi::create(['code' => 2, 'name' => 'Terakreditasi B', 'singkatan' => 'B', ]); 
        Akreditasi::create(['code' => 3, 'name' => 'Terakreditasi C', 'singkatan' => 'C', ]);

        //Menambahkan Fakultas
        Faculty::create([ 'code' => 1, 'name' => 'Keguruan dan Ilmu Pendidikan', 'singkatan' => 'FKIP', ]); Faculty::create([ 'code' => 2, 'name' => 'Ilmu Sosial dan Ilmu Politik', 'singkatan' => 'FISIP', ]); Faculty::create([ 'code' => 3, 'name' => 'Ekonomi', 'singkatan' => 'FEKON', ]);
        Faculty::create([ 'code' => 4, 'name' => 'Hukum', 'singkatan' => 'FAKUM', ]); 
        Faculty::create([ 'code' => 5, 'name' => 'Pertanian', 'singkatan' => 'FAPERTA', ]); 
        Faculty::create([ 'code' => 6, 'name' => 'Teknik', 'singkatan' => 'FATEK', ]); 
        Faculty::create([ 'code' => 7, 'name' => 'Matematika dan Ilmu Pengetahuan Alam', 'singkatan' => 'FMIPA', ]); Faculty::create([ 'code' => 8, 'name' => 'Kehutanan', 'singkatan' => 'FAHUT', ]); 
        Faculty::create([ 'code' => 9, 'name' => 'Kedokteran', 'singkatan' => 'FK', ]); 
        Faculty::create([ 'code' => 10, 'name' => 'Peternakan dan Perikanan', 'singkatan' => 'FAPETKAN', ]); Faculty::create([ 'code' => 11, 'name' => 'Kesehatan Masyarakat', 'singkatan' => 'FKM', ]); 
        Faculty::create([ 'code' => 12, 'name' => 'Pasca Sarjana', 'singkatan' => 'PASCASARJANA', ]); 
        Faculty::create([ 'code' => 13, 'name' => 'PSDKU Morowali', 'singkatan' => 'PSDKU MOROWALI', ]); 
        Faculty::create([ 'code' => 14, 'name' => 'PSDKU Tojo Una-Una', 'singkatan' => 'PSDKU TOUNA', ]);

        //Menambakan Dosen
        Dosen::create([
            'kode' => 44201, 
            'tahun' => 2022, 
            'nidn' => 1234567890, 
            'nama' => 'Resnawati', 
            'kelamin' => false, 
            'pendidikan' => 2, 
            'golongan' => 'III/D', 
            'fungsional' => 2, 
            'upload' => 'public/73929372.PDF'
        ]);

        //Menambahkan Profil
        Profil::create([
            'kode' => 44201,
            'tahun' => 2022,
            'akreditasi' => 1,
            'berlaku' => '2027-07-12',
            'nilai' => 300,
            'sk_akreditasi' => 'file-uploads/89289.PDF',
            'lembaga' => 'BAN-PT', 
            'akreditasi_internasional' => 0, 
            'berlaku_internasional' => '2027-07-12', 
            'sk_akreditasi_internasional' => 'public/89287.PDF', 
            'lembaga_internasional' => 'Googles'
        ]);

        //Menambahkan Periode
        Periode::create(['tahun'=>2020, 'status'=>0]);
        Periode::create(['tahun'=>2021, 'status'=>0]);
        $tahun = Periode::create(['tahun'=>2022, 'status'=>1]);

        //Menambahkan Pengaturan dan Subpengaturan
        $this->buatPengaturanSubPengaturan($tahun->tahun);

        //Menambahkan Jumlah Mahasiswa
        Mahasiswa::create([
            'kode_prodi' => 44201,
            'tahun' => 2022
        ]);

        //Menambahkan Isian Pengaturan
        IsianPengaturan::create([
            'subpengaturan_id' => 1,
            'kode_prodi' => 44201,
            'tahun' => 2022,
            'verifikasi' => 0,
            'jawaban' => 1,
            'tanggal' => '2022-07-26'
        ]);

        //Menambahkan Isian Evaluasi Tambahan
        IsianEvaluasiTambahan::create([
            'subpengaturan_id' => 1,
            'kode_prodi' => 44201,
            'tahun' => 2022,
            'verifikasi' => 0,
            'judul' => 'Pekerjaan Lapangan',
            'tanggal' => '2022-07-21'
        ]);

    }
}
