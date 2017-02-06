@extends('main.main')

@section('content')

    <style>

        /* Mobile */
        @media only screen and (max-width: 767px) {
            div.pusher {
                background-color: #EEEEEE;
                margin-top: 50px;
            }

            .ui.fixed.sticky.menu,
            .ui.fixed.top.menu img {
                display: none;
            }

            .line {
                max-width: 7em;
            }
        }

        /* Tablet */

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            div.pusher {
                background-color: #EEEEEE;
                margin-top: 50px;
            }

            .ui.fixed.sticky.menu,
            .ui.fixed.top.menu img {
                display: none;
            }
        }

        /* Small Monitor */

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            div.pusher {
                background-color: #EEEEEE;
            }

            /*.ui.top.menu.fixed {
                display: none;
            }*/

            .pusher .ui.container {
                padding-left: 18rem;
            }
        }

        /* Large Monitor */

        @media only screen and (min-width: 1200px) and (max-width: 1407px) {
            div.pusher {
                background-color: #EEEEEE;
            }

            /*.ui.top.menu.fixed {
                display: none;
            }*/

            .pusher .ui.container {
                width: 1327px;
                padding-left: 18rem;
            }
        }

        /*Large Monitor 2*/

        @media only screen and (min-width: 1408px) {
            div.pusher {
                background-color: #EEEEEE;
            }

            /*.ui.top.menu.fixed {
                display: none;
            }*/

            .pusher .ui.container {
                width: 1358px;
                padding-left: 18rem;
            }
        }
    </style>
    <!--Contenido-->
    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui center aligned container">
            <h2 class="ui header">Resultados de Búsqueda</h2>
            <div class="line"></div>
            <div data-width="79" data-height="27"
                 style="display: inline-block; vertical-align: middle; line-height: 0; width: 79px; height: 27px;">
                <svg height="27" width="79">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.2 26.4">
                        <path fill="none" stroke="#A54686" stroke-width="2" d="
                        M57.3,13.1c-3.2,10.4,10.4,16.1,16.8,8.7c7.1-8.2,0.6-17.8-7-20.1c-19.6-5.2-31.9,18-49,23.1C9.3,27.5-1.7,20.4,1.6,9.8
                        c3.8-12.4,23.3-9,19.3,4"></path>
                    </svg>
                </svg>
            </div>
            <div class="line"></div>
            <div class="ui stackable grid">
                <div class="ui six wide form column">
                    <div class="field">
                        <div id="paper" class="ui segment" style="/*display: none;*/">
                            <div class="ui internally celled left aligned stackable equal width grid">
                                <h2 class="ui header">Revista</h2>
                                <div class="row">
                                    <div class="column">
                                        <button type="button" name="button" class="ui fluid button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div id="announcement" class="ui segment" style="/*display: none;*/">
                            <div class="ui internally celled left aligned stackable equal width grid">
                                <h2 class="ui header">Convocatoria</h2>
                                <div class="row">
                                    <div class="column">
                                        <button type="button" name="button" class="ui fluid button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div id="event" class="ui segment" style="/*display: none;*/">
                            <div class="ui internally celled left aligned stackable equal width grid">
                                <h2 class="ui header">Evento</h2>
                                <div class="row">
                                    <div class="column">
                                        <button type="button" name="button" class="ui fluid button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div id="request" class="ui segment" style="/*display: none;*/">
                            <div class="ui internally celled left aligned stackable equal width grid">
                                <h2 class="ui header">Solicitud</h2>
                                <div class="row">
                                    <div class="column">
                                        <button type="button" name="button" class="ui fluid button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui ten wide column">
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

        $('#showAdvancedSeach').on('click', function () {
            $('#revistasfiltro').transition('fade');
        });
        $('.ui.sidebar')
            .sidebar('attach events', '.menu.fixed .launch.item')
        ;
        $('.ui.sticky.filter')
            .sticky({
                context: '#example2',
                pushing: true
            })
        ;
    </script>

@stop