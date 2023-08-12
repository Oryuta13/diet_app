<?php

use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MetabolismController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// トップページ
Route::get('/', function () {
    return view('top');
})->name('top');

// ログインページ
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// 新規登録ページ
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ログアウト
Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

// ダッシュボード
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// 基礎代謝計算機能
Route::middleware(['auth'])->group(function () {
    Route::get('/calculate-metabolism', [MetabolismController::class, 'showMetabolismForm'])->name('metabolism.form');
    Route::post('/calculate-metabolism', [MetabolismController::class, 'calculateMetabolism'])->name('metabolism.calculate');
    Route::get('/calculation-result', [MetabolismController::class, 'showCalculationResult'])->name('metabolism.result');
});

// 食事内容CRUD機能
Route::middleware(['auth'])->group(function () {
    Route::get('/foods', [FoodsController::class, 'index'])->name('foods.index');
    Route::get('/foods/create', [FoodsController::class, 'create'])->name('foods.create');
    Route::post('/foods', [FoodsController::class, 'store'])->name('foods.store');
    Route::get('/foods/{food}/edit', [FoodsController::class, 'edit'])->name('foods.edit');
    Route::put('/foods/{food}/update', [FoodsController::class, 'update'])->name('foods.update');
    Route::delete('/foods/{food}/destroy', [FoodsController::class, 'destroy'])->name('foods.destroy');
});

// プロフィール編集機能
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
