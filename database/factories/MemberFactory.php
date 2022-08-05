<?php

namespace Database\Factories;

use App\Models\Member;
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
        $member = Member::first();
        $createdDate = $member->created_at->copy()->addMonths(mt_rand(1, 9))->addDays(mt_rand(1, 6))->addHours(mt_rand(1, 23))->toDateTimeString();

        return [
            'nama'       => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'alamat'     => $this->faker->address(),
            'gender'     => $this->faker->randomElement(['pria', 'wanita']),
            'no_hp'      => '6289524432340',
            'job'        => $this->faker->randomElement(['Mahasiswa', 'IRT', 'Wiraswasta']),
            'foto'       => NULL,
            'created_at' => $createdDate
            // 'harga'          => '40000',
            // 'tipe_member'    => $this->faker->randomElement(['harian', 'tetap']),
            // 'jenis_member'   => $this->faker->randomElement(['gym', 'cardio']),
            // 'tanggal_daftar' => '2022-05-12',
            // 'masa_tenggang'  => '2022-06-08'
        ];
    }
}
