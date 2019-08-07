<article class="m-2 my-4 row">
    <div class="col-lg-8">
        <h3 class="font-weight-bold mb-3"><strong>{{$receta->titulo}}</strong></h3>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{$receta->tiempo_preparacion}}</span> min</p>
        <p><i class="fa fa-heart" aria-hidden="true"></i> <span>{{$receta->dificultad}}</span></p>
        <p class="poulet-holder text-truncate">{{$receta->preparacion}}</p>

        <a class="btn btn-pink btn-md" href="{{route("receta.show",$receta->id_recetas)}}">Preparar</a>
    </div>
    <div class="col-lg-4">
        <img class="view overlay rounded shadow" src="{{$receta->getRecetaImgAttribute()}}" alt="{{$receta->titulo}}">
        <a>
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
</article>
