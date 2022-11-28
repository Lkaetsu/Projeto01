<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Professor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'desc_simpl' => $this->faker->sentence,
            'desc' => $this->faker->paragraph,
            'num_min' =>$this->faker->randomDigitNotZero,
            'num_max' =>$this->faker->numberBetween($min=10, $max=50),
            'professor_id' =>Professor::factory(),
        ];
    }
}
