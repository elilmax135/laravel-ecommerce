<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\ProductController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

//use App\Http\Controllers\LayoutController;

use App\Http\Controllers\CartController;
Route::get('/cart/pdf', [CartController::class, 'generatePDF'])->name('cart.pdf');
Route::middleware(['auth'])->group(function () {
    Route::get('/order', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


});

Route::get('/', function () {
    return view('loginlayout');
});
    //Route::get('/customers', function () {
    //return view('customers.customerlayout');
//});


//Route::get('/', [LayoutController::class]);

Route::resource('/category', CategoryController::class);
Route::resource('/admindashboard', AdminDashboardController::class);
Route::resource('/userdashboard', UserDashboardController::class);
Route::resource('/product', ProductController::class);
Route::resource('/customers', CustomerProductController::class);



// User Routes
Route::get('/user/login', [AuthController::class, 'showUserLogin'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('userLogin');

Route::get('/user/register', [AuthController::class, 'showUserRegister'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'userRegister'])->name('userRegister');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/admin/register', [AuthController::class, 'showAdminRegister'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'adminRegister']);

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
