<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class CertificadoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formularioDoc.certificado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $user_id = auth()->user()->id;
            $user_name = auth()->user()->name;
            $name = 'Certificado_'.$user_name;

            //Se define la parte del directorio
            $path = 'public/'.'Documentos/' .  'Certificado/'. $user_name;

            $archivo = $request->file('name')->store($path);

            $folder = Storage::url($archivo);

            $Docs = new Certificado();
            $Docs->name = $folder;
            $Docs->id_user = $user_id;
            $Docs->save();
            DB::commit();

            $response = [
                "code" => 200, "msg" => "Éxito"
            ];
            return redirect()->route('add.documentos')->with('success','Documento agregado correctamente');

        }
        catch(ValidationException $exception){
            $response = [
                "code" => 422, "msg" => "Error", "error" => $exception->errors()
            ];
        }

        return redirect()->route('add.documentos')->with('message', 'Documento no agregado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
