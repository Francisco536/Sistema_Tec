<?php

namespace App\Http\Controllers;

use App\Models\AceptacionTesis;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class AceptacionTesisController extends Controller
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
          //
          $userId = auth()->user()->id;

          $collection = AceptacionTesis::where('id_user',$userId)->exists();

              return view('formularioDoc.tesis');


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

            //Se define la parte del directorio
            $path = 'public/'.'Documentos/' .  'AceptacionTesis/'. $user_name;

            $archivo = $request->file('name')->store($path);

            $folder = Storage::url($archivo);

            $Docs = new AceptacionTesis();
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
    public function show(AceptacionTesis $aceptacionTesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AceptacionTesis $aceptacionTesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AceptacionTesis $aceptacionTesis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AceptacionTesis $aceptacionTesis)
    {
        //
    }
}
