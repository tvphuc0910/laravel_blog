<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
Route::get('/admin/', function (){
    return view('admin.layout.master');
});
Route::get('/test', function (){
    return view('admin.test');
});
Route::resource('admin/posts', PostController::class);
Route::resource('admin/categories', CategoryController::class);
//Route::get('posts', [PostController::class, 'index']);
//Route::get('/create',action:[PostController::class, 'create'])->name('create');
