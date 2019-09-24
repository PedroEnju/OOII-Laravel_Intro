<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['tads'])->group(function() {

    Route::get('/tads', function () {
        return view('tads');
    })->name('tads.get');

    Route::post('/tads', function () {
        return view('tads', ['msg' => 'Best is POST']);
    })->name('tads.post');

    Route::put('/tads', function () {
        return view('tads', ['msg' => 'Best is PUT']);
    })->name('tads.put');

    Route::delete('/tads', function () {
        return view('tads', ['msg' => 'Best is DELETE']);
    })->name("tads.delete");

    Route::resource('states', 'StateController')->except(['show']);

    Route::resource('tasks', 'TaskController')->except(['show']);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
