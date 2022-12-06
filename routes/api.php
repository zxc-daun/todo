<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/todos', [\App\Http\Controllers\API\TodoController::class, 'index']);
Route::post('/delete', [\App\Http\Controllers\API\TodoController::class, 'index']);
Route::post('register', [App\Http\Controllers\API\AuthApiController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\AuthApiController::class, 'login']);
Route::get('emps', [App\Http\Controllers\API\EmployeeController::class, 'index'])->middleware('auth:api');
