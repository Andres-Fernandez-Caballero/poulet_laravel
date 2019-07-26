<!DOCTYPE html>
<?php
$links = [
    "Home" => route("web.index"),
    "Recetas" => route("web.recetas"),
    "Postres" => route("web.postres"),
    "Contacto" => route("web.contacto")
    /*,"Panel" => route('panel.index')*/
];
?>

<html lang="es" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Las Mejores Recetas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/poulet_style.css')}}">
</head>

<body class="container-fluid rgba-cyan-slight">
<div id="app" class="row">
    <aside class="d-none d-sm-none d-md-block h-50 mx-auto col-3 p-0">
        @include('partes.sidebar',$links)
    </aside>
    <div class="col-sm-12 col-md-9">
        @include('partes.navbar',$links)
        <main class="card m-2">
            @yield('content')
        </main>
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    })
</script>
</body>

</html>
