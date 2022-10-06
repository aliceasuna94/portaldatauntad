<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Menambahkan Admin
        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'adminuntad',
            'password' => bcrypt('password'),
            'role' => 1,
            'account' => 0,
            'fakultas' => 0
        ]);
        $admin->assignRole('admin');
        $admin->givePermissionTo('view kelola user');
        $admin->givePermissionTo('view kelola prodi');
        $admin->givePermissionTo('view kelola spmi');
        $admin->givePermissionTo('view kelola periode');
        $admin->givePermissionTo('view kelola validasi');
        $admin->givePermissionTo('tambah user');
        $admin->givePermissionTo('hapus user');
        $admin->givePermissionTo('edit user');
        $admin->givePermissionTo('tambah prodi');
        $admin->givePermissionTo('hapus prodi');
        $admin->givePermissionTo('edit prodi');
        $admin->givePermissionTo('ubah aktivasi');
        $admin->givePermissionTo('ubah periode aktif');
        $admin->givePermissionTo('tambah periode');
        $admin->givePermissionTo('view rincian validasi');
        $admin->givePermissionTo('konfirmasi validasi');

        //Menambahkan Universitas
        $universitas = User::create([
            'name' => 'Universitas Tadulako',
            'username' => 'universitas',
            'password' => bcrypt('password'),
            'role' => 2,
            'account' => 5,
            'fakultas' => 0
        ]);
        $universitas->assignRole('universitas');
        $universitas->givePermissionTo('view spmi');
        $universitas->givePermissionTo('input spmi');
        $universitas->givePermissionTo('input spmi tambahan');
        $universitas->givePermissionTo('view program studi');
        $universitas->givePermissionTo('akreditasi');
        $universitas->givePermissionTo('view rincian validasi');

        //Menambahkan Rektor
        $rektor = User::create([
            'name' => 'Rektor',
            'username' => 'rektoruntad',
            'password' => bcrypt('password'),
            'role' => 3,
            'account' => 0,
            'fakultas' => 0
        ]);
        $rektor->assignRole('rektor');
        $rektor->givePermissionTo('view program studi');
        $rektor->givePermissionTo('akreditasi');
        $rektor->givePermissionTo('view rincian validasi');

        //Menambahkan Dekan
        $dekan = User::create([
            'name' => 'Dekan FMIPA',
            'username' => 'dekanfmipa',
            'password' => bcrypt('password'),
            'role' => 4,
            'account' => 0,
            'fakultas' => 7
        ]);
        $dekan->assignRole('dekan');
        $dekan->givePermissionTo('view program studi');
        $dekan->givePermissionTo('akreditasi');
        $dekan->givePermissionTo('view rincian validasi');

        //Menambahkan Prodi
        $data = [
            [
                'name' => 'matematika',
                'username' => 'matematikamipa',
                'password' => bcrypt('password'),
                'role' => 5,
                'account' => 1,
                'fakultas' => 7
            ],
            [
                'name' => 'statistika',
                'username' => 'statistikamipa',
                'password' => bcrypt('password'),
                'role' => 5,
                'account' => 2,
                'fakultas' => 7
            ],
            [
                'name' => 'farmasi',
                'username' => 'farmasimipa',
                'password' => bcrypt('password'),
                'role' => 5,
                'account' => 3,
                'fakultas' => 7
            ],
            [
                'name' => 'ilmuhukum',
                'username' => 'ilmuhukum',
                'password' => bcrypt('password'),
                'role' => 5,
                'account' => 4,
                'fakultas' => 4
            ],

        ];

        foreach ($data as $d) {
            $prodi = User::create($d);
            $prodi->assignRole('prodi');
            $prodi->givePermissionTo('view spmi');
            $prodi->givePermissionTo('input spmi');
            $prodi->givePermissionTo('input spmi tambahan');
            $prodi->givePermissionTo('view profil');
            $prodi->givePermissionTo('view pangkalan data');
            $prodi->givePermissionTo('input profil');
            $prodi->givePermissionTo('input mahasiswa');
            $prodi->givePermissionTo('input dosen');
        }

    }
}
