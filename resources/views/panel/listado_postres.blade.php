@extends('panelMaster')

@section('content')

    @include('partes.header',$header)

    <!-- lista de postres en una tabla sensilla -->
    <section class="m-4 p-4 card ">
        <article>
            <h3 class="font-weight-bold">Postres</h3>
            <table class="table table-bordered">
                <thead class="pink accent-1">
                <tr>
                    <th scope="col" class="white-text">Postre</th>
                    <th class="text-center white-text" scope="col">Imagen</th>
                    <th class="text-center white-text" scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listaPostres as $postre)
                    <tr>
                        <th scope="row" class="poulet-nombre-receta font-weight-bold align-middle">
                            {{$postre->titulo}}
                        </th>
                        <td><img class="mx-auto rounded-circle d-block"
                                 src="{{asset("$postre->imagen")}}" alt="descript" height="90"
                                 width="90"></td>
                        <td class="align-middle">
                            <form class="d-flex justify-content-center" action="" method='post'>
                                <input type="hidden" name="postre" value="">
                                <button type="submit" class="mx-auto btn btn-sm btn-pink">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </article>
    </section>

@endsection
