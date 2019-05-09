<?php

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

// social Account
Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
