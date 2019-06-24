@extends('panelMaster')

@section('content')
    @include('partes.header',$header)
    <!-- TODO: hacer mas atractiva la seccion formulario receta -->
    <form action="{{route('receta.store')}}" method="post" class="m-4">
        @csrf
        <div class="col-md-6">
            <div class="md-form mb-0">
                <input type="text" id="titulo" name="titulo" class="form-control">
                <label for="titulo" class="">Titulo</label>
            </div>
        </div>

        <div>
            <label for="fk_autor">Autor</label>
            <select id="fk_autor" name="fk_autor" class="browser-default custom-select">
                <option selected>Seleccione un autor</option>
                @foreach($autores as $autor)
                    <option value="{{$autor->id_autor}}">{{$autor->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" class="browser-default custom-select">
                <option selected>Seleccione una Categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria}}">{{$categoria}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="dificultad">Dificultad</label>
            <select id="dificultad" name="dificultad" class="browser-default custom-select">
                <option selected>Seleccione Dificultad</option>
                @foreach($dificultades as $dificultad)
                    <option value="{{$dificultad}}">{{$dificultad}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tiempo_preparacion">Tiempo de Preparacion</label>
            <select id="tiempo_preparacion" name="tiempo_preparacion" class="browser-default custom-select">
                <option selected>Selecciones El Tiempo</option>
                @foreach($tiempos as $tiempo)
                    <option value="{{$tiempo}}">{{$tiempo}} min</option>
                @endforeach
            </select>
        </div>


        <div class="md-form">
            <textarea id="preparacion" name="preparacion" class="md-textarea form-control" rows="3"></textarea>
            <label for="preparacion">Preparacion</label>
        </div>

        <button type="submit" class="d-block mx-auto btn btn-pink">Guardar</button>
    </form>
@endsection
