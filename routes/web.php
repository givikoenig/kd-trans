<?php

Route::group(['middleware' => 'web'], function() {
    Route::get('/locale/{locale}', function ($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
    });
    Route::get('/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('/about', ['uses'=>'AboutController@execute', 'as'=>'about']);
    Route::get('/contact', ['uses'=>'ContactsController@execute', 'as'=>'contacts']);
    Route::resource('services','ServicesController')->only(['index', 'show']);
    Route::resource('news','NewsController')->only(['index', 'show']);
    Route::resource('articles','ArticlesController')->only('show');
    Route::get('/footer-labels-data', 'DataController@getFooterJson');
    Route::post('/contact-page-message', 'DataController@contactPageMessage');
    Route::post('/order-message', 'DataController@orderMessage');
    Route::post('/testimonial-page-message', 'DataController@testimonialPageMessage');
    Route::resource('testimonials', 'TestimonialsController');
    Route::post('/subscribe', 'DataController@subscribe');
    Route::get('/unsubscribe', 'DataController@unsubscribe');

});
