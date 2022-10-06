<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'matematika',
                'kode' => 44201,
                'fakultas' => 7,
                'jenjang' => 'S1'
            ],
            [
                'nama' => 'statistika',
                'kode' => 44202,
                'fakultas' => 7,
                'jenjang' => 'S1'
            ],
            [
                'nama' => 'farmasi',
                'kode' => 49201,
                'fakultas' => 7,
                'jenjang' => 'S1'
            ],
            [
                'nama' => 'ilmu hukum',
                'kode' => 74201,
                'fakultas' => 4,
                'jenjang' => 'S1'
            ],
            [
                'nama' => 'universitas tadulako',
                'kode' => 999999,
                'fakultas' => 0,
                'jenjang' => ''
            ],
        ];

        foreach ($data as $item) {
            Prodi::create($item);
        }
    }
}
