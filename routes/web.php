<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::middleware('auth')->group(function(){

    Route::get('admin/index', [App\Http\Controllers\HomeController::class, 'index'])->name('admin/index');
    Route::get('/product/index',[productController::class,'index'])->name('product/index');
    Route::get('/product/create',[productController::class,'create'])->name('product/create');
    Route::post('/product/store',[productController::class,'store'])->name('product/store');
    Route::get('/product/delete/{id}',[productController::class,'delete'])->name('product/delete');
    Route::get('/product/edit/{id}',[productController::class,'edit'])->name('product/edit');
    Route::post('/product/update/{id}',[productController::class,'update'])->name('product/update');

    Route::get('sale/index', [saleController::class, 'index'])->name('sale/index');
    Route::get('sale/create', [saleController::class, 'create'])->name('sale/create');
    Route::post('sale/store', [saleController::class, 'store'])->name('sale/store');
    Route::get('sale/edit/{id}', [saleController::class, 'edit'])->name('sale/edit');
    Route::post('sale/update/{id}', [saleController::class, 'update'])->name('sale/update');
    Route::get('sale/filter', [saleController::class, 'filter'])->name('sale/filter');
    Route::get('sale/delete/{id}', [saleController::class, 'delete'])->name('sale/delete');
    Route::get('sale/view/{id}', [saleController::class, 'view'])->name('sale/view');
    Route::get('sale/rowdelete', [saleController::class, 'rowdelete'])->name('sale/rowDelete');

  Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
  Route::post('/profile/update/{id}',[ProfileController::class,'update'])->name('profile/update');
  Route::post('/profile/password/{id}',[ProfileController::class,'updatepassword'])->name('profile/password');
});


