
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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script>
            google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawStacked);

            function drawStacked() {
                var data = google.visualization.arrayToDataTable([
                    ['Mês', 'Aberta', 'Feedback de Intervenção', 'Total'],
                    ['{{ $jan }}', {{ $cnt_abertasgjan }}, {{$cnt_feedgjan }},  {{ $cnt_totalgjan }}],
                    ['{{ $fev }}', {{ $cnt_abertasgfev }}, {{ $cnt_feedgfev }}, {{ $cnt_totalgfev }}],
                    ['{{ $mar }}', {{ $cnt_abertasgmar }}, {{ $cnt_feedgmar }}, {{ $cnt_totalgmar }}],
                    ['{{ $abr }}', {{ $cnt_abertasgabr }}, {{ $cnt_feedgabr }}, {{ $cnt_totalgabr }}],
                    ['{{ $mai }}', {{ $cnt_abertasgmai }}, {{ $cnt_feedgmai }}, {{ $cnt_totalgmai }}],
                    ['{{ $jun }}', {{ $cnt_abertasgjun }}, {{ $cnt_feedgjun }}, {{ $cnt_totalgjun }}],
                    ['{{ $jul }}', {{ $cnt_abertasgjul }}, {{ $cnt_feedgjul }}, {{ $cnt_totalgjul }}],
                    ['{{ $ago }}', {{ $cnt_abertasgago }}, {{ $cnt_feedgago }}, {{ $cnt_totalgago }}],
                    ['{{ $set }}', {{ $cnt_abertasgset }}, {{ $cnt_feedgset }}, {{ $cnt_totalgset }}],
                    ['{{ $out }}', {{ $cnt_abertasgout }}, {{ $cnt_feedgout }}, {{ $cnt_totalgout }}],
                    ['{{ $nov }}', {{ $cnt_abertasgnov }}, {{ $cnt_feedgnov }}, {{ $cnt_totalgnov }}],
                    ['{{ $dez }}', {{ $cnt_abertasgdez }}, {{ $cnt_feedgdez }}, {{ $cnt_totalgdez }}]
                ]);

                var options = {
                    width: 800,
                    height: 600,
                    title: 'Ocorrencias - Histórico Mensal',
                    chartArea: {width: '50%'},
                    isStacked: true,
                    is3d: true,
                    hAxis: {
                        title: '',
                        minValue: 0,
                        visible: false,
                    },
                    vAxis: {
                        title: ''
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>


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



                    <div id="chart_div"></div>

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
