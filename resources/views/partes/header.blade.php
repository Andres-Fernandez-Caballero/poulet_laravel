@if(isset($header))
    <header class="{{$header['fondo']}}  jumbotron">
        <h1 class="text-center cursiva-poulet my-5">{{$header['titulo']}}</h1>
    </header>
@else
    <header class="poulet-header  jumbotron">
        <h1 class="text-center cursiva-poulet my-5">Titulo generico</h1>
    </header>
@endif
