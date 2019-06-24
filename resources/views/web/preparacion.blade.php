@extends('master')

@section('content')

    @include('partes.header')
<!-- TODO: hacer mas linda la seccion preparacion -->
    <div class="row m-2">
        <section class="row">
        <article class="col">
            <p class="text-danger">Dificultad: </p><p>{{$receta->dificultad}}</p>
            <p class="text-danger">Tiempo de preparacion: </p><p>{{$receta->tiempo_preparacion}} min.</p>
            <p class="text-danger">Autor: </p><p>nombre de autor</p>
        </article>
        <aside class="col-5">
            <img src="{{asset("$receta->imagen")}}" alt="descript" height="250">
        </aside>
        </section>
    </div>
    <article class="m-2 p-2">
        <h3>Preparacion</h3>
        <p>{{$receta->preparacion}}</p>
    </article>

@endsection
