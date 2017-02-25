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

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }

        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }

        .main.container {
            margin-top: 7em;
        }

        .ui.footer.segment {
            margin: 5em 0 0;
            padding: 5em 0;
        }
    </style>

</head>
<body>

<div class="ui fixed inverted menu">
    <div class="ui container">
        <a href="#" class="header item">
            <img class="ui logo small image" src="images/logo.png">
            Name Admin
        </a>
    </div>
</div>

<div class="ui main container">
    <h1 class="ui header">Administración</h1>
    <div class="ui top attached tabular menu">
        <a class="item" data-tab="places">Lugares</a>
        <a class="item" data-tab="indices">Indíces</a>
        <a class="item" data-tab="institutions">Instituciones</a>
        <a class="item active" data-tab="publications">Publicaciones</a>
        <a class="item" data-tab="users">Usuarios</a>
    </div>
    {{--Places--}}
    <div class="ui bottom attached tab segment" data-tab="places">
        @include('admin.lugares-administracion')
    </div>
    {{--Indices--}}
    <div class="ui bottom attached tab segment" data-tab="indices">
        @include('admin.indices-administracion')
    </div>
    {{--Institutions--}}
    <div class="ui bottom attached tab segment" data-tab="institutions">
        @include('admin.instituciones-administracion')
    </div>
    {{--publications--}}
    <div class="ui bottom attached tab segment active" data-tab="publications">
        @include('admin.publicaciones-administracion')
    </div>
    {{--Users--}}
    <div class="ui bottom attached tab segment" data-tab="users">
        @include('admin.usuarios-administracion')
    </div>
</div>

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

{{--Lugares--}}
@include('modals.modalAddPlaces')
@include('modals.modalEditPlaces')

{{--Índices--}}
@include('modals.modalAddIndice')
@include('modals.modalEditIndice')

{{--Instituciones--}}
@include('modals.modalAddInstitution')
@include('modals.modalEditInstitution')

{{--Publicaciones--}}
@include('modals.modalAddPublication')
@include('modals.modalEditPublication')

{{--User--}}
@include('modals.modalAddUser')
@include('modals.modalEditUser')

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
