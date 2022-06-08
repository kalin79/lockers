<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('categoria', 'api\CategoriaController');

Route::prefix('v1')->group(function(){
    Route::get('categoria/{id}',[App\Http\Controllers\Api\CategoriaController::class, 'categorias']);
    Route::post('categoria/listado/productos',[App\Http\Controllers\Api\CategoriaController::class, 'productos']);
    Route::post('categoria/listado/buscar',[App\Http\Controllers\Api\CategoriaController::class, 'buscar']);
    Route::get('categoria/ver/todas',[App\Http\Controllers\Api\CategoriaController::class, 'todas']);
    Route::get('filtros',[App\Http\Controllers\Api\CategoriaController::class, 'listaFiltros']);
    Route::get('producto/{id}',[App\Http\Controllers\Api\ProductoController::class, 'detalle']);
    Route::post('mail/cotizar',[App\Http\Controllers\Api\ProductoController::class, 'cotizar']);
    Route::post('mail/contacto',[App\Http\Controllers\Api\ProductoController::class, 'contacto']);
});

