<?php

use Intervention\Image\Facades\Image;

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

// social Account
Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');



Auth::routes();


Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// interveishion
Route::get('/image/{path}/{attachment}', function ($path ,$attachment) {
   $file = sprintf('storage/%s/%s',$path,$attachment);

   if (File::exist($file)) {
       return Image::make($file)->response();
   }
});

Route::group(['prefix'=>'courses'],function(){
    Route::get('/{course}', 'CourseController@show')->name('cursos_detail');
});

//stripe route
Route::group(['prefix'=>'subscriptions'],function(){
    Route::get('/plans', 'SubscriptionController@plans')->name('subscription_plans');
    Route::get('/admin', 'SubscriptionController@admin')->name('subscription_admin');
    Route::post('/process_subscription', 'SubscriptionController@processSubscription')->name('subscription_processSuscription');
});
