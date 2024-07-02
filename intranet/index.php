<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Lauro Pereira" />
    <link rel="StyleSheet" href="empreza.css" type="text/css" />
    <title>INTRANET</title>
</head>

<body onload="startTime(),limitaImagens(),mudaBanner(),identificaBrowser()">
    <div id="log">
        <?php if (!isset($_COOKIE['login'])) {
                    include "inicio/nao_logado.php";
                } else {
                    include "inicio/logado.php";
                } ?>
    </div>
    <?php include "data.php";
    //Inicia variaveis func e set, para o gerenciamento de telas.
    if (!isset($func)) {
        $func = '';
    }
    if (!isset($set)) {
        $set = 'home';
    }
    if ($func != "HP" && $func != "not" && $func != "") {
        $set = '';
    }
    if (!isset($id_evento)) {
        $id_evento = "";
    }
    if (!isset($id_feed)) {
        $id_feed = "";
    }
    if (!isset($id_usuario)) {
        $id_usuario = "";
    }
    if (!isset($_COOKIE['nome'])) {
        $us_logado = "visitante";
    } else {
        $us_logado = $_COOKIE['nome'];
    } ?>
    
    <div id="corpo_esq">
    <div id="boas_vindas">
        <p>
        Ol&#225; <strong><?php echo $us_logado; ?></strong>
        <br />
        Hoje &#233; <?php echo "$datadia de $mesano[$mes] de $dataano. <br /> ($diasemana[$dia])"; ?>
        - <span id="txt"></span></p>
    </div>
    
    <br />
    <hr />
    <div id="barramenu">
        <ul>
            <li <?php if ($set == 'home') {
                echo "class='selected'";
            } ?>><a href="index.php?set=home">Home</a></li>

            <li <?php if ($set == 'NT') {
                echo "class='selected'";
            } ?>><a href="index.php?set=NT&amp;func=not">Not&#237;cias</a></li>

            <li <?php if ($set == 'PR') {
                echo "class='selected'";
            } ?>><a href="index.php?set=PR&amp;func=not">Procedimentos</a></li>

            <li <?php if ($set == 'RH') {
                echo "class='selected'";
            } ?>><a href="index.php?set=RH&amp;func=not">Recursos Humanos</a></li>

            <li <?php if ($set == 'LD') {
                echo "class='selected'";
            } ?>><a href="index.php?set=LD&amp;func=not">Lideran&#231;a</a></li>

            <li <?php if ($set == 'HP') {
                echo "class='selected'";
            } ?>><a href="index.php?set=HP&amp;func=HP">Ajuda</a></li>
        </ul>
    </div>
    <br />
    <hr />
    <div id="prev_tempo">
        <iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" 
        scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=237&amp;w=h&amp;c=8c7c54&amp;f=ffffff" 
        height="205px" width="215px"></iframe>
        <noscript>Previs&#227;o de 
            <font>Porto Alegre/RS oferecido por CPTEC/INPE </font>
        </noscript>
    </div>
    <hr />
    </div><?php
    include "bd.php"; ?>

    <div id="corpo_cen">
        <?php
        switch ($func) {
            case "add_event":
                if (isset($_COOKIE['login'])) {
                    include "evento/evento.php";
                    break;
                } else {
                    $func = "";
                }
            case "my_event":
                if (isset($_COOKIE['login'])) {
                    include "evento/meus_eventos.php";
                    break;
                } else {
                    $func = "";
                }
            case "edit_event":
                if (isset($_COOKIE['login'])) {
                    include "evento/edita_evento.php";
                    break;
                } else {
                    $func = "";
                }
            case "exc_event":
                if (isset($_COOKIE['login'])) {
                    include "evento/exc_evento.php";
                    break;
                } else {
                    $func = "";
                }
            case "add_feed":
                if (isset($_COOKIE['login'])) {
                    include "feed/feed.php";
                    break;
                } else {
                    $func = "";
                }
            case "feed":
                include "inicio/noticias2.php";
                break;
            case "edit_feed":
                include "feed/edita_feed.php";
                break;
            case "exc_feed":
                include "feed/exc_feed.php";
                break;
            case "adm_user":
                include "usuarios/usuarios.php";
                break;
            case "add_user":
                include "usuarios/add_usuario.php";
                break;
            case "edit_user":
                include "usuarios/edita_usuario.php";
                break;
            case "exc_user":
                include "usuarios/exc_usuario.php";
                break;
            case "reset":
                include "solicitacao_login/rec_senha.php";
                break;
            case "password":
                include "solicitacao_login/altera_senha.php";
                break;
            case "pesq":
                include "inicio/pesquisa_feed.php";
                break;
            case "pesq_det":
                include "inicio/pesquisa_detalhada.php";
                break;
            case "HP":
                include "inicio/help.php";
                break;
            case "not":
                include "inicio/noticias.php";
                break;

            default:
                echo "<center><h1 style=\"font-style:italic\">Ultimos destaques</h1></center>";
                echo "<div id=\"div_menu\">
                  	   <ul>
                        <li id='menuNT' onclick=\"quebraFluxo(0)\"><strong><a href='#'>Not&iacute;cias</a></strong></li>
                        <li id='menuPR' onclick=\"quebraFluxo(1)\"><strong><a href='#'>Procedimentos</a></strong></li>
                	    <li id='menuRH' onclick=\"quebraFluxo(2)\"><strong><a href='#'>Recursos Humanos</a></strong></li>
                    	<li id='menuLD' onclick=\"quebraFluxo(3)\"><strong><a href='#'>Lideran&ccedil;a</a></strong></li>
                	   </ul>
                      </div>
                      ";
                echo "<br /><br /><div id='div_dest'></div>";
                break;
        }
    ?>
    </div>
    <div id="corpo_dir">
        <?php
        include "inicio/calendario.php";
        ?>
        <br />
        <hr />
        <div id="pesquisa">
            <h2>Campo de busca:</h2>
            <form action="index.php?func=pesq&pesquisa=normal" method="post">
                Pesquisar feed pelo texto: 
                <input class="c2" onblur="setcookie('sql_pesquisa',$sql);" align="left" type="text" id="assunto" name="assunto" />
                <input type="hidden" name="pesquisa" value="normal" />
                <input type="submit" value="buscar" />
                <br />
                <a href="index.php?func=pesq_det">Pesquisa detalhada</a>
            </form>
        </div>
    <hr />
    </div>
    <script type="text/javascript" src="script/functions.js" ></script>
    <script type="text/javascript" src="script/prototype.js" ></script>
    <script type="text/javascript" src="script/scriptaculous.js" ></script>
</body>
</html>
