<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PacientesController;
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
Route::put('/consultorio/{id}', [ConsultoriosController::class, 'update']);
Route::delete('eliminar-consultorio/{id}', [ConsultoriosController::class, 'destroy']);

/* Doctores */
Route::get('/doctores', [DoctoresController::class, 'index']);
Route::post('/doctores', [DoctoresController::class, 'store']);
Route::get('eliminar-doctor/{id}', [DoctoresController::class, 'destroy']);

/* Pacientes */
Route::get('/pacientes', [PacientesController::class, 'index']);
Route::get('/crear-paciente', [PacientesController::class, 'create']);
Route::post('/crear-paciente', [PacientesController::class, 'store']);
Route::get('/editar-paciente/{id}', [PacientesController::class, 'edit']);
Route::put('actualizar-paciente/{paciente}', [PacientesController::class, 'update']);
Route::get('eliminar-paciente/{id}', [PacientesController::class, 'destroy']);

/* Citas */
Route::get('citas/{id}', [CitasController::class, 'index']);
Route::post('/citas/{id}', [CitasController::class, 'HorarioDoctor']);


