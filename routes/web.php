<?php

use Intervention\Image\Facades\Image;

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

// social Account
Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

// interveishion
Route::get('/image/{path}/{attachment}', function ($path ,$attachment) {
   $file = sprintf('storage/%s/%s',$path,$attachment);

   if (File::exist($file)) {
       return Image::make($file)->response();
   }
});


Auth::routes();


Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
