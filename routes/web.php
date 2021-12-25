<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReservationController;
use App\Models\Comment;
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

git add .
git commit -m "existing file"
git push


*/

Route::middleware('guest:web')->group(function (){
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth:web')->group(function (){

    Route::get('/homepage', [MovieController::class, 'index']);

    Route::get('/newMovie', [MovieController::class, 'create']);
    Route::post('/newMovie', [MovieController::class, 'store']);
    Route::get('/editMovie/{id}', [MovieController::class, 'edit']);
    Route::post('/editMovie/{id}', [MovieController::class, 'update']);
    Route::get('/deleteMovie/{id}', [MovieController::class, 'destroy']);

    Route::post('/newLocation', [LocationController::class, 'store']);
    Route::get('/deleteLocation/{id}', [LocationController::class, 'delete']);

    Route::get('/newAdmin', [LoginController::class, 'register']);
    Route::post('/newAdmin', [LoginController::class, 'signup']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/deleteUser/{id}', [LoginController::class, 'destroy']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/movie/{name}', [HomeController::class, 'show']);

Route::get('/reservation/{name}', [ReservationController::class, 'create']);
Route::post('/reserve', [ReservationController::class, 'store']);

Route::post('/comment', [CommentController::class, 'store']);

Route::post('/message', [MessageController::class, 'store']);
