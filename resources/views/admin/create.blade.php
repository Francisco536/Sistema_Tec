@extends('adminlte::page')

@section('content_header')
    <h1>Crear Usuario Administrator</h1>
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
                    <form method="POST" id="admin" action="{{ route('store.admin') }}" onsubmit="verificarPasswords();">
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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="alert4" class="alert alert-danger" style="display:none" role="alert">Ingresa un correo valido</div>
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
                        <div id="alert" class="alert alert-danger" style="display:none" role="alert">La contraseña no coincide!!</div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>

                                <a href="{{route('lista.admin')}}" class="btn btn-danger">
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
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

@stop

@section('js')
    <script> console.log('Hi!');
    $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});
//primeras letras mayusculas
function capitalize(str){
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }
        const input = document.getElementById('name');
        input.addEventListener('keypress', e => {
        setTimeout(() => {input.value = input.value.split(' ').map(x => capitalize(x)).join(' ')}, 1)
        });
        const input2 = document.getElementById('ap_pater');
        input2.addEventListener('keypress', e => {
        setTimeout(() => {input2.value = capitalize(input2.value)}, 1)
        });
        const input3 = document.getElementById('ap_mater');
        input3.addEventListener('keypress', e => {
        setTimeout(() => {input3.value = capitalize(input3.value)}, 1)
        });

    //Validar password
    var adminLog = document.getElementById('admin');
    adminLog.addEventListener("submit", (e) => {
        pass1 = document.getElementById('password');
        pass2 = document.getElementById('password-confirm');

     if (pass1.value !== pass2.value) {
         e.preventDefault();
         let x = document.getElementById("alert");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert").fadeOut(1000);
                    }, 1000);
  }
});
    adminLog.addEventListener("submit", (e) => {
        var exp = /[a-zA-Z0-9._-]+\@(gmail|outlook|hotmail)\.(com|es)$/;
        var correo = document.getElementById("email").value;
        var valido = exp.test(correo);
        if (valido === false){
            e.preventDefault();
         let x = document.getElementById("alert4");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert4").fadeOut(1000);
                    }, 1000);
        }

    });

    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

