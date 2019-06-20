<article class="m-2 my-4 row">
    <div class="col-lg-8">
        <h3 class="font-weight-bold mb-3"><strong>titulo</strong></h3>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 30 min</p>
        <p><i class="fa fa-heart" aria-hidden="true"></i> moderado</p>
        <p class="poulet-holder">lorem iptzun pddsfk sfdlfj kdsd;kasd ;askddda </p>

        <a class="btn btn-pink btn-md" href="{{route("web.preparacion",$receta->id_recetas)}}">Preparar</a>
    </div>
    <div class="col-lg-4">
        <!-- Featured image -->
        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
            <img class="img-fluid" src="{{asset('img/quemada.jpg')}}" alt="Sample image">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
    </div>
</article>
