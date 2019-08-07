@extends('master')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="m-4 alert alert-danger" role="alert">
                <p><strong>Error!!! </strong><span>{{$error}}</span> <a href="{{route('web.index')}}"
                                                                        class="pink-text">Volver al inicio.</a>
                </p>
            </div>
        @endforeach
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
                    <th>N consulta</th>
                    <th>Estado</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($consultas as $consulta)
                    <tr>
                        <td>{{$consulta->id}}</td>
                        <td>{{$consulta->getRevisado()}}</td>
                        <td>{{ $consulta->created_at->format('l-Y-m-d') }}</td>
                        <td class="">
                            <a href="{{route('contacto.show',$consulta)}}" class="btn-sm btn-info text-white"><i
                                    class="far fa-eye"></i></a>
                            <a href="{{route('contacto.edit',$consulta->id)}}"
                               class="btn-sm text-white indigo accent-1"><i class="fas fa-pen-fancy"></i></a>
                            <a href="#modalConfirmDelete"
                               data-toggle="modal"
                               data-form="{{route('contacto.destroy',$consulta->id)}}"
                               data-msj="Desea eliminar la consulta N{{$consulta->id}}"
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
