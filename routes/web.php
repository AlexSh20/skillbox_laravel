<?php
/*
Route::resource('/articles', 'ArticlesController');
*/
Route::get('/articles/tags/{tag}', 'TagsController@index');

Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::patch('/articles/{article}', 'ArticlesController@update');
Route::delete('/articles/{article}', 'ArticlesController@destroy');

Route::get('/', 'ArticlesController@index')->name('main');
Route::get('/about', 'AboutController@index');
Route::get('/admin/feedback', 'Admin\AdminController@index');
Route::post('/admin/feedback', 'Admin\AdminController@store');
Route::get('/admin/statistics', 'Admin\AdminController@statistics');
Route::get('/admin/articles', 'Admin\AdminController@article');
Route::get('/admin/reports', 'Admin\AdminController@reports')->name('reports');
Route::post('/admin/reports', 'Admin\AdminController@sendReport');

Route::get('/contacts', 'ContactsController@index')->name('contacts');

Auth::routes();

Route::post('/articles/{article}/comment', 'ArticlesController@comment')->name('comment');
Route::post('/news/{news}/comment', 'NewsController@comment')->name('comment_news');

Route::resource('/news','NewsController');

Route::resource('/admin/news','Admin\AdminNewsController', [
    'names' => [
        'index' => 'admin_news',
    ]
]);


Route::get('/event', function (){
    event(new \App\Events\SomethingHappend('Привет статья'));
});

Route::get('/listen', function (){
   return view('listen');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
