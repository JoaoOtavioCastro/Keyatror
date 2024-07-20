<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayerController;

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
Route::get("/", function () {
    return view("home");
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::get('/user/edit', function () {
        return view('profile/show');
    })->name('user.edit');
  
    Route::get('/layers', [LayerController::class, 'index'])->name('layers.index');
    Route::get('/layers/{layer}', [LayerController::class, 'show'])->name('layers.show');
    Route::get('/layer/create', [LayerController::class, 'create'])->name('layers.create');
    Route::post('/layer', [LayerController::class, 'store'])->name('layers.store');
    Route::get('/layer/{layer}/edit', [LayerController::class, 'edit'])->name('layers.edit');
    Route::put('/layer/{layer}', [LayerController::class, 'update'])->name('layers.update');
    Route::delete('/layer/{layer}', [LayerController::class, 'destroy'])->name('layers.destroy');


});
