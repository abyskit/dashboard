<?php

Route::group(['prefix' => config('abyskit.route_locale'),'namespace' => 'AbysKit\Http\Controllers', 'middleware' => ['web']], function() {
    Route::get('dashboard.html', 'DashboardController@index')->name('abyskit.dashboard.page');

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('login.html', 'Auth\LoginController@showLoginForm')->name('abyskit.login.page');
        Route::post('login.html', 'Auth\LoginController@login')->name('abyskit.login');

        // Super admin routes
        // TODO super admin middleware
        Route::group([], function() {
            Route::group(['prefix' => 'category'], function() {
                Route::get('/list.html', 'CategoryController@index')->name('abyskit.category.list.page');
                Route::get('/new.html', 'CategoryController@create')->name('abyskit.category.create.page');
                Route::get('/{id}.html', 'CategoryController@edit')->name('abyskit.category.edit.page');

                Route::post('/new.html', 'CategoryController@store')->name('abyskit.category.store');
                Route::post('/update/{id}.html', 'CategoryController@update')->name('abyskit.category.update');
                Route::post('/delete/{id}.html', 'CategoryController@destroy')->name('abyskit.category.destroy');

                Route::post('/info/update.html', 'CategoryInfoController@update')->name('abyskit.category.info.update');
            });
        });
    });
});