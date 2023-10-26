@extends('adminlte::page')

@section('content_header')
    <h1>Agregar Alumno</h1>
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
                <div class="card-header">{{ __('Ingresa los datos del alumno') }}</div>

                <div class="card-body">
                    <form method="POST" name="addAlumno" id="addAlumno" action="{{ route('store.alumno') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_pater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_pater" type="text" class="form-control @error('ap_pater') is-invalid @enderror" name="ap_pater" value="{{ old('ap_pater') }}" required autocomplete="ap_pater" autofocus>

                                @error('ap_pater')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_mater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_mater" onkeyup="capitalizarPrimeraLetra()" type="text" class="form-control @error('ap_mater') is-invalid @enderror" name="ap_mater" value="{{ old('ap_mater') }}" required autocomplete="ap_mater" autofocus>

                                @error('ap_mater')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="sexo" type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{ old('sexo') }}" required autocomplete="sexo" autofocus> --}}
                                <select id="sexo" name="sexo" value="{{ old('sexo') }}"class="form-control select2" style="width: 100%;" required>
                                    <option selected="selected" value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                  </select>

                                @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carrera" class="col-md-4 col-form-label text-md-end">{{ __('Carrera') }}</label>

                            <div class="col-md-6">

                                <select id="carrera" name="carrera" class="form-control select2" style="width: 100%;" required>
                                    <option selected="selected" value="Agronomia">Agronomia</option>
                                    <option value="Ing. en Gestión Empresarial" >Ing. en Gestión Empresarial</option>
                                    <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>


                                  </select>

                                @error('carrera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_control" class="col-md-4 col-form-label text-md-end">{{ __('Numero de Control') }}</label>

                            <div class="col-md-6">
                                <input id="no_control" type="text" class="form-control @error('no_control') is-invalid @enderror" name="no_control" value="{{ old('no_control') }}" required autocomplete="no_control" autofocus>
                                <div id="alert" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                                @error('no_control')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anio" class="col-md-4 col-form-label text-md-end">{{ __('Año de ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="text" class="form-control @error('anio') is-invalid @enderror" name="anio" maxlength="4" value="{{ old('anio') }}" required autocomplete="anio" autofocus>
                                <div id="alert2" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Numero de telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control  @error('telefono') is-invalid @enderror" maxlength="10" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                <div id="alert3" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div id="errpas" class="alert alert-danger" style="display:none" role="alert">La contraseña no coincide!!</div>
                            </div>
                        </div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
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
