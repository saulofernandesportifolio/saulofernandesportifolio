<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal de Atendimento</title>

    <!-- incone -->
    <link rel="shortcut icon" href="img/vivo7.jpg" type="image/x-icon" height="25" width="50"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body,a,li {
            font-family: 'Lato';
            font-color: #fff;

        }

        .fa-btn {
            margin-right: 6px;
        }

        /* barra de menu principal */
        .navbar-default {
            background: #337ab7;
            border: 1px solid #337ab7;
            font-family: 'Lato';
            font-size: 14px;

        }

        /* elemento que tem o nome "MeuSite" */
        .navbar-default .navbar-brand,
        .navbar-default .navbar-brand>a:focus{
            color: #fff;
        }

        /* item de menu quando tiver selecionado */
        .navbar-default .navbar-toggle{
            color: #fff;

        }

        /* item de menu quando tiver selecionado */
        .navbar-default .navbar-nav>.active>a,
        .navbar-default .navbar-nav>.active>a:hover,
        .navbar-default .navbar-nav>.active>a:focus {
            color: #fff;
            background-color: #337ab7;
        }

        /* item de menu */
        .navbar-default .navbar-nav>li>a {
            color: #fff;
        }

        /* mouse over no item de menu */
        .navbar-default .navbar-nav>li>a:hover,
        .navbar-default .navbar-nav>li>a:focus {
            color: #fff;
            background-color: transparent;
        }

        /* item de menu dropdown quando tiver aberto */
        .navbar-default .navbar-nav>.open>a,
        .navbar-default .navbar-nav>.open>a:hover,
        .navbar-default .navbar-nav>.open>a:focus {
            color: #fff;
            background-color: #337ab7;

        }
        .sr-only{

            color: #fff;

        }
        .imagem{

            margin-top: -10px;
            margin-left: -10px;

        }

        .nomeportal{

            margin-top: -20px;
            margin-left: 100px;
            color: #fff;
        }

        .panel{

            background-color: #337ab7;
        }

        .panel-body{

            background-color: #fff;
        }
        .panel-heading{
            color:#fff;
        }


        .margem-top-20{

            margin-top:20px;

        }

        .titulo-erro{

            font-weght:bolder;
            color:black;

        }
        .img3{

            margin-top: auto;
            margin-right: auto;
            position: relative;

        }
        .img3home{

            margin-top: auto;
            margin-right: auto;
            position: relative;

        }
    </style>
</head>
<body id="app-layout">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Alteração de Status do Protocolo <strong>{{ $protocolo }}</strong></div>

                <div class="panel-body">

                        <div class="form-group">
                             <div class="col-md-6">
                             Este e-mail foi-lhe enviado por terem alterado os status do protocolo referido neste e-mail.
                             </div>
                        </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            Protocolo: <strong>{{ $protocolo }}</strong>
                        </div>
                    </div>
                        <div class="form-group">
                             <div class="col-md-6">
                              Status Atual: <strong>{{ $status }}</strong>
                             </div>
                       </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            Abaixo link para acesso ao site Portal Atendimento, acesse o sistema caso queira verificar a alteração.
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                           <h3>Link: {{ $linksis }}</h3>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
