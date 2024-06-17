
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Models\Category;
use App\Models\Employee;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin']) -> group(function (){
    Route::get ('admin/dashboard', [HomeController::class, 'index']);

    Route::get ('/admin/product', [ProductController::class, 'index']) -> name('admin.product');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/save', [ProductController::class, 'save'])->name('admin.product.save');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');

    Route::get ('/admin/employee', [EmployeeController::class, 'index'])->name('admin.employee');
    Route::get ('/admin/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/admin/employee/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/admin/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/admin/employee/edit/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
    Route::get('/admin/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('admin.employee.delete');

    Route::get ('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get ('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post ('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::resource('products', ProductController::class);

});

require __DIR__.'/auth.php';
