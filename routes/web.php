<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GeneralController;
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

// front end route for customers

Route::get('/', [ GeneralController::class, 'index']);
Route::get('/contact', [ GeneralController::class, 'contact']);
Route::post('/send', [ GeneralController::class, 'send']);
Route::get('/menu', [ GeneralController::class, 'menu']);
Route::get('/categoryfood/{categoryName}/', [ GeneralController::class, 'categoryMenu']);
Route::get('/cartlist', [ GeneralController::class, 'cartlist']);



//dashboard for authorised users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//routes for profiles
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//routes for employees
Route::prefix('employee')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employeedashboard');
    Route::get('/sale', [EmployeeController::class, 'sale'])->name('sale');
});
