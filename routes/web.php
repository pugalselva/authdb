<?php

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

Route::get('/', function () {
    return view('welcome');
});

//employee routes
Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [EmployeeProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [EmployeeProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [EmployeeProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [EmployeeProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin routes
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/admin/employees', [AdminProfileController::class, 'index'])->name('admin.employees.index');
    Route::get('/admin/employees/{id}', [AdminProfileController::class, 'show'])->name('admin.employees.show');
    Route::get('/admin/employees/{id}/edit', [AdminProfileController::class, 'edit'])->name('admin.employees.edit');
    Route::patch('/admin/employees/{id}', [AdminProfileController::class, 'update'])->name('admin.employees.update');
    Route::delete('/admin/employees/{id}', [AdminProfileController::class, 'destroy'])->name('admin.employees.destroy');
    Route::get('/admin/employees/create', [AdminProfileController::class, 'create'])->name('admin.employees.create');
    Route::post('/admin/employees', [AdminProfileController::class, 'store'])->name('admin.employees.store');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
