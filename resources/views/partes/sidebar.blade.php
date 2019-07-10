<div >
    <ul class="altura_aside m-4 card nav flex-column ">
        <li class="color-poulet">
            <img src="{{asset('img/logo.png')}}" class="mx-auto d-block img-fluid rounded-circle m-4" alt="logo"
                 height="135" width="135"></li>
        <li class="mt-4">
            <h2 class="text-center recetas">Indice</h2>
        </li>
        @forelse($links as $titulo => $link)
        <li class="nav-item"><a class="nav-link text-center pink-text " href="{{$link}}">{{$titulo}}</a></li>
        @empty
        <p class="text-danger">No hay links cargados</p>
        @endforelse
        <hr>
        @guest
            <li class="nav-item">
                <a class="nav-link text-center pink-text" href="{{route('login')}}">login</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-center pink-text" href="{{route('register')}}">Registracion</a>
                </li>
            @endif
        @else
            <li class="nav-item"><p class="text-center pink-text">{{\Illuminate\Support\Facades\Auth::user()->name}}</p></li>
            <li class="nav-item dropdown">
                <a class="nav-link text-center pink-text" href="{{route('logout')}}">
                    logout
                </a>
        @endguest
    </ul>
</div>
