<?php

use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('top');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/foods', [FoodsController::class, 'index'])->name('foods.index');
Route::get('/foods/create', [FoodsController::class, 'create'])->name('foods.create');
Route::post('/foods', [FoodsController::class, 'store'])->name('foods.store');
Route::get('/foods/{food}/edit', [FoodsController::class, 'edit'])->name('foods.edit');
Route::put('/foods/{food}/update', [FoodsController::class, 'update'])->name('foods.update');
Route::delete('/foods/{food}/destroy', [FoodsController::class, 'destroy'])->name('foods.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
