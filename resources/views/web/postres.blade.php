@extends('master')

@section('content')

    @include('partes.header',$header)

    <section>
        <!-- TODO: agregar metodo para que el contenido del parrafo sea probeido por el controlador -->
    <p class="text-center w-responsive mx-auto mb-5">
        Despues de preparar y cocinar sabrososs platos, no viene mal bajar
        la comida con unos postres, En esta seccion les enseñaremos como hacer todo tipo de tortas, pasteles, helados y
        mas .
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
