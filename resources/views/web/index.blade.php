@extends('master')

@section('content')
    <article class="m-1  mb-5 row">
        <div class="col-6">
            <h3 class="pink-text mb-4 poulet">Bienvenidos</h3>
            <p>{{$intro}}</p>
        </div>
        <img class="col-6 img-fluid" src="{{@asset('img/cheft.jpg')}}" alt="cheft cocinando">
    </article>
@endsection
