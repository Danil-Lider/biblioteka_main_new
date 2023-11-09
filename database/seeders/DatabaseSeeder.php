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




        DB::table('genres')->insert([
            'name' => 'Комедия'
        ]);

        DB::table('genres')->insert([
            'name' => 'Ужасы'
        ]);




        DB::table('genre_item')->insert([
            'item_id' => 1,
            'genre_id' => 1
        ]);

        DB::table('genre_item')->insert([
            'item_id' => 1,
            'genre_id' => 2
        ]);

        DB::table('genre_item')->insert([
            'item_id' => 2,
            'genre_id' => 1
        ]);

        DB::table('genre_item')->insert([
            'item_id' => 3,
            'genre_id' => 2
        ]);






        // Item::factory()->count(5)->create();

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'test@mail.ru',
            'password' => Hash::make('test'),
        ]);
    }
}
