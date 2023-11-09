<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('authors')->insert([
            'name' => 'Danil'
        ]);

        DB::table('authors')->insert([
            'name' => 'Alex'
        ]);

        Item::factory()->count(5)->create();
        // Item::factory()->count(5)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}