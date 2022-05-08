<?php

namespace Database\Factories;

use App\Models\Spp;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class SppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    //    $nomor =  Spp::latest()->first();
        return [
            'nomor_pembayaran' => 1 ,
            'nik_murid' => Student::factory(),
            'pembayaran_ke' => $this->faker->numberBetween(1,100),
            'jumlah' => $this->faker->randomElement([250000, 500000, 1000000]),
            'status' => $this->faker->randomElement(['LUNAS', 'BELUM LUNAS']),
            'tanggal_bayar' =>
            $this->faker->dateTimeBetween('2020-01-01', '2022-12-30'),
        ];
    }
}
