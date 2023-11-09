@extends('adminlte::page')

@section('content_header')
    <h1>Notificación a {{$correo->name . " " . $correo->ap_pater . " ". $correo->ap_mater}}</h1>
    @if (session('message'))
    <div class="alert alert-danger" role="message">
        {{session('message')}}
    </div>
    @endif
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingresa el mensaje') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('enviar.correo') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="mensaje" class="col-md-4 col-form-label text-md-end">{{ __('Mensaje') }}</label>

                            <div class="col-md-6">
                                <textarea id="mensaje" name="mensaje" type="text" class="form-control" required  ></textarea>
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none">
                            <label for="correo" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="correo" name="correo" type="text" class="form-control" value="{{$correo->email}}">
                            </div>
                        </div>
                        <div class="row mb-3" style="display: none">
                            <label for="idAl" class="col-md-4 col-form-label text-md-end">{{ __('Id Alumno') }}</label>

                            <div class="col-md-6">
                                <input id="idAl" name="idAl" type="text" class="form-control" value="{{$id}}">
                            </div>
                        </div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>

                                <a href="{{url()->previous()}}" class="btn btn-danger">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <script >
    const alerta = document.getElementById("alert")
    addAlumno = document.querySelector('#addAlumno');
    addAlumno.no_control.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert").fadeOut(1000);
                    }, 1000);
         }
    })

    addAlumno.telefono.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert3");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert3").fadeOut(1000);
                    }, 1000);
         }
    })

    addAlumno.anio.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert2");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert2").fadeOut(1000);
                    }, 1000);
         }
    })

//Solo permite introducir numeros.
    function soloNumeros(e){
        var key = e.charCode;
        console.log(key);
        return key >= 48 && key <= 57;
    }

//primeras letras mayusculas
    function capitalize(str){
    return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
    }
    const input = document.getElementById('name');
    input.addEventListener('keypress', e => {
    setTimeout(() => {input.value = input.value.split(' ').map(x => capitalize(x)).join(' ')}, 1)
    });
    const input2 = document.getElementById('ap_pater');
    input2.addEventListener('keypress', e => {
    setTimeout(() => {input2.value = capitalize(input2.value)}, 1)
    });
    const input3 = document.getElementById('ap_mater');
    input3.addEventListener('keypress', e => {
    setTimeout(() => {input3.value = capitalize(input3.value)}, 1)
    });
    //Validar password
    var alumLog = document.getElementById('addAlumno');
    alumLog.addEventListener("submit", (e) => {
        pass1 = document.getElementById('password');
        pass2 = document.getElementById('password-confirm');

     if (pass1.value !== pass2.value) {
         e.preventDefault();
         let x = document.getElementById("errpas");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#errpas").fadeOut(1000);
                    }, 1000);
        }
    });



    </script>
@stop
