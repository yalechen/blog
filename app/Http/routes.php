<?php
Route::get('/', [
    'as' => 'index',
    'uses' => 'HomeController@index'
]);

Route::get('admin/', [
    'as' => 'admin_index',
    'uses' => 'AdminController@getIndex'
]);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'auth/aa' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::resource('article', 'ArticleController');

Route::resource('article.comments', 'ArticleCommentController');

