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

Route::group([
    'before' => 'auth'
], function ()
{
    // 上传文件
    Route::post('file', [
        'name' => '上传文件',
        'as' => 'FileUpload',
        'uses' => 'StorageController@postFile'
    ]);

    // 后台登录页
    Route::get('admin/login', [
        'name' => '管理后台登录页',
        'as' => 'AdminGetLogin',
        'uses' => 'UserController@getLogin'
    ]);

    // 后台登录
    Route::post('admin/login', [
        'name' => '管理后台登录处理',
        'as' => 'AdminPostLogin',
        'uses' => 'UserController@postLogin'
    ]);

    // 后台注册博主帐号
    Route::post('admin/register', [
        'name' => '后台注册博主帐号',
        'as' => 'AdminPostRegister',
        'uses' => 'UserController@postRegister'
    ]);

    // 后台首页
    Route::get('admin/index', [
        'name' => '管理后台登录页',
        'as' => 'AdminGetIndex',
        'uses' => 'UserController@getIndex'
    ]);
});

