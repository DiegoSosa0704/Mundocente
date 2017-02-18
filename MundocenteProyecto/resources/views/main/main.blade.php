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


<?php
$cuanqityNotifications = DB::table('notifications')->where('id_user_notification', Auth::user()->id)->count();
  ?>

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

    <div class="item item_profile">
        <img class="ui tiny centered circular image" src="{!!Auth::user()->photo_url!!}" id="photo-perfil-main">
        <div class="ui aligned center inverted tiny header"><a href="mi-peril" style="color: #fff;">{!!Auth::user()->name!!} {!!Auth::user()->last_name!!}</a></div>
    </div>
    <a class=" item" href="publicaciones" id="optionMainHome" onclick="loadLine()">
        <i class="grid layout icon"></i> Inicio
    </a>

    <div class="item">
        <i class="write icon"></i>
        <div class="header">Publicar</div>
        <div class="menu">
            <a class="item" id="optionMainPaper" href="publicar-revista" onclick="loadLine()">Revista</a>
            <a class="item" id="optionMainAnnouncement" href="publicar-convocatoria" onclick="loadLine()">Convocatorias</a>
            <a class="item" id="optionMainEvent" href="publicar-evento" onclick="loadLine()">Eventos</a>
            <a class="item" id="optionMainRequest" href="publicar-solicitud" onclick="loadLine()">Solicitud</a>
        </div>
    </div>
    <a class=" item" onclick="loadLine()" href="notificaciones">
        <i class="alarm icon"></i> Notificaciones ({{$cuanqityNotifications}})
    </a>
</div>




<!--Top menu fixed-->
<div class="ui secondary raised top fixed menu" style="height: 63px;">


    <div class="item item_logo">
        <img src="../images/logo.png" class="ui centered image" style="height: 46px">
    </div>

    <div class="item" style="width:60%;">
        
        {!!Form::open(['url'=>'publicaciones-resultados', 'method'=> 'POST', 'class'=>'ui action input', 'style'=>'width: 200%'])!!}
        {!!Form::text('text_search', null, ['type' => 'text', 'placeholder' => 'Ingrese título de publicación', 'autocomplete'=>'false'])!!}
            <select class="ui selection dropdown" name="search_type_publication">
                <option value="6">Todo</option>
                <option value="1">Convocatorias docentes</option>
                <option value="2">Revistas científicas</option>
                <option value="3">Eventos académicos</option>
                <option value="4">Solicitudes de investigadores</option>
                <option value="5">Solicitudes de evaluadores</option>
            </select>
            
            <button type="submit"  onclick="loadLine()"
                 class="ui submit button button_submit" style="background-color: #AD5691;color: #fff;">
                Buscar
            </button>
        {!!Form::close()!!}

    </div>
    
    <div class="right menu" style="padding-right: 30px">
        <div class="item">
            <div class="ui floating right labeled icon dropdown teal button"  style="background-color: #AD5691;">
                <span>{!!Auth::user()->name!!}</span>
                <i class="dropdown icon"></i>
                <div class="menu transition hidden">
                    <a class="item" onclick="loadLine()" href="mi-peril" ><i class="user icon"></i>Mi perfil</a>
                    <a class="item" onclick="loadLine()" href="mis-publicaciones-favoritas" ><i class="star icon"></i>Mis Favoritos</a>
                    <a class="item" onclick="loadLine()" href="notificaciones" ><i class="alarm icon"></i>Notificaciones (2)</a>
                    <!-- Separador -->
                    <a class="item" onclick="loadLine()" href="editando-perfil" ><i class="setting icon"></i>Configuración</a>
                    <a class="item" href="logout"><i class="close icon"></i>Salir</a>
                </div>
            </div>
        </div>
    </div>


</div>


<!--            Animación para cargado progress -->

<div class="ui indicating progress fixed" data-value="1" data-total="200" id="progressloadfixed" style="background-color: #DFDADD;
height: 3px;padding-top: 1px;width: 150%;top: -16px;">
              <div class="bar" style="background: #AD5691;height: 3px;left: -28px;"></div>
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
                <a href="editando-perfil">
                    <div class="item">Cuenta</div>
                </a>
                <div class="item">Mis Favoritos</div>
                
                <a class="item"><i class="setting icon"></i>Configuración</a>
            </div>
        </div>
        <a class="item" href="logout">Salir</a>
    </div>
</div>--}}



<!--   Aquí está todo el contenido de publication.blade.php-->
@yield('content')




{{--  <div class="ui inverted vertical footer segment" style="background: #242533;">
    <div class="ui center aligned container">
        <div class="ui stackable inverted divided grid">
            <div class="column">
                <h4 class="ui inverted header">Iniciativa apoyada por: </h4>
                <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <img src="images/iconop.png" class="ui centered image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Site Map</a>
            <a class="item" href="#">Contact Us</a>
            <a class="item" href="#">Terms and Conditions</a>
            <a class="item" href="#">Privacy Policy</a>
        </div>
    </div>
</div>--}}

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
{!!Html::script('js/animationsload.js')!!}
{!!Html::script('js/selectDinamic.js')!!}
{!!Html::script('js/create.publications.js')!!}
{!!Html::script('js/show_details.js')!!}
{!!Html::script('js/action-publication.js')!!}

</body>
</html>