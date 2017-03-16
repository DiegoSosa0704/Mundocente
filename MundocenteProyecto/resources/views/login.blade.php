<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="images/icono.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login - Mundocente</title>
    {!!Html::style('semantic/out/semantic.css')!!}
    {!!Html::style('css/style-index.css')!!}
    {!!Html::style('css/scrollbar.css')!!}


    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/ScrollMagic.min.js')!!}
    {!!Html::script('js/init.js')!!}
    {!!Html::script('semantic/out/semantic.js')!!}
    {!!Html::script('js/jquery.scrollme.js')!!}

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
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Ingresar correo'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'El correo no es válido'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Ingresar contraseña'
                                    },
                                    {
                                        type: 'length[6]',
                                        prompt: 'La contraseña debe tener mínimo 6 caracteres'
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
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <div class="ui raised padded segment">
            <a href="/">
                <div class="content-image">
                    <img src="images/logo.png" class="image">
                </div>
            </a>
            {!!Form::open(['route'=>'session.store', 'method'=> 'POST', 'class'=>'ui form'])!!}
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
        <div class="ui  message">
            ¿No está registrado? <a href="signup">Registrarse</a>
        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    
      $('.ui.checkbox')
          .checkbox()
        ;
        
        
</script>

</html>
