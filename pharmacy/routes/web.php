<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms')->group(function () {
    Route::view('/' , 'cms/parent')->name('main');
    Route::resource('admin' , AdminController::class); 
    Route::resource('emp' , EmployeeController::class);  
    Route::resource('patient' , PatientController::class); 
    Route::resource('supplier' , SupplierController::class); 
    Route::resource('medicin' , MedicinController::class); 

Route::get('/index/supplier/{id}' , [SupplierController::class , 'indexSupplier'])->name('indexSupplier');
Route::get('/create/supplier/{id}' , [SupplierController::class , 'createSupplier'])->name('createSupplier');

Route::get('/index/medicin/{id}' , [MedicinController::class , 'indexMedicin'])->name('indexMedicin');
Route::get('/create/medicin/{id}' , [MedicinController::class , 'createMedicin'])->name('createMedicin');

});

