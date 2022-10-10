<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
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
Route::group(['prefix' => 'auth'], function (){
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::get('login', [AuthController::class, 'auth'])->name('auth');
    Route::post('user/create', [AuthController::class, 'create'])->name('user.create');
    Route::post('signin', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [\App\Http\Controllers\TodoController::class,'index'])->name('todos');
Route::get('/create', [TodoController::class, 'create'])->name('create');
Route::post('/store', [TodoController::class, 'store'])->name('store');
Route::get('{todo}', [TodoController::class, 'todo'])->name('todo');
Route::get('{todo}/edit', [TodoController::class, 'edit'])->name('edit');
Route::post('{todo}/edit/save', [TodoController::class, 'editSave'])->name('edit.save');
Route::get('{todo}/delete', [TodoController::class, 'delete'])->name('delete');
