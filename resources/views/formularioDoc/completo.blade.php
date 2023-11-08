@extends('adminlte::page')

@section('content_header')
    <strong>Documentación completa</strong>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Lista</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>No. Control</th>
                            <th>Carrera</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($collection))
                            @foreach ($collection as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->ap_pater }}</td>
                                    <td>{{ $value->ap_mater }}</td>
                                    <td>{{ $value->no_control}}</td>
                                    <td>{{ $value->carrera}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a    class="btn-sm btn-rounded btn-warning mb-3" data-toggle="tooltip" data-placement="top" title="Ver Encuesta"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="#" class="btn-sm btn-rounded btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a> --}}
                                            {{-- <a href="#" data-url="{{ route("note.destroy", $value->id) }}" data-message="¿Estas seguro de eliminar {{ $value->message }}?" class="btn btn-danger btn-sm btn-destroy"><i class="fa fa-trash-o fa-fw fa-lg"></i>Eliminar</a> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No se encontrarón registros</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
