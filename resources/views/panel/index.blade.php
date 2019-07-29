@extends('master')

@section('content')

    @include('partes.header',$header)
    <!-- lista de recetas separadas en pequeñas tablas -->
    <section class="justify-content-around row  d-flex justify-content-center">
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header poulet-font-125  color-poulet">Recetas</div>
            <div class="card-body poulet-card-info-body">
                <table class="my-0 mx-auto table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_recetas'] as $categoria => $cantidad)
                        <tr class="bg-white">
                            <td>{{$categoria}}</td>
                            <td class="text-center">{{$cantidad}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Vacio</td>
                            <td>?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a class="btn btn-pink" href="#"><i class="fas fa-drumstick-bite"></i> Listar</a>
            </div>
        </article>
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header color-poulet">Autores</div>
            <div class="card-body poulet-card-info-body poulet-scroll" id="style-2">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Nombre</th>
                        <th>Cant Recetas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_autores'] as $autor => $cant)
                        <tr class="bg-white">
                            <td>{{$autor}}</td>
                            <td>{{$cant}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Vacio</td>
                            <td>?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="#" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
            </div>
        </article>
        @if($auth_user->isMaster())
            <article class="poulet-card-info m-3  mb-4 card">
                <div class="card-header color-poulet">Usuarios</div>
                <div class="card-body poulet-card-info-body poulet-scroll">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Usuario</th>
                            <th>Rol</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($datos['lista_usuarios'] as $user => $rol)
                            <tr class="bg-white">
                                <td>{{$user}}</td>
                                <td>{{$rol}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>Vacio</td>
                                <td>?</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="#" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
                </div>
            </article>
        @endif
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header color-poulet">Consultas</div>
            <div class="card-body poulet-card-info-body poulet-scroll">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th>N consulta</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_consultas'] as $consulta => $estado)
                        <tr class="bg-white">
                            <td>{{$consulta}}</td>
                            <td class="text-center">{{$estado}}</td>
                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td>Vacio</td>
                            <td class="text-center">?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="#" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
            </div>
        </article>
    </section>
@endsection
