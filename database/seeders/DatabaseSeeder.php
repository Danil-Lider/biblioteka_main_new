<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // $this->call(BookSeeder::class);
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(AdminItemsTableSeeder::class);
        $this->call(AdminOrderItemsTableSeeder::class);
        $this->call(AdminGenresAuthorsTableSeeder::class);



        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('123'),
            'role_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'bibliotekar',
            'email' => 'bibliotekar@example.com',
            'password' => bcrypt('123'),
            'role_id' => 3,
        ]);


        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'test@mail.ru',
            // 'role_id' => 1,
            'password' => Hash::make('test'),
        ]);


        DB::table('authors')->insert([
            'name' => 'Danil'
        ]);

        DB::table('authors')->insert([
            'name' => 'Alex'
        ]);


        Item::factory()->count(300)->create();


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


    }
}
