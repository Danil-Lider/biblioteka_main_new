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







sail up -d 



sail artisan make:migration create_genre_item_table


sail artisan migrate:refresh --seed

sail artisan route:list




artisan Route:clear







composer remove moonshine/moonshine














<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>





<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
