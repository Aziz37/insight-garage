<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm');
	Route::post('/login', 'Auth\AdminLoginController@login');

	Route::get('/', 'Admin\AdminController@index');
	
	Route::resource('/search', Admin\SearchController::class);

	Route::resource('/folders', Admin\FoldersController::class);
	Route::resource('/subfolders', Admin\SubfoldersController::class);
	
	Route::post('/files/upload', 'Admin\FilesController@store');
	Route::get('/file/download/{id}', 'Admin\FilesController@show');
	Route::get('/file/{id}/edit', 'Admin\FilesController@update');
	Route::delete('/file/{id}', 'Admin\FilesController@destroy');

	Route::resource('/users', Admin\UsersController::class);

	Route::get('/logout', 'Auth\AdminLoginController@logout');
});

Route::prefix('users')->group(function () {
	Route::get('/home', 'Users\HomeController@index');

	Route::resource('/search', Users\SearchController::class);

	Route::get('/folders', 'Users\FoldersController@index');
	Route::get('/folders/{id}', 'Users\FoldersController@show');

	Route::post('/files/upload', 'Users\FilesController@store');
	Route::get('/file/download/{id}', 'Users\FilesController@show');

	Route::get('/users/logout', 'Auth\LoginController@userLogout');
});