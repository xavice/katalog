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
    $catalog = new \App\Catalog();
    return view('welcome', compact('catalog'));
});

Route::get('/import', function () {
    $reader = new \App\Reader(resource_path('files/books.csv'));
    $reader->readCsv();
});

Route::get('/{id}', function ($id) {
    if($book = \App\Book::find($id)) {
        return view('detail', compact('book'));
    } else {
        abort(404);
    }
})->name('detail');
