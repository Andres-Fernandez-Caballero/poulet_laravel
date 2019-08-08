@extends('master')

@section('content')
    @if(isset($success))
        <div class="alert alert-success" role="alert">
            <p><strong>Operacion exitosa! </strong><span>{{$success}}</span>.</p>
        </div>
    @endif
   @include('partes.listar_errors')
    <!-- lista de recetas separadas en pequeñas tablas -->
    <section class="justify-content-around row  d-flex justify-content-center">
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header poulet-font-125  color-poulet">Recetas</div>
            <div class="card-body poulet-card-info-body">
                <table class="my-0 mx-auto table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th><strong>Categoria</strong></th>
                        <th><strong>Cantidad</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_recetas'] as $categoria => $cantidad)
                        <tr class="bg-white">
                            <td>{{$categoria}}</td>
                            <td class="text-center pink-text">{{$cantidad}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Vacio</td>
                            <td class="text-center pink-text">?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a class="btn btn-pink" href="{{route('receta.index')}}"><i class="fas fa-drumstick-bite"></i>
                    Listar</a>
            </div>
        </article>
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header poulet-font-125  color-poulet">Autores</div>
            <div class="card-body poulet-card-info-body poulet-scroll" id="style-2">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th><strong>Nombre</strong></th>
                        <th><strong>Recetas</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_autores'] as $autor => $cant)
                        <tr class="bg-white">
                            <td>{{$autor}}</td>
                            <td class="text-center pink-text">{{$cant}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Vacio</td>
                            <td class="text-center pink-text">?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{route('autor.index')}}" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
            </div>
        </article>
        @if($auth_user->isMaster())
            <article class="poulet-card-info m-3  mb-4 card">
                <div class="card-header poulet-font-125  color-poulet">Usuarios</div>
                <div class="card-body poulet-card-info-body poulet-scroll">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th><strong>Usuario</strong></th>
                            <th><strong>Rol</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($datos['lista_usuarios'] as $user => $rol)
                            <tr class="bg-white">
                                <td>{{$user}}</td>
                                <td class="text-center pink-text">{{$rol}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>Vacio</td>
                                <td class="text-center pink-text">?</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{route('users.index')}}" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
                </div>
            </article>
        @endif
        <article class="poulet-card-info m-3  mb-4 card">
            <div class="card-header poulet-font-125  color-poulet">Consultas</div>
            <div class="card-body poulet-card-info-body poulet-scroll">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th><strong>Nº consulta</strong></th>
                        <th><strong>Estado</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datos['lista_consultas'] as $consulta => $estado)
                        <tr class="bg-white">
                            <td>{{$consulta}}</td>
                            <td class="text-center {{($estado=='Revisada')? 'text-success' : 'pink-text'}}">{{$estado}}</td>
                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td>Vacio</td>
                            <td class="text-center pink-text">?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{route('contacto.index')}}" class="btn btn-pink"><i class="fas fa-drumstick-bite"></i> Listar</a>
            </div>
        </article>
    </section>
@endsection
