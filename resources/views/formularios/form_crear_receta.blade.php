@extends('master')

@section('content')
    @include('partes.listar_errors')
    <!-- si tengo un objeto receta entronces uso la accion update sino uso la opcion store -->
    <form
        action="{{isset($datos['receta'])? route('receta.update',$datos['receta']->id_recetas)  : route('receta.store')}}"
        method="post"
        enctype="multipart/form-data"
        class="m-4">

        @if(isset($datos['receta']))
            @method('PUT')
        @endif
        @csrf
        <div class="mx-4">
            <div class="form-group">
                <label class="cursiva-poulet" for="nombre_nuevo">Titulo</label>
                <input class="form-control" type="text" id="nombre_nuevo" name="titulo" placeholder=""
                       value="{{isset($datos['receta'])? $datos['receta']->titulo : old('titulo')}}">
            </div>
        </div>
        <div class="my-2 mx-4">
            @if(isset($datos['receta']))
                <img class="m-2 rounded" src="{{$datos['receta']->getRecetaImgAttribute()}}"
                     alt="{{$datos['receta']->titulo}}">
            @endif
            <div class="custom-file ">
                <input type="file" class="align-baseline custom-file-input" name="imagen" id="imagen"
                       accept="">
                <label class="align-baseline custom-file-label text-truncate cursiva-poulet" for="imagen"
                       data-browse="Archivo">Elija una imagen</label>
            </div>
        </div>
        <div class="m-2 row">
            <div class="col form-group">
                <label for="fk_autor" class="cursiva-poulet">Autor</label>
                <select id="fk_autor" name="fk_autor" class="form-control custom-select">
                    <option>Seleccione Autor</option>
                    @foreach($datos['autores']  as $autor)
                        <option value="{{$autor->id_autor}}"
                            {{isset($datos['receta']) && $datos['receta']->fk_autor == $autor->id_autor? 'selected' : ''}}
                        >{{$autor->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="categoria" class="cursiva-poulet">Categoria</label>
                <select id="categoria" name="categoria" class="form-control custom-select">
                    <option>Seleccione una Categoria</option>
                    @foreach($datos['categorias']  as $categoria)
                        <option value="{{$categoria}}"
                            {{isset($datos['receta']) && $datos['receta']->categoria == $categoria? 'selected' : ''}}
                        >{{$categoria}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="dificultad" class="cursiva-poulet">Dificultad</label>
                <select id="dificultad" name="dificultad" class="form-control custom-select">
                    <option>Seleccione Dificultad</option>
                    @foreach($datos['dificultades']  as $dificultad)
                        <option value="{{$dificultad}}"
                            {{isset($datos['receta']) && $datos['receta']->dificultad == $dificultad? 'selected' : ''}}
                        >{{$dificultad}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label for="tiempo_preparacion" class="cursiva-poulet">Tiempo</label>
                <select id="tiempo_preparacion" name="tiempo_preparacion"
                        class="form-control custom-select">
                    <option>Selecciones el Tiempo</option>
                    @foreach($datos['tiempos'] as $tiempo)
                        <option value="{{$tiempo}}"
                            {{isset($datos['receta']) && $datos['receta']->tiempo_preparacion == $tiempo? 'selected' : ''}}
                        >{{$tiempo}} min
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-1 mx-4 form-group">
            <label for="preparacion" class="cursiva-poulet">Preparacion</label>
            <textarea id="preparacion" name="preparacion" class="form-control"
                      rows="3">{{isset($datos['receta'])? $datos['receta']->preparacion : old('preparacion')}}</textarea>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{url()->previous()}}" class="btn btn-info">Volver</a>
            <button type="submit" class="d-block btn btn-pink">Guardar</button>
        </div>

    </form>
@endsection
