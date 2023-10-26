@extends('adminlte::page')

@section('content_header')
    <h1>Actualizar Alumno</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar Datos') }}</div>

                <div class="card-body">
                    <form method="POST" name="updAlumno" id="updAlumno" action="{{ route('update.alumno', $alumno->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $alumno->name }}" required >


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_pater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_pater" type="text" class="form-control" name="ap_pater" value="{{ $alumno->ap_pater }}" required autocomplete="ap_pater" autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_mater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_mater" type="text" class="form-control " name="ap_mater" value="{{ $alumno->ap_mater}}" required autocomplete="ap_mater" autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="sexo" type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{ old('sexo') }}" required autocomplete="sexo" autofocus> --}}
                                <select id="sexo" name="sexo" value="{{ $alumno->sexo }}"class="form-control select2" style="width: 100%;" required>
                                    <option  value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                  </select>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carrera" class="col-md-4 col-form-label text-md-end">{{ __('Carrera') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="carrera_egreso" type="text" class="form-control @error('carrera_egreso') is-invalid @enderror" name="carrera_egreso" value="{{ old('carrera_egreso') }}" required autocomplete="sexo" autofocus> --}}
                                <select id="carrera" name="carrera" class="form-control select2" style="width: 100%;" value="{{ $alumno->carrera }}" required>
                                    <option value="Agronomia">Agronomia</option>
                                    <option value="Ing. en Gestión Empresarial" >Ing. en Gestión Empresarial</option>
                                    <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>

                                  </select>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_control" class="col-md-4 col-form-label text-md-end">{{ __('No. de Control') }}</label>

                            <div class="col-md-6">
                                <input id="no_control" type="text" class="form-control" name="no_control" value="{{ $alumno->no_control }}" required autocomplete="no_control" autofocus>
                                <div id="alert" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anio" class="col-md-4 col-form-label text-md-end">{{ __('Año de ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="text" class="form-control @error('anio') is-invalid @enderror" name="anio" maxlength="4" value="{{ $alumno->anio }}" required autocomplete="anio" autofocus>
                                <div id="alert2" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Numero de telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" maxlength="10" value="{{ $alumno->telefono }}" required autocomplete="telefono" autofocus>
                                <div id="alert3" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $alumno->email }}" required autocomplete="email">

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

                        {{-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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
    <script> console.log('Hi!');
     $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});

    updAlumno = document.querySelector('#updAlumno');
    updAlumno.no_control.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert").fadeOut(1000);
                    }, 1000);
         }
    })

    updAlumno.telefono.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert3");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert3").fadeOut(1000);
                    }, 1000);
         }
    })

    updAlumno.anio.addEventListener('keypress', function (e){
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
        })

        const input2 = document.getElementById('ap_pater');
        input2.addEventListener('keypress', e => {
        setTimeout(() => {input2.value = capitalize(input2.value)}, 1)
        })
        const input3 = document.getElementById('ap_mater');
        input3.addEventListener('keypress', e => {
        setTimeout(() => {input3.value = capitalize(input3.value)}, 1)
        })
    </script>
@stop
