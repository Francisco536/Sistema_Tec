<?php

use App\Models\Alumno;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocTitulacionController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'admin'], function(){
        Route::get('/index', [AdminController::class, 'index'])->name('lista.admin')->middleware('auth');
        Route::get('/{id}/show', [AdminController::class, 'show'])->name('ver.admin')->middleware('auth');
        Route::get('/create', [AdminController::class, 'create'])->name('add.admin')->middleware('auth');
        Route::post('/store', [AdminController::class, 'store'])->name('store.admin')->middleware('auth');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit.admin')->middleware('auth');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update.admin')->middleware('auth');
        Route::get('destroy/{admin}', [AdminController::class, 'destroy'])->name("destroy.admin")->middleware('auth');

    });
    Route::group(['prefix' => 'alumno'], function(){
        Route::get('/index', [AlumnoController::class, 'index'])->name('lista.alumno')->middleware('auth');
        Route::get('/{id}/show', [AlumnoController::class, 'show'])->name('show.alumno')->middleware('auth');
        Route::get('/create', [AlumnoController::class, 'create'])->name('add.alumno')->middleware('auth');
        Route::post('/store', [AlumnoController::class, 'store'])->name('store.alumno')->middleware('auth');
        Route::get('/{id}/edit', [AlumnoController::class, 'edit'])->name('edit.alumno')->middleware('auth');
        Route::post('/update/{id}', [AlumnoController::class, 'update'])->name('update.alumno')->middleware('auth');
        Route::get('destroy/{alumno}', [AlumnoController::class, 'destroy'])->name("destroy.alumno")->middleware('auth');
    });

    Route::group(['prefix' => 'documentos'], function(){
        Route::get('/index', [DocTitulacionController::class, 'index'])->name('lista.documentos')->middleware('auth');
        Route::get('/DocumentosCompletos', [DocTitulacionController::class, 'indexCom'])->name('lista.documentosCom')->middleware('auth');
        Route::get('/DocumentacionProceso', [DocTitulacionController::class, 'indexInc'])->name('lista.documentosInc')->middleware('auth');
        Route::get('/SinDocumentos', [DocTitulacionController::class, 'indexVac'])->name('lista.documentosVacio')->middleware('auth');
        Route::get('/realizadas', [DocTitulacionController::class, 'realizadas'])->name('realizadas.documentos')->middleware('auth');
        Route::get('/cargarDocumentos', [DocTitulacionController::class, 'create'])->name('add.documentos')->middleware('auth');
        Route::post('/store', [DocTitulacionController::class, 'store'])->name('store.documentos')->middleware('auth');
        Route::get('/{id}/detalle', [DocTitulacionController::class, 'show'])->name('ver.documentos')->middleware('auth');
        Route::get('/finalizada', [DocTitulacionController::class, 'end'])->name('end.documentos')->middleware('auth');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
