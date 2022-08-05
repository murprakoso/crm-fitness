<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory()->count(22)->create();

        //
        // Member::insert([
        //     [
        //         'nama'   => 'HERMANSYAH',
        //         'alamat' => 'JL UJUNG PANDANG',
        //         'gender' => 'pria',
        //         'no_hp'  => '6289514793069',
        //         'job'    => 'DOSEN',
        //     ],
        //     [
        //         'nama'   => 'ARI JIDAN',
        //         'alamat' => 'CAHAYA PAL',
        //         'gender' => 'pria',
        //         'no_hp'  => '6285956132151',
        //         'job'    => 'TRAINER',
        //     ],
        //     [
        //         'nama'   => 'AGGRA',
        //         'alamat' => 'JL AMPERA',
        //         'gender' => 'wanita',
        //         'no_hp'  => '6289514793069',
        //         'job'    => 'TRAINER',
        //     ],
        //     [
        //         'nama'   => 'ALYA',
        //         'alamat' => 'JL UJUNG PANDANG',
        //         'gender' => 'wanita',
        //         'no_hp'  => '62895600008059',
        //         'job'    => 'ADMIN ALFA',
        //     ]
        // ]);
    }
}
