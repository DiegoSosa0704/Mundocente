@extends('main.main')

@section('content')
    <br>
    <!--Contenido-->
    <div class="pusher pusher-start" style="background-color: #EEEEEE;">
        <div class="ui container start-container">
            <div class="ui stackable grid">
                <div class="ui five wide column">
                    <div class="ui card">
                        <div class="content">
                            <img class="ui aligned centered small circular image" src="{!!Auth::user()->photo_url!!}">
                            <br>
                            <br>
                            <br>
                            <div class="header">{{Auth::user()->name}}</div>
                            <div class="meta">
                                <span>{{Auth::user()->email}}</span>
                            </div>
                            <br>
                            <br>
                            <span>Nombre de usuario</span>
                            <div class="meta">
                                <span>{{Auth::user()->last_name}}</span>
                            </div>
                            <br>
                            <span>Link de mi Currículo</span>
                            <a href="{{Auth::user()->curriculo_url}}">{{Auth::user()->curriculo_url}}</a>
                            <br>
                            <br>
                            <span>Nivel de formación</span>
                            <div class="meta">
                                @if(Auth::user()->nivel_formacion=='universitario')
                                    <span>Universitario</span>
                                @elseif(Auth::user()->nivel_formacion=='especializacion')
                                    <span>Especialización</span>
                                @elseif(Auth::user()->nivel_formacion=='maestria')
                                    <span>Maestría</span>
                                @elseif(Auth::user()->nivel_formacion=='doctorado')
                                    <span>Doctorado</span>
                                @elseif(Auth::user()->nivel_formacion=='post_doctorado')
                                    <span>Postdoctorado</span>
                                @endif
                            </div>
                            <br>
                            <label><b>Estoy viculado con:</b></label>
                            <div class="ui divided list " id="listadeinstitutosvinculados">
                                @foreach($institucionesVinvulado as $institu)
                                    <div class="item" id="institutionList{{$institu->id_institution}}">
                                        <div class="right floated content">
                                        </div>
                                        <div class="content">
                                            {{$institu->name_institution}} -
                                            ({{$institu->state_institution}})
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>

                            <?php
                            $area_formcion_usuario = DB::table('areas_formacions')
                                ->join('temas', 'areas_formacions.id_theme_fk', '=', 'temas.id_tema')
                                ->where('id_user_fk', Auth::user()->id)
                                ->get();
                            ?>
                            <label><b>Área de formación:</b></label>
                            <div class="ui divided list ">
                                @foreach($area_formcion_usuario as $area_f)
                                    <div class="item">
                                        <div class="right floated content">
                                        </div>
                                        <div class="content">
                                            {{$area_f->name_theme}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <br>
                            <a href="editando-perfil">Editar perfil</a>
                        </div>
                    </div>
                </div>
                @include('details.lista-publicaciones')
            </div>
            {!! $listPublications->render() !!}
        </div>
        <br>
        <br>
        <br>
        <br>
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
