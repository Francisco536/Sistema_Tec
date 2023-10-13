<?php

namespace App\Http\Controllers;

use App\Models\DocTitulacion;
use Illuminate\Http\Request;

class DocTitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = DocTitulacion::get();
        //$userId = auth()->user()->id;
        $params['collection'] = $collection;


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
        return view('formularioDoc.create');
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
