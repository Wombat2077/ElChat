<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\ChatController;

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

//Route::get('/', function () {
//   return view('welcome');
//});
Route::get('/open-ai', [ChatGptController::class, 'index']);
Route::post('/login/enter', [AuthController::class, 'login'])->name('login');
Route::get("/login", [AuthController::class, 'loginview'])->name('loginpage');
Route::get("/", [ChatController::class, 'Chat'])->name('main');
Route::get("/register", [AuthController::class, 'register'])->name('register');