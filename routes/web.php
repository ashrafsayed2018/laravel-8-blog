<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// home route

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/blog', [BlogController::class, "index"])->name("blog");
Route::get('/{post:slug}', [BlogController::class, "show"])->name("blog.show");

// dashboard route  with auth middleware and prefix
Route::group(["middleware" => "auth", "prefix" => "dashboard"], function () {
    // dashboard route
    Route::group(['prefix' => '', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, "index"])->name('index');
    });

    // categories route
    Route::group(["prefix" => "categories", "as" => "categories."], function () {
        Route::get("/", [CategoryController::class, "index"])->name("index");
        Route::get("create", [CategoryController::class, "create"])->name("create");
        Route::post("/", [CategoryController::class, "store"])->name("store");
        Route::get("{category:slug}/edit", [CategoryController::class, "edit"])->name("edit");
        Route::put("{category:slug}/update", [CategoryController::class, "update"])->name("update");
        Route::delete("{category:slug}/delete", [CategoryController::class, "destroy"])->name("delete");
    });


    // tag route
    Route::group(["prefix" => "tags", "as" => "tags."], function () {
        Route::get("/", [TagController::class, "index"])->name("index");
        Route::get("create", [TagController::class, "create"])->name("create");
        Route::post("/", [TagController::class, "store"])->name("store");
        Route::get("{tag:slug}/edit", [TagController::class, "edit"])->name("edit");
        Route::put("{tag:slug}/update", [TagController::class, "update"])->name("update");
        Route::delete("{tag:slug}/delete", [TagController::class, "destroy"])->name("delete");
    });

    // post routes

    Route::group(["prefix" => "posts", "as" => "posts."], function () {
        Route::get("/", [PostController::class, "index"])->name("index");
        Route::get("create", [PostController::class, "create"])->name("create");
        Route::post("/", [PostController::class, "store"])->name("store");
        Route::get("{post:slug}/edit", [PostController::class, "edit"])->name("edit");
        Route::put("{post:slug}/update", [PostController::class, "update"])->name("update");
        Route::delete("{post:slug}/delete", [PostController::class, "destroy"])->name("delete");
    });
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
