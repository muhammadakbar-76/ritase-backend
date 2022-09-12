<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ritase>
 */
class RitaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ritase_date' => fake()->date(),
            'ritase_time' => fake()->time(),
            'ritase_material' => fake()->word(),
            'ritase_kategori' => fake()->word(),
            'ritase_keterangan' => fake()->paragraph(),
            'kode_unit' => fake()->numberBetween(1, 5)
        ];
    }
}
