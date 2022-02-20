<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\SubscribelikeController;
use App\Models\SubscribeLike;
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

Route::controller(BlogController::class)->group(function () {
    Route::get('/', 'random');
    Route::get('/mblogs', 'allMyanBlogs');
    Route::get('/eblogs', 'allEngBlogs');
    Route::get('/mblogs/{blog:slug}', 'showMyanBlog');
    Route::get('/eblogs/{blog:slug}', 'showEngBlog');
});

Route::controller(OthersController::class)->group(function () {
    Route::get('/others', 'youtubeandpodcast');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::controller(CommentController::class)->group(function () {
    Route::post('/mblogs/{blog:slug}/comment', 'storetomblogstable');
    Route::post('/eblogs/{blog:slug}/comment', 'storetoeblogstable');
});

Route::controller(SubscribelikeController::class)->group(function () {
    Route::post('/mblogs/{blog:slug}/like', 'storetomblogstable');
    Route::post('/mblogs/{blog:slug}/unlike', 'unstoretomblogstable');
    Route::post('/eblogs/{blog:slug}/like', 'storetoeblogstable');
    Route::post('/eblogs/{blog:slug}/unlike', 'unstoretoeblogstable');

    Route::post('/subscribe', 'storetosubscribetable');
});
