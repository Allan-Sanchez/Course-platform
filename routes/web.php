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

Route::group(['middleware' => ['auth']],function(){
    //stripe route
    Route::group(['prefix'=>'subscriptions'],function(){
        Route::get('/plans', 'SubscriptionController@plans')->name('subscription_plans');
        Route::get('/admin', 'SubscriptionController@admin')->name('subscription_admin');
        Route::post('/process_subscription', 'SubscriptionController@processSubscription')->name('subscription_processSuscription');
    
        Route::post('/resume', 'subscriptionController@resume')->name('subscription_resume');
        Route::post('/cancel', 'subscriptionController@cancel')->name('subscription_cancel');
    });

    // factura stripe otra forma de agrupar rutas
    Route::prefix('invoices')->group(function () {
        Route::get('/admin', 'InvoiceController@admin')->name('invoice-admin');
        Route::get('/{invoices}/download}', 'InvoiceController@download')->name('invoice-download');
    });
});


