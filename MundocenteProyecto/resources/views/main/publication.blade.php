@extends('main.main')

@section('content')

    <!--Contenido-->
    <div class="pusher pusher-start">
        <div class="ui container start-container">
            <div class="ui stackable grid" id="list-publication-main-index">
               <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
            @include('formularios.filtros')

            
                 @include('details.lista-publicaciones')
            
            
            </div>

            
<div style="padding-left:32%;">{!!$listPublications->render()!!}</div>


        </div>

    </div>


    @include('details.detalles')


    <script type="text/javascript">
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
        $('#optionMainHome').addClass('active');
    </script>
@stop