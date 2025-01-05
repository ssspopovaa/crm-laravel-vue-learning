<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('users', [UsersController::class, 'index']);
Route::get('users/{id}', [UsersController::class, 'user']);

Route::middleware([Authenticate::class])->group(function () {
    Route::middleware(['roles:admin'])->group(function () {
        Route::get('roles', [RolesController::class, 'list']);
    });
});

//Route::get('/', [RolesController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
