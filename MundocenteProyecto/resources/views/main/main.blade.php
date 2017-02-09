<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Mundocente</title>
    <!--<link rel="stylesheet" href="css/style-inicio-fixed.css">-->
    {!!Html::style('semantic/out/semantic.min.css')!!}
    {!!Html::style('css/scrollbar.css')!!}
    {!!Html::style('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui-calendar/0.0.6/calendar.min.css')!!}
    {!!Html::style('css/style-inicio.css')!!}


    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('semantic/out/semantic.js')!!}
    {!!Html::script('js/calendar.js')!!}


</head>
<body>

<!--Menu Sidebar -->
<div class="ui left sidebar inverted vertical menu">
    <div class="item">
        <img src="images/nombre.png" style="height: 38px">
    </div>
    <a class="item">
        <i class="search icon"></i> Búsqueda
    </a>
    <div class="item">
        <i class="write icon"></i> Publicar
        <div class="menu">
            <a class=" item">Revista </a>
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
        <img class="ui tiny centered circular image" src="{!!Auth::user()->photo_url!!}">
        <div class="ui aligned center inverted tiny header">{!!Auth::user()->name!!} {!!Auth::user()->last_name!!}</div>
    </div>
    <a class=" item" href="publications" id="optionMainHome">
        <i class="grid layout icon"></i> Inicio
    </a>
  
    
    <div class="item">
        <i class="write icon"></i>
        <div class="header">Publicar</div>
        <div class="menu">
            <a class="item" id="optionMainPaper" href="publicar-revista">Revista</a>
            <a class="item" id="optionMainAnnouncement" href="publicar-convocatoria">Convocatorias</a>
            <a class="item" id="optionMainEvent" href="publicar-evento">Eventos</a>
            <a class="item" id="optionMainRequest" href="publicar-solicitud">Solicitud</a>
        </div>
    </div>
    <a class=" item" href="publications">
        <i class="alarm icon"></i> Notificaciones (2)
    </a>
</div>

<!--Top menu fixed-->
<div class="ui secondary raised top fixed menu" style="height: 65px;">
    <div class="item item_logo">
        <img src="../images/logo.png" class="ui centered image" style="height: 46px">
    </div>
    <div class="item" style="width:60%;">
        <div class="ui action input" style="width: 200%;">
            <input type="text" placeholder="Palabras clave...">
            <select class="ui selection dropdown">
                <option value="all">Todo</option>
                <option value="announcement">Convocatorias docentes</option>
                <option value="paper">Revistas científicas</option>
                <option value="event">Eventos académicos</option>
                <option value="request_investigator">Solicitudes de investigadores</option>
                <option value="request_evaluator">Solicitudes de evaluadores</option>
            </select>
            <a type="submit" class="ui teal button" style="background-color: #AD5691" href="result">Buscar</a>
        </div>
    </div>
    <div class="right menu" style="padding-right: 30px">
        <div class="item">
            <div class="ui floating right labeled icon dropdown teal button"  style="background-color: #AD5691">
                <span>{!!Auth::user()->name!!}</span>
                <i class="dropdown icon"></i>
                <div class="menu transition hidden">
                    <a class="item" href="edit-perfil"><i class="user icon"></i>Cuenta</a>
                    <a class="item"><i class="star icon"></i>Favoritos</a>
                    <a class="item"><i class="bookmark icon"></i>Guardados</a>
                    <a class="item"><i class="setting icon"></i>Configuración</a>
                    <a class="item" href="logout"><i class="close icon"></i>Salir</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="ui fixed inverted top menu">
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
                <a href="edit-perfil">
                    <div class="item">Cuenta</div>
                </a>
                <div class="item">Favoritos</div>
                <a class="item"><i class="bookmark icon"></i>Guardados</a>
                <a class="item"><i class="setting icon"></i>Configuración</a>
            </div>
        </div>
        <a class="item" href="logout">Salir</a>
    </div>
</div>--}}

<!--   Aquí está todo el contenido de publication.blade.php-->

@yield('content')

<script>
    $('.dropdown')
        .dropdown({
            transition: 'scale',
            onChange: function (value, text, $selectedItem) {
                switch (value) {
                    case 'all':
                        $('#all').toggle(true);
                        $('#paper').toggle(false);
                        $('#announcement').toggle(false);
                        $('#event').toggle(false);
                        $('#request').toggle(false);
                        break;
                    case 'paper':
                        $('#all').toggle(false);
                        $('#paper').toggle(true);
                        $('#announcement').toggle(false);
                        $('#event').toggle(false);
                        $('#request_evaluator').toggle(false);
                        $('#request_investigator').toggle(false);
                        break;
                    case 'announcement':
                        $('#all').toggle(false);
                        $('#paper').toggle(false);
                        $('#announcement').toggle(true);
                        $('#event').toggle(false);
                        $('#request_evaluator').toggle(false);
                        $('#request_investigator').toggle(false);
                        break;
                    case 'event':
                        $('#all').toggle(false);
                        $('#paper').toggle(false);
                        $('#announcement').toggle(false);
                        $('#event').toggle(true);
                        $('#request_evaluator').toggle(false);
                        $('#request_investigator').toggle(false);
                        break;
                    case 'request_investigator':
                        $('#all').toggle(false);
                        $('#paper').toggle(false);
                        $('#announcement').toggle(false);
                        $('#event').toggle(false);
                        $('#request_evaluator').toggle(false);
                        $('#request_investigator').toggle(true);
                        break;
                    case 'request_evaluator':
                        $('#all').toggle(false);
                        $('#paper').toggle(false);
                        $('#announcement').toggle(false);
                        $('#event').toggle(false);
                        $('#request_evaluator').toggle(true);
                        $('#request_investigator').toggle(false);
                        break;
                    default:
                        $('#paper').toggle(true);
                        $('#announcement').toggle(false);
                        $('#event').toggle(false);
                        $('#request_evaluator').toggle(false);
                        $('#request_investigator').toggle(false);
                }
            }
        })
    ;
</script>
{!!Html::script('js/selectDinamic.js')!!}
{!!Html::script('js/create.publications.js')!!}
</body>
</html>