<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

use App\Mail\EnviarPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class AlumnoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //


        $no_control = $request->no_control;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->paginate(10);

        if($no_control){
            $collection = User::where('no_control', 'like', '%'.$no_control.'%')
            ->with('roles')->select('*')->paginate(10);

        }
        // if($name){
        //     $collection = User::where('name', 'like', '%'.$name.'%')
        //     ->with('roles')->select('*')->paginate(10);

        // }


        $params['no_control'] = $no_control;
        $params['collection'] = $collection;
        return view('alumno.index', $params);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agronomia(Request $request)
    {
        $no_control = $request->no_control;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->where('carrera', 'Ing. en Agronomía')->paginate(10);

        if($no_control){
            $collection = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->where('no_control', 'like', '%'.$no_control.'%')->where('carrera', 'Ing. en Agronomía')->paginate(10);

        }



        $params['no_control'] = $no_control;
        $params['collection'] = $collection;
        return view('alumno.agronomia', $params);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion(Request $request)
    {
        $no_control = $request->no_control;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->where('carrera', 'Ing. en Gestión Empresarial')->paginate(10);

        if($no_control){
            $collection = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->where('no_control', 'like', '%'.$no_control.'%')->where('carrera', 'Ing. en Gestión Empresarial')->paginate(10);


        }



        $params['no_control'] = $no_control;
        $params['collection'] = $collection;
        return view('alumno.gestion', $params);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sistemas(Request $request)
    {
        $no_control = $request->no_control;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->where('carrera', 'Ing. en Sistemas Computacionales')->paginate(10);

        if($no_control){
            $collection = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->where('no_control', 'like', '%'.$no_control.'%')->where('carrera', 'Ing. en Sistemas Computacionales')->paginate(10);

        }
        $params['no_control'] = $no_control;
        $params['collection'] = $collection;
        return view('alumno.sistemas', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $dupli = User::where('email',$request->email)->exists();

            if($dupli == false){

            User::create([
                'name' => $request['name'],
                'ap_pater' => $request['ap_pater'],
                'ap_mater' => $request['ap_mater'],
                'sexo' => $request['sexo'],
                'carrera' => $request['carrera'],
                'no_control' => $request['no_control'],
                'anio' => $request['anio'],
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ])->assignRole('alumno');

            $name = $request['name'] . ' '.$request['ap_pater'];
            $noCon = $request['no_control'];
            $pass = $request['password'];
            $message = (object)[
                "title"             => 'Acceso y contraseña | Sistema Tec',
                "content"           => (object)[
                    "user"          => $name,
                    "NoControl"     => 'Acceso: ' . $noCon,
                    "notification"  => 'Contraseña de acceso: ' . $pass,

                ],
                'subject'           => 'Contraseña | Sistema Tec'
            ];

            Mail::to($request['email'])->send(new EnviarPassword($message->title,
            $message->content,
            $message->subject,)
        );

                return redirect()->route('lista.alumno')->with('success','Usuario agregado correctamente');

         }else{

            return redirect()->route('add.alumno')->with('message','El correo ya existe, ingrese uno nuevo');
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
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = User::findOrFail($id);
        return view('alumno.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = User::findOrFail($id);
        return view('alumno.update', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $alumno = request()->except(['_token','_method']);

            User::where('id', $id)->update([
                'name' => $request['name'],
                'ap_pater' => $request['ap_pater'],
                'ap_mater' => $request['ap_mater'],
                'sexo' => $request['sexo'],
                'carrera' => $request['carrera'],
                'no_control' => $request['no_control'],
                'anio' => $request['anio'],
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);


            //User::where('id', $id)->update($egresado);

            $name = $request['name'] . ' '.$request['ap_pater'];
            $pass = $request['password'];
            $noCon = $request['no_control'];
            $message = (object)[
                "title"             => 'Nueva contraseña | Sistema Tec',
                "content"           => (object)[
                    "user"          => $name,
                    "NoControl"     => 'Acceso: ' . $noCon,
                    "notification"  => 'Nueva contraseña de acceso: ' . $pass,

                ],
                'subject'           => 'Contraseña | Sistema Tec'
            ];

            Mail::to($request['email'])->send(new EnviarPassword($message->title,
            $message->content,
            $message->subject,)
        );

            $response = [
                "code" => 200, "msg" => "Éxito"
            ];
            return redirect()->route('lista.alumno')->with('success','Usuario Actualizado correctamente');
        }
        catch(ValidationException $exception){
            $response = [
                "code" => 422, "msg" => "Error", "error" => $exception->errors()
            ];
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect()->route('lista.alumno')->with('message','Usuario eliminado correctamente');
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function periodo1(Request $request)
    {
        $anio = $request->anio;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->whereMonth('created_at', '>=', '01')->whereMonth('created_at', '<=', '06')->paginate(10);

        if($anio){
            $collection = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->where('anio', 'like', '%'.$anio.'%')->whereMonth('created_at', '>=', '01')->whereMonth('created_at', '<=', '06')->paginate(10);

        }
        $params['anio'] = $anio;
        $params['collection'] = $collection;
        return view('alumno.periodo1', $params);
    }
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function periodo2(Request $request)
    {
        $anio = $request->anio;
        $collection = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->whereMonth('created_at', '>=', '07')->whereMonth('created_at', '<=', '12')->paginate(10);

        if($anio){
            $collection = User::whereHas('roles', function ($query) {
                $query->where('name', 'Alumno');
            })->where('anio', 'like', '%'.$anio.'%')->whereMonth('created_at', '>=', '07')->whereMonth('created_at', '<=', '12')->paginate(10);

        }
        $params['anio'] = $anio;
        $params['collection'] = $collection;
        return view('alumno.periodo2', $params);
    }
}
