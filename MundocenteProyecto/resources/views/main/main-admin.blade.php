<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

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
<body>

<div class="ui fixed inverted menu">
    <div class="ui container">
        <a href="#" class="header">
            <img class="ui logo image"  style="height: 60px; padding: 5px 0" src="images/logo.png">
        </a>
        <a href="lugares-administrador" class="item">Lugares</a>
        <a href="indices-administrador" class="item">Indíces</a>
        <a href="instituciones-administrador" class="item">Instituciones</a>
        <a href="publicaciones-administrador" class="item">Publicaciones</a>
        <a href="usuarios-administrador" class="item">Usuarios</a>
    </div>
</div>


@yield('content')

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
</html>
