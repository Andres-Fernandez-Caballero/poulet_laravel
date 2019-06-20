@extends('master')

@section('content')
    <div class="py-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @php $active = 'active'; $selector = 'true' @endphp
            @foreach($lista as $categoria => $recetas )
                <li class="nav-item">
                    <a class="nav-link pink-text {{$active}}" id="{{$categoria}}-tab"
                       data-toggle="tab"
                       href="#{{$categoria}}"
                       role="tab"
                       aria-controls="{{$categoria}}"
                       aria-selected="{{$selector}}">
                        {{$categoria}}
                    </a>
                </li>
                @php $active = ''; $selector = 'false'; @endphp
            @endforeach
        </ul>
    </div>

    <section class="tab-content" id="contenedor-contendido">
        @php $active = 'active'; $show = 'show'; @endphp
        @foreach($lista as $categoria => $recetas)
            <article class="tab-pane fade {{$show}} {{$active}}" id="{{$categoria}}" role="tabpanel"
                     aria-labelledby="{{$categoria}}-tab">
                <div class="px-4 pt-0" >
                    @include('partes.header',$header = ['fondo'=>"poulet-header-$categoria",'titulo'=>$categoria])
                </div>
                <div class="m-4 row d-flex justify-content-center">
                @foreach($recetas as $receta)

                            <article class="col-md-6 col-sm-12">
                                @include('partes.tarjeta_receta',$receta)
                            </article>
                 @endforeach()
                </div>
            </article>
            @php $active = ''; $show = ''; @endphp
        @endforeach
    </section>
@endsection
