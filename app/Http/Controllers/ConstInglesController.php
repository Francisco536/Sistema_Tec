<?php

namespace App\Http\Controllers;

use App\Models\ConstIngles;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class ConstInglesController extends Controller
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
        return view('formularioDoc.ingles');
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
            $name = 'ConstanciaIngles_'.$user_name;

            //Se define la parte del directorio
            $path = 'public/'.'Documentos/' .  'ConstanciaIngles/'. $user_name;

                $archivo = $request->file('name')->store($path);

                $folder = Storage::url($archivo);

            $Docs = new ConstIngles();
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
    public function show(ConstIngles $constIngles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $id = auth()->user()->id;
        $file  = ConstIngles::where('id_user', $id)->first();
        return view('formularioDoc.Update.ingles', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try
        {

            $user_name = auth()->user()->name;


            //Se define la parte del directorio
            $path = 'public/'.'Documentos/' .  'ConstanciaIngles/'. $user_name;

            $archivo = $request->file('name')->store($path);

            $folder = Storage::url($archivo);

            ConstIngles::where('id', $id)->update([
               'name' => $folder]);

            $response = [
                "code" => 200, "msg" => "Éxito"
            ];
            return redirect()->route('add.documentos')->with('success','Documento actualizado correctamente');
        }
        catch(ValidationException $exception){
            $response = [
                "code" => 422, "msg" => "Error", "error" => $exception->errors()
            ];
        }

        return redirect()->route('add.documentos')->with('message', 'Documento no actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConstIngles $constIngles)
    {
        //
    }
}
