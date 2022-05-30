<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ReportController; 

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
    return view('home', [
        "title" => "Home"
    ]);
})->middleware('auth');



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// guest form action
// Route::post('/guest-action', [GuestController::class, 'store']);


// guest management
Route::resource('/list', GuestController::class)->middleware('auth');


// user management
Route::get('/dashboard', [
    DashboardController::class,
    'index',
    "title" => "User Management"
])->middleware('admin');

// store user
Route::post('/dashboard', [
    DashboardController::class,
    'store',
    "title" => "User Management"
])->middleware('admin');

// user form action
Route::get('/dashboard/add', [
    FormController::class,
    'formAdd',
    "title" => "User Management"
])->middleware('admin');

Route::get('/dashboard/update/{id}', [FormController::class, 'formEdit'])->middleware('admin');


Route::get('/dashboard/{id}', [DashboardController::class, 'destroy'])->middleware('admin'); // delete user
Route::post('/dashboard/update', [DashboardController::class, 'update'])->middleware('admin'); // update user

Route::get('/report', [ReportController::class, 'index'])->middleware('admin'); // delete user



