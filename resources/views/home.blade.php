@extends('master')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@section('content')
    @include('partes.header')
    @include('partes.listar_errors')
    @include('partes.listar_mis_errores')
    @include('partes.listar_exito')

    <section class="m-4 card">
        <h2 class="color-poulet cursiva-poulet card-header">Detalles</h2>
        <div class="card-body row">
            <div class="pt-5 col-6">
                <p class="ml-4 poulet-font-125">Nombre: <span class="cursiva-poulet">{{$auth_user->name}}</span></p>
                <p class="ml-4 poulet-font-125">Mail: <span class="cursiva-poulet">{{$auth_user->email}}</span></p>
                <p class="ml-4 poulet-font-125">Permisos: <span class="cursiva-poulet">{{$auth_user->rol}}</span></p>
            </div>
            <div class="col-6">
                <img class="d-block mx-auto img-thumbnail" src="{{$auth_user->getUserImgAttribute()}}"  alt="avatar del usuario">
            </div>
            <div class="col-12">
                <!-- Basic dropdown -->
                <button class="btn btn-pink dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Opciones
                </button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#modalCambiarNombre" data-toggle="modal">Cambiar nombre</a>
                    <a class="dropdown-item" href="#modalCambiarPass" data-toggle="modal">Cambiar Contraseña</a>
                    <a class="dropdown-item"  data-toggle="modal" href="#modalCart">Cambiar Imagen de Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a href="#modalConfirmDelete" class="dropdown-item text-danger cursiva-poulet"
                        data-toggle="modal"
                        data-form="{{route('users.destroy',$auth_user->id)}}"
                        data-msj="Esta seguro que desea eliminar esta cuenta">
                        Eliminar Cuenta
                    </a>
                </div>
                <!-- Basic dropdown -->
            </div>
        </div>
    </section>


    <!--Modal Cambiar Contraseña-->
    <div class="modal fade right" id="modalCambiarPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header pink accent-1">
                    <h3 class="modal-title white-text text-center" id="myModalLabel">Cambiar Contraseña</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('user.update.pass',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group p-2">
                            <label class="cursiva-poulet" for="pass_anterior">Contraseña Anterior</label>
                            <input class="form-control" type="password" id="pass_anterior" name="pass_anterior" >
                        </div>
                        <div class="form-group p-2">
                            <label class="cursiva-poulet" for="pass_nuevo">Contraseña Nueva</label>
                            <input class="form-control" type="password" id="pass_nuevo" name="pass_nuevo" >
                        </div>
                        <div class="form-group p-2">
                            <label class="cursiva-poulet" for="pass_confirm">Repita su nueva Contraseña</label>
                            <input class="col form-control" type="password" id="pass_confirm" name="pass_confirm" >
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

    <!--Modal Cambiar imagen de perfil-->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header pink accent-1">
                    <h3 class=" white-text modal-title poulet-font-125 text-center" id="myModalLabel">Cambiar Imagen de Perfil</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('user.update.img',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img_nueva" id="img_nueva" accept="image/jpeg,image/png,image/gif">
                            <label class="custom-file-label text-truncate" for="img_nueva" data-browse="Archivo">Elija una Imagen</label>
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

    <!--Eliminar cuenta Modal-->
    @include('partes.modal_destroy')
    <!-- modal cambiar nombre -->
    <div class="modal fade right" id="modalCambiarNombre" tabindex="-1" role="dialog" aria-labelledby="myModalLabelNombre" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header pink accent-1">
                    <h3 class="modal-title white-text text-center" id="myModalLabelNombre">Cambiar Nombre</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('user.update.name',$auth_user->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group p-2">
                            <label class="cursiva-poulet" for="nombre_nuevo">Elija un nuevo nombre de usuario</label>
                            <input class="form-control" type="text" id="nombre_nuevo" name="nombre_nuevo" placeholder="{{$auth_user->name}}" value="" >
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
