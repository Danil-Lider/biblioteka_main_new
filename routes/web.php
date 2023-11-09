<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

Разработать веб-сервис "Библиотека".

3 роли: администратор, библиотекарь, клиент

Администратор:
Может добавлять и удалять пользователей, устанавливать пароли.

Библиотекарь:
Может добавлять и удалять книги
Может выдавать и принимать книги от клиентов

Клиент:
Может просматривать имеющиеся книги
Искать по автору, жанру, издателю
Бронировать книги, снимать бронь

Бизнес-процесс:
Клиент заходит на сервис, бронирует книгу, затем приходит в библиотеку.
Далее библиотекарь выдает книгу клиенту.
Через некоторое время библиотекарь принимает книгу от клиента.
Забронированную и выданную книгу нельзя забронировать и выдать
Время бронирования ограничено.

Приветствуются дополнительные функции, например: 
Отправка пароля клиенту на электронный ящик, либо изменение и восстановление пароля клиентом.
Уведомление клиента о том, что книга снова доступна для бронирования (по почте либо на сервисе).
Возможность оценивать книги и писать комментарии о книге, чтобы другие пользователи могли видеть их.

Стек технологий:
Vue JS 
Laravel 8
PostgreSQL

Верстка под хром.

Залить всё на github, скинуть ссылку на репозиторий.







sail artisan make:migration create_genre_item_table



|
*/

Route::get('/', function () {
    return redirect('/items');
});

Route::get('/items/check/{item}', [ItemController::class, 'check']);
Route::resource('/items', ItemController::class);



Route::get('/dashboard', function () {
    return redirect('/items');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
