<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\SubscriptionController;

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

Auth::routes([
    "verify" => true,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('category',[BooksController::class,'index']);

Route::get('books',[BooksController::class,'index1']);

Route::get('/books/book/{category_id}', 'App\Http\Controllers\BooksController@show')->name('books.show');

Route::post('/books/book', 'App\Http\Controllers\BooksController@store')->name('books.store');

Route::get('/books/{id}/edit', 'App\Http\Controllers\BooksController@edit')->name('books.edit');


Route::put('/books/{id}', 'App\Http\Controllers\BooksController@update')->name('books.update');

Route::delete('/books/{id}','App\Http\Controllers\BooksController@destroy')->name('books.destroy');

Route::view('books/userbook', 'books.userbook')->name('books.userbook');

Route::post('/subscription/form', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscription.subscribe');

Route::get('subscribeform', function () {
    return view('subscription.form');
});
// Route::get('premiumcategory', function () {
//     return view('premium.category');
// });
Route::get('premiumbook',[SubscriptionController::class,'index']);