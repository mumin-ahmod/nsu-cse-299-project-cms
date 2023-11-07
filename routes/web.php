<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CompanyController;

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


Route::get('/home', function () {
    return view('welcome');
})->name('home');

// Route::get('/admin', function () {
//     return view('backend.dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('backend.dashboard');
    })->middleware('admin');

    Route::get('/user-dashboard', function () {
        return view('users.layouts');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'admin'])->group(function () {
    // List customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    
    // Create a new customer
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    
    // Show a specific customer
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    
    // Edit a customer
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    
    // Delete a customer
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});



Route::middleware(['auth', 'admin'])->group(function () {
    // List companies
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    
    // Create a new company
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    
    // Show a specific company
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    
    // Edit a company
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    
    // Delete a company
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});



require __DIR__.'/auth.php';
