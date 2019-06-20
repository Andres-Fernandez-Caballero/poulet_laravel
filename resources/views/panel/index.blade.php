@extends('panelMaster')

@section('content')

    @include('partes.header',$header)

    <!-- lista de recetas separadas en pequeñas tablas -->
    <section class="p-4 row">

        @foreach($listaRecetas as $categoria => $recetas)

            <article class="col-lg-6 col-sm-12">
            <h3 class="font-weight-bold">{{$categoria}}</h3>
            <table class="table table-bordered">
                <thead class="pink accent-1">
                <tr>
                    <th scope="col" class="white-text">Receta</th>
                    <th class="text-center white-text" scope="col">Imagen</th>
                    <th class="text-center white-text" scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                <tr>
                    <th scope="row" class="align-middle font-weight-bold">
                       {{$receta->titulo}}
                    </th>
                    <td><img class="mx-auto rounded-circle d-block"
                             src="{{asset("$receta->imagen")}}" alt="descript"
                             height="90" width="90"></td>
                    <td class="align-middle">
                        <form class="d-flex justify-content-center" action="{{route("recetas.eliminar",$receta->id_recetas)}}" method='post'>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="mx-auto btn btn-sm btn-pink">Eliminar</button>
                        </form>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </article>
        @endforeach

    </section>



@endsection
