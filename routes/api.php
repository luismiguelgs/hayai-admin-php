<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('categorias', 'CategoriasController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('comprobantes', 'ComprobantesController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('operaciones', 'OperacionesController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('proveedores', 'ProveedoresController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('productos', 'ProductosController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('subcategorias', 'SubcategoriasController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('stocks', 'StocksController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
//Ingresos
Route::resource('ingresos', 'IngresosController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('ingresos/detalle', 'DetalleIngresosController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::get('ingresos/{ingreso}/detalle','DetalleIngresosController@index');
//Salidas
Route::resource('salidas', 'SalidasController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::resource('salidas/detalle', 'DetalleSalidasController', ['only' => [
    'index', 'show', 'update', 'store', 'destroy'
]]);
Route::get('salidas/{salida}/detalle','DetalleSalidasController@index');