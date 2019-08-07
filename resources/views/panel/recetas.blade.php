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
                @forelse($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria}}</td>
                        <td class="">
                            <a href="{{route('receta.show',$receta)}}" class="btn-sm btn-info text-white"><i class="far fa-eye"></i></a>
                            <a href="{{route('receta.edit',$receta->id_recetas)}}" class="btn-sm text-white indigo accent-1"><i class="fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('receta.destroy',$receta->id_recetas)}}"
                               data-msj="Realmente desea eliminar la receta {{$receta->titulo}}"
                               class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Vacio</td>
                        <td>Vacio</td>
                        <td>Sin acciones</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </article>
        <article class="m-4">
            <div class="my-4">
                <a href="{{route('receta.create')}}" class="btn-lg btn-pink">Agregar Receta</a>
            </div>
            <div class="my-4">
                @include('partes.boton_volver')
            </div>

        </article>
    </section>

    <!-- modal eliminar receta -->
    @include('partes.modal_destroy')
@endsection

