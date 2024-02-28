<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmailController; 
use App\Http\Controllers\NotificationController; 

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
    return view('guest.welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
]);

//email verification
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
Route::get('gallery', [SuperadminController::class, 'gallery'])->name('superadmin.gallery');

Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::resource('permissions', PermissionController::class);

Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::get('/roles/{id}/show', [RoleController::class, 'show'])->name('roles.show');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::resource('roles', RoleController::class);

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::resource('users', UserController::class);

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::resource('categories', CategoryController::class);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::resource('posts', PostController::class);

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::get('/blogs/{id}/show', [BlogController::class, 'show'])->name('blogs.show');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
// Route::resource('blogs', BlogController::class);

Route::get('/emails/inbox', [EmailController::class, 'index'])->name('emails.index');
Route::get('/emails/sent', [EmailController::class, 'sent'])->name('emails.sent');
Route::get('/emails/read', [EmailController::class, 'read'])->name('emails.read');
Route::get('/emails/unread', [EmailController::class, 'unread'])->name('emails.unread');
Route::get('/emails/create', [EmailController::class, 'create'])->name('emails.create');
Route::post('/emails', [EmailController::class, 'store'])->name('emails.store');
Route::get('/emails/{id}/edit', [EmailController::class, 'edit'])->name('emails.edit');
Route::get('/emails/{id}/show', [EmailController::class, 'show'])->name('emails.show');
Route::post('/emails/mark-as-read', [EmailController::class, 'markAsRead'])->name('emails.markAsRead');
Route::post('/emails/mark-as-unread', [EmailController::class, 'markAsUnread'])->name('emails.markAsUnread');
Route::delete('/emails/{id}', [EmailController::class, 'destroy'])->name('emails.destroy');
Route::delete('/emails/inbox', [EmailController::class, 'destroyInbox'])->name('emails.destroyInbox');
Route::put('/emails/{id}', [EmailController::class, 'update'])->name('emails.update');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
Route::get('/notifications/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
Route::get('/notifications/{id}/show', [NotificationController::class, 'show'])->name('notifications.show');
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
Route::put('/notifications/{id}', [NotificationController::class, 'update'])->name('notifications.update');

});