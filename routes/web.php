<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\RecentlyViewedController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogController;

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
Route::get('arts', [PostController::class, 'arts'])->name('arts');
Route::get('/restore', [PostController::class, 'restore'])->name('restore');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::post('/update', [PostController::class, 'update'])->name('update');
Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
Route::post('/destroyImg', [PostController::class, 'destroyImg'])->name('destroyImg');

Route::post('/storeBlog', [BlogController::class, 'storeBlog'])->name('storeBlog');
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/showBlogs/{blog}', [BlogController::class, 'showBlogs'])->name('showBlogs');

Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::post('/unlike', [LikeController::class, 'unlike'])->name('unlike');

Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
Route::post('/deleteComment', [CommentController::class, 'deleteComment'])->name('deleteComment');
Route::post('/editComment', [CommentController::class, 'editComment'])->name('editComment');
Route::post('/upvote', [CommentController::class, 'upvote'])->name('upvote');

Route::post('/save', [SaveController::class, 'save'])->name('save');
Route::post('/unsave', [SaveController::class, 'unsave'])->name('unsave');
Route::get('show_saved', [SaveController::class, 'show_saved'])->name('show_saved');

Route::post('/viewed', [RecentlyViewedController::class, 'viewed'])->name('viewed');
Route::get('show_view', [RecentlyViewedController::class, 'show_view'])->name('show_view');
