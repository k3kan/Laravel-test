<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'hello, user!';
});

Route::get('authors', 'App\Http\Controllers\AuthorController@index');

Route::get('authors/create', 'App\Http\Controllers\AuthorController@create');

Route::post('authors', 'App\Http\Controllers\AuthorController@store')->name('authors.store');

Route::get('authors/{id}', 'App\Http\Controllers\AuthorController@show');

Route::get('authors/{id}/edit', 'App\Http\Controllers\AuthorController@edit')->name('authors.edit');

Route::patch('authors/{id}', 'App\Http\Controllers\AuthorController@update')->name('authors.update');

Route::delete('authors/{id}', 'App\Http\Controllers\AuthorController@delete')->name('authors.delete');;

Route::get('search', 'App\Http\Controllers\AuthorController@search');
