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

//                                  Auth Routes

//                                    User Authentication Routes
Route::prefix('user')->name('user.')->group(function()
{
    Route::middleware(['guest:web'])->group(function()
    {
        Route::Post('/registerWithEmail',[App\Http\Controllers\User\Auth\RegisterController::class, 'registerWithEmail'])->name('registerWithEmail');
        Route::Post('/loginUser',[App\Http\Controllers\User\Auth\LoginController::class, 'loginUser'])->name('loginUser');
        Route::Post('/logoutUser',[App\Http\Controllers\User\Auth\LoginController::class, 'logoutUser'])->name('logoutUser');
    });
    Route::middleware(['auth:web'])->group(function()
    {
        Route::post('/getAllUsers',[App\Http\Controllers\User\UserController::class, 'getAllUsers'])->name('getAllusers');
        Route::Post('/getUserById',[App\Http\Controllers\User\UserController::class, 'getUserById'])->name('getUserById');
        Route::Post('/createUser',[App\Http\Controllers\User\UserController::class, 'createUser'])->name('createUser');
        Route::Post('/updateUser',[App\Http\Controllers\User\UserController::class, 'updateUser'])->name('updateUser');
        Route::Post('/updateUserPassword',[App\Http\Controllers\User\UserController::class, 'updateUserPassword'])->name('updateUserPassword');
        Route::Post('/deleteUser',[App\Http\Controllers\User\UserController::class, 'deleteUser'])->name('deleteUser');
        // Route::Post('/logoutUser',[App\Http\Controllers\User\Auth\LoginController::class, 'logoutUser'])->name('logoutUser');
    });
});
//                                     Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function()
{
    Route::middleware('auth:admin')->group(function()
    {
        Route::Post('/registerWithEmail',[App\Http\Controllers\Admin\Auth\RegisterController::class, 'registerWithEmail'])->name('registerWithEmail');
        Route::Post('/loginUser',[App\Http\Controllers\Admin\Auth\LoginController::class, 'loginUser'])->name('loginUser');
        Route::Post('/logoutUser',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logoutUser'])->name('logoutUser');
    });
});
//                                     Super Admin Authentication Routes
Route::prefix('superAdmin')->name('superAdmin.')->group(function()
{
    Route::middleware('auth:super_admin')->group(function()
    {
        Route::Post('/registerWithEmail',[App\Http\Controllers\SuperAdmin\Auth\RegisterController::class, 'registerWithEmail'])->name('registerWithEmail');
        Route::Post('/loginUser',[App\Http\Controllers\SuperAdmin\Auth\LoginController::class, 'loginUser'])->name('loginUser');
        Route::Post('/logoutUser',[App\Http\Controllers\SuperAdmin\Auth\LoginController::class, 'logoutUser'])->name('logoutUser');
    });
});