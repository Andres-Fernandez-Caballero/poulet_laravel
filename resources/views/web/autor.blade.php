@extends('master')

@section('content')
    <section>
        <article class="mx-auto my-3 card" style="width: 400px; height: 400px; ">
            <div class="card-header color-poulet cursiva-poulet poulet-font-125">{{$autor->nombre}}</div>
            <div class="card-body p-0">
                <div class="d-flex ">
                    <img class="justify-content-center" src="{{$autor->getAutorImgAttribute()}}" width="200px" alt="">
                </div>
                <p>{{$autor->biografia}}</p>
            </div>
        </article>
        <article>
            <div class="m-4 card">
                <ul>
                    @forelse($receta_autor as $receta)
                        <li><a href="#">{{$receta->titulo}}</a></li>
                    @empty
                        <li>No tiene recetas</li>
                    @endforelse
                </ul>
            </div>
        </article>
    </section>
    <article>
        @include('partes.boton_volver')
    </article>
@endsection
