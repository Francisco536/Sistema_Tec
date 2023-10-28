@extends('adminlte::page')

@section('content_header')
    <h1>Agregar archivos para proceso de titulación</h1>
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
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('Solicitud de Acto recepcional') }}</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" >Solicitud de Acto recepcional</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('Constancia de no inconveniencia') }}</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" >Constancia de no inconveniencia</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('Solicitud de Liberción de Proyecto') }}</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" >Solicitud de Liberción de Proyecto</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('AnteProyecto') }}</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" >AnteProyecto</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('Registro de Proyecto') }}</label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" >Registro de Proyecto</button>
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
    <script> console.log('Hi!');
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </script>
@stop
