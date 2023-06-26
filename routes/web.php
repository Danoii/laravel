<?php

use App\Http\Controllers\HtmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PengelolaController;
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

Route::middleware(['auth'])->group(function(){
    Route::resource('Wisata',WisataController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('kategori',KategoriController::class);




Route::get('/pengelola', [PengelolaController::class, 'index']);
Route::get('/peng-add', [PengelolaController::class, 'create']);



Route::get('/htm', [HtmController::class, 'index']);
Route::get('/htm-add', [HtmController::class, 'create']);
