@extends('master')

@section('content')
    @include('partes.header')
    @include('partes.listar_exito')
    @include('partes.listar_mis_errores')
    @include('partes.listar_errors')
    <section class="d-flex justify-content-center align-middle">
        <article class="m-4 poulet-card-list poulet-scroll">
            <table class="table table-hover">
                <thead>
                <tr class="">
                    <th>N consulta</th>
                    <th>Estado</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($consultas as $consulta)
                    <tr class="">
                        <td class="text-center">{{$consulta->id}}</td>
                        <td class="{{(!$consulta->revisado)? 'pink-text' : ''}}">{{$consulta->getRevisado()}}</td>
                        <td>{{ $consulta->created_at->format('l-Y-m-d') }}</td>
                        <td class="">
                            <a href="{{route('contacto.show',$consulta)}}" class="btn-sm btn-info"><i
                                    class="far fa-eye"></i></a>
                            <a href="#modalCambiarEstado"
                               class="btn-sm indigo accent-1"
                                data-toggle="modal"
                                data-form="{{route('contacto.update',$consulta->id)}}"
                                data-estado="{{$consulta->revisado}}"><i class="text-white fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('contacto.destroy',$consulta->id)}}"
                               data-msj="Desea eliminar la consulta N{{$consulta->id}}"
                               class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>vacio</td>
                        <td>vacio</td>
                        <td>vacio</td>
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
    <!-- modal cambio de rol -->
    <div class="modal fade right" id="modalCambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabelNombre"
         aria-hidden="true">
        <div class="modal-dialog modal-sm modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header pink accent-1">
                    <h3 class="modal-title white-text text-center" id="myModalLabelNombre">Cambiar Estado</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="col form-group">
                            <label for="revisado" class="cursiva-poulet">Seleccione un estado</label>
                            <select id="revisado" name="revisado" class="form-control custom-select">
                                <option value="1">Revisado</option>
                                <option value="0">Pendiente</option>

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
