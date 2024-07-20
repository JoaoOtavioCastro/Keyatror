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
#Route::get("/", [HomeController::class ,"index"])->name("home");
Route::get('/', [LayerController::class, 'index'])->name('layers.index');
Route::get('/{layer}', [LayerController::class, 'show'])->name('layers.show');
Route::get('/layers/create', [LayerController::class, 'create'])->name('layers.create');
Route::post('/layers', [LayerController::class, 'store'])->name('layers.store');
Route::get('/layers/{layer}/edit', [LayerController::class, 'edit'])->name('layers.edit');
Route::put('/layers/{layer}', [LayerController::class, 'update'])->name('layers.update');
Route::delete('/layers/{layer}', [LayerController::class, 'destroy'])->name('layers.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
  
});
