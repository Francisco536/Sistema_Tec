@extends('adminlte::page')

@section('content_header')
    <h1>Información del alumno</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Visualizar datos') }}</div>

                <div class="card-body">
                    <form method="POST" action="}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $alumno->name }}" disabled >


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_pater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_pater" type="text" class="form-control" name="ap_pater" value="{{ $alumno->ap_pater }}" disabled>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_mater" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_mater" type="text" class="form-control " name="ap_mater" value="{{ $alumno->ap_mater}}" disabled>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="sexo" type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{ old('sexo') }}" required autocomplete="sexo" autofocus> --}}
                                <input id="sexo" name="sexo" class="form-control" value="{{ $alumno->sexo }}" style="width: 100%;" disabled>



                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carrera" class="col-md-4 col-form-label text-md-end">{{ __('Carrera') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="carrera_egreso" type="text" class="form-control @error('carrera_egreso') is-invalid @enderror" name="carrera_egreso" value="{{ old('carrera_egreso') }}" required autocomplete="sexo" autofocus> --}}
                                <input id="carrera" name="carrera" class="form-control" style="width: 100%;" value="{{ $alumno->carrera }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_control" class="col-md-4 col-form-label text-md-end">{{ __('No. de Control') }}</label>

                            <div class="col-md-6">
                                <input id="no_control" type="text" class="form-control" name="no_control" value="{{ $alumno->no_control }}" disabled>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anio" class="col-md-4 col-form-label text-md-end">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="text" class="form-control @error('anio') is-invalid @enderror" name="anio" value="{{ $alumno->anio }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Numero de telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $alumno->telefono }}" disabled>

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $alumno->email }}" disabled>


                            </div>
                        </div>



                        {{-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}


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

