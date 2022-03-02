<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\SubscribelikeController;
use App\Http\Controllers\UserController;
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

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/list', 'showandeditcategories');
    Route::post('/category/publish', 'storecategory');
    Route::post('/deletecategory/{category:slug}', 'deletecategory');
    Route::get('/editcategory/{category:slug}', 'showeditcategoryform');
    Route::post('/editcategory/{category:slug}', 'storecategoryeditdata');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/list', 'showusers');
    Route::post('/deleteuser/{user:username}', 'deleteUser');
    Route::get('/edituser/{user:username}', 'showEdittUserForm');
    Route::post('/edituser/{user:username}', 'storeUserEditData');

    //for subscriber
    Route::get('/subscriber/list', 'showSubscribers');
    Route::post('/deletesubscriber/{subscriber}', 'deleteSubscriber');
});


Route::controller(DashboardController::class)->group(function () {
    //for upload and edit myanmr blogs.
    Route::get('/mblog/publish', 'createmblog');
    Route::post('/mblog/publish', 'storemblog');
    Route::get('/mblog/list', 'showallmyanmarblogs');
    Route::post('/deletemblog/{blog:slug}', 'deletemblog');
    Route::get('/editmblog/{blog:slug}', 'showmblogeditform');
    Route::post('/editmblog/{blog:slug}', 'editmblog');


    //for upload and edit english blogs.
    Route::get('/eblog/publish', 'createeblog');
    Route::post('/eblog/publish', 'storeeblog');
    Route::get('/eblog/list', 'showallenglishblogs');
    Route::post('/deleteeblog/{blog:slug}', 'deleteeblog');
    Route::get('/editeblog/{blog:slug}', 'showeblogeditform');
    Route::post('/editeblog/{blog:slug}', 'editeblog');
});

Route::name('admin.')->controller(ImageController::class)->group(function () {
    Route::post('/images/publishtomblog', 'storetomblog')->name('images.storetomblog');
    Route::post('/images/publishtoeblog', 'storetoeblog')->name('images.storetoeblog');
});
