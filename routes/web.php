<?php
/**/
Route::get('/','ArticlesController@index')->name('main');
Route::get('/about','AboutController@index');
Route::get('/contacts','ContactsController@index');
Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/{slug}','ArticlesController@show');
Route::post('/articles','ArticlesController@store');
Route::get('/admin/feedback','AdminController@index');
Route::post('/admin/feedback','AdminController@store');
