<!DOCTYPE html>
<html lang="en">

<head>

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

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#" > <image class="imagem" src="{{ url('img/smi_logo.png') }}" height="50" width="120"></image>   Painel Gerencial</a>

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

<!-- Gerar PDF Modal-->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecione o mês:</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @foreach($cli as $clie)
                <form class="form-horizontal" role="form" method="post" action="{{ url('/home/pdf/'.$clie->id) }}">
                    {{ csrf_field() }}
                    @endforeach
                    <div class="modal-body">
                        <select name="mes" id="mes" class="form-control">
                            <option value="" selected>Selecione</option>
                            <option value="Janeiro">Janeiro</option>
                            <option value="Março">Março</option>
                            <option value="Abril">Abril</option>
                            <option value="Maio">Maio</option>
                            <option value="Junho">Junho</option>
                            <option value="Julho">Julho</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Setembro">Setembro</option>
                            <option value="Outubro">Outubro</option>
                            <option value="Novembro">Novembro</option>
                            <option value="Dezembro">Dezembro</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary-sm" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success-sm">
                            <i class="fas fa-file-pdf"></i>  Gerar</button>
                    </div>
                </form>
        </div>
    </div>
</div>


<div id="wrapper">


    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/cliente/conta/home') }}">
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
                <h6 class="dropdown-header">Feedback</h6>
                <a class="dropdown-item" href="{{ url('/cliente/conta/analise/abertas') }}">Análise de Vibração</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Consultas:</h6>
                <a class="dropdown-item" href="{{ url('/cliente/conta/analise/consulta') }}">Analise de Vibração</a>
                <a class="dropdown-item" href="{{ url('/cliente/conta/analise/feed') }}">Feedbacks</a>
                <a class="dropdown-item" href="{{ url('/cliente/conta/lubrificacao/lista') }}">Lubrificação de Maquinas</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chart-bar"></i>
                <span>Relatórios</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ url('/cliente/conta/analise/dash') }}">Resumo de Ocorrências</a>
                <a class="dropdown-item" href="#">Feedbacks</a>
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
                            <div class="mr-5">Não monitorados = {{ $total_al4 }} </div>
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

                    @include('login.success')

                    @include('login.erros')

                    <div class="form-group">
                        <form role="form" action="{{ url('/cliente/conta/home/busca') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success-sm" data-toggle="modal" data-target="#pdfModal">
                                        <i class="fas fa-file-pdf"></i>  PDF</button>
                                    </button>
                                </div>
                            </div>
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
                    <div id="container3"></div>

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
                            series: [
                                {
                                    name: 'Não Monitorados',
                                    color: 'rgb(50,150,250)',
                                    data: [{{ $jan_ala4 }},{{ $fev_ala4 }},{{ $mar_ala4 }},{{ $abr_ala4 }},{{ $mai_ala4 }},{{ $jun_ala4 }},{{ $jul_ala4 }},{{ $ago_ala4 }},{{ $set_ala4 }},{{ $out_ala4 }},{{ $nov_ala4 }},{{ $dez_ala4 }}],
                                },
                                {
                                    name: 'Alarme 2',
                                    color: 'rgb(255,0,0)',
                                    data: [{{ $a2jan }},{{ $a2fev }},0,{{ $a2abr }},{{ $a2mai }},{{ $a2jun }},{{ $a2jul }},{{ $a2ago }},{{ $a2set }},{{ $a2out }},{{ $a2nov }},{{ $a2dez }}],
                                },
                                {
                                    name: 'Alarme 1',
                                    color: 'rgb(255,255,0)',
                                    data: [{{ $a1jan }},{{ $a1fev }},0,{{ $a1abr }},{{ $a1mai }},{{ $a1jun }},{{ $a1jul }},{{ $a1ago }},{{ $a1set }},{{ $a1out }},{{ $a1nov }},{{ $a1dez }}],
                                },
                                {
                                    name: 'Normais',
                                    color: 'rgb(50,205,50)',
                                    data: [{{ $cnt_nmojan }},{{ $cnt_nmofev }},{{ $cnt_nmomar }},{{ $cnt_nmoabr }},{{ $cnt_nmomai }},{{ $cnt_nmojun }},{{ $cnt_nmojul }},{{ $cnt_nmoago }},{{ $cnt_nmoset }},{{ $cnt_nmoout }},{{ $cnt_nmonov }},{{ $cnt_nmodez }}],
                                }
                            ]
                        });

                        Highcharts.chart('container3', {

                            title: {
                                text: ''
                            },

                            yAxis: {
                                title: {
                                    text: 'Em %'
                                },
                            },

                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },

                            plotOptions: {
                                series: {

                                    label: {
                                        connectorAllowed: true
                                    },


                                }
                            },

                            tooltip: {
                                pointFormat: "Value: {point.y:.0f} %"
                            },

                            xAxis: {
                                categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
                                ]
                            },

                            series: [{
                                name: 'Não Monitorados',
                                color: 'rgb(50,150,250)',
                                data: [{{ $jan_ala4p }},{{ $fev_ala4p }},{{ $mar_ala4p }},{{ $abr_ala4p }},{{ $mai_ala4p }},{{ $jun_ala4p }},{{ $jul_ala4p }},{{ $ago_ala4p }},{{ $set_ala4p }},{{ $out_ala4p}},{{ $nov_ala4p }},{{ $dez_ala4p }}],
                            }, {
                                name: 'Alarme 2',
                                color: 'rgb(255,0,0)',
                                data: [{{ $a2janp }},{{ $a2fevp }},0,{{ $a2abrp }},{{ $a2maip }},{{ $a2junp }},{{ $a2julp }},{{ $a2agop }},{{ $a2setp }},{{ $a2outp }},{{ $a2novp }},{{ $a2dezp }}],
                            }, {
                                name: 'Alarme 1',
                                color: 'rgb(255,255,0)',
                                data: [{{ $a1janp }},{{ $a1fevp }},0,{{ $a1abrp }},{{ $a1maip }},{{ $a1junp }},{{ $a1julp }},{{ $a1agop }},{{ $a1setp }},{{ $a1outp }},{{ $a1novp }},{{ $a1dezp }}],
                            }, {
                                name: 'Normais',
                                color: 'rgb(50,205,50)',
                                data: [{{ $cnt_nmojanp }},{{ $cnt_nmofevp }},{{ $cnt_nmomarp}},{{ $cnt_nmoabrp }},{{ $cnt_nmomaip }},{{ $cnt_nmojunp }},{{ $cnt_nmojulp }},{{ $cnt_nmoagop }},{{ $cnt_nmosetp }},{{ $cnt_nmooutp }},{{ $cnt_nmonovp }},{{ $cnt_nmodezp }}],
                            }],

                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            },



                        });





                    </script>
                    <div class="row" align="center"><h6>Equipamentos Monitorados</h6></div>
                    <br>
                    <div class="row">
                        <div class="table-responsive aligncenter">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="small" for="status_geral">Filtrar alarme:</label>
                                        <select name="status_geral" id="status_geral" class="form-control">
                                            @if(isset($st_geral))
                                                @if($st_geral == 'Todos')
                                                    <option value="{{$status_geral}}" selected>{{$st_geral}}</option>
                                                    <option value="A1">Alarme 1</option>
                                                    <option value="A2">Alarme 2 </option>
                                                    <option value="A0">Normal</option>
                                                    <option value="A4">Não Monitorados</option>
                                                @endif
                                                @if($st_geral == 'Alarme 1')
                                                    <option value="" selected>Todos</option>
                                                    <option value="{{$status_geral}}" selected>{{$st_geral}}</option>
                                                    <option value="A2">Alarme 2 </option>
                                                    <option value="A0">Normal</option>
                                                    <option value="A4">Não Monitorados</option>
                                                @endif
                                                @if($st_geral == 'Alarme 2')
                                                    <option value="" selected>Todos</option>
                                                    <option value="A1">Alarme 1</option>
                                                    <option value="{{$status_geral}}" selected>{{$st_geral}}</option>
                                                    <option value="A0">Normal</option>
                                                    <option value="A4">Não Monitorados</option>
                                                @endif
                                                @if($st_geral == 'Normal')
                                                    <option value="" selected>Todos</option>
                                                    <option value="A1">Alarme 1</option>
                                                    <option value="A2">Alarme 2 </option>
                                                    <option value="{{$status_geral}}" selected>{{$st_geral}}</option>
                                                    <option value="A4">Não Monitorados</option>
                                                @endif
                                                @if($st_geral == 'Não Monitorados')
                                                    <option value="" selected>Todos</option>
                                                    <option value="A1">Alarme 1</option>
                                                    <option value="A2">Alarme 2 </option>
                                                    <option value="A0">Normal</option>
                                                    <option value="{{$status_geral}}" selected>{{$st_geral}}</option>
                                                @endif
                                            @else
                                                <option value="" selected>Todos</option>
                                                <option value="A1">Alarme 1</option>
                                                <option value="A2">Alarme 2 </option>
                                                <option value="A0">Normal</option>
                                                <option value="A4">Não Monitorados</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="status_geral">Quantidade Registros:</label>
                                        <select name="paginate" id="paginate" class="form-control">
                                            @if(isset($pag))
                                                @if($pag == 20)
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>

                                                @endif

                                                @if($pag == 5)

                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                @endif
                                                @if($pag == 10)
                                                    <option value="5">5</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                @endif
                                                @if($pag == 15)
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                @endif
                                                @if($pag == 30)
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                @endif
                                                @if($pag == 40)
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                    <option value="50">50</option>
                                                @endif
                                                @if($pag == 50)
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="{{$pag}}" selected>{{$pag}}</option>
                                                @endif
                                            @else
                                                <option value="0" selected>Selecione</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small" for="b_tag">Buscar TAG:</label>
                                        <input name="b_tag" id="b_tag" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success-sm">
                                    <i class="fas fa-search-plus"></i> Filtrar</button>
                            </div>
                            </form>
                            <table class="table table-striped table-bordered table-hover" id="lista">
                                <thead>
                                <tr>
                                    <th class="small">Cliente</th>
                                    <th class="small">Equipamento</th>
                                    <th class="small">Setor</th>
                                    <th class="small">Tag</th>
                                    <th class="small" >Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($equi as $eq)
                                    <tr align="center">
                                        <td class="small">{{ $eq->cliente }}</td>
                                        <td class="small">{{ $eq->equipamento }}</td>
                                        <td class="small">{{ $eq->setor }}</td>
                                        <td class="small">{{ $eq->tag }}</td>
                                        @if(!isset($eq->status_geral))
                                            <td class="small"><button type="button" class="btn btn-success">Normal</button></td>
                                        @else
                                            @if($eq->status_geral == "A1")
                                                <td class="small"><button type="button" class="btn btn-warning" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$eq->idocorrencia) }}'">Alarme 1</button></td>
                                            @elseif($eq->status_geral == "A2")
                                                <td class="small"><button type="button" class="btn btn-danger" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$eq->idocorrencia) }}'">Alarme 2</button></td>
                                            @elseif($eq->status_geral == "A0" )
                                                <td class="small"><button type="button" class="btn btn-success" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$eq->idocorrencia) }}'">Normal</button></td>
                                            @elseif($eq->status_geral == "")
                                                <td class="small"><button type="button" class="btn btn-success">Normal</button></td>
                                            @elseif($eq->status_geral == "A4")
                                                <td class="small"><button type="button" class="btn btn-primary" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$eq->idocorrencia) }}'">Não Monitorado</button></td>
                                            @endif
                                    </tr>
                                    @endif
                                </tbody>
                                @endforeach
                            </table>
                            <?php echo $equi->render(); ?>
                        </div>
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