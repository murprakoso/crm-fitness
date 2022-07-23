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
        Pesan::insert([
            [
                'keterangan' => 'Pengingat Jatuh Tempo',
                'pesan'      => 'Halo pelanggan setia kami... salam sehat :)\r\nKami ingin memberitahukan bahwa masa aktif member anda akan segera berakhir, silahkan lakukan perpanjangan dan abaikan pesan jika sudah melakukan pembayaran. trimakasih :)'
            ],
            [
                'keterangan' => 'informasi promo 17 agustus',
                'pesan'      => 'Merdeka !!! untuk memperingati hari kemerdekaan Republik Indonesia AMgym mengadakan promo bagi member yang tanggal lahirnya pada hari kemerdekaan yaitu 17 Agustus dengan potongan harga member sebesar 50% !!! buruan daftar slot terbatass'
            ],
        ]);
    }
}
