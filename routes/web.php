<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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

// Route::resource('album', PhotoController::class);

Route::get('photo', [PhotoController::class, 'index'])->name('photo.dashboard');
Route::get('photo/create', [PhotoController::class, 'create'])->name('photo.create');
Route::post('photo', [PhotoController::class, 'store'])->name('photo.store');
Route::get('photo/{Photo}/edit', [PhotoController::class, 'edit'])->name('photo.edit');
Route::put('photo/{Photo}', [PhotoController::class, 'update'])->name('photo.update');
Route::delete('photo/{Photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');

