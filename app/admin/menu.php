<?php

/* Admin::menu()->url('/')
    ->label('Start page')
    ->icon('fa-dashboard')
    ->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex'); */

Admin::menu()->url('/')
    ->label('Start page')
    ->icon('fa-dashboard')
    ->uses('\AdminController@getIndex');
/* Admin::menu(User)->icon('fa-user');
Admin::menu()->label('Menu with subitems')
    ->icon('fa-book')
    ->items(function ()
{
    Admin::menu('\Foo\Bar')->icon('fa-sitemap');
    Admin::menu('\Foo\Baz')->label('Overwrite model title');
    Admin::menu()->url('my-page')
        ->label('My custom page')
        ->uses('\MyController@getMyPage');
}); */