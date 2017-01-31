<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Mundocente</title>
    <link rel="stylesheet" href="../semantic/out/semantic.min.css">
    <link rel="stylesheet" href="../css/style-index.css" type="text/css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>
    <script type="text/javascript" src="../semantic/out/semantic.min.js"></script>
    <script type="text/javascript" src="../js/jquery.scrollme.js"></script>




</head>

<body id="inicio">

<div class="ui large borderless fixed navbar-fixed menu"
     style="background-color: #EEEEEE;">
    <div class="ui container">
        <a class="toc item"><i class="sidebar icon"></i></a>
        <div class="item">
            <a href="#"><div class="logo"></div></a>
        </div>
        <a class="item-menu item" href="#banner">Inicio</a>
        <a class="item-menu item" href="#services">Servicios</a>
        <a class="item-menu item" href="#contact">Contáctanos</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button primary item-menu" style="background-color: #242533" onclick="mostrarModelregistro()">Registrarse</a>
            </div>
            <div class="item">
                <a class="ui button primary item-menu" style="background-color: #CC4452"  onclick="mostrarModellogin()">Iniciar sesión</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a href="#banner" class="item">Inicio</a>
    <a href="#services" class="item">Servicios</a>
    <a href="#contact" class="item">Contáctanos</a>
    <div class="divided"></div>
    <a class="item">Iniciar sesión</a>
    <a class="item">Registrarme</a>
</div>

<!-- Banner -->
<div id="banner" class="banner">
    <div class="ui container">
        <ul id="scene">
            <li class="layer" data-depth="0.03">
                <ul class="rope depth-10">
                    <li class="hanger position-3">
                        <div class="board cloud-10 swing-5"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.08">
                <ul class="rope depth-20">
                    <li class="hanger position-7">
                        <div class="board cloud-6 swing-4"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.08">
                <ul class="rope depth-40">
                    <li class="hanger position-4">
                        <div class="board cloud-3 swing-3"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.10">
                <ul class="rope depth-70">
                    <li class="hanger position-8">
                        <div class="board cloud-2 swing-2"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.20">
                <ul class="rope depth-100">
                    <li class="hanger position-5">
                        <div class="board cloud-1 swing-1"></div>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="ui vertical masthead left aligned">
            <div class="title">
                <h1 class="ui header inverted" style="font-size: 4em; color: #F2EDE4;">
                    Mundocente
                    <div class="sub header" style="color: #CC4452; font-size: 0.45em;">La Web de los docentes investigadores
                    </div>
                </h1>
                <a class="ui large grey inverted button">Registrarse <i class="right arrow icon"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Servicios -->

<div id="services" class="services">
    <div class="ui container center aligned inverted">
        <h1 class="ui header">Servicios</h1>
        <div>
            <div class="line"></div>
            <div data-width="79" data-height="27"
                 style="display: inline-block; vertical-align: middle; line-height: 0; width: 79px; height: 27px;">
                <svg height="27" width="79">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.2 26.4">
                        <path fill="none" stroke="#CC4452" stroke-width="2" d="
                            M57.3,13.1c-3.2,10.4,10.4,16.1,16.8,8.7c7.1-8.2,0.6-17.8-7-20.1c-19.6-5.2-31.9,18-49,23.1C9.3,27.5-1.7,20.4,1.6,9.8
                            c3.8-12.4,23.3-9,19.3,4"></path>
                    </svg>
                </svg>
            </div>
            <div class="line"></div>
        </div>
        <div class="ui small header inverted">En Mundocente ofrecemos la información que
            necesita un docente para tener las mejores oportunidades de crecimiento laboral y personal de acuerdo con
            sus intereses.
        </div>
        <div class="ui two column divided padded relaxed stackable grid">
            <div class="row">
                <div class="column">
                    <h2 class="ui header">
                        <img style="width: 100px" src="../images/workspace.png" class="scrollme animateme"
                             data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-100">
                        <div class="content">
                            Convocatorias docentes
                            <div class="sub header">Entérese oportunamente sobre las oportunidades laborales del ámbito
                                docente y cumpla con sus metas de crecimiento profesional.
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="column">
                    <h2 class="ui header">
                        <img style="width: 100px" src="../images/workspace.png" class="scrollme animateme"
                             data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="100">
                        <div class="content">
                            Revistas científicas
                            <div class="sub header">Ahorre tiempo buscando las revistas científicas de su área de
                                interés.
                            </div>
                        </div>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <h2 class="ui header">
                        <img style="width: 100px" src="../images/workspace.png" class="scrollme animateme"
                             data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-100">
                        <div class="content">
                            Eventos académicos
                            <div class="sub header">Encuentre congresos, seminarios, conferencias y demás eventos
                                académicos de su interés, para capacitación o presentación de sus resultados de
                                investigación.
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="column">
                    <h2 class="ui header">
                        <img style="width: 100px" src="../images/workspace.png" class="scrollme animateme"
                             data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="100">
                        <div class="content">
                            Invitaciones a participar en proyectos
                            <div class="sub header">Vincúlese a proyectos académicos de diversas instituciones de
                                educación.
                            </div>
                            <div class="sub header">Participe como par evaluador de proyectos, propuestas y resultados
                                de investigación, presentados por sus colegas.
                            </div>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
        <div class="ui small header inverted">En Mundocente ofrecemos la información que
            necesita un docente para tener las mejores oportunidades de crecimiento laboral y personal de acuerdo con
            sus intereses.
        </div>
    </div>
</div>

<!-- Contacto -->

<div id="contact" class="contact">
    <div class="ui center aligned container">
        <h1 class="ui header">Contacto</h1>
        <div>
            <div class="line"></div>
            <div data-width="79" data-height="27"
                 style="display: inline-block; vertical-align: middle; line-height: 0; width: 79px; height: 27px;">
                <svg height="27" width="79">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.2 26.4">
                        <path fill="none" stroke="#CC4452" stroke-width="2" d="
                            M57.3,13.1c-3.2,10.4,10.4,16.1,16.8,8.7c7.1-8.2,0.6-17.8-7-20.1c-19.6-5.2-31.9,18-49,23.1C9.3,27.5-1.7,20.4,1.6,9.8
                            c3.8-12.4,23.3-9,19.3,4"></path>
                    </svg>
                </svg>
            </div>
            <div class="line"></div>
        </div>
        <div class="ui two column left aligned stackable grid">
            <div class="column">
                <form class="ui form">
                    <h2 class="ui dividing header">Información</h2>
                    <div class="field">
                        <label>Nombre</label>
                        <div class="two fields">
                            <div class="field">
                                <input type="text" name="shipping[nombres]" placeholder="Nombres">
                            </div>
                            <div class="field">
                                <input type="text" name="shipping[apellidos]" placeholder="Apellidos">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Correo</label>
                        <input type="email" placeholder="Correo electrónico">
                    </div>
                    <div class="field">
                        <label>Mensaje</label>
                        <textarea rows="2"></textarea>
                    </div>
                    <button class="ui large active button" style="background-color: #CC4452; color: #F2EDE4;">
                        <i class="send icon"></i>
                        Enviar
                    </button>
                </form>
            </div>
            <div class="column">
                <div class="info-contact">
                    <div class="ui one column center aligned grid">
                        <ul class="row">
                            <li class="column">
                                <span>Email: contacto@mundocente.co</span>
                            </li>
                            <li class="column">
                                <span>Teléfono: + 57 3153533929</span>
                            </li>
                            <li class="column">
                                <span>Tunja - Boyacá (Colombia)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
        <div class="ui stackable inverted divided grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Group 1</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Group 2</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Group 3</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Link One</a>
                    <a href="#" class="item">Link Two</a>
                    <a href="#" class="item">Link Three</a>
                    <a href="#" class="item">Link Four</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Footer Header</h4>
                <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <img src="../images/iconop.png" class="ui centered image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Site Map</a>
            <a class="item" href="#">Contact Us</a>
            <a class="item" href="#">Terms and Conditions</a>
            <a class="item" href="#">Privacy Policy</a>
        </div>
    </div>
</div>

<!--<div class="ui vertical footer ">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height grid">
            <div class="three wide column">
                <h4 class="ui inverted header">About</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Sitemap</a>
                    <a href="#" class="item">Contact Us</a>
                    <a href="#" class="item">Religious Ceremonies</a>
                    <a href="#" class="item">Gazebo Plans</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Services</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Banana Pre-Order</a>
                    <a href="#" class="item">DNA FAQ</a>
                    <a href="#" class="item">How To Access</a>
                    <a href="#" class="item">Favorite X-Men</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Footer Header</h4>
                <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
            </div>
        </div>
    </div>
</div>-->





<!--**************************  model registro -->

<div class="ui basic modal registro">
  <div class="ui middle center aligned grid">
    <div class="column">
        <div class="ui raised padded segment">
           <a href="/publications"><div class="content-image">
                <img src="../images/icono.jpg" class="image" width="130px" height="130px">
            </div></a>
            <form class="ui form">
            <div class="ui field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="username" placeholder="Nombres y Apellidos">
                    </div>
                </div>
                <div class="ui field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="text" name="email" placeholder="Correo Electrónico">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="ui fluid primary large submit button" style="background-color: #CC4452">Registrar</div>
                <div class="ui error message"></div>
            </form>
            <h5 class="ui horizontal divider header">
                o
            </h5>
            <div class="ui stackable center aligned grid">
                <div class="row" style="padding-bottom: 5px;">
                    <button class="ui facebook button">
                        <i class="facebook icon"></i>
                        Regístrese con Facebook
                    </button>
                </div>
                <div class="row" style="padding-top: 5px;">
                    <button class="ui google plus button">
                        <i class="google plus icon"></i>
                        Regístrese con Google +
                    </button>
                </div>
            </div>
        </div>
        <div class="ui  message">
            ¿Ya tienes cuanta? <a href="login">Ingresa aquí</a>
        </div>
    </div>
</div>
  <div class="actions">
    <div class="ui red basic cancel button">
      <i class="remove icon"></i>
      Cancelar
    </div>
  </div>
</div>


<!--**************************  Fin model registro -->




























<!--**************************  model login -->

<div class="ui basic modal login">
  <div class="ui middle center aligned grid">
    <div class="column">
        <div class="ui raised padded segment">
           <a href="/publications"><div class="content-image">
                <img src="../images/icono.jpg" class="image" width="130px" height="130px">
            </div></a>
            <form class="ui form">
                <div class="ui field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="text" name="email" placeholder="Correo Electrónico">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="ui fluid primary large submit button" style="background-color: #CC4452"><a href="/publications">Ingresar</a></div>
                <div class="ui error message"></div>
            </form>
            <h5 class="ui horizontal divider header">
                o
            </h5>
            <div class="ui stackable center aligned grid">
                <div class="row" style="padding-bottom: 5px;">
                    <button class="ui facebook button">
                        <i class="facebook icon"></i>
                        Inicie sesión con Facebook
                    </button>
                </div>
                <div class="row" style="padding-top: 5px;">
                    <button class="ui google plus button">
                        <i class="google plus icon"></i>
                        Inicie sesión con Google +
                    </button>
                </div>
            </div>
        </div>
        <div class="ui  message">
            ¿No se ha registrado? <a href="signup"> Regístrese</a>
        </div>
    </div>
</div>
  <div class="actions">
    <div class="ui red basic cancel button">
      <i class="remove icon"></i>
      Cancelar
    </div>
  </div>
</div>


<!--**************************  Fin model login -->








</body>

<script type="text/javascript">
    var sale = 0;
    $(document).ready(function () {

        if (sale == 0) {
            iniciaMovimientobanner();
            sale = 1;
        }
    });

    function iniciaMovimientobanner() {
        setInterval(moverbannerderecha, 10000);
    }


    function mostrarModellogin() {
        $('.ui.login')
        .modal({
            inverted: true
          })
            .modal('show')
        ;
    }

    function mostrarModelregistro() {
        $('.ui.registro')
        .modal({
            inverted: true
          })

            .modal('show')
        ;
    }
    function moverbannerizquierda() {
        $('.shape').shape('flip left');
    }
    function moverbannerderecha() {
        $('.shape').shape('flip right');
    }
</script>
</html>