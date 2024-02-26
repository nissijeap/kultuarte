<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;

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

//email verification
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');

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



});