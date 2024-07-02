<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal de Ocorrências</title>

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
                <a class="navbar-brand" href="{{ url('#') }}">
                    @elseif(Session::get('perfil') == 5)
                        <a class="navbar-brand" href="{{ url('/parceiro/fechado') }}">
                            @elseif(Session::get('perfil') == 6)
                                <a class="navbar-brand" href="{{ url('/contestacao') }}">
                                    @else
                                        <a class="navbar-brand" href="{{ url('#') }}">
                                            @endif
                                            <image class="imagem" src="/img/smi_logo.png" height="41" width="140"></image>
                                            <div class="nomeportal">Portal de Ocorrências</div>
                                        </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @if(Session::get('perfil') == 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Home<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
                        </ul>
                    </li>
                @endif

                @if(Session::get('perfil') == 2)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Home<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/cliente/home') }}"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
                        </ul>
                        </li>
                @endif
            </ul>




            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @if(Session::get('perfil') == 1
                        || Session::get('perfil') == 2
                        )

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Ocorrências<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Session::get('perfil') == 1)
                                    <li><a href="{{ url('/ocorrencia') }}"><i class="glyphicon glyphicon-inbox"></i> Cadastro - Ocorrências</a></li>
                                    <li><a href="{{ url('/ocorrencia/consulta') }}"><i class="glyphicon glyphicon-list-alt"></i> Consulta - Ocorrências</a></li>
                                @endif

                                    @if(Session::get('perfil') == 2)
                                        <li><a href="{{ url('/cliente/abertas') }}"><i class="glyphicon glyphicon-inbox"></i> Classificar / Feedback</a></li>
                                        <li><a href="{{ url('/cliente/ocorrencias') }}"><i class="glyphicon glyphicon-list-alt"></i> Consultas </a></li>
                                    @endif
                            </ul>
                        </li>

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

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Relatórios<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Session::get('perfil') == 1 )
                                <li><a href="{{ url('/ocorrencia/dash') }}"><i class="glyphicon glyphicon-signal"></i> Resumo Ocorrências</a></li>
                                <li><a href="{{ url('#') }}"><i class="glyphicon glyphicon-file"></i> Feedbacks</a></li>
                            @endif

                                @if(Session::get('perfil') == 2 )
                                    <li><a href="{{ url('/cliente/dash') }}"><i class="glyphicon glyphicon-signal"></i> Resumo Ocorrências</a></li>
                                    <li><a href="{{ url('#') }}"><i class="glyphicon glyphicon-file"></i> Feedbacks</a></li>
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
                                @if(Session::get('perfil') == 1)
                                    <li><a href="{{ url('/cliente/lista') }}"><i class="glyphicon glyphicon-blackboard"></i> Clientes</a></li>
                                    <li><a href="{{ url('cliente/equipamentos') }}"><i class="glyphicon glyphicon-scale"></i> Equipamentos</a></li>
                                    <li><a href="{{ url('/registrar') }}"><i class="glyphicon glyphicon-user"></i> Cadastro Usuários</a></li>
                                    <li><a href="{{ url('/editar') }}"><i class="glyphicon glyphicon-user"></i> Editar Usuários</a></li>
                                @endif
                                    @if(Session::get('perfil') == 2)
                                        <li><a href="{{ url('cliente/cliente/equipamentos') }}"><i class="glyphicon glyphicon-scale"></i> Equipamentos</a></li>
                                    @endif
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>

        @endif


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
                            <li><a href="{{ url('#') }}"><i class="fa fa-file-excel-o"></i> Esportar Base</a></li>
                        </ul>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('#') }}"><i class="fa fa-file-excel-o"></i> Esportar Base</a></li>
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

<script>
    let elemento_options = document.querySelectorAll('select[multiple] option');

    elemento_options.forEach(function(elemento, index) {
        elemento.addEventListener("mousedown", option_handler)
    });

    function option_handler(e) {
        e.preventDefault();
        e.target.selected = !e.target.selected;
    }
</script>

<script type="text/javascript">

    //inicio selects desgasterolamentos
    function selectmostraDiv(valor) {
        if (valor == "A2" || valor == "A3") {
            document.getElementById("selecthiddenDiv").style.display = "block";
            document.getElementById("selecthiddenDiv1").style.display = "none";
            document.getElementById("selecthiddenDiv2").style.display = "none";
            document.getElementById("selecthiddenDiv3").style.display = "none";
        }

        else if (valor == "A1" || valor == "Alarme") {
            document.getElementById("selecthiddenDiv").style.display = "none";
            document.getElementById("selecthiddenDiv1").style.display = "block";
            document.getElementById("selecthiddenDiv2").style.display = "none";
            document.getElementById("selecthiddenDiv3").style.display = "none";

        }

    }//fim selects desgasterolamentos

    //inicio selects desgasterolamentos
    function selectmostraDivb(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDivb").style.display = "block";
            document.getElementById("selecthiddenDiv1b").style.display = "none";
            document.getElementById("selecthiddenDiv2b").style.display = "none";
            document.getElementById("selecthiddenDiv3b").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDivb").style.display = "none";
            document.getElementById("selecthiddenDiv1b").style.display = "block";
            document.getElementById("selecthiddenDiv2b").style.display = "none";
            document.getElementById("selecthiddenDiv3b").style.display = "none";

        }
    }//fim selects desgasterolamentos

    //inicio selects Desalinhamento
    function selectmostraDivc(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDivc").style.display = "block";
            document.getElementById("selecthiddenDiv1c").style.display = "none";
            document.getElementById("selecthiddenDiv2c").style.display = "none";
            document.getElementById("selecthiddenDiv3c").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDivc").style.display = "none";
            document.getElementById("selecthiddenDiv1c").style.display = "block";
            document.getElementById("selecthiddenDiv2c").style.display = "none";
            document.getElementById("selecthiddenDiv3c").style.display = "none";

        }
    }//fim selects Desalinhamento

    //inicio selects Sistema de Transmissão
    function selectmostraDivd(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDivd").style.display = "block";
            document.getElementById("selecthiddenDiv1d").style.display = "none";
            document.getElementById("selecthiddenDiv2d").style.display = "none";
            document.getElementById("selecthiddenDiv3d").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDivd").style.display = "none";
            document.getElementById("selecthiddenDiv1d").style.display = "block";
            document.getElementById("selecthiddenDiv2d").style.display = "none";
            document.getElementById("selecthiddenDiv3d").style.display = "none";

        }
    }//fim selects Sistema de Transmissão

    //inicio selects Folgas/Desgastes
    function selectmostraDive(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDive").style.display = "block";
            document.getElementById("selecthiddenDiv1e").style.display = "none";
            document.getElementById("selecthiddenDiv2e").style.display = "none";
            document.getElementById("selecthiddenDiv3e").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDive").style.display = "none";
            document.getElementById("selecthiddenDiv1e").style.display = "block";
            document.getElementById("selecthiddenDiv2e").style.display = "none";
            document.getElementById("selecthiddenDiv3e").style.display = "none";

        }
    }//fim selects Folgas/Desgastes

    //inicio selects Rigidez/Fixação
    function selectmostraDivf(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDivf").style.display = "block";
            document.getElementById("selecthiddenDiv1f").style.display = "none";
            document.getElementById("selecthiddenDiv2f").style.display = "none";
            document.getElementById("selecthiddenDiv3f").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDivf").style.display = "none";
            document.getElementById("selecthiddenDiv1f").style.display = "block";
            document.getElementById("selecthiddenDiv2f").style.display = "none";
            document.getElementById("selecthiddenDiv3f").style.display = "none";

        }
    }//fim selects Rigidez/Fixação


    //inicio selects Lubrificação Deficiente
    function selectmostraDivg(valor)
    {
        if(valor == "A2" || valor == "A3")
        {
            document.getElementById("selecthiddenDivg").style.display = "block";
            document.getElementById("selecthiddenDiv1g").style.display = "none";
            document.getElementById("selecthiddenDiv2g").style.display = "none";
            document.getElementById("selecthiddenDiv3g").style.display = "none";
        }

        else if(valor == "A1" || valor == "Alarme")
        {
            document.getElementById("selecthiddenDivg").style.display = "none";
            document.getElementById("selecthiddenDiv1g").style.display = "block";
            document.getElementById("selecthiddenDiv2g").style.display = "none";
            document.getElementById("selecthiddenDiv3g").style.display = "none";

        }
    }//fim selects Lubrificação Deficiente


</script>


<script type="text/javascript">

    //selects desgasterolamentos
    function mostraDiv(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }



    }

    function mostraDiv1(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }
    }

    function mostraDiv2(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }
    }

    function mostraDiv3(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }
    }

    function mostraDiv4(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }
    }


    function mostraDiv5(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }
    }

    function mostraDiv6(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDiv").style.display = "block";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "block";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "block";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "block";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "block";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "block";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "block";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "block";
            document.getElementById("hiddenDiv8").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDiv").style.display = "none";
            document.getElementById("hiddenDiv1").style.display = "none";
            document.getElementById("hiddenDiv2").style.display = "none";
            document.getElementById("hiddenDiv3").style.display = "none";
            document.getElementById("hiddenDiv4").style.display = "none";
            document.getElementById("hiddenDiv5").style.display = "none";
            document.getElementById("hiddenDiv6").style.display = "none";
            document.getElementById("hiddenDiv7").style.display = "none";
            document.getElementById("hiddenDiv8").style.display = "block";
        }

    }//fim selects desgasterolamentos



    //inicio selects desbalanceamento
    function mostraDivb(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }



    }

    function mostraDiv1b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }
    }

    function mostraDiv2b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }
    }

    function mostraDiv3b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }
    }

    function mostraDiv4b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }
    }


    function mostraDiv5b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }
    }

    function mostraDiv6b(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivb").style.display = "block";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "block";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "block";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "block";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "block";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "block";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "block";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "block";
            document.getElementById("hiddenDiv8b").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivb").style.display = "none";
            document.getElementById("hiddenDiv1b").style.display = "none";
            document.getElementById("hiddenDiv2b").style.display = "none";
            document.getElementById("hiddenDiv3b").style.display = "none";
            document.getElementById("hiddenDiv4b").style.display = "none";
            document.getElementById("hiddenDiv5b").style.display = "none";
            document.getElementById("hiddenDiv6b").style.display = "none";
            document.getElementById("hiddenDiv7b").style.display = "none";
            document.getElementById("hiddenDiv8b").style.display = "block";
        }

    } //fim selects desbalanceamento



    //inicio selects desalinhamento
    function mostraDivc(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }



    }

    function mostraDiv1c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }
    }

    function mostraDiv2c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }
    }

    function mostraDiv3c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }
    }

    function mostraDiv4c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }
    }


    function mostraDiv5c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }
    }

    function mostraDiv6c(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivc").style.display = "block";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "block";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "block";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "block";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "block";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "block";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "block";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "block";
            document.getElementById("hiddenDiv8c").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivc").style.display = "none";
            document.getElementById("hiddenDiv1c").style.display = "none";
            document.getElementById("hiddenDiv2c").style.display = "none";
            document.getElementById("hiddenDiv3c").style.display = "none";
            document.getElementById("hiddenDiv4c").style.display = "none";
            document.getElementById("hiddenDiv5c").style.display = "none";
            document.getElementById("hiddenDiv6c").style.display = "none";
            document.getElementById("hiddenDiv7c").style.display = "none";
            document.getElementById("hiddenDiv8c").style.display = "block";
        }

    } //fim selects desalinhamento

    //inicio selects Sistema de Transmissão
    function mostraDivd(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }



    }

    function mostraDiv1d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }
    }

    function mostraDiv2d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }
    }

    function mostraDiv3d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }
    }

    function mostraDiv4d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }
    }


    function mostraDiv5d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }
    }

    function mostraDiv6d(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivd").style.display = "block";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "block";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "block";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "block";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "block";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "block";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "block";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "block";
            document.getElementById("hiddenDiv8d").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivd").style.display = "none";
            document.getElementById("hiddenDiv1d").style.display = "none";
            document.getElementById("hiddenDiv2d").style.display = "none";
            document.getElementById("hiddenDiv3d").style.display = "none";
            document.getElementById("hiddenDiv4d").style.display = "none";
            document.getElementById("hiddenDiv5d").style.display = "none";
            document.getElementById("hiddenDiv6d").style.display = "none";
            document.getElementById("hiddenDiv7d").style.display = "none";
            document.getElementById("hiddenDiv8d").style.display = "block";
        }

    } //fim selects Sistema de Transmissão


    //inicio selects Folgas/Desgastes
    function mostraDive(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }



    }

    function mostraDiv1e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }
    }

    function mostraDiv2e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }
    }

    function mostraDiv3e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }
    }

    function mostraDiv4e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }
    }


    function mostraDiv5e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }
    }

    function mostraDiv6e(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDive").style.display = "block";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "block";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "block";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "block";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "block";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "block";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "block";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "block";
            document.getElementById("hiddenDiv8e").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDive").style.display = "none";
            document.getElementById("hiddenDiv1e").style.display = "none";
            document.getElementById("hiddenDiv2e").style.display = "none";
            document.getElementById("hiddenDiv3e").style.display = "none";
            document.getElementById("hiddenDiv4e").style.display = "none";
            document.getElementById("hiddenDiv5e").style.display = "none";
            document.getElementById("hiddenDiv6e").style.display = "none";
            document.getElementById("hiddenDiv7e").style.display = "none";
            document.getElementById("hiddenDiv8e").style.display = "block";
        }

    } //fim selects Folgas/Desgastes


    //inicio selects Rigidez/Fixação
    function mostraDivf(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }



    }

    function mostraDiv1f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }
    }

    function mostraDiv2f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }
    }

    function mostraDiv3f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }
    }

    function mostraDiv4f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }
    }


    function mostraDiv5f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }
    }

    function mostraDiv6f(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivf").style.display = "block";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "block";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "block";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "block";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "block";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "block";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "block";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "block";
            document.getElementById("hiddenDiv8f").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivf").style.display = "none";
            document.getElementById("hiddenDiv1f").style.display = "none";
            document.getElementById("hiddenDiv2f").style.display = "none";
            document.getElementById("hiddenDiv3f").style.display = "none";
            document.getElementById("hiddenDiv4f").style.display = "none";
            document.getElementById("hiddenDiv5f").style.display = "none";
            document.getElementById("hiddenDiv6f").style.display = "none";
            document.getElementById("hiddenDiv7f").style.display = "none";
            document.getElementById("hiddenDiv8f").style.display = "block";
        }

    } //fim selects Rigidez/Fixação


    //inicio selects Lubrificação Deficiente
    function mostraDivg(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }



    }

    function mostraDiv1g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }
    }

    function mostraDiv2g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }
    }

    function mostraDiv3g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }
    }

    function mostraDiv4g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }
    }


    function mostraDiv5g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }
    }

    function mostraDiv6g(valor)
    {
        if(valor == "Alarme")
        {
            document.getElementById("hiddenDivg").style.display = "block";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "1")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "block";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "2")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "block";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }

        else if(valor == "3")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "block";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "4")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "block";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "5")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "block";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "6")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "block";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "7")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "block";
            document.getElementById("hiddenDiv8g").style.display = "none";
        }
        else if(valor == "8")
        {
            document.getElementById("hiddenDivg").style.display = "none";
            document.getElementById("hiddenDiv1g").style.display = "none";
            document.getElementById("hiddenDiv2g").style.display = "none";
            document.getElementById("hiddenDiv3g").style.display = "none";
            document.getElementById("hiddenDiv4g").style.display = "none";
            document.getElementById("hiddenDiv5g").style.display = "none";
            document.getElementById("hiddenDiv6g").style.display = "none";
            document.getElementById("hiddenDiv7g").style.display = "none";
            document.getElementById("hiddenDiv8g").style.display = "block";
        }

    } //fim selects Lubrificação Deficiente


</script>

<script>
    function HoraMinuto(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
        campo = eval (objeto);
        /*if (campo.value == '00:00')
        {
        campo.value=""
        }*/

        caracteres = '0123456789';
        separacao3 = ':';
        conjunto3 = 2;

        if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
        {
            if (campo.value.length == conjunto3)
                campo.value = campo.value + separacao3;
        }
        else
            event.returnValue = false;
    }
</script>

<script language="javascript">
    function moeda(a, e, r, t) {
        let n = ""
            , h = j = 0
            , u = tamanho2 = 0
            , l = ajd2 = ""
            , o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
                 h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
        for (l = ""; h < u; h++)
            -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "0" + r + "0" + l),
        2 == u && (a.value = "0" + r + l),
        u > 2) {
            for (ajd2 = "",
                     j = 0,
                     h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                    j = 0),
                    ajd2 += l.charAt(h),
                    j++;
            for (a.value = "",
                     tamanho2 = ajd2.length,
                     h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
</script>


</body>

</html>
