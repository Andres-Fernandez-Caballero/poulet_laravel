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
                    <th>Usuario</th>
                    <th>Mail</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td class="">
                            <a href="{{route('users.show',$usuario)}}" class="btn-sm btn-info text-white"><i
                                    class="far fa-eye"></i></a>
                            <a href="{{route('users.edit',$usuario->id)}}"
                               class="btn-sm text-white indigo accent-1"><i class="fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('users.destroy',$usuario->id)}}"
                               data-msj="Realmente desea eliminar al usuario {{$usuario->name}}"
                               class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>milanesa</td>
                        <td>carnes</td>
                        <td>acciones</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </article>
        <article class="m-4">
            <div class="my-4">
                @include('partes.boton_volver')
            </div>
        </article>
    </section>

    <!-- modal eliminar receta -->
    @include('partes.modal_destroy')
@endsection
