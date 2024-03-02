<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
]);

Route::get('postCreate', [PostController::class, 'postCreate'])->name('postCreate');
Route::post('/store', [PostController::class, 'store'])->name('store');

Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::post('/unlike', [LikeController::class, 'unlike'])->name('unlike');

Route::post('/save', [SaveController::class, 'save'])->name('save');
Route::post('/unsave', [SaveController::class, 'unsave'])->name('unsave');
