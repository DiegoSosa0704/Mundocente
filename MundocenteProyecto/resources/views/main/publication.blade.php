@extends('main.main')

@section('content')

    <style>
        /* Mobile */
        @media only screen and (max-width: 767px) {

        }

        /* Tablet */

        @media only screen and (min-width: 768px) and (max-width: 991px) {
        }

        /* Small Monitor */

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .pusher .ui.container {
                width: 1080px;
                padding-left: 18rem;
            }
        }

        /* Large Monitor */

        @media only screen and (min-width: 1200px) and (max-width: 1407px) {
            .pusher .ui.container {
                width: 1267px;
                padding-left: 18rem;
            }
        }

        /*Large Monitor 2*/

        @media only screen and (min-width: 1408px) {
            .pusher .ui.container {
                width: 1458px;
                padding-left: 18rem;
            }
        }
    </style>

    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container">
            <div class="ui stackable grid">
                <div class="ui five wide form column">
                    <div id="announcement" class="ui padded fixed sticky sticky-filter segment"
                         style="min-width: 23% !important; max-width: 23% !important; height: 85% !important;overflow: scroll;display: none;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtros de convocatoria</div>
                        <div class="ui small form">
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
                         style="min-width: 23% !important; max-width: 23% !important; height: 85% !important;overflow: scroll; display: none;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtros de revistas</div>
                        <div class="ui small form">
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
                    <div id="event" class="ui padded fixed sticky sticky-filter segment"
                         style="min-width: 23% !important; max-width: 23% !important; height: 85% !important;overflow: scroll; display: none;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtros de eventos</div>
                        <div class="ui small form">
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
                         style="min-width: 23% !important; max-width: 23% !important; height: 85% !important;overflow: scroll; display: none;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtros de solicitud a investigadores</div>
                        <div class="ui small form">
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
                         style="min-width: 23% !important; max-width: 23% !important; height: 85% !important;overflow: scroll; display: none;">
                        <div class="ui top left attached label" style="font-size: 1em">Filtros de solicitud a evaluadores</div>
                        <div class="ui small form">
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
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ui raised card menu segment" style="width: 100%;">
                        <div class="content">
                            <div class="ui right floated simple dropdown item">
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="#">Guardar publicación</a>
                                    <a class="item" href="#">Denunciar Publicación</a>
                                    <a class="item" href="#">Mis publicaciones</a>
                                </div>
                            </div>
                            <a>
                                <div class="header">
                                    <h3 style="color: black;">Evento de ingeniería ambiental</h3>
                                </div>
                            </a>
                            <div class="meta">
                                Ciencias naturales
                                <span class=" floated star" title="Agregar área a favoritas">
                                    <i class="star icon"></i>
                                </span>
                            </div>
                            <div class="description">
                                <p>Aquí va la descripción de la publicación con detalles.</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <span class="left floated pointing up">
                                <i class="pointing up icon"></i>
                                132 Visitas
                            </span>
                            <button class="ui inverted right floated labeled icon button"
                                    style="background-color: rgb(164, 70, 133);">
                                Enlace
                                <i class="linkify icon"></i>
                            </button>
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
    </script>

@stop