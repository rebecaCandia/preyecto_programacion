<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [UsuarioController::class, 'loginInicio'])->name('login');
Route::get('/login', [UsuarioController::class, 'loginInicio'])->name('login');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('inicio', [InicioController::class, 'inicio'])->name('inicio');



    Route::controller(ProductoController::class)->group(function () {
        Route::get('productos', 'index')->name('productos.index');
        Route::get('productos/creando',  'crear')->name('productos.crear');
        Route::post('productos',  'store')->name('productos.store');
        Route::get('productos/{id}',  'show')->name('productos.show');
        Route::delete('productos/{id}',  'destroy')->name('productos.delete');
        Route::put('productos/{id}',  'update')->name('productos.edit');
    });
    Route::controller(ClientesController::class)->group(function () {
        Route::get('cliente', 'index');
        Route::get('cliente/creando',  'crear');

    });
    Route::controller(CategoriaController::class)->group(function () {
        Route::get('categorias', 'index')->name('categorias.index');
        Route::get('categorias/create', 'create')->name('categorias.create');
        Route::post('categorias', 'store')->name('categorias.store');
        Route::get('categorias/{id}/edit', 'edit')->name('categorias.edit');
        Route::delete('categorias/{id}', 'destroy')->name('categorias.destroy');
        Route::put('categorias/{id}', 'update')->name('categorias.update');  
    });
    Route::controller(ProveedorController::class)->group(function () {
        Route::get('proveedores', 'index')->name('proveedores.index');
        Route::get('proveedores/create', 'create')->name('proveedores.create');
        Route::post('proveedores', 'store')->name('proveedores.store');
        Route::get('proveedores/{id}/edit', 'edit')->name('proveedores.edit');
        Route::put('proveedores/{id}', 'update')->name('proveedores.update');
        Route::delete('proveedores/{id}', 'destroy')->name('proveedores.destroy');
    });
});


    

Route::get('clientes', function () {
   return 'HOLA Clientes' ;
});