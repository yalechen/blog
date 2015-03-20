<?php
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

// 获取文件
Route::get('file', [
    'name' => '获取文件',
    'as' => 'FilePull',
    'uses' => 'StorageController@getFile'
]);
