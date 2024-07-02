<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>SMI - Portal de Ocorrências </title>

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

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#" > <image class="imagem" src="{{ url('img/smi_logo.png') }}" height="50" width="120"></image>   Portal de Ocorrências</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-12">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/alterarsenha') }}">Alterar Senha</a>
                <a class="dropdown-item" href="{{ url('/registrar') }}">Registrar Usuário</a>
                <a class="dropdown-item" href="{{ url('/editar') }}">Editar Usuário</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>




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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{ url('/logout') }}">Sim</a>
            </div>
        </div>
    </div>
</div>


<div id="wrapper">


    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i>
                <span>Formulários</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Formulários</h6>
                <a class="dropdown-item" href="{{ url('/ocorrencia') }}">Analise de Vibração</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Consultas:</h6>
                <a class="dropdown-item" href="{{ url('/ocorrencia/consulta') }}">Analise de Vibração</a>
                <a class="dropdown-item" href="{{ url('/ocorrencia/consultafeed/') }}">Feedbacks</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chart-bar"></i>
                <span>Relatórios</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('/ocorrencia/dash') }}">Resumo de Ocorrências</a>
                <a class="dropdown-item" href="#">Feedbacks</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
                <span>Cadastros</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('/cliente/lista') }}">Clientes</a>
                <a class="dropdown-item" href="{{ url('cliente/equipamentos') }}">Equipamentos</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-coins"></i>
                <span>Back-end</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('adm/importar') }}">Massivo Equipamentos</a>
            </div>
        </li>


    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Resumo</a>
                </li>
                <li class="breadcrumb-item active">Ocorrências</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-hammer"></i>
                            </div>
                            <div class="mr-5">Normais = {{ $semt }}</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="mr-5">Alarme 1 = {{ $a1t }}</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="mr-5">Alarme 2 = {{ $a2t }}</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="far fa-comment-alt"></i>
                            </div>
                            <div class="mr-5">Feedback de Intervenção = {{ $cnt_feedgt }}</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <div class="mr-5">Não monitorados = {{ $cnt_abertasgt }} </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="far fa-eye"></i>
                            </div>
                            <div class="mr-5">Obervações = </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><i class="fas fa-list-ul"></i> Detalhes</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Dashboard</div>
                <div class="card-body">

                    <div class="form-group">
                        <form role="form" action="{{ url('/home/busca') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <select id="tipo_form" name="tipo_form" class="form-control">
                                        <option value="0" selected>Análise de Vibração</option>
                                        <option value="A">Termografica</option>
                                        <option value="2">Balanceamento Dinâmico</option>
                                        <option value="3">Alinhamento a Laser de Eixos</option>
                                        <option value="4">Alinhamento a Laser de Polias</option>
                                        <option value="5">Lubrificação de Máquinas</option>
                                        <option value="6">Ultrassom</option>
                                        <option value="7">Medição de Espessura</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select id="cliente" name="cliente" class="form-control">
                                          @if($cli1 == '%')
                                          <option value="%">Todos os Clientes</option>
                                          @foreach($cli as $clie)
                                          <option value="{{ $clie->id }}" >{{ $clie->cliente }}</option>
                                          @endforeach
                                          @endif
                                          @if($cli1 <> '%')
                                           @foreach($cli as $clie)
                                             <option value="{{ $clie->id }}" >{{ $clie->cliente }}</option>
                                           @endforeach
                                              <option value="%">Todos os Clientes</option>
                                              @foreach($cli2 as $clie2)
                                                   <option value="{{ $clie2->id }}" >{{ $clie2->cliente }}</option>
                                               @endforeach
                                           @endif
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select id="ano" name="ano" class="form-control">
                                        <option value="{{ $ano }}">{{ $ano }}</option>
                                        @foreach($ocorrencias1 as $oc1)
                                            @if($oc1->ano <> $ano)
                                            <option value="{{ $oc1->ano }}">{{ $oc1->ano }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                              <div class="col-md-2">
                                <button type="submit" class="btn btn-success-sm" style="height:30px;">
                                    <i class="fas fa-filter"></i>  Aplicar Filtro</button>
                              </div>
                            </div>
                        </form>
                    </div>

                    <!-- biblioteca graficos -->
                    {!! Html::script('js/code/highcharts.js') !!}
                    {!! Html::script('js/code/highcharts-3d.js') !!}
                    {!! Html::script('js/code/modules/exporting.js') !!}



                    <div id="container2"></div>
                    <script>
                        Highcharts.chart('container2', {
                            chart: {
                                type: 'bar',
                                options3d: {
                                    enabled: true,
                                    alpha: 5,
                                    beta: 6,
                                    viewDistance: 50,
                                    depth: 0
                                }
                            },
                            title: {
                                text: 'Ocorrências - Histórico do Mensal'
                            },
                            xAxis: {

                                categories: ['{{ $jan }}','{{ $fev }}','{{ $mar }}','{{ $abr }}','{{ $mai }}','{{ $jun }}','{{ $jul }}','{{ $ago }}','{{ $set }}','{{ $out }}','{{ $nov }}','{{ $dez }}']
                            },

                            yAxis: {
                                min: 0,
                                visible:false,
                                title: {
                                    text: 'Qtd'
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            legend: {
                                reversed: true
                            },
                            plotOptions: {
                                series: {
                                    stacking: 'normal'
                                },
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [{
                                name: 'Aberta',
                                data: [{{ $cnt_abertasgjan }},{{ $cnt_abertasgfev }},{{ $cnt_abertasgmar }},{{ $cnt_abertasgabr }},{{ $cnt_abertasgmai }},{{ $cnt_abertasgjun }},{{ $cnt_abertasgjul }},{{ $cnt_abertasgago }},{{ $cnt_abertasgset }},{{ $cnt_abertasgout }},{{ $cnt_abertasgnov }},{{ $cnt_abertasgdez }}]
                            },{
                                name: 'Feedback de Intervenção',
                                data: [{{$cnt_feedgjan }},{{ $cnt_feedgfev }},{{ $cnt_feedgmar }},{{ $cnt_feedgabr }},{{ $cnt_feedgmai }},{{ $cnt_feedgjun }},{{ $cnt_feedgjul }},{{ $cnt_feedgago }},{{ $cnt_feedgset }},{{ $cnt_feedgout }},{{ $cnt_feedgnov }},{{ $cnt_feedgdez }}]
                            },{
                                name: 'Total',
                                data: [{{ $cnt_totalgjan  }},{{ $cnt_totalgfev }},{{ $cnt_totalgmar }},{{ $cnt_totalgabr }},{{ $cnt_totalgmai }},{{ $cnt_totalgjun }},{{ $cnt_totalgjul }},{{ $cnt_totalgago }},{{ $cnt_totalgset }},{{ $cnt_totalgout }},{{ $cnt_totalgnov }},{{ $cnt_totalgdez }}]
                            }]
                        });

                    </script>



                    <div id="container1"></div>



                    <script>
                        Highcharts.chart('container1', {
                            chart: {
                                type: 'column',
                                options3d: {
                                    enabled: true,
                                    alpha: 5,
                                    beta: 6,
                                    viewDistance: 50,
                                    depth: 0

                                }
                            },

                            title: {
                                text: ''
                            },

                            xAxis: {
                                categories: ['{{ $jan }}','{{ $fev }}','{{ $mar }}','{{ $abr }}','{{ $mai }}','{{ $jun }}','{{ $jul }}','{{ $ago }}','{{ $set }}','{{ $out }}','{{ $nov }}','{{ $dez }}'],
                                labels: {
                                    skew3d: true,
                                    style: {
                                        fontSize: '11px'
                                    }
                                }
                            },

                            yAxis: {
                                allowDecimals: false,
                                min: 0,
                                visible:false,
                                title: {
                                    text: 'Number of fruits',
                                    skew3d: true
                                }
                            },

                            tooltip: {
                                headerFormat: '<b>{point.key}</b><br>',
                                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
                            },
                            credits: {
                                enabled: false
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'normal',
                                    depth: 50
                                },
                                series: {
                                    borderWidth: 42,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.y}',
                                        color:'black',
                                        style: {
                                            fontSize: '11px',
                                            fontWeight: 'bold'
                                        }
                                    }
                                }
                            },

                            series: [{
                                name: 'Alarme 2',
                                color: 'rgb(255,0,0)',
                                data: [{{ $a2jan }},{{ $a2fev }},{{ $a2mar }},{{ $a2abr }},{{ $a2mai }},{{ $a2jun }},{{ $a2jul }},{{ $a2ago }},{{ $a2set }},{{ $a2out }},{{ $a2nov }},{{ $a2dez }}],

                            },{
                                name: 'Alarme 1',
                                color: 'rgb(255,255,0)',
                                data: [{{ $a1jan }},{{ $a1fev }},{{ $a1mar }},{{ $a1abr }},{{ $a1mai }},{{ $a1jun }},{{ $a1jul }},{{ $a1ago }},{{ $a1set }},{{ $a1out }},{{ $a1nov }},{{ $a1dez }}],

                            },{
                                name: 'Normais',
                                color: 'rgb(50,205,50)',
                                data: [{{ $semjan }},{{ $semfev }},{{ $semmar }},{{ $semabr }},{{ $semmai }},{{ $semjun }},{{ $semjul }},{{ $semago }},{{ $semset }},{{ $semout }},{{ $semnov }},{{ $semdez }}],

                            }]
                        });


                    </script>

                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

</html>
