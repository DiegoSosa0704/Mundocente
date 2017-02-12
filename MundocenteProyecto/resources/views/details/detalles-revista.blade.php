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
                            <a class="ui image large label">
                                <i class="check green icon"></i>
                                Me interesa
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
                    <div class="field">
                        <h5 class="ui header"><b>Detalles</b></h5>
                        <div class="ui segment">

                            <span><b>Descripción: </b></span>
                            <p>In at dolor euismod lacus venenatis aliquet id id sapien. Suspendisse consequat turpis
                                lorem,
                                in tristique nibh vestibulum et. Sed porta massa vel purus porta suscipit. Duis pretium
                                et
                                arcu vel consequat. Fusce nec felis sed sem ultricies feugiat. Donec sed odio eget erat
                                fermentum porttitor ut id dui.e</p>


                            <span><b>Datos de contacto para ampliar información: </b></span>
                            <p>Nulla facilisi. Sed sed vehicula risus. Phasellus facilisis tellus leo, in aliquam risus
                                euismod et.</p>


                            <div class="field">
                                <label>Fecha:</label>
                                <div class="ui celled horizontal list">
                                    <div class="item">
                                        <span>
                                            <b>Desde:</b>
                                            Fecha
                                            <b>Hora:</b>
                                            Hora
                                        </span>
                                    </div>
                                    <div class="item">
                                        <span>
                                            <b>Hasta:</b>
                                            Fecha
                                            <b>Hora:</b>
                                            Hora
                                        </span>
                                    </div>
                                </div>
                            </div>


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
    </script>

@stop