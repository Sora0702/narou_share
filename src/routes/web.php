<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LikeController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('bookmarks')->middleware(['auth'])
->controller(BookmarkController::class)
->name('bookmarks.')
->group(function(){
    Route::get('/research', 'research')->name('research');
    Route::get('/result', 'result')->name('result');
    Route::post('/send', 'send')->name('send');
    Route::get('/confirm', 'confirm')->name('confirm');
    Route::post('/store', 'store')->name('store');
    Route::get('/index', 'index')->name('index');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('tags')->middleware(['auth'])
->controller(TagController::class)
->name('tags.')
->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/search', 'search')->name('search');
    Route::get('/{id}/show', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('tags')->middleware(['auth'])
->controller(LikeController::class)
->name('tags.')
->group(function(){
    Route::post('/{id}/like', 'store')->name('like');
    Route::post('/{id}/unlike', 'destroy')->name('unlike');
    Route::get('/likes', 'index')->name('likes');
});

require __DIR__.'/auth.php';
