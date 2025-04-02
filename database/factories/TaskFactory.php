<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */

class TaskFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'completed' => fake()->boolean()
        ];
    }
}
