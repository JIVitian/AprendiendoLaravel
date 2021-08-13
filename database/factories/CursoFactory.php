<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(), // One sentence
            'description' => $this->faker->paragraph(),  // Text
            'category' => $this->faker->randomElement(['Desarrollo web', 'Diseño Web']) // Random element of an array
        ];
    }
}
