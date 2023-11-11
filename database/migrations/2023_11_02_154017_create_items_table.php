<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
           
            $table->string('name');
            // $table->string('author');


            if (Schema::hasTable('authors')) {
                $table->foreignId('author_id')
                ->references('id')
                ->on('authors') 
                ->cascadeOnDelete();
            }
          

            // $table->string('genre'); // жанрw
            $table->boolean('is_available')->nullable(); // зарезервировано
            // $table->boolean('reserve')->nullable(); // зарезервировано
            // $table->boolean('book_is_given')->nullable(); // книга выдана 



            $table->unsignedBigInteger('user_id')->nullable(); // кем зарезервирована, выдана  


          

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict'); // связь с бд Пользователи


            $table->date('reserve_start')->nullable();
            $table->date('reserve_end')->nullable();



            $table->timestamps();
            // genre жанр
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
