<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->numberBetween(10000000000000000, 9999999999999999),
            'nama' => $this->faker->name(),
            'ttl' =>  $this->faker->randomElement(['Jakarta', 'Palembang', 'Bandung', 'Medan']) . ',' . $this->faker->dateTimeBetween('1990-01-01', '2015-01-01')->format('d-m-Y'),
            'jk' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'telp' => $this->faker->phoneNumber(),
            'tanggal_masuk' => $this->faker->dateTime(),
        ];
    }
}
