<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\DataEncoderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReportController;
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
    return view('auth.login');
});

// Route::get('/report', [ReportController::class,'generate']);
Route::post('/report/generate', [ReportController::class,'generate']);
Route::get('/report', [ReportController::class,'index']);

Route::middleware('auth')->group(function () {

	Route::get('/home',[HomeController::class,'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


     Route::get('/invoices',[InvoiceController::class,'index']);
     Route::get('/register/user',[AdminController::class,'addUser']);
     Route::post('/register/user',[AdminController::class,'create'])->name('admin.user');
   Route::get('/invoices/{id}',[InvoiceController::class,'show']);
   Route::get('/invoice/create',[InvoiceController::class,'create']);
   Route::post('/invoice',[InvoiceController::class,'store']);
   Route::get('/invoices/edit/{id}',[InvoiceController::class,'edit']);
   Route::put('/invoice/{id}',[InvoiceController::class,'update']);
   Route::delete('/invoice/{id}',[InvoiceController::class,'destroy']);


// Route::get('')


   Route::post('/client/get',[ClientController::class,'search'])->name('search');

   /************************Client***************************************/
   Route::get('clients',[ClientController::class,'index']);
   Route::get('clients/{id}',[ClientController::class,'show']);
   Route::get('client/create',[ClientController::class,'create']);
   Route::post('client',[ClientController::class,'store']);
   Route::get('clients/edit/{id}',[ClientController::class,'edit']);
   Route::put('clients/{id}',[ClientController::class,'update']);
   Route::delete('clients/{id}',[ClientController::class,'destroy']);
   /*********************************************************************/



  /*******************Service***************************************/
   Route::get('services',[ServiceController::class,'index']);
   Route::get('services/{id}',[ServiceController::class,'show']);
   Route::get('service/create',[ServiceController::class,'create']);
   Route::post('service',[ServiceController::class,'store']);
   Route::get('services/edit/{id}',[ServiceController::class,'edit']);
   Route::put('services/{id}',[ServiceController::class,'update']);
   Route::delete('services/{id}',[ServiceController::class,'destroy']);
   /*********************************************************************/
});

   Route::get('print/{id}',[InvoiceController::class,'print']);




// Route::middleware(['admin'])->group(function () {
//    Route::get('/invoices',[InvoiceController::class,'index']);
//    Route::get('/invoices/{id}',[InvoiceController::class,'show']);
//    Route::get('/invoice/create',[InvoiceController::class,'create']);
//    Route::post('/invoice',[InvoiceController::class,'store']);
//    Route::get('/invoices/edit/{id}',[InvoiceController::class,'edit']);
//    Route::put('/invoice/{id}',[InvoiceController::class,'update']);
//    Route::delete('/invoice/{id}',[InvoiceController::class,'destroy']);


// // Route::get('')


//    Route::post('/client/get',[ClientController::class,'search'])->name('search');

//    /************************Client***************************************/
//    Route::get('clients',[ClientController::class,'index']);
//    Route::get('clients/{id}',[ClientController::class,'show']);
//    Route::get('client/create',[ClientController::class,'create']);
//    Route::post('client',[ClientController::class,'store']);
//    Route::get('clients/edit/{id}',[ClientController::class,'edit']);
//    Route::put('clients/{id}',[ClientController::class,'update']);
//    Route::delete('clients/{id}',[ClientController::class,'destroy']);
//    /*********************************************************************/



//   /*******************Service***************************************/
//    Route::get('services',[ServiceController::class,'index']);
//    Route::get('services/{id}',[ServiceController::class,'show']);
//    Route::get('service/create',[ServiceController::class,'create']);
//    Route::post('service',[ServiceController::class,'store']);
//    Route::get('services/edit/{id}',[ServiceController::class,'edit']);
//    Route::put('services/{id}',[ServiceController::class,'update']);
//    Route::delete('services/{id}',[ServiceController::class,'destroy']);
//    /*********************************************************************/
// });

require __DIR__.'/auth.php';
