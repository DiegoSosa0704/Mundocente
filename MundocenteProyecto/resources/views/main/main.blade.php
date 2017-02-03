<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Publicar Convocatoria</title>
    <!--<link rel="stylesheet" href="css/style-inicio-fixed.css">-->
    {!!Html::style('semantic/out/semantic.min.css')!!}
    {!!Html::style('css/scrollbar.css')!!}
    {!!Html::style('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui-calendar/0.0.6/calendar.min.css')!!}
    {!!Html::style('css/style-inicio.css')!!}
    
    
 
{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('semantic/out/semantic.min.js')!!}
{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui-calendar/0.0.6/calendar.min.js')!!}

    

    
</head>
<body>

<!--Menu Sidebar -->
<div class="ui left sidebar inverted vertical menu">
    <div class="item">
        <img src="images/nombre.png" style="height: 38px">
    </div>
    <a class="item">
        <i class="grid layout icon"></i> Búsqueda
    </a>
    <div class="item">
        <i class="home icon"></i> Publicar
        <div class="menu">
            <a class=" item">Revista</a>
            <a class="item">Convocatorias</a>
            <a class="item">Eventos</a>
            <a class="item">Invitación</a>
        </div>
    </div>
</div>
<!--Menu visible-->
<div class="ui vertical inverted large fixed pointing sticky menu">
    <div class="item item_logo">
        <img src="images/logo.png">
    </div>
    <div class="item item_profile">
        <img class="ui tiny centered circular image" src="{{--{!!Auth::user()->photo_url!!}--}}images/user.png">
        <div class="ui aligned center inverted tiny header" >{!!Auth::user()->name!!}</div>
    </div>
    <div class="ui category search item">
        <div class="ui inverted transparent icon input">
            <input class="prompt" type="text" placeholder="Buscar publicaciones">
            <i class="search link icon"></i>
        </div>
    </div>
    <a class=" item" href="publications">
        <i class="grid layout icon"></i> Búsqueda avanzada
    </a>
    <div class="ui dropdown item">
        Perfil
        <i  class="ui dropdown icon"></i>
        <div class="menu">
            <a class="item" href="edit-perfil"><i class="user icon"></i>Cuenta</a>
            <a class="item"><i class="star icon"></i>Favoritos</a>
            <a class="item"><i class="bookmark icon"></i>Guardados</a>
            <a class="item" href="logout"><i class="close icon"></i>Salir</a>
        </div>
    </div>
    <div class="item">
        <i class="home icon"></i>
        <div class="header">Publicar</div>
        <div class="menu">
            <a class="item" href="publicar-revista">Revista</a>
            <a class="item" href="publicar-convocatoria">Convocatorias</a>
            <a class="item" href="publicar-evento">Eventos</a>
            <a class="item" href="publicar-solicitud">Solicitud</a>
        </div>
    </div>
     <a class=" item" href="publications">
        <i class="alarm icon"></i> Notificaciones   (2)
    </a>
</div>



<!--Menu top fixed visible-->


<div class="ui fixed inverted top menu">
    <a class="launch item">
        <i class="content icon"></i>
        Menu
    </a>
    <div class="item">
        <b>Servicio:</b> Búsqueda
    </div>
    <div class="right menu">
        <div class="ui dropdown item">
            <i class="dropdown icon"></i>
            Perfil
            <div class="menu">
                <a href="edit-perfil"><div class="item">Cuenta</div></a>
                <div class="item">Favoritos</div>
                <a class="item"><i class="bookmark icon"></i>Guardados</a>
            </div>
        </div>
        <a class="item" href="logout">Salir</a>
    </div>
</div>

<!--   Aquí está todo el contenido de publication.blade.php-->

@yield('content')

<script>
    $('.dropdown')
        .dropdown({
            transition: 'scale'
        })
    ;
</script>
</body>
</html>