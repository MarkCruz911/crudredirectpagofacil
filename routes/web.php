<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ProductsController;


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


Route::get('/',[PersonasController::class,'index']);
Route::get('/indexproduct',[ProductsController::class,'ListarProductos']);
Route::get('/viewstore',[ProductsController::class,'storeProduct']);
Route::get('/viewEdit',[ProductsController::class,'editProduct']);
Route::post('/crearproduct',[ProductsController::class,'almacenarEnLaBaseDatos']);
Route::put('/updateproduct',[ProductsController::class,'updateProduct']);
Route::put('/destroyProduct',[ProductsController::class,'destroyProduct']);
Route::get('/showProduct',[ProductsController::class,'showProduct']);
Route::get('/showProductComprar',[ProductsController::class,'verProductoComprar']);
Route::post('/logicaProductoComprar',[ProductsController::class,'logicaProductoComprar']);
Route::get('/create',[PersonasController::class,'create']);
Route::post('/store',[PersonasController::class,'store']);
Route::get('/edit/{id}',[PersonasController::class,'edit']);
Route::put('/update/{id}',[PersonasController::class,'update']);
Route::get('/show/{id}',[PersonasController::class,'show']);
Route::delete('/destroy/{id}',[PersonasController::class,'destroy']);

