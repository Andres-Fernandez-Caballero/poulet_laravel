@extends('master')

@section('content')

    @if(isset($header))
        @include('partes.header',$header)
    @endif

    <section>
        <article class="mx-auto my-3 card" style="width: 400px; height: 400px; " >
            <div class="card-header color-poulet cursiva-poulet poulet-font-125">{{$receta->titulo}}</div>
            <div class="card-body p-0">
                <div class="d-flex">
                    <img class="align-items-start" src="{{$receta->getRecetaImgAttribute()}}"  alt="{{$receta->titulo}}">
                    <div class="mx-auto align-items-center">
                        <p class="card-text text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$receta->tiempo_preparacion}} min</p>
                        <p class="card-text text-center"><i class="fa fa-heart" aria-hidden="true"></i> {{$receta->dificultad}}</p>
                    </div>
                </div>
                <p>{{$receta->preparacion}}</p>
            </div>
        </article>
    </section>
        <article>
            <a href="{{url()->previous()}}" class="btn btn-pink">Volver</a>
        </article>
@endsection
