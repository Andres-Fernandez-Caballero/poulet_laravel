@extends('master')

@section('content')
    @include('partes.header')
    @include('partes.listar_errors')
    @include('partes.listar_exito')
    @include('partes.listar_mis_errores')
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
                        <input class="custom-control-input" type="checkbox" name="boxs[]"
                               id="{{$categoria.'-check'}}" value="{{$categoria}}">

                        <label class="custom-control-label" for="{{$categoria.'-check'}}">
                            {{$categoria}}
                        </label>
                    </div>
                @endforeach
                <div class="mx-4 custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="boxs[]"
                           id="otros" {{ old('otros')}} value="otros">

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
