<?php

namespace App\Http\Controllers;

use App\Models\AceptacionTesis;
use App\Models\ActoRecepcional;
use App\Models\AnteProyecto;
use App\Models\Certificado;
use App\Models\ConstIngles;
use App\Models\ConstServicio;
use App\Models\DocTitulacion;
use App\Models\LibProyecto;
use App\Models\NoInconveniencia;
use App\Models\RegProyecto;
use App\Models\SolEstudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocTitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $actoR    = ActoRecepcional::where('id_user', $userId)->exists();
        $noInc    = NoInconveniencia::where('id_user', $userId)->exists();
        $libPro   = LibProyecto::where('id_user', $userId)->exists();
        $antePro  = AnteProyecto::where('id_user', $userId)->exists();
        $regPro   = RegProyecto::where('id_user', $userId)->exists();
        $solAlum  = SolEstudiante::where('id_user', $userId)->exists();
        $ingles   = ConstIngles::where('id_user', $userId)->exists();
        $servicio = ConstServicio::where('id_user', $userId)->exists();
        $certif   = Certificado:: where('id_user', $userId)->exists();
        $tesis    = AceptacionTesis::where('id_user', $userId)->exists();


        $params['actoR']    = $actoR   ;
        $params['noInc']    = $noInc   ;
        $params['libPro']   = $libPro  ;
        $params['antePro']  = $antePro ;
        $params['regPro']   = $regPro  ;
        $params['solAlum']  = $solAlum ;
        $params['ingles']   = $ingles  ;
        $params['servicio'] = $servicio;
        $params['certif']   = $certif  ;
        $params['tesis']    = $tesis;
         Log::debug($params);

        return view('formularioDoc.index', $params);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexCom()
    {
        $collection = DocTitulacion::get();
        //$userId = auth()->user()->id;
        $params['collection'] = $collection;


        return view('formularioDoc.completo', $params);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexInc()
    {
        $collection = DocTitulacion::get();
        //$userId = auth()->user()->id;
        $params['collection'] = $collection;


        return view('formularioDoc.proceso', $params);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexVac()
    {
        $collection = DocTitulacion::get();
        //$userId = auth()->user()->id;
        $params['collection'] = $collection;


        return view('formularioDoc.incompleto', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $actoR    = ActoRecepcional::where('id_user', $userId)->exists();
        $noInc    = NoInconveniencia::where('id_user', $userId)->exists();
        $libPro   = LibProyecto::where('id_user', $userId)->exists();
        $antePro  = AnteProyecto::where('id_user', $userId)->exists();
        $regPro   = RegProyecto::where('id_user', $userId)->exists();
        $solAlum  = SolEstudiante::where('id_user', $userId)->exists();
        $ingles   = ConstIngles::where('id_user', $userId)->exists();
        $servicio = ConstServicio::where('id_user', $userId)->exists();
        $certif   = Certificado:: where('id_user', $userId)->exists();
        $tesis    = AceptacionTesis::where('id_user', $userId)->exists();


        $params['actoR']    = $actoR   ;
        $params['noInc']    = $noInc   ;
        $params['libPro']   = $libPro  ;
        $params['antePro']  = $antePro ;
        $params['regPro']   = $regPro  ;
        $params['solAlum']  = $solAlum ;
        $params['ingles']   = $ingles  ;
        $params['servicio'] = $servicio;
        $params['certif']   = $certif  ;
        $params['tesis']    = $tesis;
         Log::debug($params);

        return view('formularioDoc.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DocTitulacion $docTitulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocTitulacion $docTitulacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocTitulacion $docTitulacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocTitulacion $docTitulacion)
    {
        //
    }
}
