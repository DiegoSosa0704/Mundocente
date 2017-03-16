<!DOCTYPE html>
<html>
    <head>
        <title>Mundocente</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 50px;
                margin-bottom: 40px;
            }
            .button {
            border: none;
            background: #A54686;
            color: #f2f2f2;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            position: relative;
            box-sizing: border-box;
            transition: all 500ms ease;
            text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="https://scontent-mia1-2.xx.fbcdn.net/v/t1.0-9/12346425_448898681983077_8392152602814686152_n.jpg?oh=26bf00533df3ec281c6158e6084f9fe6&oe=594AE197" width="100" height="100">
                <div class="title">Hola {{$nombre}}, Te damos la bienvenida a mundocente</div>
            </div>
            <p></p>
            <a class="button" href="http://mundocente.co/publicaciones" class="button blue">Ir a Mundocente</a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </body>
</html>
