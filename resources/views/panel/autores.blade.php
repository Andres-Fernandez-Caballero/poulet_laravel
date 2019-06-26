@extends('panelMaster')

@section('content')
    @include('partes.header',$header)

    <ul>
        @foreach($listaAutores as $autor)
            <li>{{$autor->nombre}}</li>
        @endforeach
    </ul>
@endsection
