<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Models\Register;

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

//Individual Routes

// Route::get('/', [RegisterUserController::class,'create']);
// Route::get('/getdata',[RegisterUserController::class,'index'])->name('form.getdata');
// Route::post('/register',[RegisterUserController::class,'store'])->name('form.register');
// Route::get('/user/edit/{id}',[RegisterUserController::class,'edit'])->name('form.edit');
// Route::put('/update/{id}',[RegisterUserController::class,'update'])->name("form.update");
// Route::delete('users/delete/{id}', [RegisterUserController::class,'destroy'])->name('form.delete');
// Route::get('/user/{id}',[RegisterUserController::class,'show'])->name("form.show");


//Group Routes for same controller
Route::controller(RegisterUserController::class)->group(function() {
    Route::get('/', 'create');
    Route::get('/getdata','index')->name('form.getdata');
    Route::post('/register','store')->name('form.register');
    Route::get('/edit/{id}','edit')->name('form.edit');
    Route::put('/update/{id}','update')->name("form.update");
    Route::delete('delete/{id}', 'destroy')->name('form.delete');    
});