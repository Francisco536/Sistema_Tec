<?php

use App\Models\Alumno;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
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
        Route::get('/create', [AdminController::class, 'create'])->name('add.admin')->middleware('auth');
        Route::post('/store', [AdminController::class, 'store'])->name('store.admin')->middleware('auth');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit.admin')->middleware('auth');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update.admin')->middleware('auth');
        Route::get('destroy/{admin}', [AdminController::class, 'destroy'])->name("destroy.admin")->middleware('auth');

    });
    Route::group(['prefix' => 'alumno'], function(){
        Route::get('/index', [AlumnoController::class, 'index'])->name('lista.alumno')->middleware('auth');
        Route::get('/create', [AlumnoController::class, 'create'])->name('add.alumno')->middleware('auth');
        Route::post('/store', [AlumnoController::class, 'store'])->name('store.alumno')->middleware('auth');
        Route::get('/{id}/edit', [AlumnoController::class, 'edit'])->name('edit.alumno')->middleware('auth');
        Route::post('/update/{id}', [AlumnoController::class, 'update'])->name('update.alumno')->middleware('auth');
        Route::get('destroy/{alumno}', [AlumnoController::class, 'destroy'])->name("destroy.alumno")->middleware('auth');
    });

    Route::group(['prefix' => 'encuesta'], function(){
        Route::get('/index', [EncuestaController::class, 'index'])->name('lista.encuesta')->middleware('auth');
        Route::get('/realizadas', [EncuestaController::class, 'realizadas'])->name('realizadas.encuesta')->middleware('auth');
        Route::get('/responder', [EncuestaController::class, 'create'])->name('add.encuesta')->middleware('auth');
        Route::post('/store', [EncuestaController::class, 'store'])->name('store.encuesta')->middleware('auth');
        Route::get('/{id}/detalle', [EncuestaController::class, 'show'])->name('ver.encuesta')->middleware('auth');
        Route::get('/finalizada', [EncuestaController::class, 'end'])->name('end.encuesta')->middleware('auth');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
