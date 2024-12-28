<?php

namespace Database\Factories;

use App\Models\SantriModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SantriModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nm_santri' => $this->faker->name(),
            'tmp_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date($format='Y-m-d', $max='now'),
            'alamat'    => $this->faker->address(),
            'no_hp'     => $this->faker->phoneNumber()
        ];
    }
}
