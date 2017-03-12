<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="images/icono.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="refresh" content="120">

    <!-- Site Properties -->
    <title>Administrador - Mundocente</title>

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('http://code.jquery.com/jquery-latest.min.js')!!}
    {!!Html::script('js/jquery.tablesort.js')!!}
    {!!Html::style('semantic/out/semantic.css')!!}
    {!!Html::style('css/scrollbar.css')!!}
    {!!Html::style('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui-calendar/0.0.6/calendar.min.css')!!}
    {!!Html::style('css/style-inicio.css')!!}
    {!!Html::script('js/init.js')!!}
    {!!Html::script('semantic/out/semantic.js')!!}
    {!!Html::script('js/calendar.js')!!}
    

</head>
<body onload="nobackbutton();">

<div class="ui fixed inverted menu">
    <div class="ui container">
        <a  class="header" href="publicaciones" title="Volver a inicio">
            <img class="ui logo image"  style="height: 60px; padding: 5px 0" src="images/logo.png">
        </a>
        <a href="lugares-administrador" class="item" id="admin_lugres_menu">Lugares</a>
        <a href="instituciones-administrador" class="item" id="admin_institutions_menu">Instituciones</a>
        <a href="publicaciones-administrador" class="item" id="admin_publicacions_menu">Publicaciones</a>
        <a href="indices-administrador" class="item" id="admin_index_paper_menu">Índices</a>
        <a href="usuarios-administrador" class="item" id="admin_users_menu">Usuarios</a>
    </div>
</div>


@yield('content_admin')

<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
        <img src="images/logo.png" class="ui centered small image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Site Map</a>
            <a class="item" href="#">Contact Us</a>
            <a class="item" href="#">Terms and Conditions</a>
            <a class="item" href="#">Privacy Policy</a>
        </div>
    </div>
</div>
</body>

<script>
    $('.menu .item')
        .tab()
    ;

    /*Modal - Lugares*/
    $('.ui.button-places.button').on('click', function () {
        $('.ui.modal.places')
            .modal('show')
        ;
    });

    $('.ui.button-edit-places.button').on('click', function () {
        $('.ui.modal.edit-places')
            .modal('show')
        ;
    });

    /*Modal - Índices*/
    $('.ui.button-indice.button').on('click', function () {
        $('.ui.modal.indice')
            .modal('show')
        ;
    });

    $('.ui.button-edit-indice.button').on('click', function () {
        $('.ui.modal.edit-indice')
            .modal('show')
        ;
    });

    /*Modal - Instituciones*/
    $('.ui.button-institution.button').on('click', function () {
        $('.ui.modal.institution')
            .modal('show')
        ;
    });

    $('.ui.button-edit-institution.button').on('click', function () {
        $('.ui.modal.edit-institution')
            .modal('show')
        ;
    });

    /*Modal - Publicaciónes*/
    $('.ui.button-publication.button').on('click', function () {
        $('.ui.modal.publication')
            .modal('show')
        ;
    });

    $('.ui.button-edit-publication.button').on('click', function () {
        $('.ui.modal.edit-publication')
            .modal('show')
        ;
    });

    /*Modal - Usuarios*/
    $('.ui.button-user.button').on('click', function () {
        $('.ui.modal.user')
            .modal('show')
        ;
    });

    $('.ui.button-edit-user.button').on('click', function () {
        $('.ui.modal.edit-user')
            .modal('show')
        ;
    });

    $('.ui.dropdown')
        .dropdown()
    ;

    $('.table').tablesort().data('tablesort');;
</script>

{!!Html::script('js/alug.js')!!}
{!!Html::script('js/ains.js')!!}
{!!Html::script('js/selectDinamic.js')!!}

</html>
