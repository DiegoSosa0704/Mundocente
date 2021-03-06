<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/icono.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Mundocente</title>

    {!!Html::style('semantic/out/semantic.css')!!}
    {!!Html::style('css/style-index.css')!!}
    {!!Html::style('css/scrollbar.css')!!}
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/ScrollMagic.min.js')!!}
    {!!Html::script('js/init.js')!!}
    {!!Html::script('semantic/out/semantic.js')!!}
    {!!Html::script('js/jquery.scrollme.js')!!}
    {!!Html::script('js/parallax.min.js')!!}

</head>

<body id="inicio">

<div class="ui large borderless fixed navbar-fixed menu"
     style="background-color: #EEEEEE;">
    <div class="ui container">
        <a class="toc item"><i class="sidebar icon"></i></a>
        <div class="item">
            <a href="#">
                <div class="logo"></div>
            </a>
        </div>
        <a class="item-menu item" href="#banner">Inicio</a>
        <a class="item-menu item" href="#services">Servicios</a>
        <a class="item-menu item" href="#contact">Contáctenos</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button primary item-menu" style="background-color: #242533"
                   id="showModelSignup">Registrarse</a>
            </div>
            <div class="item">
                <a class="ui button primary item-menu" style="background-color: #A54686" id="showModelLogin">Iniciar
                    sesión</a>
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
                        <div class="board cloud-5 swing-5"></div>
                    </li>
                </ul>
            </li>
            <li class="layer" data-depth="0.08">
                <ul class="rope depth-20">
                    <li class="hanger position-7">
                        <div class="board cloud-7 swing-4"></div>
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
                    <div class="sub header" style="color: #CC4452; font-size: 0.45em;">En construcción, La Web de los
                        docentes
                        investigadores
                    </div>
                </h1>
                <a class="ui large grey inverted button" href="signup">Registrarse <i class="right arrow icon"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Servicios -->
<div id="services" class="services"></div>
<div class="services scrollme animateme" data-when="view" data-from="0.5" data-to="0" data-opacity="0.3">
    <div class="ui container center aligned inverted">
        <h1 class="ui header" style="font-size: 3.7em">Servicios</h1>
        <div>
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
        </div>
        <div class="ui small header inverted">En Mundocente ofrecemos la información que
            necesita un docente para tener las mejores oportunidades de crecimiento laboral y personal de acuerdo con
            sus intereses.
        </div>
        <div class="ui two column internally celled padded very relaxed unrelaxed stackable grid">
            {{--Convocatoria--}}
            <div class="row" style="background-color: #EEEEEE">
                <div class="column">
                    <img src="images/worker.png" width="230" class="scrollme animateme ui image centered"
                         data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-100">
                </div>
                <div class="column left aligned" style="margin: auto 0 auto 0">
                    <h2 class="ui header">
                        Convocatorias docentes
                        <div class="sub header">
                            Entérese oportunamente sobre las oportunidades laborales del ámbito
                            docente y cumpla con sus metas de crecimiento profesional.
                        </div>
                    </h2>
                </div>
            </div>
            {{--Revista--}}
            <div class="row">
                <div class="column right aligned" style="margin: auto 0 auto 0">
                    <h2 class="ui header">
                        Eventos académicos
                        <div class="sub header">Encuentre congresos, seminarios, conferencias y demás eventos
                            académicos de su interés, para capacitación o presentación de sus resultados de
                            investigación.
                        </div>
                    </h2>
                </div>
                <div class="column">
                    <img src="images/certificate.png" width="230" class="scrollme animateme ui image centered"
                         data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="100">
                </div>
            </div>
            {{--Eventos--}}
            <div class="row" style="background-color: #EEEEEE">
                <div class="column">
                    <img src="images/calendar.png" width="230" class="scrollme animateme ui image centered"
                         data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-100">
                </div>
                <div class="column left aligned" style="margin: auto 0 auto 0">
                    <h2 class="ui header">
                        Revistas científicas
                        <div class="sub header">Ahorre tiempo buscando las revistas científicas de su área de
                            interés.
                        </div>
                    </h2>
                </div>
            </div>
            {{--Solicitudes--}}
            <div class="row">
                <div class="column right aligned" style="display: flex; justify-content: center; align-items: center;">
                    <h2 class="ui header">
                        Invitaciones a participar en proyectos
                        <div class="sub header">Vincúlese a proyectos académicos de diversas instituciones de
                            educación.
                        </div>
                        <div class="sub header">Participe como par evaluador de proyectos, propuestas y resultados
                            de investigación, presentados por sus colegas.
                        </div>
                    </h2>
                </div>
                <div class="column">
                    <img src="images/add.png" width="230" class="scrollme animateme ui image centered"
                         data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="100">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="message-info" id="message-info"
     style="/*background: url(../images/banner3.jpg) no-repeat 0 0%/cover;*/ background-color: #242533;">
    <div class="ui center aligned container">
        <div class="ui header text" style=" color: #AD5691 ;width: 500px; margin: 0 auto 0 auto; padding: 3em 0">
            Mundocente también le ofrece la oportunidad de recibir notificaciones sobre información
            relevante de acuerdo con sus intereses profesionales y laborales.
        </div>
    </div>
</div>

<!-- Contacto -->
<div id="contact" class="contact scrollme animateme">

</div>
<div class="contact scrollme animateme" data-when="view" data-from="0.5" data-to="0" data-opacity="0.3">
    <div class="ui center aligned container">
        <h1 class="ui header">Contacto</h1>
        <div>
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
        </div>
        <div class="ui two column left aligned stackable grid">
            <div class="column">
                {!!Form::open(['url'=>'send-email-contact', 'method'=> 'POST', 'class'=>'ui form'])!!}
                <h2 class="ui dividing header">Información</h2>
                <div class="field">
                    <label>Nombres</label>
                    <div class="field">
                        <div class="field">
                            {!!Form::text('name_contact', null, ['type' => 'text', 'placeholder' => 'Ingrese su nombre completo', 'required'=>'true'])!!}
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Correo</label>
                    {!!Form::text('email_contact', null, ['type' => 'text', 'placeholder' => 'Ingrese su correo', 'required'=>'true'])!!}
                </div>
                <div class="field">
                    <label>Mensaje</label>
                    {!!Form::textarea('message_contact', null, ['type' => 'text', 'placeholder' => 'Ingrese su nombre completo', 'rows' => '2', 'required'=>'true'])!!}

                </div>
                <button class="ui large active button" type="submit" style="background-color: #96407A; color: #F2EDE4;">
                    <i class="send icon"></i>
                    Enviar
                </button>
                {!!Form::close()!!}
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
            <div class="sixteen wide column">
                <h2 class="ui inverted header">Iniciativa apoyada por: </h2>
            </div>
            <div class="row">
                <div class="four wide column">
                    <div class="content" style="background-color: #E0E0E0; border-radius: 15px;">
                        <img src="/images/apps.png" class="ui image centered medium">
                    </div>
                </div>
                <div class="four wide column">
                    <img src="/images/mintic.png" class="ui image centered medium">
                </div>
                <div class="four wide column">
                    <img src="/images/vivide-digital.png" class="ui image centered medium">
                </div>
                <div class="four wide column">
                    <img src="/images/unab.png" class="ui image centered medium">
                </div>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <img src="images/logo.png" class="ui centered  medium image">
        <div class="ui horizontal inverted small divided link list">
            <a class="item" href="#">Contacto</a>
            <a class="item" href="#">Terminos y condiciones</a>
            <a class="item" href="#">Copyright &copy; 2017</a>
        </div>
    </div>
</div>

<style>
    .ui.footer .ui.grid .four.wide.column {
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>

<!--**************************  model login -->
<div class="ui tiny modal login">
    <i class="close icon"></i>
    <div class="content">
        {!!Form::open(['route'=>'session.store', 'method'=> 'POST', 'class'=>'ui form'])!!}
        <div class="field"><a href="/"><img src="images/logo.png" class="ui centered medium image"></a></div>
        <div class="ui field">
            <div class="ui left icon input">
                <i class="mail icon"></i>
                {!!Form::text('email', null, ['type' => 'text', 'placeholder' => 'Correo Electrónico'])!!}
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                {!!Form::password('password', ['type' => 'password', 'placeholder' => 'Contraseña'])!!}
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" class="hidden" name="checkboxrememberpassword">
                <label>Recordar contraseña</label>
            </div>
        </div>

        {!!Form::submit('Ingresar', ['class'=>'ui fluid primary large submit button', 'style'=>'background-color: #96407A;'])!!}
        <div class="ui error message"></div>
        @include('errors.error_login')
        {!!Form::close()!!}
        <h5 class="ui horizontal divider header">
            o
        </h5>
        <div class="ui stackable center aligned grid">
            <div class="row" style="padding-bottom: 5px;">
                <a class="ui facebook button" href="authfacebook">
                    <i class="facebook icon"></i>
                    Inicie sesión con Facebook
                </a>
            </div>
            <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                <a class="ui google plus button" href="authgoogle">
                    <i class="google plus icon"></i>
                    Inicie sesión con Google +
                </a>
            </div>
            <div class="row" style="padding-top: 5px;">
                <a class="ui linkedin button" href="authlinkedin">
                    <i class="linkedin icon"></i>
                    Regístrese con LinkedIn
                </a>
            </div>
        </div>
    </div>
    <div class="ui info message">
        ¿No está registrado? <a href="signup">Registrarse</a>
    </div>
</div>
<!--**************************  model registro -->
<div class="ui tiny modal registro">
    <i class="close icon"></i>
    <div class="content">
        {!!Form::open(['route'=>'user.store', 'method'=> 'POST', 'class'=>'ui form'])!!}
        <div class="field"><a href="/"><img src="images/logo.png" class="ui centered medium image"></a></div>
        <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                {!!Form::text('username', null, ['type' => 'text', 'placeholder' => 'Nombre completo'])!!}
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="mail icon"></i>
                {!!Form::text('email', null, ['type' => 'text', 'placeholder' => 'Correo Electrónico'])!!}
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                {!!Form::password('password', ['type' => 'password', 'placeholder' => 'Contraseña'])!!}
            </div>
        </div>
        {!!Form::submit('Registrar', ['class'=>'ui fluid primary large submit button', 'style'=>'background-color: #96407A;'])!!}
        <div class="ui error message"></div>
        {!!Form::close()!!}
        <h5 class="ui horizontal divider header">
            o
        </h5>
        <div class="ui stackable center aligned grid">
            <div class="row" style="padding-bottom: 5px;">
                <a class="ui facebook button" href="authfacebook">
                    <i class="facebook icon"></i>
                    Regístrese con Facebook
                </a>
            </div>
            <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                <a class="ui google plus button" href="authgoogle">
                    <i class="google plus icon"></i>
                    Regístrese con Google +
                </a>
            </div>
            <div class="row" style="padding-top: 5px;">
                <a class="ui linkedin button" href="authlinkedin">
                    <i class="linkedin icon"></i>
                    Regístrese con LinkedIn
                </a>
            </div>
        </div>
    </div>
    <div class="ui info message">
        ¿Ya tienes cuanta? <a href="login">Ingresa aquí</a>
    </div>
</div>


</body>

<script type="text/javascript">

    $('.ui.form')
        .form({
            fields: {
                username: {
                    identifier: 'username',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Ingresar nombres y apellidos'
                        }
                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter your e-mail'
                        },
                        {
                            type: 'email',
                            prompt: 'Please enter a valid e-mail'
                        }
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter your password'
                        },
                        {
                            type: 'length[6]',
                            prompt: 'Your password must be at least 6 characters'
                        }
                    ]
                }
            }
        })
    ;
    $('#showModelSignup').on('click', function () {
        $('.ui.registro')
            .modal()
            .modal('show')
        ;
    });
    $('#showModelLogin').on('click', function () {
        $('.ui.login')
            .modal()
            .modal('show')
        ;
    });
    $('.ui.checkbox')
        .checkbox()
    ;
    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);


    function nobackbutton() {

        window.location.hash = "no-back-button";

        window.location.hash = "Again-No-back-button" //chrome

        window.onhashchange = function () {
            window.location.hash = "";
        }

    }

</script>
</html>