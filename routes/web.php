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

Route::delete('authors/{id}', 'App\Http\Controllers\AuthorController@delete')->name('authors.delete');

Route::get('search', 'App\Http\Controllers\AuthorController@search');

Route::get('books', 'App\Http\Controllers\BookController@index');

Route::get('books/create', 'App\Http\Controllers\BookController@create');

Route::post('books', 'App\Http\Controllers\BookController@store')->name('books.store');

Route::get('books/{id}', 'App\Http\Controllers\BookController@show');

Route::get('books/{id}/edit', 'App\Http\Controllers\BookController@edit')->name('books.edit');

Route::patch('books/{id}', 'App\Http\Controllers\BookController@update')->name('books.update');

Route::delete('books/{id}', 'App\Http\Controllers\BookController@delete')->name('books.delete');
