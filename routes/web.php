<?php

use App\Http\Controllers\Backend\UrlController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

    //Routes for Shortener urls
    Route::get('/get-short-urls', [UrlController::class, 'index'])->name('get-short-urls');
    Route::post('/add-short-url', [UrlController::class, 'store'])->name('add-short-url');
    Route::get('/edit-short-url', [UrlController::class, 'edit']);
    Route::put('/update-short-url/{id}', [UrlController::class, 'update']);
    Route::delete('/delete-short-url/{id}', [UrlController::class, 'destroy']);
});




