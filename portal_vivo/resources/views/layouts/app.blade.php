<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Portal de Atendimento</title>

    <!-- incone -->
   <!-- <link rel="shortcut icon" href="img/vivo7.jpg" type="image/x-icon" height="25" width="50"/>-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <!--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/fontlato.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">-->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">-->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout" class="box">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                @if(Session::get('perfil') == 1
                    || Session::get('perfil') == 2
                    || Session::get('perfil') == 3
                    || Session::get('perfil') == 4
                    || Session::get('perfil') == 7)
                    <a class="navbar-brand" href="{{ url('/') }}">
                @elseif(Session::get('perfil') == 5)
                     <a class="navbar-brand" href="{{ url('/parceiro/fechado') }}">
                @elseif(Session::get('perfil') == 6)
                     <a class="navbar-brand" href="{{ url('/contestacao') }}">
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                @endif
                   <image class="imagem" src="/img/vivo10.png" height="45" width="90"></image>
                <div class="nomeportal">Portal de Atendimento Massivo</div>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if(Session::get('perfil') == 1
                        || Session::get('perfil') == 2
                        || Session::get('perfil') == 3
                        || Session::get('perfil') == 4
                        || Session::get('perfil') == 5
                        || Session::get('perfil') == 6
                        || Session::get('perfil') == 7)

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Home<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Session::get('perfil') == 1
                                    || Session::get('perfil') == 2
                                    || Session::get('perfil') == 3
                                    || Session::get('perfil') == 4
                                    || Session::get('perfil') == 7)
                                    <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
                                @endif
                                @if(Session::get('perfil') == 5)
                                     <li><a href="{{ url('/parceiro/fechado') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
                                @endif
                                    @if(Session::get('perfil') == 6)
                                        <li><a href="{{ url('/contestacao') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
                                    @endif

                            </ul>
                        </li>
                    @endif
                </ul>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if(Session::get('perfil') == 1
                        || Session::get('perfil') == 2
                        || Session::get('perfil') == 3
                        || Session::get('perfil') == 4
                        || Session::get('perfil') == 5
                        || Session::get('perfil') == 6
                        || Session::get('perfil') == 7)

                        @if(Session::get('perfil') == 5)
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Protocolo<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/parceiro') }}"><i class="glyphicon glyphicon-inbox"></i> Protocolo - Abertos</a></li>
                                <li><a href="{{ url('/parceiro/fechado') }}"><i class="glyphicon glyphicon-inbox"></i> Protocolo - Fechados</a></li>
                            </ul>
                        </li>
                        @endif
                            @if(Session::get('perfil') == 6 || Session::get('perfil') == 7 || Session::get('perfil') == 1)
                                <li class="dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Protocolo<span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        @if(Session::get('perfil') == 6)
                                        <li><a href="{{ url('/contestacao') }}"><i class="glyphicon glyphicon-inbox"></i> Protocolo - Abertos</a></li>
                                        <li><a href="{{ url('/contestacao/fechado') }}"><i class="glyphicon glyphicon-inbox"></i> Protocolo - Fechados</a></li>
                                        @endif
                                        @if(Session::get('perfil') == 1 || Session::get('perfil') == 7 )
                                        <li><a href="{{ url('/contestacao/fechado_sup') }}"><i class="glyphicon glyphicon-inbox"></i> Protocolo - Fechados para Correção</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                </ul>


              <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if(Session::get('perfil') == 1
                    || Session::get('perfil') == 2
                    || Session::get('perfil') == 3
                    || Session::get('perfil') == 4
                    || Session::get('perfil') == 5
                    || Session::get('perfil') == 6
                    || Session::get('perfil') == 7 )

                        @if(Session::get('perfil') != 5
                         && Session::get('perfil') != 6 )
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Registrar<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                             @if(Session::get('perfil') == 1
                                || Session::get('perfil') == 2
                                || Session::get('perfil') == 3
                                || Session::get('perfil') == 4 )
                               <li><a href="{{ url('/registrar_parceiro') }}"><i class="glyphicon glyphicon-user"></i> Usuário Parceiro</a></li>
                               <li><a href="{{ url('/registrar_telefonica') }}"><i class="glyphicon glyphicon-user"></i> Usuário Telefônica</a></li>
                             @endif
                             @if(Session::get('perfil') == 1
                                    || Session::get('perfil') == 7 )
                               <li><a href="{{ url('/registrar_contestacao') }}"><i class="glyphicon glyphicon-user"></i> Usuário Contestação</a></li>
                             @endif
                                 @if(Session::get('perfil') == 1
                                    || Session::get('perfil') == 2
                                    || Session::get('perfil') == 3
                                    || Session::get('perfil') == 4 )
                                 <li><a href="{{ url('#') }}"><i class="
glyphicon glyphicon-upload"></i> Massivamente</a></li>
                                 @endif
                            </ul>
                        </li>
                        @endif
                    @endif
                </ul>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                            @if(Session::get('perfil') == 1
                                || Session::get('perfil') == 2
                                || Session::get('perfil') == 3
                                || Session::get('perfil') == 4
                                || Session::get('perfil') == 5)
                                <li class="dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Alterações<span class="caret"></span>
                                    </a>
                                    @if(Session::get('perfil') == 5)
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/parceiro/email_alterar/') }}"><i class="glyphicon glyphicon-globe"></i> Alterar - E-mail parceiro</a></li>
                                        </ul>
                                    @endif

                                    @if(Session::get('perfil') == 1
                                        || Session::get('perfil') == 2
                                        || Session::get('perfil') == 3
                                        || Session::get('perfil') == 4)
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/email_alterar/') }}"><i class="glyphicon glyphicon-globe"></i> Alterar - E-mail parceiro</a></li>
                                        </ul>
                                    @endif

                                </li>
                            @endif

                    @endif
                </ul>




                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if(Session::get('perfil') == 1
                    || Session::get('perfil') == 2
                    || Session::get('perfil') == 3
                    || Session::get('perfil') == 4
                    || Session::get('perfil') == 7
                    || Session::get('perfil') == 5
                    || Session::get('perfil') == 6)

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Exportar<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/exportar') }}"><i class="fa fa-file-excel-o"></i> Esportar Base</a></li>
                                </ul>
                            </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Session::get('perfil') == 1
                    || Session::get('perfil') == 2
                    || Session::get('perfil') == 3
                    || Session::get('perfil') == 4
                    || Session::get('perfil') == 5
                    || Session::get('perfil') == 6
                    || Session::get('perfil') == 7)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Session::get('nome') }}<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <!-- para filtrar motivos e submotivos -->
    {!! Html::script('js/jquery-2.1.0.min.js') !!}
    {!! Html::script('js/dropdown.js') !!}

    <!-- mascara cpf/cnpj -->
   <script>
     function formatarCampo(campoTexto) {
        if (campoTexto.value.length <= 11) {
            campoTexto.value = mascaraCpf(campoTexto.value);
        } else {
            campoTexto.value = mascaraCnpj(campoTexto.value);
        }
     }
     function retirarFormatacao(campoTexto) {
        campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
     }
     function mascaraCpf(valor) {
        return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
     }
     function mascaraCnpj(valor) {
        return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
     }
   </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>

    <script>
        $(function() {
            $("#opcao").click(function () {
                $(".esconder").slideToggle("500");
                var x = $("#opcao").text();

                if (x === "Esconder"){
                    $("#opcao").html("Mostrar");
                }
            else if (x === "Mostrar"){
                    $("#opcao").html("Esconder");
                }
            });
        });
    </script>

    <script>
        $(function() {
            $("#opcao2").click(function () {
                $(".esconder2").slideToggle("500");
                var x = $("#opcao2").text();

                if (x === "Esconder2"){
                    $("#opcao2").html("Mostrar2");
                }
                else if (x === "Mostrar2"){
                    $("#opcao2").html("Esconder2");
                }
            });
        });
    </script>

    <script>
        $(function() {
            $("#opcao3").click(function () {
                $(".esconder3").slideToggle("500");
                var x = $("#opcao3").text();

                if (x === "Esconder3"){
                    $("#opcao3").html("Mostrar3");
                }
                else if (x === "Mostrar3"){
                    $("#opcao3").html("Esconder3");
                }
            });
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


    <script>
        $(function () {
            $('#datetimepicker5').datetimepicker({
                /*defaultDate: "11/1/2013",*/
                format:"DD/MM/YYYY",
                locale: 'pt-br'
            });
        });
    </script>

    <script>
        $(function () {
            $('#datetimepicker5b').datetimepicker({
                /*defaultDate: "11/1/2013",*/
                format:"DD/MM/YYYY",
                locale: 'pt-br'
            });
        });
    </script>


</body>

</html>
