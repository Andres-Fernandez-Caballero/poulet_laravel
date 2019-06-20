@extends('master')

@section('content')
    @include('partes.header',$header = ['fondo'=>'poulet-header','titulo'=>'Poulet Recetas'])
    <article class="m-1  mb-5 row">
        <div class="col-6">
            <h3 class="pink-text mb-4 poulet">Bienvenidos</h3>
            <p>Bienvenido al maravilloso mundo de la cocina cacera en este sitio usted podra encontrar recetas de todo
                tipo y variedad desde lo mas simple hasta recetas gourmet, todas ellas explicadas de la forma mas simple
                y clara para que cuaquiera pueda entrar en el fantastico mundo de la gastronomia solo tiene que cliquear
                en el link recetas para descubrir un nuevo mundo de sabores!.</p>
        </div>
        <img class="col-6 img-fluid" src="{{@asset('img/cheft.jpg')}}" alt="cheft cocinando">
    </article>
@endsection
