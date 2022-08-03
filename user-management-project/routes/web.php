<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

// Route::prefix("/user")->group(function(){

// });
Route::get('/', [UserController::class, "index"])->name('login');
Route::get('/allUsers', [UserController::class, "allUsers"])->name('allUsers');
Route::get('/userRegister', [UserController::class, "userRegister"])->name('userRegister');
Route::get('/userProfile', [UserController::class, "userProfile"])->name('userProfile');
Route::get('/home', [HomeController::class, "index"])->name('home');
Route::get('/updateUser', [UserController::class, "updateUser"])->name('updateUser');
Route::get('/resetpassword', [UserController::class, "resetPassword"])->name('resetPassword');

//Backend Routes
Route::post('/register', [UserController::class, "register"])->name('user.register');
Route::post('/userlogin', [UserController::class, "userlogin"])->name('user.userlogin');
Route::get('/userlogout', [UserController::class, "userlogout"])->name('user.userlogout');
Route::get('/delete', [UserController::class, "userdelete"])->name('user.userdelete');
Route::post('/userupdate', [UserController::class, "userUpdate"])->name('user.userUpdate');
Route::post('/passwordReset', [UserController::class, "passwordReset"])->name('user.passwordReset');
