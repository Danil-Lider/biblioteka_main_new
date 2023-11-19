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



Приветствуются дополнительные функции, например: 
Отправка пароля клиенту на электронный ящик, либо изменение и восстановление пароля клиентом.
Уведомление клиента о том, что книга снова доступна для бронирования (по почте либо на сервисе).
Возможность оценивать книги и писать комментарии о книге, чтобы другие пользователи могли видеть их.



sail artisan make:migration create_genre_item_table



|
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






// Если книга не забронирована и не выдана, а так же прянта, то изменяем статус на доступный
Route::get('/updateItems', [OrderController::class, 'updateItems'])->name('updateItems');

Route::get('/clear', function() {    
    Artisan::call('cache:clear');    
    Artisan::call('config:cache');    
    Artisan::call('view:clear');  
    Artisan::call('route:clear');  
    // Artisan::call('backup:clean');    
    return "Кэш очищен.";});






// My Orders JSON
Route::get('/api/OrdersJson', [OrderController::class, 'showMyOrdersJson'])->name('OrdersJson');    
// INDEX JSON 
Route::get('/api/indexJson', [ItemController::class, 'indexJson']);

Route::resource('/', ItemController::class);



// Route::get('/{any?}', function () {
//     ItemController::class;
// })->where('any', '.*');


// create order
Route::post('/catalog/create',[OrderController::class, 'create']);
// check order is aviable
Route::get('/catalog/check/{item}', [ItemController::class, 'check']);
// catalog
Route::resource('/catalog', ItemController::class);
// My Orders 
Route::get('/orders', [OrderController::class, 'showMyOrders'])->name('orders');



// JSON API 








Route::get('/dashboard', function () {
    return redirect('/catalog');
})->middleware(['auth', 'verified'])->name('dashboard');





require __DIR__.'/auth.php';




Route::resource('/{any?}', ItemController::class);