@extends('main.main')

@section('content')

    <style>
        .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
        }
    </style>

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
                    <h2 class="ui header">Ultimas publicaciones</h2>
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

    <div class="ui first coupled modal">
        <div class="header">Vinculación laboral</div>
        <div class="content ui form">
            {{--<div class="ui info message">
                <i class="close icon"></i>
                <div class="header">
                    Al suministrar los datos que se le pedirán continuación, usted podrá disfrutar de todos los servicios que ofrece Mundocente. Tales como:
                </div>
                <ul class="list">
                    <li>Realizar publicaciones de Revistas, Convocatorias... etc</li>
                    <li>Obtener resultados en búsquedas de acuerdo con sus intereses.</li>
                </ul>
            </div>--}}
            <div class="two fields">
                <div class="required field">
                    <label>País en donde se encuentra la universidad</label>
                    <div class="ui search dropdown selection">
                        <select name="country" placeholder="seleccione país de la institución" id="selectCountry">
                            <option value="">Seleccione país</option>
                            <option value="1"> Colombia</option>
                            <option value="5"> Argentina</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione país</div>
                        <div class="menu" tabindex="-1">
                            <div class="item" data-value="1"> Colombia</div>
                            <div class="item" data-value="5"> Argentina</div>
                        </div>
                    </div>
                </div>
                <div class="required field" id="cityChange">
                    <label>Ciudad</label>
                    <div class="ui search dropdown selection">
                        <select name="city" placeholder="Seleccione Ciudad" id="selectCity">
                            <option value="">Seleccione ciudad</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione ciudad</div>
                        <div class="menu" tabindex="-1"></div>
                    </div>
                </div>
            </div>
            <div class="required field">
                <label>Intitución en que labora</label>
                <div class="ui info compact small message" style="margin-top: 0; margin-bottom: 5px;">
                    <p>Si su institución no se encuentra en la lista, podrá suministrarla en el campo "Otra". </p>
                </div>
            </div>
            <div class="two fields" id="institutionChange">
                <div class="required field">
                    <label>Institución</label>
                    <div class="ui search dropdown selection">
                        <select name="institution" placeholder="Seleccione Institución" id="selectInstitution">
                            <option value="">Seleccione institución</option>
                        </select>
                        <i class="dropdown icon"></i>
                        <input class="search" autocomplete="off" tabindex="0">
                        <div class="default text">Seleccione institución</div>
                        <div class="menu transition hidden" tabindex="-1">
                            <div class="message">No results found.</div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Otra</label>
                    <div class="ui action input">
                        <input placeholder="Nombre" id="otherInstitute" type="text" value="">
                        <div class="ui button" id="addInstituteNew">Nuevo</div>
                    </div>
                </div>
            </div>
            <div class="right floated content">
                <a class="ui label button green" id="agregaInstituto">Agregar Institución</a>
            </div>
            <div class="ui raised segment">
                <label><b>Estoy viculado en:</b></label>
                <div class="ui divided list selected_list" id="listadeinstitutosvinculados">
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button">Omitir</div>
        </div>
    </div>

    <div class="ui second coupled modal">
        <div class="header">Datos personales</div>
        <div class="content">
            <h3 class="ui center aligned header">Añade una foto de perfil</h3>
            <div class="ui center aligned grid form">
                <div class="field">
                    <div class="ui medium circular image_dimmer image">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <label for="file" class="ui button button_load">
                                        <input type="file" id="file" style="display:none">
                                        Cargar Foto
                                    </label>
                                </div>
                            </div>
                        </div>
                        <img src="images/user.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button">Omitir</div>
            {{--<div class="ui cancel button">Cancel</div>--}}
        </div>
    </div>

    <div class="ui third coupled modal">
        <div class="header">Modal 3</div>
        <div class="content ui form">
            <div class="field">
                <div class="three fields">
                    <div class="required field">
                        <label>Gran área</label>
                        <div class="ui fluid search dropdown selection">
                            <select name="large_area" id="select_gran_area_interes">
                                <option value="">Gran Área</option>
                                <option value="1"> Ciencias Naturales</option>
                                <option value="">Gran Área</option>
                                <option value="2"> Ciencias Naturales</option>
                                <option value="">Gran Área</option>
                                <option value="3"> Ingeniería y Tecnología</option>
                                <option value="">Gran Área</option>
                                <option value="4"> Ciencias Médicas y de la Salud</option>
                                <option value="">Gran Área</option>
                                <option value="5"> Ciencias Agrícolas</option>
                                <option value="">Gran Área</option>
                                <option value="6"> Ciencias Sociales</option>
                                <option value="">Gran Área</option>
                                <option value="7"> Humanidades</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Gran Área</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="1"> Ciencias Naturales</div>
                                <div class="item" data-value="2"> Ciencias Naturales</div>
                                <div class="item" data-value="3"> Ingeniería y Tecnología</div>
                                <div class="item" data-value="4"> Ciencias Médicas y de la Salud</div>
                                <div class="item" data-value="5"> Ciencias Agrícolas</div>
                                <div class="item" data-value="6"> Ciencias Sociales</div>
                                <div class="item" data-value="7"> Humanidades</div>
                            </div>
                        </div>
                        <a type="submit" class="ui green button right" id="addDisciplineAreaInterest">+</a>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_discipline_area_Interest"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Área</label>
                        <div class="ui search dropdown selection">
                            <select id="select_area_interes" name="area">
                                <option selected="selected" value="">Seleccione Área</option>
                                <option value="0">ninguna seleccionada</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Seleccione Área</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="0">ninguna seleccionada</div>
                            </div>
                        </div>
                        <a type="submit" class="ui green button right" id="addAreaInterest">+</a>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_area_Interest"></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Disciplina</label>
                        <div class="ui search dropdown selection">
                            <select id="select_disciplina_interes" name="discipline">
                                <option selected="selected" value="">Seleccione Disciplina</option>
                                <option value="0">ninguna seleccionada</option>
                            </select>
                            <i class="dropdown icon"></i>
                            <input class="search" autocomplete="off" tabindex="0">
                            <div class="default text">Seleccione Disciplina</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="0">ninguna seleccionada</div>
                            </div>
                        </div>
                        <a type="submit" class="ui green button right" id="addAreaInterestDiscipline">+</a>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list" id="list_area_Interest_discipline"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button">Omitir</div>
            {{--<div class="ui cancel button">Cancel</div>--}}
        </div>
    </div>

    <script type="text/javascript">
        $('.ui.image_dimmer.image').dimmer({
            on: 'hover'
        });

        $('.coupled.modal')
            .modal({
                allowMultiple: false
            })
        ;
        // attach events to buttons
        $('.third.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.second.modal .approve.button')
        ;
        // attach events to buttons
        $('.second.modal')
            .modal('setting', 'closable', false)
            .modal('attach events', '.first.modal .approve.button')
        ;
        // show first now
        $('.first.modal')
            .modal('setting', 'closable', false)
            .modal('show')
        ;
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.checkbox')
            .checkbox()
        ;
    </script>
@stop