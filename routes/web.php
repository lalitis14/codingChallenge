<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');
Route::get('/facturas', 'FacturasController@listado');
Route::get('/factura-detalle/{id}', 'FacturasController@detalle');
Route::get('/factura-editar/{id}', 'FacturasController@visualizarEdicion');
Route::post('/factura-editar/{id}', 'FacturasController@confirmarEdicion');
