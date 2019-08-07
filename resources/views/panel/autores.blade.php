@extends('master')

@section('content')
    @if($errors->any())
        <div class="m-4 alert alert-danger" role="alert">
            <p><strong>Error!!! </strong><span>Mensaje de error</span> <a href="{{route('web.index')}}"
                                                                          class="pink-text">Volver al inicio.</a></p>
        </div>
    @endif
    @if(isset($success))
        <div class="m-4 alert alert-success" role="alert">
            <p><strong>exito!!! </strong><span>Mensaje de Exito</span>.</p>
        </div>
    @endif
    <section class="d-flex justify-content-center align-middle">
        <article class="m-4 poulet-card-list poulet-scroll">
            <table class="table table-hover">
                <thead>
                <tr class="">
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($autores as $autor)
                    <tr>
                        <td>{{$autor->nombre}}</td>
                        <td>{{$autor->apellido}}</td>
                        <td class="">
                            <a href="{{route('autor.show',$autor)}}" class="btn-sm btn-info">#</a>
                            <a href="{{route('autor.edit',$autor->id_autor)}}" class="btn-sm btn-warning">#</a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('autor.destroy',$autor->id_autor)}}"
                               data-msj="Realmente desea eliminar al autor {{$autor->nombre}}"
                               class="btn-sm btn-danger">#</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>empy</td>
                        <td>empy</td>
                        <td>
                            <a href="#" class="btn-sm btn-grey lighten-1 disabled ">#</a>
                            <a href="#" class="btn-sm btn- grey white-text disabled white-text">#</a>
                            <a href="#" class="btn-sm btn- grey darken-1 white-text disabled">#</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </article>
        <article class="m-4">
            <div class="my-4">
                <a href="{{route('autor.create')}}" class="btn-lg btn-pink">Agregar Autor</a>
            </div>
            <div class="my-4">
                @include('partes.boton_volver')
            </div>

        </article>
    </section>

    <!-- modal eliminar receta -->
    @include('partes.modal_destroy')
@endsection
