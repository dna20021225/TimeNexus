<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// TestControllerのdashboardメソッドを呼び出す
Route::get('/dashboard', [TestController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 各種書類のルーティング
Route::get('/documents/{category}/{id}', [TestController::class, 'showDocument'])
    ->name('documents.show');


Route::post('/store-expenseapplication', [TestController::class, 'storeExpenseApplication'])
    ->name('store-expense-application');

Route::get('module-test', [TestController::class, 'moduleTest'])
    ->name('module-test');

// attendance.create
Route::get('/attendance/create', [TestController::class, 'createAttendance'])
    ->name('attendance.create');

require __DIR__.'/auth.php';
