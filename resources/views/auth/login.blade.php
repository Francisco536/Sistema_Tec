<x-guest-layout>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab"  href="#admin">Administrador</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab"  href="#alumno">Alumno</a>
                  </li>

                </ul>
              </div>

              {{-- action="{{ route('login') }}" --}}
<div class="tab-content">
    <div id="admin" class="container tab-pane active">
        <br>
        <h3>Iniciar Sesión como Administrador</h3>
        <form  method="POST" id="admin" action="{{ route('login') }}" >
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="login" class="block mt-1 w-full" type="email" name="login" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4" style="background-color: rgb(51, 105, 105)">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>
            <br>
        </form>



    </div>

    <div id="alumno" class="container tab-pane fade">
        <br>
        <h3>Iniciar Sesión como Estudiante</h3>
        <form  id="alumno" name="formulariologina" method="POST"  action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="no_control" value="{{ __('No. Control') }}" />
                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('no_control')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex justify-center mt-4" >
                <x-button class="ml-4" id="alumno" name="alumno" style="background-color: rgb(51, 105, 105)">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>
            <br>
        </form>

    </div>
</div>

        </div>

    </x-authentication-card>
</x-guest-layout>
@section('js')
<script>
var adminLog = document.getElementById('admin');
    adminLog.addEventListener("submit", (e) => {
    });
    var alumLog = document.getElementById('alumno');
    alumLog.addEventListener("submit", (e) => {
    });
</script>
@stop
