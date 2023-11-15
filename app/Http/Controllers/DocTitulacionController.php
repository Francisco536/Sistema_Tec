<?php

namespace App\Http\Controllers;

use App\Mail\EnviarNotificacion;
use App\Mail\EnviarPassword;
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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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



               return view('formularioDoc.completo');





    }

    /**
     * Display a listing of the resource.
     */
    public function indexInc()
    {



        return view('formularioDoc.proceso');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexVac()
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

        if($actoR = false && $noInc==false && $libPro==false && $antePro==false && $regPro==false && $solAlum==false && $ingles==false && $servicio==false && $certif==false && $tesis==false && $tesis==false){

        }

        return view('formularioDoc.incompleto');
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
    public function show($id)
    {
        $correo = User::select('email', 'name', 'ap_pater', 'ap_mater')->where('id', '=', $id)->first();


        $actoR    = ActoRecepcional::select('name')->where('id_user', $id)->exists();
        $noInc    = NoInconveniencia::select('*')->where('id_user', $id)->exists();
        $libPro   = LibProyecto::select('*')->where('id_user', $id)->exists();
        $antePro  = AnteProyecto::select('*')->where('id_user', $id)->exists();
        $regPro   = RegProyecto::select('*')->where('id_user', $id)->exists();
        $solAlum  = SolEstudiante::select('*')->where('id_user', $id)->exists();
        $ingles   = ConstIngles::select('*')->where('id_user', $id)->exists();
        $servicio = ConstServicio::select('*')->where('id_user', $id)->exists();
        $certif   = Certificado::select('*')->where('id_user', $id)->exists();
        $tesis    = AceptacionTesis::select('*')->where('id_user', $id)->exists();



        $params['correo'] = $correo ;
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
        $params['id'] = $id ;


        return view('formularioDoc.show', $params);
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

    /**
     * Descargar documento desde storage.
     */
    public function descarga($id)
    {

        $buscar= ActoRecepcional::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        //dd($ruta);
        //dd(Storage::exists(public_path().$buscar->name));
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }

    //Descargar No Inconveniencia
    public function descarga2($id)
    {
        $buscar= NoInconveniencia::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }

    //Descargar Liberacion de Proyecto
    public function descarga3($id)
    {
        $buscar= LibProyecto::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }

    //Descargar AnteProyecto
    public function descarga4($id)
    {
        $buscar= AnteProyecto::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }

        //Descargar Registro de Proyecto
    public function descarga5($id)
    {
        $buscar= RegProyecto::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }
        //Descargar Solicutud alumno
    public function descarga6($id)
    {
        $buscar= SolEstudiante::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);
    }

        //Descargar Constancia de ingles
    public function descarga7($id)
    {
        $buscar= ConstIngles::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }
          //Descargar Constancia de Servicio Social
    public function descarga8($id)
    {
        $buscar= ConstServicio::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }
          //Descargar Certificado
    public function descarga9($id)
    {
        $buscar= Certificado::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }
            //Descargar Aceptacion Tesis
    public function descarga10($id)
    {
        $buscar= AceptacionTesis::Select('name')->where('id_user', $id)->first();
        $ruta = $buscar->name = public_path().$buscar->name ;
        $headers = [
            "Content-Type" => "application/octet-stream",
        ];
        return response()->download($ruta);

    }
        //crear email
    public function email($id){
        $correo = User::select('email', 'name', 'ap_pater', 'ap_mater')->where('id', '=', $id)->first();
        $params['correo'] = $correo ;
        $params['id'] = $id;
        return view('email.formMensaje', $params);
    }

        //enviar email
        public function Sendemail(Request $request){
            try
            {

                $id= $request->idAl;
                $name = User::select('name')->where('email', '=', $request['correo'])->first();
                $ape = User::select('ap_pater')->where('email', '=', $request['correo'])->first();
                $nombre = $name->name . " " . $ape->ap_pater;
                $mensaje = $request['mensaje'];
                $message = (object)[
                    "title"             => 'Notificación | Sistema Tec',
                    "content"           => (object)[
                        "user"          => $nombre,
                        "notification"  => 'Aviso: ' . $mensaje,

                    ],
                    'subject'           => 'Notificación | Sistema Tec'
                ];

                Mail::to($request['correo'])->send(new EnviarNotificacion($message->title,
                $message->content,
                $message->subject,)
            );

                    return redirect()->route('ver.documentos',$id)->with('success','Notificación enviada correctamente');
        }
    catch(ValidationException $exception){
        $response = [
            "code" => 422, "msg" => "Error", "error" => $exception->errors()
        ];
    }

    return response()->json($response);


}
 }
