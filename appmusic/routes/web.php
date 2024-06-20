<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/index', [HomeController::class,'index'])->name('index');

Route::get('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class,'register'])->name('register');

Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::post('/createPlaylists', [PlaylistController::class,'index'])->name('indexPlaylists');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/playlist/{id}/tracks', [PlaylistController::class, 'getTracks'])->name('playlist.tracks');