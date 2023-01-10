<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/about', function (){
    return view('about');
})->name('about');

Route::get('/admin/', function (){
    return view('admin.layout.master');
});
Route::resource('admin/posts', PostController::class);
Route::resource('admin/categories', CategoryController::class);
//Route::get('posts', [PostController::class, 'index']);
//Route::get('/create',action:[PostController::class, 'create'])->name('create');
