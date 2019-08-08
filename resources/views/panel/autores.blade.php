@extends('master')

@section('content')
    @include('partes.header')
    @include('partes.listar_exito')
    @include('partes.listar_errors')
    @include('partes.listar_mis_errores')
    <section class="d-flex justify-content-center align-middle">
        <article class="m-4 poulet-card-list poulet-scroll">
            <table class="table table-hover">
                <thead>
                <tr class="">
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($autores as $autor)
                    <tr>
                        <td>{{$autor->nombre}}</td>
                        <td>{{$autor->apellido}}</td>
                        <td class="">
                            <a href="{{route('autor.show',$autor)}}" class="btn-sm btn-info"><i class="far fa-eye"></i></a>
                            <a href="{{route('autor.edit',$autor->id_autor)}}" class="btn-sm indigo accent-1"><i
                                    class="text-white fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('autor.destroy',$autor->id_autor)}}"
                               data-msj="Realmente desea eliminar al autor {{$autor->nombre}}"
                               class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>empy</td>
                        <td>empy</td>
                        @include('partes.acciobes_disable')
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
