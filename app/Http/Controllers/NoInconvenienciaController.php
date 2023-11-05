<?php

namespace App\Http\Controllers;

use App\Models\NoInconveniencia;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class NoInconvenienciaController extends Controller
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
        return view('formularioDoc.noInconv');
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
            $name = 'NoInconveniencia_'.$user_name;

            //Se define la parte del directorio
            $path = 'public/'.'Documentos/' .  'NoInconveniencia/'. $user_name;

            $archivo = $request->file('name')->store($path);

            $folder = Storage::url($archivo);

            $Docs = new NoInconveniencia();
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
    public function show(NoInconveniencia $noInconveniencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoInconveniencia $noInconveniencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NoInconveniencia $noInconveniencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoInconveniencia $noInconveniencia)
    {
        //
    }
}
