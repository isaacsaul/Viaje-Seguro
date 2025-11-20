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
    $noticias = \App\Models\Noticia::latest()->take(10)->get();
    return view('welcome', compact('noticias'));
});


Route::get('/services', function () {
    return view('services');
});

Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/quienes-somos', function () {
    return view('quienesomos');
});


Route::get('/consultausuario', function () {
    return view('consultausuario');
});



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

    Route::get('/listado', function () {
        return view('listado');
    })->name('listado');
    Route::get('/certificaciones', function () {
        return view('certificaciones');
    })->name('certificaciones')->middleware('can:admin');
    Route::get('/download-certificado', function () {
        $filePath = storage_path('app/public/certificado.pdf');
        return response()->download($filePath);
    })->name('download-certificado');
    Route::get('/download-citacion-personal', function () {
        $filePath = storage_path('app/public/citacion-personal.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-citacion-personal');
    Route::get('/download-citacion', function () {
        $filePath = storage_path('app/public/citacion.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-citacion');
    Route::get('/download-instructivo', function () {
        $filePath = storage_path('app/public/instructivo.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-instructivo');
    Route::get('/download-llamada-atencion', function () {
        $filePath = storage_path('app/public/llamada-atencion.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-llamada-atencion');
    Route::get('/download-memo-aceptacion', function () {
        $filePath = storage_path('app/public/memo-aceptacion.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-memo-aceptacion');
    Route::get('/download-memo-control', function () {
        $filePath = storage_path('app/public/memo-control.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-memo-control');
    Route::get('/download-memo-suspensions', function () {
        $filePath = storage_path('app/public/memo-suspensions.pdf');
        return response()->download($filePath);
    })->name('download-memo-suspensions');
    Route::get('/download-reconocimiento', function () {
        $filePath = storage_path('app/public/reconocimiento.pdf');
        return response()->download($filePath);
    })->name('download-reconocimiento');
    Route::get('/download-memo-suspension-lapso', function () {
        $filePath = storage_path('app/public/memo-suspension-lapso.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-memo-suspension-lapso');
    Route::get('/download-infracciones', function () {
        $filePath = storage_path('app/public/infracciones.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            abort(404, 'El archivo no existe.');
        }
    })->name('download-infracciones');


    // Ruta para el componente ShowNoticias
    Route::get('/show-noticias', \App\Http\Livewire\ShowNoticias::class)->name('show-noticias')->middleware('can:admin');



});
