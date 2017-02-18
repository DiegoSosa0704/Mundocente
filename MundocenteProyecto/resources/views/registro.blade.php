<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Registro - Mundocente</title>
    <link rel="stylesheet" href="semantic/out/semantic.css">
    <link rel="stylesheet" href="css/style-index.css" type="text/css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <script type="text/javascript" src="semantic/out/semantic.js"></script>
    <script type="text/javascript" src="js/jquery.scrollme.js"></script>

    <style type="text/css">
        body {
            background-color: #E8E8E8;
        }

        body > .grid {
            height: 100%;
        }

        .content-image {
            padding: 20px 0;
        }

        .image {
            height: 80px;
        }

        .column {
            max-width: 450px;
        }
    </style>
    <script>
        $(document)
            .ready(function () {
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
            })
        ;
    </script>
</head>
<body>
<br>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <div class="ui raised padded segment">
            <a href="/">
                <div class="content-image">
                    <img src="images/logo.png" class="image">
                </div>
            </a>
            {!!Form::open(['route'=>'user.store', 'method'=> 'POST', 'class'=>'ui form'])!!}
            <div class="ui field">
                <div class="ui left icon input">
                    <i class="user icon"></i>

                    {!!Form::text('username', null, ['type' => 'text', 'placeholder' => 'Nombre completo'])!!}
                </div>
            </div>
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

            {!!Form::submit('Registrar', ['class'=>'ui fluid primary large submit button', 'style'=>'background-color: #96407A;'])!!}
            <div class="ui error message"></div>
            @if($existe == 1)
                <div class="ui error message" style="display: block;">
                    <ul class="list">
                        <li>Este correo ya está registrado</li>
                    </ul>
                </div>
            @endif
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
        <div class="ui  message">
            ¿Ya tienes cuanta? <a href="login">Ingresa aquí</a>
        </div>
    </div>
</div>
</body>

</html>
