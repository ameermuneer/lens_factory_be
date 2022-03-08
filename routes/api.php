<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LensController;
use App\Http\Controllers\RawController;
use App\Http\Controllers\RawValuesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/raw',[RawController::class,'index']) ;
Route::get('/raw/{raw}',[RawController::class,'show']) ;
Route::get('/raw_with_values/{raw}',[RawController::class,'showWithValues']) ;
Route::post('/raw',[RawController::class,'store']) ;
Route::post('/raw/{raw}',[RawController::class,'update']) ;
Route::delete('/raw/{raw}',[RawController::class,'destroy']) ;

Route::get('/lens',[LensController::class,'index']) ;
Route::get('/lens/{lens}',[LensController::class,'show']) ;
Route::get('/lens_with_bases/{lens}',[LensController::class,'showWithBases']) ;
Route::post('/lens',[LensController::class,'store']) ;
Route::post('/lens/{lens}',[LensController::class,'update']) ;
Route::delete('/lens/{lens}',[LensController::class,'destroy']) ;

//Route::get('/rawValue',[RawValuesController::class,'index']) ;
Route::get('/rawValue/{rawValue}',[RawValuesController::class,'show']) ;
Route::post('/rawValue',[RawValuesController::class,'store']) ;
Route::post('/rawValue/{rawValue}',[RawValuesController::class,'update']) ;
Route::delete('/rawValue/{rawValue}',[RawValuesController::class,'destroy']) ;

Route::post('/base',[BaseController::class,'store']) ;
Route::post('/base/{base}',[BaseController::class,'update']) ;
Route::get('/base/{base}',[BaseController::class,'show']) ;
Route::delete('/base/{base}',[BaseController::class,'destroy']) ;


Route::get('/invoice',[InvoiceController::class,'index']) ;
Route::get('/invoice/{invoice}',[InvoiceController::class,'show']) ;
Route::post('/invoice',[InvoiceController::class,'store']) ;
Route::post('/invoice/{invoice}',[InvoiceController::class,'update']) ;
Route::delete('/invoice/{invoice}',[InvoiceController::class,'destroy']) ;
