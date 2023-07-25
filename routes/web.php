<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Author\AuthorTagsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Author\AuthorController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

    $posts = Post::orderBy('views', 'desc')
        ->take(3)
        ->get();
    return view('welcome', compact('posts'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('/posts', AdminPostController::class);
    Route::resource('/tags', AdminTagController::class);
    Route::resource('/users', AdminUserController::class);

});

Route::middleware(['auth', 'author'])->name('author.')->prefix('author')->group(function () {

    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::resource('/posts', AuthorPostController::class);
    Route::resource('/tags', AuthorTagsController::class);
});

Route::get('/showPost/{post}', [HomeController::class, 'showPost'])->name('showPost');
Route::get('/showTag/{tag}', [HomeController::class, 'showTag'])->name('showTag');
Route::post('/search', [HomeController::class, 'search'])->name('search');

require __DIR__ . '/auth.php';
