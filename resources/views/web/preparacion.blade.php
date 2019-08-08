@extends('master')

@section('content')
    @include('partes.header')
    <section class="container-fluid m-4">
        <article class="row">
            <div class="col-6">
                <img class="align-items-start rounded" src="{{$receta->getImagenGrande()}}" alt="{{$receta->titulo}}">

            </div>
            <div class="col-6">
                <h3 class="my-5 text-center">{{$receta->titulo}}</h3>
                <div class="d-flex align-items-center">
                    <p class="text-center poulet-font-125 mx-auto"><i
                            class="pink-text fa fa-clock-o"></i> {{$receta->tiempo_preparacion}} min</p>
                    <p class="text-center poulet-font-125 mx-auto"><i
                            class="pink-text fa fa-heart"></i> {{$receta->dificultad}}</p>
                </div>
                <p>{{$receta->preparacion}}</p>
            </div>
        </article>
    </section>
    <article>
        @include('partes.boton_volver')
    </article>
@endsection
