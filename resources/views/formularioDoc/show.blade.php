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
        <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <img src="/assets/img/pdf.png" width="100px" height="100px">
                    <h6><em>Solicitud de Acto Recepcional</em></h6>
                    <div>
                        <a href="{{ route("descarga.documento", $id) }}"  <?php if ($actoR == false){ ?> style="display: none;" <?php   } ?>  class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                        <h6 <?php if ($actoR == true){ ?> style="display: none;" <?php   } ?>><em style="color: red">Sin Documento</em></h6>
                    </div>

                  </div>
                  <div class="col text-center">
                    <img src="/assets/img/pdf.png" width="100px" height="100px">
                    <h6><em>Constancia de no Inconveniencia</em></h6>
                    <div>
                        <a href="{{ route("descarga.documento2", $id) }}" <?php if ($noInc == false){ ?> style="display: none;" <?php   } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                        <h6 <?php if ($noInc == true){ ?> style="display: none;" <?php   } ?>><em style="color: red">Sin Documento</em></h6>
                    </div>

                  </div>
                  <div class="col text-center">
                    <img src="/assets/img/pdf.png" width="100px" height="100px">
                    <h6><em>Solicitud de Liberación de Proyecto</em></h6>
                    <div>
                        <a href="{{ route("descarga.documento3", $id) }}" <?php if ($libPro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                        <h6 <?php if ($libPro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                    </div>
                  </div>
                  <div class="col text-center">
                    <img src="/assets/img/pdf.png" width="100px" height="100px">
                    <h6><em>AnteProyecto</em></h6>
                    <div>
                        <a href="{{ route("descarga.documento4", $id) }}" <?php if ($antePro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                        <h6 <?php if ($antePro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <img src="/assets/img/pdf.png" width="100px" height="100px">
                        <h6><em>Registro de Proyecto</em></h6>
                        <div>
                            <a href="{{ route("descarga.documento5", $id) }}" <?php if ($regPro == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                            <h6 <?php if ($regPro == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                        </div>
                    </div>
                    <div class="col text-center">
                        <img src="/assets/img/pdf.png" width="100px" height="100px">
                        <h6><em>Solicitud del Alumno</em></h6>
                        <div>
                            <a href="{{ route("descarga.documento6", $id) }}" <?php if ($solAlum == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                            <h6 <?php if ($solAlum == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                        </div>
                    </div>
                    <div class="col text-center">
                        <img src="/assets/img/pdf.png" width="100px" height="100px">
                        <h6><em>Constancia de Ingles</em></h6>
                        <div>
                            <a href="{{ route("descarga.documento7", $id) }}" <?php if ($ingles == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                            <h6 <?php if ($ingles == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                        </div>
                    </div>
                    <div class="col text-center">
                        <img src="/assets/img/pdf.png" width="100px" height="100px">
                        <h6><em>Constancia de terminación de Servicio Social</em></h6>
                        <div>
                            <a href="{{ route("descarga.documento8", $id) }}" <?php if ($servicio == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                            <h6 <?php if ($servicio == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-6 text-center">
                            <img src="/assets/img/pdf.png" width="100px" height="100px">
                            <h6><em>Certificado</em></h6>
                            <div>
                                <a href="{{ route("descarga.documento9", $id) }}" <?php if ($certif == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                <h6 <?php if ($certif == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <img src="/assets/img/pdf.png" width="100px" height="100px">
                            <h6><em>Aceptación de Tesis</em></h6>
                            <div>
                                <a href="{{ route("descarga.documento10", $id) }}" <?php if ($tesis == false){ ?> style="display: none;" <?php } ?> class="btn btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Descargar Documento"><i class="fas fa-download"></i> Descargar</a>
                                <h6 <?php if ($tesis == true){ ?> style="display: none;" <?php } ?>><em style="color: red">Sin Documento</em></h6>
                            </div>
                        </div>
                    </div>
                    <br><br>
                      <div class="row">

                      <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i>
                        {{ __('Regresar') }}
                    </a>
            </div>
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
