<?php

use App\Http\Controllers\Authcontroller;
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
Route::get('login', [Authcontroller::class, 'login'])->name('login');
Route::post('login', [Authcontroller::class, 'processLogin'])->name('process_login');
Route::group([
    'middleware' => 'admin',
], function (){
    Route::get('logout',[Authcontroller::class, 'logout'])->name('logout');
    Route::get('/admin', function (){
        return view('admin.layout.master');
    })->name('admin');
    Route::resource('admin/posts', PostController::class);
    Route::resource('admin/categories', CategoryController::class);
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/about', function (){
    return view('about');
})->name('about');

//Route::get('posts', [PostController::class, 'index']);
//Route::get('/create',action:[PostController::class, 'create'])->name('create');
