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

// Route::delete('/books/{id}','App\Http\Controllers\BooksController@destroy')->name('books.destroy');

Route::delete('/books/sd/{id}','App\Http\Controllers\BooksController@softDelete')->name('books.destroy');
// Route::get('/books/restore/{id}','App\Http\Controllers\BooksController@restore')->name('books.restore');
Route::get('/books/restore','App\Http\Controllers\BooksController@restore')->name('books.restore');
Route::view('books/userbook', 'books.userbook')->name('books.userbook');

Route::post('/subscription/form', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscription.subscribe');

Route::get('subscribeform', function () {
    return view('subscription.form');
});
Route::post('/subscription/create', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscription.subscribe');
Route::delete('/books/fd/{id}','App\Http\Controllers\BooksController@forceDelete')->name('books.delete');
// Route::post('books/restore/{id}', 'App\Http\Controllers\BooksController@restore')->name('books.restore');
//   Route::get('/subscribeform', 'App\Http\Controllers\SubscriptionController@index');

Route::any('/error', 'BooksController@error')->name('error');
Route::post('/payment_initiate_request','App\Http\Controllers\SubscriptionController@Initiate');
Route::post('/payment-complete','App\Http\Controllers\SubscriptionController@complete');
Route::get('/search', 'App\Http\Controllers\BooksController@search')->name('search');
Route::get('/aboutus', function () {
    return view('aboutus');
});