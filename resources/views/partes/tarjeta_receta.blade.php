<div class="mx-auto my-3 card-poulet card">
    <div class="view overlay">
        <img class="card-img-top" src="{{asset("$receta->imagen")}}" alt="descript">
    </div>
    <div class="card-body">
        <h4 class="card-title">{{$receta->titulo}}</h4>
        <p class="card-text"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$receta->tiempo_preparacion}} min</p>
        <p class="card-text"><i class="fa fa-heart" aria-hidden="true"></i> {{$receta->dificultad}}</p>
        <a href="{{route("web.preparacion",$receta->id_recetas)}}" class="pink-text d-flex flex-row-reverse p-2">
            <h5 class="waves-effect waves-light">cocinar<i
                    class="fa fa-angle-double-right ml-2"></i></h5>
        </a>
    </div>
</div>
