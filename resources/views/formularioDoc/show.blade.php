@extends('adminlte::page')

@section('content_header')
    <h4>Documentos del Alumno</h4>
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
                <a href="{{ route("crear.correo", $id) }}" class="btn btn-rounded bg-teal mb-3" data-toggle="tooltip" data-placement="top" title="Notificar"><i class="fas fa-paper-plane"></i>Notificar</a>
            </div>
            </div>
        <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td>Solicitud de Acto Recepcional</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento", $id) }}"  <?php if ($actoR == false){ ?> style="display: none;" <?php   } ?>  class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($actoR == true){ ?> style="display: none;" <?php   } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Constancia de no Inconveniencia</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento2", $id) }}" <?php if ($noInc == false){ ?> style="display: none;" <?php   } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($noInc == true){ ?> style="display: none;" <?php   } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Solicitud de Liberación de Proyecto</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento3", $id) }}" <?php if ($libPro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                         <h6 <?php if ($libPro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>AnteProyecto</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento4", $id) }}" <?php if ($antePro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($antePro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Registro de Proyecto</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento5", $id) }}" <?php if ($regPro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($regPro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                                    </div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Solicitud del Alumno</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento6", $id) }}" <?php if ($solAlum == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($solAlum == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Constancia de Ingles</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento7", $id) }}" <?php if ($ingles == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($ingles == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Constancia de terminación de Servicio Social</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento8", $id) }}" <?php if ($servicio == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($servicio == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Certificado</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento9", $id) }}" <?php if ($certif == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($certif == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Aceptación de Tesis</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route("descarga.documento10", $id) }}" <?php if ($tesis == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                        <h6 <?php if ($tesis == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>

                                    </div>
                                </td>
                            </tr>
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
    <script>
    $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});
    </script>
@stop
