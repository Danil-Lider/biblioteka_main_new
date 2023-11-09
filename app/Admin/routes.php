<?php

// use App\Models\User;
// $user = User::create(['name' => 'Admin', 'email' => 'admin@mail.ru', 'password' => bcrypt('123123')]);
// $user->roles()->attach(1);

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);