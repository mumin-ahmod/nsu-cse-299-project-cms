<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserRoleController;
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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

// Route::get('/admin', function () {
//     return view('backend.dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('backend.dashboard');
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

    // Create a new company
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

    // Show a specific company
    Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');

    // Edit a company
    Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('/sales/{sale}', [SaleController::class, 'update'])->name('sales.update');

    // Delete a company
    Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

    // Edit a company
    Route::get('/sales-chart', [SaleController::class, 'salesChart'])->name('sales.chart');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // List all users and their roles
    Route::get('/user-roles', [UserRoleController::class, 'index'])->name('user-roles.index');

    // Make a user an admin
    Route::post('/user-roles/make-admin/{user}', [UserRoleController::class, 'makeAdmin'])->name('user-roles.make-admin');

    // Remove admin privileges from a user
    Route::post('/user-roles/remove-admin/{user}', [UserRoleController::class, 'removeAdmin'])->name('user-roles.remove-admin');

    // Add the status update route
    Route::put('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'updateStatus'])->name('leave-requests.status-update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('leave-requests.index');
    Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->name('leave-requests.create');
    Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->name('leave-requests.store');

    // List companies
    Route::get('/sales/all', [SaleController::class, 'index'])->name('sales.index');
    // List customers
    Route::get('/customers/all', [CustomerController::class, 'index'])->name('customers.index');

    // Add the delete route
    Route::delete('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'destroy'])->name('leave-requests.destroy');

    Route::get('/leave-requests/my-requests', [LeaveRequestController::class, 'myRequests'])->name('leave-requests.my-requests');
    // List companies
    Route::get('/companies/all', [CompanyController::class, 'index'])->name('companies.index');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});

require __DIR__ . '/auth.php';
