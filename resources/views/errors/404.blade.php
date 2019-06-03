<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Página não encontrada - 404.</title>
        <link rel="shortcut icon" href="{{url('img/favicon.ico')}}"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #757575;
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
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <a href="{{ url() }}"><img src="{{ url('img/nova_logo.png') }}" width="400px"></a>
                <div class="title">Pagina não Encontrada.</div>
                <a href="{{ url() }}"><h3>Voltar para a pagina Inicial</h3></a>
            </div>
        </div>
    </body>
</html>
