<?php
/*
Route::resource('/articles', 'ArticlesController');
*/
Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/{slug}','ArticlesController@show');
Route::post('/articles','ArticlesController@store');
Route::get('/articles/{slug}/edit','ArticlesController@edit');
Route::patch('/articles/{slug}', 'ArticlesController@update');
Route::delete('/articles/{slug}', 'ArticlesController@destroy');


Route::get('/','ArticlesController@index')->name('main');
Route::get('/about','AboutController@index');
Route::get('/admin/feedback','AdminController@index');
Route::post('/admin/feedback','AdminController@store');
Route::get('/contacts','ContactsController@index')->name('contacts');
