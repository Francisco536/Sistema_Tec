<?php

use App\Http\Controllers\AceptacionTesisController;
use App\Http\Controllers\ActoRecepcionalController;
use App\Models\Alumno;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AnteProyectoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ConstInglesController;
use App\Http\Controllers\ConstServicioController;
use App\Http\Controllers\DocTitulacionController;
use App\Http\Controllers\LibProyectoController;
use App\Http\Controllers\NoInconvenienciaController;
use App\Http\Controllers\RegProyectoController;
use App\Http\Controllers\SolEstudianteController;
use App\Models\AceptacionTesis;
use App\Models\NoInconveniencia;

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
        Route::get('/index/agronomia', [AlumnoController::class, 'agronomia'])->name('lista.alumnoAgro')->middleware('auth');
        Route::get('/index/gestion', [AlumnoController::class, 'gestion'])->name('lista.alumnoGes')->middleware('auth');
        Route::get('/index/sistemas', [AlumnoController::class, 'sistemas'])->name('lista.alumnoSis')->middleware('auth');
        Route::get('/{id}/show', [AlumnoController::class, 'show'])->name('show.alumno')->middleware('auth');
        Route::get('/create', [AlumnoController::class, 'create'])->name('add.alumno')->middleware('auth');
        Route::post('/store', [AlumnoController::class, 'store'])->name('store.alumno')->middleware('auth');
        Route::get('/{id}/edit', [AlumnoController::class, 'edit'])->name('edit.alumno')->middleware('auth');
        Route::post('/update/{id}', [AlumnoController::class, 'update'])->name('update.alumno')->middleware('auth');
        Route::get('destroy/{alumno}', [AlumnoController::class, 'destroy'])->name("destroy.alumno")->middleware('auth');

        Route::get('/index/periodo1', [AlumnoController::class, 'periodo1'])->name('lista.alumnoP1')->middleware('auth');
        Route::get('/index/periodo2', [AlumnoController::class, 'periodo2'])->name('lista.alumnoP2')->middleware('auth');
    });

    Route::group(['prefix' => 'documentos'], function(){
        Route::get('/index', [DocTitulacionController::class, 'index'])->name('lista.documentos')->middleware('auth');
        Route::get('/DocumentosCompletos', [DocTitulacionController::class, 'indexCom'])->name('lista.documentosCom')->middleware('auth');
        Route::get('/DocumentacionProceso', [DocTitulacionController::class, 'indexInc'])->name('lista.documentosInc')->middleware('auth');
        Route::get('/SinDocumentos', [DocTitulacionController::class, 'indexVac'])->name('lista.documentosVacio')->middleware('auth');
        Route::get('/realizadas', [DocTitulacionController::class, 'realizadas'])->name('realizadas.documentos')->middleware('auth');
        Route::get('/cargarDocumentos', [DocTitulacionController::class, 'create'])->name('add.documentos')->middleware('auth');
        Route::post('/store', [DocTitulacionController::class, 'store'])->name('store.documentos')->middleware('auth');
        Route::get('/{id}/DocumentosAlumno', [DocTitulacionController::class, 'show'])->name('ver.documentos')->middleware('auth');
        Route::get('/finalizada', [DocTitulacionController::class, 'end'])->name('end.documentos')->middleware('auth');
        Route::get('/Documentos/{id}/Notificacion', [DocTitulacionController::class, 'email'])->name('crear.correo')->middleware('auth');
        Route::post('/enviar/Notificacion', [DocTitulacionController::class, 'Sendemail'])->name('enviar.correo')->middleware('auth');

        Route::get('/tesis', [AceptacionTesisController::class, 'create'])->name('tesis.add')->middleware('auth');
        Route::post('/Subirtesis', [AceptacionTesisController::class, 'store'])->name('tesis.store')->middleware('auth');
        Route::get('/edittesis', [AceptacionTesisController::class, 'edit'])->name('tesis.edit')->middleware('auth');
        Route::post('/UpdateTesis/{id}', [AceptacionTesisController::class, 'update'])->name('tesis.update')->middleware('auth');

        Route::get('/ActoRecepcional', [ActoRecepcionalController::class, 'create'])->name('acto.add')->middleware('auth');
        Route::post('/SubirActoRecepcional', [ActoRecepcionalController::class, 'store'])->name('acto.store')->middleware('auth');
        Route::get('/editActoRecepcional', [ActoRecepcionalController::class, 'edit'])->name('acto.edit')->middleware('auth');
        Route::post('/UpdateActoRecepcional/{id}', [ActoRecepcionalController::class, 'update'])->name('acto.update')->middleware('auth');


        Route::get('/NoInconveniencia', [NoInconvenienciaController::class, 'create'])->name('noInconv.add')->middleware('auth');
        Route::post('/SubirNoInconveniencia', [NoInconvenienciaController::class, 'store'])->name('noInconv.store')->middleware('auth');
        Route::get('/editNoInconveniencia', [NoInconvenienciaController::class, 'edit'])->name('noInconv.edit')->middleware('auth');
        Route::post('/UpdateNoInconveniencia/{id}', [NoInconvenienciaController::class, 'update'])->name('noInconv.update')->middleware('auth');

        Route::get('/LiberacionProyecto', [LibProyectoController::class, 'create'])->name('libProyec.add')->middleware('auth');
        Route::post('/SubirLiberacionProyecto', [LibProyectoController::class, 'store'])->name('libProyec.store')->middleware('auth');
        Route::get('/editLiberacionProyecto', [LibProyectoController::class, 'edit'])->name('libProyec.edit')->middleware('auth');
        Route::post('/UpdateLiberacionProyecto', [LibProyectoController::class, 'update'])->name('libProyec.update')->middleware('auth');

        Route::get('/AnteProyecto', [AnteProyectoController::class, 'create'])->name('anteProyec.add')->middleware('auth');
        Route::post('/SubirAnteProyecto', [AnteProyectoController::class, 'store'])->name('anteProyec.store')->middleware('auth');
        Route::get('/editAnteProyecto', [AnteProyectoController::class, 'edit'])->name('anteProyec.edit')->middleware('auth');
        Route::post('/UpdateAnteProyecto/{id}', [AnteProyectoController::class, 'update'])->name('anteProyec.update')->middleware('auth');

        Route::get('/RegistroProyecto', [RegProyectoController::class, 'create'])->name('regProyecto.add')->middleware('auth');
        Route::post('/SubirRegistroProyecto', [RegProyectoController::class, 'store'])->name('regProyecto.store')->middleware('auth');
        Route::get('/editRegistroProyecto', [RegProyectoController::class, 'edit'])->name('regProyecto.edit')->middleware('auth');
        Route::post('/UpdateRegistroProyecto/{id}', [RegProyectoController::class, 'update'])->name('regProyecto.update')->middleware('auth');

        Route::get('/SolicitudAlumno', [SolEstudianteController::class, 'create'])->name('solAlumno.add')->middleware('auth');
        Route::post('/SubirSolicitudAlumno', [SolEstudianteController::class, 'store'])->name('solAlumno.store')->middleware('auth');
        Route::get('/editSolicitudAlumno', [SolEstudianteController::class, 'edit'])->name('solAlumno.edit')->middleware('auth');
        Route::post('/UpdateSolicitudAlumno/{id}', [SolEstudianteController::class, 'update'])->name('solAlumno.update')->middleware('auth');

        Route::get('/ConstanciaIngles', [ConstInglesController::class, 'create'])->name('ingles.add')->middleware('auth');
        Route::post('/SubirConstanciaIngles', [ConstInglesController::class, 'store'])->name('ingles.store')->middleware('auth');
        Route::get('/editConstanciaIngles', [ConstInglesController::class, 'edit'])->name('ingles.edit')->middleware('auth');
        Route::post('/UpdateConstanciaIngles/{id}', [ConstInglesController::class, 'update'])->name('ingles.update')->middleware('auth');

        Route::get('/ServicioSocial', [ConstServicioController::class, 'create'])->name('servicio.add')->middleware('auth');
        Route::post('/SubirServicioSocial', [ConstServicioController::class, 'store'])->name('servicio.store')->middleware('auth');
        Route::get('/editServicioSocial', [ConstServicioController::class, 'edit'])->name('servicio.edit')->middleware('auth');
        Route::post('/UpdateServicioSocial/{id}', [ConstServicioController::class, 'update'])->name('servicio.update')->middleware('auth');

        Route::get('/Certificado', [CertificadoController::class, 'create'])->name('certificado.add')->middleware('auth');
        Route::post('/SubirCertificado', [CertificadoController::class, 'store'])->name('certificado.store')->middleware('auth');
        Route::get('/editCertificado', [CertificadoController::class, 'edit'])->name('certificado.edit')->middleware('auth');
        Route::post('/UpdateCertificado/{id}', [CertificadoController::class, 'update'])->name('certificado.update')->middleware('auth');

        Route::get('/{id}/descarga', [DocTitulacionController::class, 'descarga'])->name('descarga.documento')->middleware('auth');
        Route::get('/{id}/descarga2', [DocTitulacionController::class, 'descarga2'])->name('descarga.documento2')->middleware('auth');
        Route::get('/{id}/descarga3', [DocTitulacionController::class, 'descarga3'])->name('descarga.documento3')->middleware('auth');
        Route::get('/{id}/descarga4', [DocTitulacionController::class, 'descarga4'])->name('descarga.documento4')->middleware('auth');
        Route::get('/{id}/descarga5', [DocTitulacionController::class, 'descarga5'])->name('descarga.documento5')->middleware('auth');
        Route::get('/{id}/descarga6', [DocTitulacionController::class, 'descarga6'])->name('descarga.documento6')->middleware('auth');
        Route::get('/{id}/descarga7', [DocTitulacionController::class, 'descarga7'])->name('descarga.documento7')->middleware('auth');
        Route::get('/{id}/descarga8', [DocTitulacionController::class, 'descarga8'])->name('descarga.documento8')->middleware('auth');
        Route::get('/{id}/descarga9', [DocTitulacionController::class, 'descarga9'])->name('descarga.documento9')->middleware('auth');
        Route::get('/{id}/descarga10', [DocTitulacionController::class, 'descarga10'])->name('descarga.documento10')->middleware('auth');

    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
