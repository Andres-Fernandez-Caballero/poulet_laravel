<!DOCTYPE html>

<?php

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Las Mejores Recetas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina web dedicada a enseñar el arte de la gastronomia a todo el mundo">
    <meta name="author" content="Andres Pablo Fernandez Caballero">

    <link rel="shortcut icon" href="{{asset('img/icon_poulet.png')}}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">


    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="{{asset('css/poulet_style.css')}}">
</head>

<body class="container-fluid rgba-cyan-slight">
    <div class="row">
        <aside class="d-none d-sm-none d-md-block h-50 mx-auto col-3 p-0">
            <ul class="altura_aside m-4 card nav flex-column ">
                <li class="color-poulet">
                    <img src="{{asset('img/logo.png')}}" class="mx-auto d-block img-fluid rounded-circle m-4" alt="logo" height="135" width="135"></li>
                <li class="mt-4">
                    <h2 class="text-center recetas">Indice</h2>
                </li>
                <li class="nav-item"><a class="nav-link text-center pink-text " href="#">index</a></li>
                <li class="nav-item"><a class="nav-link text-center pink-text " href="#">index</a></li>
                <li class="nav-item"><a class="nav-link text-center pink-text " href="#">index</a></li>
                <li class="nav-item"><a class="nav-link text-center pink-text " href="#">index</a></li>
                <?//php navbarIndex($links_menu,'vertical');?>
            </ul>
        </aside>
        <main class="col-sm-12 col-md-9">
            <nav class="d-block d-sm-block d-md-none navbar navbar-expand-md navbar-dark pink lighten-4">
                <div class="container">
                    <a class="recetas navbar-brand poulet" href="#">Poulet Recetas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link text-right text-white" href="#">index</a></li>
                            <li class="nav-item"><a class="nav-link text-right text-white" href="#">index</a></li>
                            <li class="nav-item"><a class="nav-link text-right text-white" href="#">index</a></li>
                            <li class="nav-item"><a class="nav-link text-right text-white" href="#">index</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="card m-2">
                <?php
                /*
                if(!empty($_GET['page'])):
                    $page = $_GET['page'];
                    FileControl::selectorIndex($page);
                else:
                    FileControl::cargarModulo('secciones/home.php');
                endif;
                */
                ?>
            </section>
        </main>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>

</body>

</html>
