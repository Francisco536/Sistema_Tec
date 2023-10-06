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
                    <form method="POST" action="{{ route('store.documentos') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="acto_recepcional" class="col-md-4 col-form-label text-md-end">{{ __('Acto recepcional') }}</label>

                            <div class="col-md-6">
                                <input id="acto_recepcional" type="file" class="form-control @error('acto_recepcional') is-invalid @enderror" name="acto_recepcional" required >

                                @error('acto_recepcional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
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
