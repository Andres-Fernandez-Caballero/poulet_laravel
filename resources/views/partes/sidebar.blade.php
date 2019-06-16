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
    </ul>
</div>
