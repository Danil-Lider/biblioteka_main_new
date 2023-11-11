<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

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

1. Нажимае Забронировать

1.1 Проверка на автризацию
1.2 Если проверка не пройдена, предлагаем пользователю зарегистрировать/автроизироваться

2. Выбираем время бронирования
3. Создается Order на это книгу с привязкой к пользователю

id 1
User_id 1
Book_id 1
Book_is_given 0
reserve 1




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
    return redirect('/catalog');
});

// create order
Route::post('/catalog/create',[OrderController::class, 'create']);
// check order is aviable
Route::get('/catalog/check/{item}', [ItemController::class, 'check']);
// catalog
Route::resource('/catalog', ItemController::class);
// My Orders 
Route::get('/orders', [OrderController::class, 'showMyOrders'])->name('orders');




Route::get('/dashboard', function () {
    return redirect('/catalog');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
