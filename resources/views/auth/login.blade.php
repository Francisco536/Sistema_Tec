    <link rel="stylesheet"href="assets/style/Log.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 ">
                    <br><br><br><br>
                    <br>
                    <br>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="assets/img/tec.jpg" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="text-center">
                        <img height="80px" width="80px" src="assets/img/tecnm.png">
                    </div>
                    <div class="row mb-4 px-3 text-center">

                        <h6 class="mb-0 mr-4 mt-2">INICIAR SESIÓN</h6>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                    </div>

                    {{-- <div class="card text-center"> --}}
                        {{-- <div class="card-header"> --}}
                            <ul class="nav nav-tabs card-header-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab"  href="#admin">Administrador</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"  href="#alumno">Alumno</a>
                              </li>

                            </ul>
                          {{-- </div> --}}

            <div class="tab-content">
                <div id="admin" class="container tab-pane active">
                    <br>
                    {{-- <h3>Iniciar Sesión como Administrador</h3> --}}
                    <form  method="POST" id="admin" action="{{ route('login') }}" >
                        @csrf

                        <div class="form-outline mb-4">
                            <x-label for="email" value="{{ __('Correo') }}" />
                            <x-input id="login" class="block mt-1 w-full" type="email" name="login" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="form-outline mb-4">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-center bg-teal mt-4">
                            <x-button class="ml-4" style="background-color: #1B396A">
                                {{ __('Iniciar Sesión') }}
                            </x-button>
                        </div>
                        <br>
                    </form>



                </div>

                <div id="alumno" class="container tab-pane fade">
                    <br>
                    {{-- <h3>Iniciar Sesión como Estudiante</h3> --}}
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
                            <x-button class="ml-4" id="alumno" name="alumno" style="background-color: #1B396A">
                                {{ __('Iniciar Sesión') }}
                            </x-button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        {{-- </div> --}}


                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3 text-center">
                <small class="ml-4 ml-sm-5 mb-2 ">
                    <img height="40px" width="40px" src="assets/img/tecnm.png">
                    Tecnológico de Tecomatlán Copyright &copy; 2023. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                </div>
            </div>
        </div>
    </div>
</div>


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
