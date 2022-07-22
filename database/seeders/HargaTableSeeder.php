<?php

namespace Database\Seeders;

use App\Models\Harga;
use Illuminate\Database\Seeder;

class HargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Harga::insert([
            [
                'gender'     => 'pria',
                'keterangan' => 'P-Standar',
                'harga'      => '40000'
            ],
            [
                'gender'     => 'pria',
                'keterangan' => 'P-Spesial',
                'harga'      => '45000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'W-Standar',
                'harga'      => '50000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'W-Standar',
                'harga'      => '55000'
            ],
        ]);
    }
}
