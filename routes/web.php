<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'guest'],function(){

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);   
});

Route::group(['middleware'=>'adminmiddleware'],function(){

    Route::get('/manage/book', [BookController::class, 'viewAllBooks'])->name('managebook');
    Route::post('/manage/book', [BookController::class, 'insertBook'])->name('insertbook');
    Route::delete('/delete/book/{id}', [BookController::class, 'deleteBook']);
    Route::put('/update/book/{id}',[BookController::class,'updateBook']);
    
    Route::get('/manage/user', [UserController::class, 'viewAllUsers'])->name('manageuser');
    Route::delete('/delete/user/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');
    Route::put('/update/user/{id}',[UserController::class,'updateUser'])->name('updateuser');
    Route::get('/detail/user/{id}',[UserController::class, 'viewDetailUser'])->name('viewdetailuser');
    
    Route::get('/manage/genre', [GenreController::class, 'viewAllGenres'])->name('managegenre');
    Route::post('/manage/genre', [GenreController::class, 'insertGenre'])->name('insertgenre');
    Route::delete('/delete/genre/{id}', [GenreController::class, 'deleteGenre'])->name('deletegenre');
    Route::put('/update/genre/{id}',[GenreController::class,'updateGenre'])->name('updategenre');
    Route::get('/detail/genre/{id}',[GenreController::class, 'viewDetailGenre'])->name('viewdetailgenre');
});

Route::group(['middleware'=>'membermiddleware'],function(){
    
    Route::get('/view/cart', [TransactionController::class, 'viewCart'])->name('viewcart');
    Route::post('/add-to/cart/{book:id}', [TransactionController::class, 'addCart'])->name('addtocart');
    Route::get('/add-to/cart/{book:id}', [TransactionController::class, 'show'])->name('addtocart');
    Route::get('/edit-cart/{book:id}', [TransactionController::class, 'show'])->name('editcart');
    Route::post('/edit-cart/{book:id}', [TransactionController::class, 'editCart'])->name('editcart');
    Route::get('/view/edit/cart/{id}',[TransactionController::class, 'viewEditCart'])->name('vieweditcart');
    Route::delete('/remove/cart/{book:id}', [TransactionController::class, 'removeCart'])->name('removecart');
    
    Route::get('/view/transaction', [TransactionController::class, 'viewTransaction'])->name('viewtransaction');
    Route::get('/view/history-detail/{transaction:id}',[TransactionController::class,'viewHistoryDetail'])->name('viewhistorydetail');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');   
Route::get('/detail/book/{id}',[BookController::class, 'viewDetail'])->name('viewdetailbook');
Route::get('/profile', [UserController::class, 'viewProfile'])->name('profile');
Route::put('/update/profile/{id}', [UserController::class, 'updateProfile'])->name('updateprofile');
Route::get('/change/password', [UserController::class, 'viewChangePassword'])->name('changepassword');
Route::put('/update/password/{id}', [UserController::class, 'updatePassword'])->name('updatepassword');







