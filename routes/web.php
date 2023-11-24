<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog;
use App\Http\Controllers\home;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\delete;

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

Route::get('/user.index', function () {
    return view('user.index');
});
Route::get('/', [home::class, 'index']);
Route::get('/user.index', [home::class,'viewHome']) ->name('user.index');
Route::get('/blog/createPost', [home::class,'createPost'])->name('user.createPost.new');
Route::get('/post-details/editPost/{id}', [home::class,'editPost'])->name('user.editPost.edit');
Route::post('/post-details/updatePost/{id}', [home::class,'updatePost'])->name('user.editPost.update');
Route::post('/userPost', [home::class,'userPost'])->name('user.createPost');
Route::get('/blog', [blog::class,'viewBlog']) ->name('user.blog');
Route::get('/post-details/{id}', [home::class,'postDetails'])->name('user.postDetails');
Route::delete('/postdetails-delete/{id}', [home::class, 'postDetailsDelete'])->name('user.postdetails.delete');
Route::get('/dashboard', function () {
    if (auth()->check()) {
        return redirect()->route('user.index');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
