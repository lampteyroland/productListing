<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can users web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Get all products
Route::get('/products',  [ProductController::class, 'index']);



// Show create form
Route::get('/products/create',  [ProductController::class, 'create'])->name('create')->middleware('auth');

// Store product information
Route::post('/products',  [ProductController::class, 'store'])->name('create')->middleware('auth');

// Show edit form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit')->middleware('auth');

// Update product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('update')->middleware('auth');

// Delete Product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');

 //Manage listings
Route::get('/products/manage', [ProductController::class, 'manage'])->name('manage')->middleware('auth');


//Show single product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('show');

// Show users registration form
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

// Show login  form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Create a new user
Route::post('/users', [UserController::class, 'store'])->name('registerUser');

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

//Log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');






