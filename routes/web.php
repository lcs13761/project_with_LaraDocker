<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Contact\ContactController;
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
    return view('index');
});


Route::middleware("auth")->group(function () {

    Route::prefix("user")->group(function () {
        Route::get("/signIn", [AuthController::class, "index"])->withoutMiddleware("auth")->name("login");
        Route::post("/signIn/verify", [AuthController::class,"login"])->withoutMiddleware("auth");
        Route::get("/signOut", [AuthController::class, "logout"]);
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, "index"])->withoutMiddleware("auth");
        Route::get('/create',[ContactController::class, "create"]);
        Route::post('/add', [ContactController::class, "store"]);
        Route::get('/contact/{id}',[ContactController::class, "show"])->where('id','[0-9]+');
        Route::get('/edit/{id}',[ContactController::class,"edit"])->where('id','[0-9]+');
        Route::put('/update/{id}', [ContactController::class, "update"])->where('id','[0-9]+');
        Route::delete('/delete/{id}',[ContactController::class,"destroy"])->where('id','[0-9]+');
    });
});
