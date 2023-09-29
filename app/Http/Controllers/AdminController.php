<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        //
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Admin');
        })->paginate(10);

        $params['collection'] = $collection;
        return view('admin.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try
        {

         $dupli = User::where('email',$request->email);
        if($dupli != null){
         User::create([
            'name' => $request['name'],
            'ap_pater' => $request['ap_pater'],
            'ap_mater' => $request['ap_mater'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'sexo' => $request['sexo'],
            'carrera_egreso' => $request['carrera_egreso'],
            'especialidad' => $request['especialidad'],
            'anio_egreso' => $request['anio_egreso'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ])->assignRole('admin');

            $response = [
                "code" => 200, "msg" => "Éxito"
            ];
            return redirect()->route('lista.admin')->with('success','Usuario agregado correctamente');
        }else{
            return redirect()->route('add.admin')->with('message','El correo ya existe, ingrese uno nuevo');
        }
        }
        catch(ValidationException $exception){
            $response = [
                "code" => 422, "msg" => "Error", "error" => $exception->errors()
            ];
        }

        return response()->json($response);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.update', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $admin = request()->except(['_token','_method']);
        //User::where('id', $id)->update($admin);
        User::where('id', $id)->update([
            'name' => $request['name'],
            'ap_pater' => $request['ap_pater'],
            'ap_mater' => $request['ap_mater'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'sexo' => $request['sexo'],
            'carrera_egreso' => $request['carrera_egreso'],
            'especialidad' => $request['especialidad'],
            'anio_egreso' => $request['anio_egreso'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $response = [
            "code" => 200, "msg" => "Éxito"
        ];
        return redirect()->route('lista.admin')->with('success','Usuario Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect()->route('lista.admin')->with('message','Usuario eliminado correctamente');
    }
}
