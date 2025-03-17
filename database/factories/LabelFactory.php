<?php

namespace Database\Factories;

use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LabelFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'description' => fake()->text(),
        ];
    }
}
