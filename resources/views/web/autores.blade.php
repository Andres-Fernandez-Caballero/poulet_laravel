@extends('master')

@section('content')
    @include('partes.header')

    <section class="m-4">
        @forelse($autores as $autor)
            <article class="container card my-2 p-4">
                <div class="row">
                    <div class="d-block col-6">
                        <img src="{{$autor->getAutorImgAttribute()}}" class="d-block rounded-pill" alt="">
                    </div>
                    <div class="align-items-center col-6">
                        <h4 class="">{{$autor->getFullName()}}</h4>
                        <a href="{{route('autor.show',$autor->id_autor)}}" class="btn btn-pink">Conocer</a>
                    </div>
                </div>
            </article>
        @empty
            <article>
                <div class="alert alert-info" role="alert">
                    <strong>No tenemos autores todavia</strong>
                </div>
            </article>
        @endforelse
    </section>

@endsection
