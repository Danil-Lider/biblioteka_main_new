<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use Illuminate\Support\Facades\DB;

// use Database\Factories\DB;


// use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Seeder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'author_id' => DB::table('authors')->first()->id,
            // 'genre' => $this->faker->name()
        ];
    }
}
