@extends('master')

@section('content')
    <div class="card">

        <div class="alert alert-warning" role="alert">
            <strong>ERROR -_- !!!</strong>{{$error}}.<a href="{{route('web.index')}}" class="alert-link">volver al inicio</a>
        </div>
    </div>

@endsection
