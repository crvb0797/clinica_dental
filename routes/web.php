<?php

use App\Http\Controllers\InicioController;
use App\Models\Inicio;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('modulos.seleccionar');
});

Route::get('/ingresar', function () {
    return view('modulos.ingresar');
});

Auth::routes();

Route::get('/inicio', [InicioController::class, 'index']);