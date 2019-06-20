<article class="m-2 my-4 row">
    <div class="col-lg-4">
        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
            <!-- TODO: agregar imagen de la receta y descripcion en alt -->
            <img class="img-fluid" src="{{asset('img/quemada.jpg')}}" alt="descript">
            <a><div class="mask rgba-white-slight"></div></a>
        </div>
    </div>
    <div class="col-lg-8">
        <h3 class="font-weight-bold mb-3"><strong>{{$receta->titulo}}</strong></h3>
        <div>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{$receta->tiempo_preparacion}} min</p>
            <p><i class="fa fa-heart" aria-hidden="true"></i> {{$receta->dificultad}}</p>
            <p class="poulet-holder">{{$receta->preparacion}}</p>
        </div>
        <!-- link a la preparacion -->
        <a class="btn btn-pink btn-md" href="{{route("web.preparacion",$receta->id_recetas)}}">Preparar</a>
    </div>
</article>
