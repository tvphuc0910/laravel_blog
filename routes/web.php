<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemSearchController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Jobs\InsertPostsJob;
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
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('user_store');
Route::get('logout', [Authcontroller::class, 'logout'])->name('logout');
Route::group([
    'middleware' => 'user'
], function (){
    Route::resource('user', UserController::class);
    Route::get('/like/{id}', [LikeController::class, 'like']);
    Route::resource('comments', CommentController::class);
});
Route::group([
    'middleware' => 'admin',
], function () {
    Route::get('/admin', function () {
        return view('admin.layout.master');
    })->name('admin');
    Route::resource('admin/posts', PostController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/tags', TagController::class);
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/categories', [CategoryController::class, 'guestIndex'])->name('category.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'guestShow'])->name('category.show');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/send-verify-email/{id}', [SendMailController::class, 'sendActiveMail'])->name('mail.active');
Route::get('/active/{user}/{token}', [UserController::class, 'active'])->name('user.active');
//Route::get('store-queue', [StudyController::class, 'storeQueue']);

Route::get('search', [SearchController::class, 'index'])->name('search.index');
Route::get('search-results', [SearchController::class, 'search'])->name('search.result');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/test-job',[PostController::class, 'insertPostRedis']);
