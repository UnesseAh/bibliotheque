<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker('name'),
            'last_name' => $this->faker('lastname'),
            'image' => $this->faker('image'),
            'age' => $this->faker('age'),
            'table' => $this->faker('country'),
        ];
    }
}
