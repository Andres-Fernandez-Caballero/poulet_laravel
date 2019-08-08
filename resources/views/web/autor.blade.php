@extends('master')

@section('content')
    @include('partes.header')
    <section class="d-flex justify-content-center">
        <article class="mx-auto my-3 card" style="width: 400px; height: 400px; ">
            <div class="card-header color-poulet cursiva-poulet poulet-font-125">{{$autor->nombre}}</div>
            <div class="card-body p-0">
                <div class="mb-4 d-flex ">
                    <img class="d-block mx-auto" src="{{$autor->getAutorImgAttribute()}}" alt="">
                </div>
                <p class="p-4">{{$autor->biografia}}</p>
            </div>
        </article>
        <article class="mx-auto my-3 card poulet-card-info">
            <div class="card-header color-poulet cursiva-poulet poulet-font-125">Recetas</div>
            <div class="card-body">
                @forelse($receta_autor as $receta)
                    <p><a href="{{route('receta.show',$receta->id_recetas)}}" class="pink-text">{{$receta->titulo}}</a></p>
                @empty
                    <p>No tiene recetas</p>
                @endforelse
            </div>

        </article>
    </section>
    <article>
        @include('partes.boton_volver')
    </article>
@endsection
