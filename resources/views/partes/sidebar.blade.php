<div >
    <ul class="altura_aside m-4 card nav flex-column ">
        <li class="color-poulet">
            <img src="{{asset('img/logo.png')}}" class="mx-auto d-block img-fluid rounded-circle m-4" alt="logo"
                 height="135" width="135"></li>
        <li class="mt-4">
            <h2 class="text-center recetas">Indice</h2>
        </li>
        @forelse($links as $titulo => $link)
        <li class="nav-item"><a class="nav-link text-center" href="{{$link}}">{{$titulo}}</a></li>
        @empty
        <p class="text-danger">No hay links cargados</p>
        @endforelse
        <hr class="mx-5">
        @guest
            <li class="nav-item">
                <a class="nav-link text-center" href="{{route('login')}}">login</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{route('register')}}">Registracion</a>
                </li>
            @endif
        @else
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link text-center">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></li>
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
