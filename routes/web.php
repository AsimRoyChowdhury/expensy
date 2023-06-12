<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('registration');
});

Route::get('/guestinfo', function () {
    return view('guestDashboard');
});

Route::get('/admininfo', function () {
    return view('adminDashboard');
});

Route::get('/edituser', function () {
    return view('editUserInfo');
});
