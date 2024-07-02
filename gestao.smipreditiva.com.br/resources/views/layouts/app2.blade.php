<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SMI - Painel Gerencial </title>

    <!-- incone -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ url('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ url('js/demo/chart-area-demo.js') }}"></script>



    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css') }}">




</head>
<body>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Finalizar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Finalizar sessão?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('/logout') }}">Sim</a>
            </div>
        </div>
    </div>
</div>

@if (isset($ocorrencia))

<!-- Exclusao-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Confirmar a exclusão do registro?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('/ocorrencia/deletar/'.$ocorrencia->id) }}">Sim</a>
            </div>
        </div>
    </div>
</div>
<!-- Atualizar data-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Confirmar a exclusão do registro?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('/ocorrencia/deletar/'.$ocorrencia->id) }}">Sim</a>
            </div>
        </div>
    </div>
</div>
@endif


@section('sidebar')

@show

<div class="container">
    @yield('content')
</div>

    <!-- Mascaras e funções -->
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


    <script type='text/javascript'>
        //efetua a busca dos camos conforme tg bdigitada
        $(document).ready(function(){
            $("select[name='tag']").blur(function(){
                var $setor = $("input[name='setor']");
                var $equipamento = $("input[name='equipamento']");
                var $potencia = $("input[name='potencia']");
                var $rpm = $("input[name='rpm']");
                $.getJSON(`/ocorrencia/funcition/${
                    $(this).val()
                    }`,function( json ){
                    $setor.val( json.setor );
                    $equipamento.val( json.equipamento );
                    $potencia.val( json.potencia );
                    $rpm.val( json.rpm );
                });
            });
        });
        //limpa os campos se apagar a tag
        function limpa_cidade(){

            document.getElementById('tag').value;

            document.getElementById('setor').value = '';
            document.getElementById('equipamento').value = '';
            document.getElementById('potencia').value = '';
            document.getElementById('rpm').value = '';
            document.getElementById('cliente').value = '0';

        }

    </script>



</body>
</html>

