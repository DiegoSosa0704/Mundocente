@extends('main.main')

@section('content')


    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <!--Top menu fixed-->
        <div class="segment-title">
            <div class="ui left aligned container">
                <h1 class="ui header">Nombre Evento</h1>
                <div class="overlay">
                    <div class="ui secondary menu">
                        <div class="item">
                            <a class="ui  large label">
                                <i class="star yellow icon"></i>
                                Favorito
                            </a>
                        </div>
                        <div class="item">
                            <a class="ui large label">
                                <i class="dont red icon"></i>
                                Denunciar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui container">
            <div class="ui piled very padded segment">
                <div class="ui equals width stackable form grid">
                    <div class="two column row">
                        <div class="column">
                            <div class="field">
                                <label>Imagen o logo del evento</label>
                                <div class="field">
                                    <img class="ui centered medium image" src="images/public-image.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label>Institución editora:</label>
                                <div class="ui large label color_2">Nombre institución</div>
                            </div>
                            <div class="field">
                                <label>País:</label>
                                <div class="ui large label color_2">Nombre del país</div>
                            </div>
                            <div class="field">
                                <label>Ciudad:</label>
                                <div class="ui large label color_1">Nombre de la Ciudad</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui form">
                    <div class="two fields">
                    </div>
                    <div class="field">
                        <h5 class="ui header"><b>Áreas de conocimiento</b></h5>
                        <div class="three fields">
                            <div class="field">
                                <div class="ui raised card">
                                    <div class="content">
                                        <div class="header">Gran Área</div>
                                        <div class="ui celled ordered list">
                                            <div class="item">Cats</div>
                                            <div class="item">Horses</div>
                                            <div class="item">Dogs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui raised card">
                                    <div class="content">
                                        <div class="header">Área</div>
                                        <div class="ui celled ordered list">
                                            <div class="item">Cats</div>
                                            <div class="item">Horses</div>
                                            <div class="item">Dogs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui raised card">
                                    <div class="content">
                                        <div class="header">Disciplina</div>
                                        <div class="ui celled ordered list">
                                            <div class="item">Cats</div>
                                            <div class="item">Horses</div>
                                            <div class="item">Dogs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label><b>¿La revista se encuentra indexada?</b></label>
                    <div class="inline field">
                        <label>
                            No
                        </label>
                        <div class="ui toggle checkbox" onclick="showAdvancedSearch()">
                            <input type="checkbox" name="indexed_paper" tabindex="0" class="hidden"
                                   id="checkpaperindex">
                        </div>
                        <label>
                            Si
                        </label>
                    </div>
                    <!--Datos de indexación-->
                    <div id="indexing-data" class="ui segment" style="display: none;">
                        <h4 class="ui dividing bold header">Datos de indexación</h4>
                            <div class="inline field">
                                <label>Nombre indice</label>
                                <select name="name" class="ui fluid dropdown"
                                        id="selectpaperindex">
                                    <option value="">Clasficación</option>
                                    <option value="1">Nivel</option>
                                </select>
                            </div>
                    </div>
                    <div class="field">
                        <h5 class="ui header"><b>Detalles</b></h5>
                        <div class="ui segment">
                            <span><b>Datos de contacto para ampliar información: </b></span>
                            <p>Nulla facilisi. Sed sed vehicula risus. Phasellus facilisis tellus leo, in aliquam risus
                                euismod et.</p>


                            <span><b>Ver convocatoria: </b></span>
                            <a class="ui teal tag label">Enlace a convocatoria</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.overlay')
            .visibility({
                type: 'fixed',
                offset: 70 // give some space from top of screen
            })
        ;
        $('.dropdown')
            .dropdown({
                // you can use any ui transition
                transition: 'fade'
            })
        ;
        function showAdvancedSearch() {
            $('#indexing-data').toggle("slow");
        }
        $('.ui.checkbox')
            .checkbox()
        ;
    </script>

@stop