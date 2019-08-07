@extends('master')

@section('content')
    <div class="m-4 card">
        <div class="card-header color-poulet">
            Consulta N <span>{{$consulta->id}}</span>
        </div>
        <section class="card-body">
            <article>
                <h4>Datos del Usuario</h4>
                <p>Nombre: <span>{{$consulta->nombre}}</span></p>
                <p>Apellido: <span>{{$consulta->apellido}}</span></p>
                <p>Mail: <span>{{$consulta->mail}}</span></p>
            </article>
            <article>
                <h4>Pedido</h4>
                <p>Categorias sugeridas: <span>{{$consulta->sugerencias}}</span></p>
                <p>Comentarios: <span>{{$consulta->comentario}}</span></p>
            </article>
        </section>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                @include('partes.boton_volver')
            </div>

        </div>
    </div>
@endsection
