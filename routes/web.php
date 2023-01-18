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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/caja','\App\Http\Controllers\CajaChicaController')->names('caja');
Route::resource('/candidato','\App\Http\Controllers\CandidatoController')->names('candidato');
Route::resource('/direccion','\App\Http\Controllers\DireccionController')->names('direccion');
Route::resource('/drv','\App\Http\Controllers\DrvController')->names('drv');
Route::resource('/Estado','\App\Http\Controllers\EstadoController')->names('estado');
Route::resource('/Facturacion','\App\Http\Controllers\FacturacionController')->names('facturacion');
Route::resource('/gasto','\App\Http\Controllers\GastoController')->names('gasto');
Route::resource('/historialLaboral','\App\Http\Controllers\HistorialLaboral')->names('historialLaboral');
Route::resource('/horario','\App\Http\Controllers\HorarioController')->names('horario');
Route::resource('/localidad','\App\Http\Controllers\LocalidadController')->names('localidad');
Route::resource('/mora','\App\Http\Controllers\MoraController')->names('mora');
Route::resource('/municipio','\App\Http\Controllers\MunicipioController')->names('municipio');
Route::resource('/oficina','\App\Http\Controllers\OficinaController')->names('oficina');
Route::resource('/puesto','\App\Http\Controllers\PuestoController')->names('puesto');
Route::resource('/requesicion','\App\Http\Controllers\RequesicionController')->names('requesicion');
Route::resource('/subdireccion','\App\Http\Controllers\SubdireccionController')->names('subdireccion');
Route::resource('/user','\App\Http\Controllers\UserController')->names('user');
Route::resource('/vacante','\App\Http\Controllers\VacanteController')->names('vacante');
