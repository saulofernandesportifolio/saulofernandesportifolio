
<!DOCTYPE html>
<html lang="en">

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

    
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#" > <image class="imagem" src="{{ url('img/smi_logo.png') }}" height="50" width="120"></image>   Portal de Ocorrências</a>
</nav>
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Resumo</a>
                </li>
                <li class="breadcrumb-item active">Ocorrências</li>
            </ol>

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


        <script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/serial.js" type="text/javascript"></script>

        <script>
            var chart;

            var chartData = [
                {
                    "year": "{{ $jan }}",
                    "Alarme 2": {{ $a2jan }},
                    "Alarme 1": {{ $a1jan }},
                    "Normais":  {{ $semjan }}
                },
                {
                    "year": "{{ $fev }}",
                    "Alarme 2": {{ $a2fev }},
                    "Alarme 1": {{ $a1fev }},
                    "Normais":  {{ $semfev }}
                },
                {
                    "year": "{{ $mar }}",
                    "Alarme 2": {{ $a2mar }},
                    "Alarme 1": {{ $a1mar }},
                    "Normais":  {{ $semmar }}
                },
                {
                    "year": "{{ $abr }}",
                    "Alarme 2": {{ $a2abr }},
                    "Alarme 1": {{ $a1abr }},
                    "Normais":  {{ $semabr }}
                },
                {
                    "year": "{{ $mai }}",
                    "Alarme 2": {{ $a2mai }},
                    "Alarme 1": {{ $a1mai }},
                    "Normais":  {{ $semmai }}
                },
                {
                    "year": "{{ $jun }}",
                    "Alarme 2": {{ $a2jun }},
                    "Alarme 1": {{ $a1jun }},
                    "Normais":  {{ $semjun }}
                },
                {
                    "year": "{{ $jul }}",
                    "Alarme 2": {{ $a2jul }},
                    "Alarme 1": {{ $a1jul }},
                    "Normais":  {{ $semjul }}
                },
                {
                    "year": "{{ $ago }}",
                    "Alarme 2": {{ $a2ago }},
                    "Alarme 1": {{ $a1ago }},
                    "Normais":  {{ $semago }}
                },
                {
                    "year": "{{ $set }}",
                    "Alarme 2": {{ $a2set }},
                    "Alarme 1": {{ $a1set }},
                    "Normais":  {{ $semset }}
                },
                {
                    "year": "{{ $out }}",
                    "Alarme 2": {{ $a2out }},
                    "Alarme 1": {{ $a1out }},
                    "Normais":  {{ $semout }}
                },
                {
                    "year": "{{ $nov }}",
                    "Alarme 2": {{ $a2nov }},
                    "Alarme 1": {{ $a1nov }},
                    "Normais":  {{ $semnov }}
                },
                {
                    "year": "{{ $dez }}",
                    "Alarme 2": {{ $a2dez }},
                    "Alarme 1": {{ $a1dez }},
                    "Normais":  {{ $semdez }}
                }
            ];

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.plotAreaBorderAlpha = 0.2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Alarme 2";
                graph.labelText = "[[value]]";
                graph.valueField = "Alarme 2";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "rgb(255, 0, 0)";
                graph.balloonText = "<span style='color:rgb(255, 0, 0);'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);

                // second graph
                graph = new AmCharts.AmGraph();
                graph.title = "Alarme 1";
                graph.labelText = "[[value]]";
                graph.valueField = "Alarme 1";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "rgb(255, 255, 0)";
                graph.balloonText = "<span style='color:rgb(255, 255, 0);'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);

                // third graph
                graph = new AmCharts.AmGraph();
                graph.title = "Normais";
                graph.labelText = "[[value]]";
                graph.valueField = "Normais";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "rgb(50, 205, 50)";
                graph.balloonText = "<span style='color:rgb(50, 205, 50);'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.borderAlpha = 0.2;
                legend.horizontalGap = 10;
                chart.addLegend(legend);
                
                chart.depth3D = 25;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv");
            });

            
        </script>
        <div id="chartdiv" style="width: 900px; height: 400px;"></div>

                  <br>
                    <div clas="row" align="left">
                        <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/exportarPDF') }}'">
                            <i class="fas fa-file-pdf"></i></i> Exportar PDF</button>
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
