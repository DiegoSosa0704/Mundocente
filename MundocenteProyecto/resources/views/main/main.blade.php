<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/icono.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Mundocente</title>
    <!--<link rel="stylesheet" href="css/style-inicio-fixed.css">-->
    {!!Html::style('semantic/out/semantic.css')!!}
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
        <div class="ui aligned center inverted tiny header"><a href="mi-peril"
                                                               style="color: #fff;">{!!Auth::user()->name!!} </a></div>
    </div>
    <a class=" item" href="publicaciones" id="optionMainHome" onclick="loadLine()">
        <i class="grid layout icon"></i> Inicio
    </a>

    <div class="item">
        <i class="write icon"></i>
        <div class="header">Publicar</div>
        <div class="menu">
            <a class="item" id="optionMainPaper" href="publicar-revista" onclick="loadLine()">Revista</a>
            <a class="item" id="optionMainAnnouncement" href="publicar-convocatoria"
               onclick="loadLine()">Convocatorias</a>
            <a class="item" id="optionMainEvent" href="publicar-evento" onclick="loadLine()">Eventos</a>
            <a class="item" id="optionMainRequest" href="publicar-solicitud" onclick="loadLine()">Solicitud</a>
        </div>
    </div>
    <a class=" item" onclick="loadLine()" href="notificaciones">
        @if($cuanqityNotifications>0)
            <i class="alarm icon"></i> Notificaciones
            <div class="floating ui red label">{{$cuanqityNotifications}}</div>
        @else
            <div><i class="alarm icon"></i> Notificaciones</div>
@endif

</a>

@if(Auth::user()->rol=='admin')
 <a class=" item" href="lugares-administrador" target="_black">
            <div><i class="privacy icon"></i> Administrador</div>
</a>
@endif
</div>


<!--Top menu fixed-->
<div class="ui secondary raised top fixed menu" style="height: 63px;">


    <div class="item item_logo">
        <img src="../images/logo.png" class="ui centered image" style="height: 46px">
    </div>

    <div class="item" style="width:60%;">

        {!!Form::open(['url'=>'publicaciones-resultados', 'method'=> 'POST', 'class'=>'ui action input', 'style'=>'width: 200%'])!!}
        {!!Form::text('text_search', null, ['type' => 'text', 'placeholder' => 'Ingrese título de publicación', 'autocomplete'=>'false', 'required'=>'true'])!!}
        <select class="ui selection dropdown" name="search_type_publication">
            <option value="6">Todo</option>
            <option value="1">Convocatorias docentes</option>
            <option value="2">Revistas científicas</option>
            <option value="3">Eventos académicos</option>
            <option value="4">Solicitudes de investigadores</option>
            <option value="5">Solicitudes de evaluadores</option>
        </select>

        <button type="submit" onclick="loadLine()"
                class="ui submit button button_submit" style="background-color: #AD5691;color: #fff;">
            Buscar
        </button>
        {!!Form::close()!!}

           <button class="ui blue basic button" onclick="showModalFilter()" style="margin-left: 10px;"> <p style="font-size: 13px;"> Filtros</p></button>

        

    </div>

    <div class="right menu" style="padding-right: 30px">
        <div class="item">
            <div class="ui floating right labeled icon dropdown teal button" style="background-color: #AD5691;">
                <span>{!!Auth::user()->name!!}</span>
                <i class="dropdown icon"></i>
                <div class="menu transition hidden">
                    <a class="item" onclick="loadLine()" href="mi-peril"><i class="user icon"></i>Mi perfil</a>
                    <a class="item" onclick="loadLine()" href="mis-publicaciones-favoritas"><i class="star icon"></i>Mis
                        Favoritos</a>
                    <a class="item" onclick="loadLine()" href="notificaciones"><i class="alarm icon"></i>Notificaciones
                        ({{$cuanqityNotifications}})</a>
                    <!-- Separador -->
                    <a class="item" onclick="loadLine()" href="editando-perfil"><i class="setting icon"></i>Configuración</a>
                    <a class="item" href="logout"><i class="close icon"></i>Salir</a>
                </div>
            </div>
        </div>
    </div>


</div>


<!--            Animación para cargado progress -->

<div class="ui indicating progress fixed" data-value="1" data-total="250" id="progressloadfixed" style="background-color: #DFDADD;
height: 3px;padding-top: 1px;width: 150%;top: -16px;">
    <div class="bar" style="background: #AD5691;height: 3px;left: -28px;"></div>
</div>


<!--   Aquí está todo el contenido de publication.blade.php-->
@yield('content')


<script>

function showModalFilter(){
    $('.ui.long.modal')
  .modal('show')
;    
}



    $('.dropdown')
        .dropdown({
            transition: 'scale',
            onChange: function (value, text, $selectedItem) {
                switch (value) {
                    case '1':
                        $('#filter_paper').toggle(false);
                        $('#filter_announcement').toggle(true);
                        $('#filter_event').toggle(false);
                        $('#filter_request_evaluator').toggle(false);
                        $('#filter_request_investigator').toggle(false);
                        break;
                    case '3':
                        $('#filter_paper').toggle(false);
                        $('#filter_announcement').toggle(false);
                        $('#filter_event').toggle(true);
                        $('#filter_request_evaluator').toggle(false);
                        $('#filter_request_investigator').toggle(false);
                        break;
                    case '4':
                        $('#filter_paper').toggle(false);
                        $('#filter_announcement').toggle(false);
                        $('#filter_event').toggle(false);
                        $('#filter_request_evaluator').toggle(false);
                        $('#filter_request_investigator').toggle(true);
                        break;
                    case '5':
                        $('#filter_paper').toggle(false);
                        $('#filter_announcement').toggle(false);
                        $('#filter_event').toggle(false);
                        $('#filter_request_evaluator').toggle(true);
                        $('#filter_request_investigator').toggle(false);
                        break;
                    case '2':
                        $('#filter_paper').toggle(true);
                        $('#filter_announcement').toggle(false);
                        $('#filter_event').toggle(false);
                        $('#filter_request_evaluator').toggle(false);
                        $('#filter_request_investigator').toggle(false);
                        break;
                    case '6':
                        $('#filter_paper').toggle(false);
                        $('#filter_announcement').toggle(false);
                        $('#filter_event').toggle(false);
                        $('#filter_request_evaluator').toggle(false);
                        $('#filter_request_investigator').toggle(false);
                        break;
                    default:
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
{!!Html::script('js/loadscroll.js')!!}
{!!Html::script('js/action-filter.js')!!}
{!!Html::script('js/editPublication.js')!!}

</body>
</html>