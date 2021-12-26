<?php
/*
Route::resource('/articles', 'ArticlesController');
*/
Route::get('/articles/tags/{tag}','TagsController@index');

Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/{article}','ArticlesController@show');
Route::post('/articles','ArticlesController@store');
Route::get('/articles/{article}/edit','ArticlesController@edit');
Route::patch('/articles/{article}', 'ArticlesController@update');
Route::delete('/articles/{article}', 'ArticlesController@destroy');



Route::get('/','ArticlesController@index')->name('main');
Route::get('/about','AboutController@index');
Route::get('/admin/feedback','AdminController@index');
Route::post('/admin/feedback','AdminController@store');
Route::get('/admin/articles','AdminController@article');

Route::get('/contacts','ContactsController@index')->name('contacts');

Auth::routes();

