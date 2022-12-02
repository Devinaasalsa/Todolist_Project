<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::middleware('isGuest')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/register', [TodoController::class, 'register']);
    Route::post('/input', [TodoController::class, 'registerAccount'])->name('register.input');
    Route::post('/login/auth', [TodoController::class, 'auth'])->name('login.auth');
});

Route::middleware('isLogin')->group(function () {
    Route::get('/dashboard/welcome', [TodoController::class, 'welcome']);
    Route::get('/dashboard/todolist', [TodoController::class, 'todolist']);
    Route::get('/dashboard/createtodo', [TodoController::class, 'createtodo']);
    Route::get('/dashboard/complated', [TodoController::class, 'complated']);

    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    //route path yang menggunakan {} berarti berperan sebagai parameter route
    //parameter ini bentuknya data dinamis (data yang dikirim ke route untuk diambil di parameter function controller terkait)
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    Route::delete('/delete/{id}',[TodoController::class, 'destroy'])->name('delete');
    Route::patch('/complated/{id}', [TodoController::class, 'updateComplated'])->name('update-complated');
});

Route::get('/logout', [TodoController::class, 'logout'])->name('logout');
