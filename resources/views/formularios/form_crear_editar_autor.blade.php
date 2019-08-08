@extends('master')

@section('content')
    @include('partes.listar_errors')
    <!-- si tengo un objeto receta entronces uso la accion update sino uso la opcion store -->
    <form
        action="{{isset($autor)? route('autor.update',$autor->id_autor)  : route('autor.store')}}"
        method="post"
        enctype="multipart/form-data"
        class="m-4">

        @if(isset($autor))
            @method('PUT')
        @endif
        @csrf
        <div class="m-4 form-group ">
            <div class="align-content-start">
                <label class="cursiva-poulet" for="nombre">Nombre</label>
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder=""
                       value="{{isset($autor)? $autor->nombre : old('nombre')}}">
            </div>
            <div class="align-content-end">
                <label class="cursiva-poulet" for="apellido">Apellido</label>
                <input class="form-control" type="text" id="apellido" name="apellido" placeholder=""
                       value="{{isset($autor)? $autor->apellido : old('apellido')}}">
            </div>
        </div>

        <div class="m-4">
            @if(isset($autor))
                <img class="m-2 rounded" src="{{$autor->getAutorImgAttribute()}}"
                     alt="{{$autor->nombre}}">
            @endif
            <div class="custom-file ">
                <input type="file" class="align-baseline custom-file-input" name="imagen" id="imagen"
                       accept="">
                <label class="align-baseline custom-file-label text-truncate cursiva-poulet" for="imagen"
                       data-browse="Archivo">Elija una imagen</label>
            </div>
        </div>
        <div class="my-1 mx-4 form-group">
            <label for="biografia" class="cursiva-poulet">Biografia</label>
            <textarea id="biografia" name="biografia" class="form-control"
                      rows="3">{{isset($autor)? $autor->biografia : old('biografia')}}</textarea>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{url()->previous()}}" class="btn btn-info">Volver</a>
            <button type="submit" class="d-block btn btn-pink">Guardar</button>
        </div>

    </form>
@endsection
