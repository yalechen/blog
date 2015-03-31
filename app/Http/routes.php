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
    'middleware' => 'auth'
], function ()
{
    // 上传文件
    Route::post('file', [
        'name' => '上传文件',
        'as' => 'FileUpload',
        'uses' => 'StorageController@postFile'
    ]);
});

// 退出
Route::any('logout', [
    'name' => '后台登出',
    'as' => 'Logout',
    'uses' => 'UserController@logout'
]);

/**
 * **************后台*****************
 */
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

Route::group([
    'middleware' => 'auth.admin',
    'prefix' => 'admin'
], function ()
{
    // 后台首页
    Route::get('/', [
        'name' => '管理后台登录页',
        'as' => 'AdminIndex',
        'uses' => 'AdminController@getIndex'
    ]);

    // 个人资料
    Route::get('admin/user/edit', [
        'name' => '个人资料编辑',
        'as' => 'UserEdit',
        'uses' => 'UserControllser@edit'
    ]);

    // 个人资料
    Route::get('admin/user/save', [
        'name' => '个人资料保存',
        'as' => 'UserSave',
        'uses' => 'UserControllser@save'
    ]);
});

