<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotManController;

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

Route::get('/test-refresh', function () {
  return view('welcome');
});
Route::get('/open-ai', [ChatGptController::class, 'index']);
Route::post('/login/enter', [AuthController::class, 'login'])->name('login');
Route::get("/login", [AuthController::class, 'login_view'])->name('login_page');
Route::get("/", [ChatController::class, 'Chat'])->name('main');
Route::get("/register", [AuthController::class, 'register_view'])->name('register_page');
Route::post("/register", [AuthController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/botman', [BotManController::class, "handle"]);