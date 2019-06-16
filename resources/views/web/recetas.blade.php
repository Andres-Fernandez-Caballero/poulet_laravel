@extends('master')

@section('content')
    <div class="py-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @php $active = 'active'; $selector = 'true' @endphp
            @foreach($lista as $categoria => $recetas )
                <li class="nav-item">
                    <a class="nav-link pink-text {{$active}}" id="{{$categoria}}-tab"
                       data-toggle="tab"
                       href="#{{$categoria}}"
                       role="tab"
                       aria-controls="{{$categoria}}"
                       aria-selected="{{$selector}}">
                        {{$categoria}}
                    </a>
                </li>
                @php $active = ''; $selector = 'false'; @endphp
            @endforeach
        </ul>
    </div>

    <section class="tab-content" id="contenedor-contendido">
        @php $active = 'active'; $show = 'show'; @endphp
        @foreach($lista as $categoria => $recetas)
            <article class="tab-pane fade {{$show}} {{$active}}" id="{{$categoria}}" role="tabpanel"
                     aria-labelledby="{{$categoria}}-tab">
                @include('partes.header',$campos = ['fondo'=>"poulet-header-$categoria",'titulo'=>$categoria])
                <ul>
                @foreach($recetas as $receta)
                <li>{{$receta->titulo}}</li>
                 @endforeach()
                    </ul>
            </article>
            @php $active = ''; $show = ''; @endphp
        @endforeach
    </section>

    <!--

<div class="tab-content" id="contenedor-contenido">
    <div class="tab-content" id="categoria-tab">
        <section class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
            <header class="poulet-header-$categoria mx-4 jumbotron">
                <h1 class="h1-responsive text-center font-weight-bold ">
                    Nombre categoria
                </h1>
            </header>

            <div class="m-4 row d-flex justify-content-center">
                <article class="col-md-6 col-sm-12">
                    <div class="mx-auto my-3 card-poulet card">
                        <div class="view overlay">
                            <img class="card-img-top" src="{{asset('img/quemada.jpg')}}" alt="descript">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">titulo</h4>
                            <p class="card-text"><i class="fa fa-clock-o" aria-hidden="true"></i> 60 min</p>
                            <p class="card-text"><i class="fa fa-heart" aria-hidden="true"></i> Dificil</p>
                            <a href="#" class="pink-text d-flex flex-row-reverse p-2">
                                <h5 class="waves-effect waves-light">cocinar<i
                                        class="fa fa-angle-double-right ml-2"></i></h5>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>
</div>


    <article>
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                   aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                   aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content pt-2 pl-1" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                Consequat
                occaecat ullamco amet non eiusmod nostrud dolore irure incididunt est duis anim sunt officia. Fugiat
                velit proident aliquip nisi incididunt nostrud exercitation proident est nisi. Irure magna elit commodo
                anim ex veniam culpa eiusmod id nostrud sit cupidatat in veniam ad. Eiusmod consequat eu adipisicing
                minim anim aliquip cupidatat culpa excepteur quis. Occaecat sit eu exercitation irure Lorem incididunt
                nostrud.
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Ad
                pariatur nostrud pariatur exercitation ipsum ipsum culpa mollit commodo mollit ex. Aute sunt incididunt
                amet commodo est sint nisi deserunt pariatur do. Aliquip ex eiusmod voluptate exercitation cillum id
                incididunt elit sunt. Qui minim sit magna Lorem id et dolore velit Lorem amet exercitation duis
                deserunt. Anim id labore elit adipisicing ut in id occaecat pariatur ut ullamco ea tempor duis.
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Est
                quis nulla laborum officia ad nisi ex nostrud culpa Lorem excepteur aliquip dolor aliqua irure ex.
                Nulla ut duis ipsum nisi elit fugiat commodo sunt reprehenderit laborum veniam eu veniam. Eiusmod minim
                exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit
                aliquip nostrud. Amet ex cupidatat excepteur aute veniam incididunt mollit cupidatat esse irure officia
                elit do ipsum ullamco Lorem. Ullamco ut ad minim do mollit labore ipsum laboris ipsum commodo sunt
                tempor enim incididunt. Commodo quis sunt dolore aliquip aute tempor irure magna enim minim
                reprehenderit. Ullamco consectetur culpa veniam sint cillum aliqua incididunt velit ullamco sunt
                ullamco quis quis commodo voluptate. Mollit nulla nostrud adipisicing aliqua cupidatat aliqua pariatur
                mollit voluptate voluptate consequat non.
            </div>
        </div>
    </article>

    -->
@endsection
