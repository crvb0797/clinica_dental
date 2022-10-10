<?php

use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('modulos.seleccionar');
});

/* Route::get('/ingresar', function () {
    return view('modulos.ingresar');
}); */

Auth::routes();

Route::get('/inicio', [InicioController::class, 'index']);


/* Consultorios */
Route::get('/consultorios', [ConsultoriosController::class, 'index']);
Route::post('/consultorios', [ConsultoriosController::class, 'store']);