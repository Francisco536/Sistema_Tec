@extends('adminlte::page')

@section('content_header')
    <h4>Ing. en Agronomía alumnos</h4>
@stop

@section('content')
    <div class="card">
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
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <div class="col-md-2">
                    <a href="{{route('add.alumno')}}" type="button" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Nuevo</a>
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <form class="d-flex" role="search" action="{{route('lista.alumnoAgro')}}" method="GET">

                    <input name="no_control" class="form-control me-2" type="search" placeholder="No. Control" aria-label="Search" value="{{$no_control}}" required>
                    <button class="btn btn-success" type="submit">Buscar</button>
                    <a class="btn btn-warning" id="limpiar" href="{{route('lista.alumnoAgro')}}">Limpiar</a>
                  </form>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Sexo</th>
                            <th>Carrera</th>
                            <th>No. Control</th>
                            <th>Año</th>
                            <th>Telefono</th>
                            <th>Correo</th>
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
                                    <td>{{ $value->sexo}}</td>
                                    <td>{{ $value->carrera}}</td>
                                    <td>{{ $value->no_control}}</td>
                                    <td>{{ $value->anio}}</td>
                                    <td>{{ $value->telefono}}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a  href="{{route('show.alumno', $value->id)}}"  class="btn-sm btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
                                            <a  href="{{route('edit.alumno', $value->id)}}"  class="btn-sm btn-rounded btn-warning mb-3" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('destroy.alumno', $value->id) }}" class="btn-sm btn-rounded btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a>
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
                <div class="d-flex justify-content-end">
                    {!! $collection->links() !!}
                </div>
        </div>
    </div>
@stop

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
$(document).ready(function() {
  $('#limpiar').click(function() {
    $('input[type="search"]').val('');
  });
});
    </script>
@stop
