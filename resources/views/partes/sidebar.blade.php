<div>
    <ul class="altura_aside m-4 card nav flex-column ">
        <li class="color-poulet">
            <img src="{{asset('img/logo.png')}}" class="mx-auto d-block img-fluid rounded-circle m-4" alt="logo"
                 height="135" width="135"></li>
        <li class="mt-4">
            <h2 class="text-center recetas">Indice</h2>
        </li>
        <!-- Cargo todos los lonk del array -->
        @forelse($links as $titulo => $link)
            <li class="nav-item"><a class="nav-link text-center" href="{{$link}}">{{$titulo}}</a></li>
        @empty
            <p class="text-danger">No hay links cargados</p>
        @endforelse
    <!-- pregunto si hay un usuario autenticado y si tiene privilegios -->
        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link text-center" href="{{route('panel.index')}}">Panel</a>
            </li>
        @else
        <!-- caso de no estar logueado y/o no tener permisos muestra un link a "contacto" -->
            <li class="nav-item">
                <a href="{{route('contacto.create')}}" class="nav-link text-center">Contacto</a>
            </li>
        @endif
        <hr class="mx-5">
        <!-- si no estoy logueado soy visitante muestro las opciones de login o registro -->
        @guest
            <li class="nav-item">
                <a class="nav-link text-center" href="{{route('login')}}">login</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{route('register')}}">Registracion</a>
                </li>
            @endif
        <!-- si no soy visitante soy usuario ... -->
        @else
            <li class="nav-item"><a href="{{route('home')}}"
                                    class="nav-link text-center">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link text-center" href="{{ route('logout') }}"
                   onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</div>
