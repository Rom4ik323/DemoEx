<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
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

//Главная страница
Route::get('/', function () {
    return view('main');
});

//Регистрация
Route::get('/register',     [UserController::class, 'create']);
Route::post('/register',    [UserController::class, 'store'])->name('user.store');

//Вход
Route::get('/login',     [UserController::class, 'loginform'])->name('login');
Route::post('/login',    [UserController::class, 'login'])->name('user.login');

//Пути, доступные авторизованному пользователю
Route::middleware(['auth'])->group(function () {
    Route::get('/logout',               [UserController::class, 'logout']);
    Route::get('/tickets',              [TicketController::class, 'index']);
    Route::get('/ticket/create',        [TicketController::class, 'create']);
    Route::post('/ticket/create',       [TicketController::class, 'store'])->name('ticket.store');
});

//Пути, доступные администратору
Route::middleware(['admin'])->group(function () {
    Route::get('/admin',                [TicketController::class, 'admin']);
    Route::post('/ticket/update/{ticket}',       [TicketController::class, 'update'])->name('ticket.update');
});
