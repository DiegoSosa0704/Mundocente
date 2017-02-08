@extends('main.main')

@section('content')

    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container start-container">
            <div class="ui stackable grid">
                <div class="ui five wide form column">
                    <div id="all" class="ui raised padded fixed sticky sticky-filter-all segment"
                         style="min-width: 23% !important; max-width: 23% !important; min-height: 10% !important;overflow: scroll; margin-top: 0;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtrado</div>
                        <div class="ui info message">
                            <div class="header">
                                Al seleccionar "Todo" en el menú de búsqueda, podrá buscar todos los tipos de
                                publicación introduciendo palabras clave y oprimiendo el botón Buscar.
                            </div>
                        </div>
                    </div>
                    <div id="announcement" class="ui raised padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de convocatoria</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la convocatoria
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="paper" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de revistas</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="grouped fields">
                                <label>Indexada</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="indexed">
                                        <label>Si</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="indexed">
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="event" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de eventos</div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar del evento
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="request_investigator" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de solicitud a
                            investigadores
                        </div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="request_evaluator" class="ui padded fixed sticky sticky-filter segment"
                         style="display: none;">
                        <div class="ui top left attached label">Filtros de solicitud a
                            evaluadores
                        </div>
                        <div class="ui small form">
                            <h5 class="ui horizontal divider header">
                                Áreas de conocimiento
                            </h5>
                            <div class="field">
                                <div class="field">
                                    <label>Gran área</label>
                                    <select name="large_area" class="ui multiple dropdown">
                                        <option value="">Gran área</option>
                                        <option value="name-1">Gran área-1</option>
                                        <option value="name-2">Gran área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Área</label>
                                    <select name="area" class="ui multiple dropdown">
                                        <option value="">Área</option>
                                        <option value="lvl-1">Área-1</option>
                                        <option value="lvl-2">Área-2</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Disciplina</label>
                                    <select name="discipline" class="ui multiple dropdown">
                                        <option value="">Disciplina</option>
                                        <option value="discipline-1">Disciplina-1</option>
                                        <option value="discipline-2">Disciplina-2</option>
                                        <option value="discipline-3">Disciplina-2</option>
                                        <option value="discipline-4">Disciplina-2</option>
                                        <option value="discipline-5">Disciplina-2</option>
                                        <option value="discipline-6">Disciplina-2</option>
                                        <option value="discipline-7">Disciplina-2</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="ui horizontal divider header">
                                Lugar de la institución
                            </h5>
                            <div class="field">
                                <label>País</label>
                                <select name="country" class="ui dropdown">
                                    <option value="">País</option>
                                    <option value="country-1">País-1</option>
                                    <option value="country-2">País-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Ciudad</label>
                                <select name="city" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="city-1">Ciudad-1</option>
                                    <option value="city-2">Ciudad-2</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Institución</label>
                                <select name="institution" class="ui dropdown">
                                    <option value="">Ciudad</option>
                                    <option value="institution-1">Ciudad-1</option>
                                    <option value="institution-2">Ciudad-2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui eleven wide column">
                    <h2 class="ui header">Últimas publicaciones</h2>
                    <div id="result-announcement" class="ui raised card menu segment" style="width: 100%;">
                        {{--Titulo--}}
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                Convocatoria
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a><h3 class="header">Título de convocatoria</h3></a>
                        </div>
                        {{--Institución--}}
                        <div class="content">
                            <div class="description">
                                <div class="ui large label">
                                    <i class="student icon"></i>
                                    <a class="detail">Institución</a>
                                </div>
                            </div>
                        </div>
                        {{--Footer--}}
                        <div class="extra content">
                            <div class="ui stackable grid">
                                <div class="eleven wide column">
                                    <span><b>Desde: </b> dd/mm/aaaa</span>
                                    <br>
                                    <span><b>Hasta: </b> dd/mm/aaaa</span>
                                </div>
                                <div class="five wide column">
                                    <button class="ui teal right floated labeled icon button">
                                        Ver detalle
                                        <i class="linkify icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="result-paper" class="ui raised card menu segment" style="width: 100%;">
                        {{--Titulo--}}
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                Revista
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a><h3 class="header">Título de revista</h3></a>
                        </div>
                        <div class="ui items content">
                            <div class="item">
                                <div class="ui medium image">
                                    <img src="images/revista1.jpg">
                                </div>
                                <div class="middle aligned content">
                                    {{--Institución--}}
                                    <div class="description">
                                        <div class="ui large label">
                                            <i class="student icon"></i>
                                            <a class="detail">Institución editoria</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Footer--}}
                        <div class="extra content">
                        <button class="ui teal right floated labeled icon button">
                            Ver detalle
                            <i class="linkify icon"></i>
                        </button>
                        </div>
                    </div>
                    <div id="result-event" class="ui raised card menu segment" style="width: 100%;">
                        {{--Titulo--}}
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                Evento
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a><h3 class="header">Título del evento</h3></a>
                        </div>
                        <div class="ui items content">
                            <div class="item">
                                <div class="ui medium image">
                                    <img src="images/revista2.jpg">
                                </div>
                                <div class="middle aligned content">
                                    {{--Institución--}}
                                    <div class="description">
                                        <div class="ui large label">
                                            <i class="student icon"></i>
                                            <a class="detail">Institución organizadora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Footer--}}
                        <div class="extra content">
                            <div class="ui stackable grid">
                                <div class="eleven wide column">
                                    <span><b>Desde: </b> dd/mm/aaaa</span>
                                    <br>
                                    <span><b>Hasta: </b> dd/mm/aaaa</span>
                                </div>
                                <div class="five wide column">
                                    <button class="ui teal right floated labeled icon button">
                                        Ver detalle
                                        <i class="linkify icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="result-request_investigator" class="ui raised card menu segment" style="width: 100%;">
                        {{--Titulo--}}
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                Solicitud
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a><h3 class="header">Título de la solicitud</h3></a>
                        </div>
                        {{--Institución--}}
                        <div class="content">
                            <div class="description">
                                <p>
                                    <div class="ui large label">
                                        <i class="mail outline icon"></i>
                                        <a class="detail">Tipo de solicitud</a>
                                    </div>
                                </p>
                                <p>
                                    <div class="ui large label">
                                        <i class="student icon"></i>
                                        <a class="detail">Institución que publica la solicitud</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                        {{--Footer--}}
                        <div class="extra content">
                            <div class="ui stackable grid">
                                <div class="eleven wide column">
                                    <span><b>Desde: </b> dd/mm/aaaa</span>
                                    <br>
                                    <span><b>Hasta: </b> dd/mm/aaaa</span>
                                </div>
                                <div class="five wide column">
                                    <button class="ui teal right floated labeled icon button">
                                        Ver detalle
                                        <i class="linkify icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
    </script>
@stop