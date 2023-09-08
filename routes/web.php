<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('category',[BooksController::class,'index']);


Route::get('/books/book/{category_id}', 'App\Http\Controllers\BooksController@show')->name('books.show');

Route::post('/books/book', 'App\Http\Controllers\BooksController@store')->name('books.store');



