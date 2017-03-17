@extends('main.main')

@section('content')
    <!--Contenido-->
    <div class="pusher pusher-start" style="background-color: #EEEEEE;">
        <div class="ui container start-container">
            <div class="ui stackable grid">
                @include('details.lista-publicaciones')
            </div>
        </div>
        {!! $listPublications->render() !!}
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