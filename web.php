<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
/* 
Route::get('/', function () {
    return view('layouts.signup');
});

Route::get('/login', function () {
    return view('layouts.login');
});*/

Route::get('/login', function () {
    return view('auth.login');
})->name('loginn'); 

Auth::routes();
Route::get('/registered',[App\Http\Controllers\HomeController::class,'registeredDisplayMessage'])->name('signup');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'register' ])->name('registered');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user',[App\Http\Controllers\HomeController::class,'userPage'])->name('user');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('auth/login', [App\Http\Controllers\HomeController::class, 'loggedIn'])->name('loggedin');

//route to display menu items
Route::post('admin/home/displayMenu',[App\Http\Controllers\FoodController::class,'index'])->name('showMenu');

//route to add items to menu
Route::post('admin/home/addItem',[App\Http\Controllers\FoodController::class,'store'])->name('addMenu');

//Route::post('/admin/home/adminActions',[App\Http\Controllers\HomeController::class,'store'])->name('adminActions');
Route::post('/admin/home/adminActions',[App\Http\Controllers\AdminController::class,'store'])->name('adminActions');
Route::view('dashboard-url', 'dashboard-blade-view');

//route to the crud operations on users

Route::resource('users', App\Http\Controllers\AdminController::class);

//route to the crud operations on food menu
Route::resource('/food', App\Http\Controllers\FoodController::class);

Route::get('admin/team', function () {
    return view('team');
})->name('editUser');