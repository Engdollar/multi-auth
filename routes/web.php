<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::middleware(['guest','PBH'])->group(function () {

    Route::prefix('/')->group(function () {
        Route::get('login',[LoginController::class, 'index'])->name('login');
        Route::post('login',[LoginController::class, 'login'])->name('login');
      });

      Route::prefix('/')->group(function () {
        Route::get('register',[RegisterController::class, 'index'])->name('register');
        Route::post('register',[RegisterController::class, 'store'])->name('register');

      });
});

Route::prefix('/')->middleware(['auth','PBH'])->group(function () {

    Route::post('logout',[LogoutController::class, 'logout'])->name('logout');

});

// Route::get('posts',[PostController::class, 'index'])->name('posts');
// Route::post('posts',[PostController::class, 'store'])->name('posts');
// Route::get('posts/add',[PostController::class, 'add'])->name('posts.add');
// Route::get('posts/show/{post}',[PostController::class, 'show'])->name('posts.show');
// Route::get('posts/edit/{post}',[PostController::class, 'edit'])->name('posts.edit');
// Route::delete('posts/delete/{post}',[PostController::class, 'delete'])->name('posts.delete');
Route::resource('posts', PostController::class);
// Route::post('posts/update/{post}',[PostController::class, 'update'])->name('posts.update');

Route::prefix('admin')->middleware(['auth','isAdmin','PBH'])->group(function () {
    Route::get('admin',[AdminController::class, 'index'])->name('admin');
    Route::get('profile',[AdminController::class, 'profile'])->name('profile');

});

Route::prefix('user')->middleware(['auth','isUser','PBH'])->group(function () {
    Route::get('user',[UserController::class, 'index'])->name('user');
    Route::get('profile',[UserController::class, 'profile'])->name('profile');

});
