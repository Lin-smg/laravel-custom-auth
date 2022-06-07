<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/auth/loginAuth', [AuthController::class, 'loginAuth'])->name('loginAuth');
Route::post('/auth/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['customAuth']], function() {

    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
});
