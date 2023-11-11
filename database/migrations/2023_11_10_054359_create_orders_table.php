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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id'); // кем зарезервирована, выдана  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict'); // связь с бд Пользователи
            
            $table->foreignId('item_id')->references('id')->on('items') ->cascadeOnDelete(); // id книги

            $table->boolean('reserve')->nullable(); // зарезервировано
            $table->boolean('book_is_given')->nullable(); // книга выдана
            $table->boolean('book_is_returned')->nullable(); // Книгу вернули

            $table->date('reserve_day');
            $table->date('book_is_given_start')->nullable();
            $table->date('book_is_given_end')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
