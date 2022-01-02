<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id' => User::all('id')->random()->id,
            'slug' => $this->faker->unique()->word,
            'name' => $this->faker->sentence(3,true),
            'description' => $this->faker->sentence(20,true),
            'text' => $this->faker->realText(),
            'release'=>'1'
        ];
    }
}
