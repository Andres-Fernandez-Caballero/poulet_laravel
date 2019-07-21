@extends('master')

@section('content')
    @include('partes.header',$header = ['fondo'=>'poulet-header','titulo'=>'Contacto'])
    <section class="m-4">
        <form method="post" action="{{route('contacto.store')}}">
            @csrf
            <input type="text" class="my-4 form-control" id="id-name" name="nombre" aria-describedby="nombreHelp"
                   placeholder="Nombre">

            <input type="text" class="my-4 form-control" id="id-apellido" name="apellido"
                   aria-describedby="apellidoHelp" placeholder="Apellido">

            <input type="email" class="my-4 form-control" id="exampleInputEmail1" name="mail"
                   aria-describedby="emailHelp" placeholder="E-mail">

            <h2 class="cursiva-poulet f-poulet my-4">Que clase de comidas deberiamos agregar?</h2>
            <div class="d-flex align-items-start form-check form-check-inline ">

                @foreach($categorias as $categoria )
                    <div class="mx-4 custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="{{$categoria.'-check'}}"
                               id="{{$categoria.'-check'}}">

                        <label class="custom-control-label" for="{{$categoria.'-check'}}">
                            {{$categoria}}
                        </label>
                    </div>
                @endforeach
                    <div class="mx-4 custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember"
                               id="otros" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="otros">
                            Otros
                        </label>
                    </div>
            </div>

            <div class="my-3 form-group">

                <label for="form-comentario">Comentarios</label>
                <textarea class="form-control" name="comentario" id="form-comentario" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-pink">Enviar</button>


        </form>
    </section>
@endsection
