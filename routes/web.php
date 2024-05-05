<?php

use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/admin/login', [adminLoginController::class, 'index'])->name('admin.login');
// Route::get('/', [AuthManager::class, 'home']) -> name('home');
// Route::get('/', function(){
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [adminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [adminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/login', [AuthManager::class, 'login']) -> name('login');
Route::post('/login', [AuthManager::class, 'loginPost']) -> name('login.post');

Route::get('/registration', [AuthManager::class, 'registration']) -> name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost']) -> name('registration.post');


Route::get('/logout', [AuthManager::class, 'logout']) -> name('logout');


