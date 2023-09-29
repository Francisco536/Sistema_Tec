@extends('adminlte::page')

@section('content_header')
    <h1>Crear Usuario Egresado</h1>
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
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.egresado') }}">
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
                                <input id="ap_mater" type="text" class="form-control @error('ap_mater') is-invalid @enderror" name="ap_mater" value="{{ old('ap_mater') }}" required autocomplete="ap_mater" autofocus>

                                @error('ap_mater')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required placeholder="dd/mm/yyyy" autofocus>
                                @error('fecha_nacimiento')
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
                            <label for="carrera_egreso" class="col-md-4 col-form-label text-md-end">{{ __('Carrera de Egreso') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="carrera_egreso" type="text" class="form-control @error('carrera_egreso') is-invalid @enderror" name="carrera_egreso" value="{{ old('carrera_egreso') }}" required autocomplete="sexo" autofocus> --}}
                                <select id="carrera_egreso" name="carrera_egreso" class="form-control select2" style="width: 100%;" required>
                                    <option selected="selected" value="Lic. en Administración">Lic. en Administración</option>
                                    <option value="Ing. Civil">Ing. Civil</option>
                                    <option value="Ing. en Gestión Empresarial" >Ing. en Gestión Empresarial</option>
                                    <option value="Ing. Industrial">Ing. Industrial</option>
                                    <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                                    <option value="Mecatrónica">Mecatrónica</option>

                                  </select>

                                @error('carrera_egreso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="especialidad" class="col-md-4 col-form-label text-md-end">{{ __('Especialidad') }}</label>

                            <div class="col-md-6">
                                <input id="especialidad" type="text" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad" value="{{ old('especialidad') }}" required autocomplete="especialidad" autofocus>

                                @error('especialidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anio_egreso" class="col-md-4 col-form-label text-md-end">{{ __('Año de Egreso') }}</label>

                            <div class="col-md-6">
                                <input id="anio_egreso" type="text" class="form-control @error('anio_egreso') is-invalid @enderror" name="anio_egreso" value="{{ old('anio_egreso') }}" required autocomplete="anio_egreso" autofocus>

                                @error('anio_egreso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    <script> console.log('Hi!'); </script>
@stop
