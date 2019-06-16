<nav class="d-block d-sm-block d-md-none navbar navbar-expand-md navbar-dark pink lighten-4">
    <div class="container">
        <a class="recetas navbar-brand poulet" href="#">Poulet Recetas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach($links as $titulo => $link)
                <li class="nav-item"><a class="nav-link text-right text-white" href="{{$link}}">{{$titulo}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
