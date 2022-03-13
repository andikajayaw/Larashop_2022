<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Models\Category;

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
    return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

/**
 * HOME ROUTES
 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * USERS ROUTES
 */
Route::resource("users", UserController::class);


/**
 * TRASH CATEGORIES ROUTES
 */
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
/**
 * RESTORE TRASH CATEGORIES ROUTES
 */
Route::get('/categories/{id}/restore', [CategoryController::class,'restore'])->name('categories.restore');
/**
 * DELETE PERMANENT CATEGORIES ROUTES
 */
Route::delete('/categories/{category}/delete-permanent', [CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');

/**
 * CATEGORIES ROUTES
 */
Route::resource('categories', CategoryController::class);


/**
 * TRASH BOOK ROUTES
 */
Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');
/**
 * RESTORE BOOK ROUTES
 */
Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
/**
 * DELETE PERMANENT BOOK ROUTES
 */
Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.deletePermanent');
/**
 * BOOK ROUTES
 */
Route::resource('books',BookController::class);

/**
 * ORDERS ROUTES
 */
Route::resource('orders',OrderController::class);



/**
 * AJAX SEARCH CATEGORIES
 */
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);
