<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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


Route::get('/list', [
    GuestController::class,
    'show',
    "title" => "Guest Management"
])->middleware('auth');

Route::post('/guest-action', [GuestController::class, 'store']);
Route::get('/list/add-guest', [GuestController::class, 'formAdd'])->middleware('admin');
Route::get('/list/edit-guest/{id}', [GuestController::class, 'formEdit'])->middleware('admin');
Route::post('/list/save', [GuestController::class, 'create'])->middleware('admin');
Route::post('/list/edit-guest/save', [GuestController::class, 'edit'])->middleware('admin');
Route::get('/list/delete-guest/{id}', [GuestController::class, 'delete'])->middleware('admin');
