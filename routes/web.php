<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\guestController;

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

// guest routes starts here

Route::get('/', function () { return view('guest.welcome'); });

Route::get('/about', [guestController::class, 'aboutView'])->name('about');
Route::get('/events', [guestController::class, 'eventView'])->name('events');

Route::get('/contact', [guestController::class, 'contactView'])->name('contact');

Route::get('/art/installations', [guestController::class, 'publicInstallation'])->name('arts.installation');
Route::get('/art/artworks', [guestController::class, 'visualArtwork'])->name('arts.artwork');
Route::get('/art/artists', [guestController::class, 'visualArtists'])->name('arts.artists');
Route::get('/art/events', [guestController::class, 'upcomingEvents'])->name('arts.events');
Route::get('/art/organizations', [guestController::class, 'artOrganization'])->name('arts.organizations');

Route::get('/culture/people', [guestController::class, 'people'])->name('culture.people');
Route::get('/culture/places', [guestController::class, 'places'])->name('culture.places');
Route::get('/culture/cultural_events', [guestController::class, 'culturalEvents'])->name('culture.events');
Route::get('/culture/annual_events', [guestController::class, 'annualEvents'])->name('culture.annual');

// guest routes ends here



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
    'categories' => CategoryController::class,
    'posts' => PostController::class,
]);

Route::post('/categories', 'CategoryController@store')->middleware('auth');
Route::post('/posts', 'PostController@store')->middleware('auth');


Route::middleware(['auth'])->group(function () {

    Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::resource('categories', CategoryController::class);

    Route::post('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post}/toggle-like', [PostController::class, 'toggleLike'])->name('posts.toggleLike');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::resource('posts', PostController::class);

    Route::post('/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    Route::get('comments/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
    Route::post('comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::resource('comments', CommentController::class);

});
