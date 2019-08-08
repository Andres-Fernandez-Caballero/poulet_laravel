@extends('master')

@section('content')
    @include('partes.header')
    <section>
    <p class="text-center w-responsive mx-auto mb-5">
        {{$texto}}
    </p>
    </section>
    <hr class="mt-5 mb-0">
    <section class="mt-5">
        @php $cont = 0; @endphp
        @foreach($lista as $receta)
            @if(($cont++)% 2 != 0 )
                @include('partes.tarjeta_izquierda',$receta)
            @else
                @include('partes.tarjeta_derecha',$receta)
            @endif
                <hr class="mt-5 mb-0">
        @endforeach
    </section>
@endsection
