@extends('master')

@section('content')
    <section class="my-4 d-flex justify-content-center">
        <article class="card poulet-card-info">
            <div class="card">
                <div class="card-header color-poulet"><img src="{{$usuario->getUserImgAttribute()}}" alt=""></div>
            </div>
            <div class="card-body">
                <p><span>{{$usuario->name}}</span></p>
                <p><span>{{$usuario->email}}</span></p>
                <p><span>{{$usuario->rol}}</span></p>
            </div>
        </article>
        <article>
            @include('partes.boton_volver')
        </article>
    </section>
@endsection

