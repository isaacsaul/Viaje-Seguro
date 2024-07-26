<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GenerarPDF;

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

Route::get('/services', function () {
    return view('services');
});

Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/consultausuario', function () {
    return view('consultausuario');
});

Route::get('/generar-pdf', GenerarPDF::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/reportesview', function () {
        return view('reportesview');
    })->name('reportesview');

    Route::get('/tablero', function () {
        return view('tablero');
    })->name('tablero');

    Route::get('/analysisdata', function () {
        return view('analysisdata');
    })->name('analysisdata');
});
