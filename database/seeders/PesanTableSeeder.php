<?php

namespace Database\Seeders;

use App\Models\Pesan;
use Illuminate\Database\Seeder;

class PesanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesan::create([
            'keterangan' => 'Pengingat',
            'pesan'      => 'Ada sedang berada dalam masa tenggang'
        ]);
    }
}
