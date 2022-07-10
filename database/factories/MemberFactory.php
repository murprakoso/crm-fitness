<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'   => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['pria', 'wanita']),
            'no_hp'  => '6289524432340',
            'job'    => $this->faker->randomElement(['Mahasiswa', 'ASN', 'Wiraswasta']),
            'foto'   => NULL
            // 'harga'          => '40000',
            // 'tipe_member'    => $this->faker->randomElement(['harian', 'tetap']),
            // 'jenis_member'   => $this->faker->randomElement(['gym', 'cardio']),
            // 'tanggal_daftar' => '2022-05-12',
            // 'masa_tenggang'  => '2022-06-08'
        ];
    }
}
