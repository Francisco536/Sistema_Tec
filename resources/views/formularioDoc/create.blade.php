@extends('adminlte::page')

@section('content_header')
    <h1>Agregar archivos para proceso de titulación</h1>

    @if (session('success'))
    <div class="alert alert-success" role="success">
        {{session('success')}}
    </div>
    @endif
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
                <div class="card-header">{{ __('Ingresa tus documentos') }}</div>

                <div class="card-body">


                        <div class="row mb-3">
                            <div class="col">
                                <label  class="col-md-12 col-form-label text-md-end">{{ __('Solicitud de Acto recepcional') }}</label>
                                <div class="col-md-6 text-center">
                                    <a href="{{route('acto.add')}}" type="button" class="btn btn-primary"  <?php if ($actoR == true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                    <a  type="button" class="btn btn-warning" <?php if ($actoR == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                                </div>
                            </div>
                            <div class="col">
                                <label  class="col-md-12 col-form-label text-md-end">{{ __('Constancia de no inconveniencia') }}</label>
                                <div class="col-md-6 text-center">
                                    <a href="{{route('noInconv.add')}}" type="button" class="btn btn-primary" <?php if ($noInc == true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                    <a  type="button" class="btn btn-warning" <?php if ($noInc == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Solicitud de Liberación de Proyecto') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('libProyec.add')}}" type="button" class="btn btn-primary" <?php if ($libPro== true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($libPro== false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                        <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('AnteProyecto') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('anteProyec.add')}}" type="button" class="btn btn-primary" <?php if ($antePro == true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($antePro == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                    </div>

                        <div class="row mb-3">
                            <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Registro de Proyecto') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('regProyecto.add')}}" type="button" class="btn btn-primary" <?php if ($regPro == true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($regPro == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                          <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Solicitud del Alumno') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('solAlumno.add')}}" type="button" class="btn btn-primary" <?php if ($solAlum == true){ ?> style="display: none;" <?php   } ?>>Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($solAlum == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                    </div>

                          <div class="row mb-3">
                            <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Constancia de ingles') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('ingles.add')}}" type="button" class="btn btn-primary" <?php if ($ingles == true){ ?> style="display: none;" <?php   } ?>>Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($ingles == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                          <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Constancia de termininación de Servicio Social') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('servicio.add')}}" type="button" class="btn btn-primary" <?php if ($servicio == true){ ?> style="display: none;" <?php   } ?>>Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($servicio == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                    </div>

                        <div class="row mb-3">
                            <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Certificado') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('certificado.add')}}" type="button" class="btn btn-primary" <?php if ($certif == true){ ?> style="display: none;" <?php   } ?>>Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($certif == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                        <div class="col">
                            <label  class="col-md-12 col-form-label text-md-end">{{ __('Aceptación de Tesis') }}</label>
                            <div class="col-md-6 text-center">
                                <a href="{{route('tesis.add')}}" type="button" class="btn btn-primary" <?php if ($tesis == true){ ?> style="display: none;" <?php   } ?> >Cargar</a>
                                <a  type="button" class="btn btn-warning" <?php if ($tesis == false){ ?> style="display: none;" <?php   } ?>>Actualizar</a>
                            </div>
                        </div>
                    </div>




                        </div>


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
    <script>
    $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);
    });
    </script>
@stop
