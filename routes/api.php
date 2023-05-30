<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
                                    // Crud Routes
Route::post('/getAllUsers',[App\Http\Controllers\UserController::class, 'getAllUsers'])->name('getAllusers');
Route::Post('/getUserById',[App\Http\Controllers\UserController::class, 'getUserById'])->name('getUserById');
Route::Post('/createUser',[App\Http\Controllers\UserController::class, 'createUser'])->name('createUser');
Route::Post('/updateUser',[App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');
Route::Post('/updateUserPassword',[App\Http\Controllers\UserController::class, 'updateUserPassword'])->name('updateUserPassword');
Route::Post('/deleteUser',[App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
// Auth Routes
Route::Post('/registerWithEmail',[App\Http\Controllers\Auth\RegisterController::class, 'registerWithEmail'])->name('registerWithEmail');
Route::Post('/loginUser',[App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('loginUser');
Route::Post('/logoutUser',[App\Http\Controllers\Auth\LoginController::class, 'logoutUser'])->name('logoutUser');
