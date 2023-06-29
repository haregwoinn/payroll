<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\Citycontroller;
use App\Http\Controllers\PdfController;


//middle ware




// home application
Route::get('/',[AllowanceController::class,'index'])->middleware('checksalary')->name('homepage');

//user register

Route::get('/userregisterpage', [AllowanceController::class,'userregisterpage'])->name('userregisterpage');
Route::post('/userregister', [AllowanceController::class,'userregister'])->name('new.userregister');

//user login page
Route::get('/userloginpage',[AllowanceController::class,'userloginpage'])->name('userloginpage');
Route::post('/userlogin',[AllowanceController::class,'userlogin'])->name('login.userpage');

//user logout

Route::get('/userlogout',[AllowanceController::class,'userlogout'])->name('userlogout');


Route::middleware(['checkuser'])->group(function(){

    Route::get('/salarypage',[AllowanceController::class,'salarypage'])->name('salarypage');
    Route::post('/addsalary',[AllowanceController::class,'addsalary'])->name('addsalary');
    Route::get('/printedpagenew',[PdfController::class,'printpdf'])->name('printpdf');
    Route::post('/createhistry',[PdfController::class,'createhistry'])->name('create.histry');
});

    //salary 





Route::middleware(['alw'])->group(function(){

// admin scale route
Route::get('/admin',[Citycontroller::class,'index'])->name('admin'); 
Route::post('/admin/addscale', [CityController::class, 'addscale'])->name('admin.add');
Route::get('/admin/editscale/{id}', [CityController::class, 'editscale']);
Route::post('/admin/updatescale', [CityController::class, 'updatescale'])->name('scale.update');
Route::get('/admin/removescale/{id}', [CityController::class, 'removescale']);




// admin city
Route::get('/city',[Citycontroller::class,'city'])->name('citylist');
Route::post('/city/addcity', [CityController::class, 'addcity'])->name('city.add');
Route::get('/city/edit/{id}',[Citycontroller::class,'editcity']);
Route::post('/admin/updatecity', [CityController::class, 'updatecity'])->name('city.update');
Route::get('/city/remove/{id}',[Citycontroller::class,'removecity']);

});



//admin register

Route::get('/registerpage', [AllowanceController::class,'registerpage'])->name('registerpage');
Route::post('/register', [AllowanceController::class,'register'])->name('new.regster');

//admin login

Route::get('/loginpage',[AllowanceController::class,'loginpage'])->name('login');
Route::post('/login',[AllowanceController::class,'login'])->name('login.user');


//admin logout

Route::get('/logout',[AllowanceController::class,'logout'])->name('logout');




//pdf operatio









