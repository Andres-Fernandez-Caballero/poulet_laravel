@extends('master')

@section('content')
    @include('partes.header')
    @include('partes.listar_errors')
    @include('partes.listar_mis_errores')
    @include('partes.listar_exito')

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
                            <a href="{{route('users.show',$usuario)}}" class="btn-sm btn-info"><i
                                    class="far fa-eye"></i></a>
                            <a href="#modalCambiarRol"
                               data-toggle="modal"
                               data-form="{{route('users.update',$usuario->id)}}"
                               data-rol="{{$usuario->rol}}"
                               class="btn-sm indigo accent-1"><i class="text-white fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('users.destroy',$usuario->id)}}"
                               data-msj="Realmente desea eliminar al usuario {{$usuario->name}}"
                               class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>vacio</td>
                        <td>vacio</td>
                        @include('partes.acciobes_disable')
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

    <!-- modal cambio de rol -->
    <div class="modal fade right" id="modalCambiarRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabelNombre" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header pink accent-1">
                    <h3 class="modal-title white-text text-center" id="myModalLabelNombre">Cambiar Rol</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="col form-group">
                            <label for="rol" class="cursiva-poulet">Seleccione Rol Del usuario</label>
                            <select id="rol" name="rol" class="form-control custom-select">
                                @foreach($roles  as $rol)
                                    <option value="{{$rol}}">{{$rol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="p-2 btn btn-outline-pink" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="p-2 btn btn-outline-info">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
