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
            // gym
            [
                'gender'     => 'pria',
                'keterangan' => 'Harian GYM',
                'harga'      => '45000'
            ],
            [
                'gender'     => 'pria',
                'keterangan' => 'Member GYM',
                'harga'      => '275000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'Harian GYM',
                'harga'      => '40000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'Member GYM',
                'harga'      => '150000'
            ],
            // cardio
            [
                'gender'     => 'pria',
                'keterangan' => 'Harian CARDIO',
                'harga'      => '55000'
            ],
            [
                'gender'     => 'pria',
                'keterangan' => 'Member CARDIO',
                'harga'      => '375000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'Harian CARDIO',
                'harga'      => '50000'
            ],
            [
                'gender'     => 'wanita',
                'keterangan' => 'Member CARDIO',
                'harga'      => '250000'
            ],
        ]);
    }
}
