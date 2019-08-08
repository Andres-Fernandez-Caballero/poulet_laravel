<article class="m-2 my-4 row">
    <div class="col-lg-4">
        <img class="view overlay rounded shadow img-fluid" src="{{$receta->getRecetaImgAttribute()}}" alt="descript">
        <a>
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>
    <div class="col-lg-8">
        <h3 class="font-weight-bold mb-3"><strong>{{$receta->titulo}}</strong></h3>
        <div>
            <p><i class="pink-text fa fa-clock-o" aria-hidden="true"></i> {{$receta->tiempo_preparacion}} min</p>
            <p><i class="pink-text fa fa-heart" aria-hidden="true"></i> {{$receta->dificultad}}</p>
            <p class="poulet-holder text-truncate">{{$receta->preparacion}}</p>
        </div>
        <div class="d-flex justify-content-end">
            <!-- link a la preparacion -->
            <a class=" btn btn-pink btn-md" href="{{route("receta.show",$receta->id_recetas)}}">Preparar</a>
        </div>

    </div>
</article>
