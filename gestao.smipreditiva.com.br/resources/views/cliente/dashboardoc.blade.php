
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Relatórios</a>
                </li>
                <li class="breadcrumb-item active">Ocorrências</li>
            </ol>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Dashboard</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')
                <!-- biblioteca graficos -->
                    {!! Html::script('js/code/highcharts.js') !!}
                    {!! Html::script('js/code/highcharts-3d.js') !!}
                    {!! Html::script('js/code/modules/exporting.js') !!}


                    <div id="container2"></div>
                    <script>

                        Highcharts.chart('container2', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'Ocorrências'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ["<a href='{{ url('/ocorrencia/lista/abertas') }}'>Abertas</a>", "<a href='{{ url('/ocorrencia/lista/feedbacks') }}'>Feedback de Intervenção</a>"
                                    , "<a href='{{ url('/ocorrencia/lista/total') }}'>Total</a>"],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                visible:false,
                                title:  {
                                    text: 'Qtd',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' '
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'top',
                                x: 1,
                                y: 80  ,
                                floating: false,
                                borderWidth: 1,
                                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'geradas',
                                data: [{{ $cnt_abertasg }}, {{ $cnt_feedg }}, {{ $cnt_totalg }}]
                            }]
                        });


                    </script>



                    <div id="container1"></div>


                    <script>
                        Highcharts.chart('container1', {

                            chart: {
                                type: 'column',

                            },
                            title: {
                                text: 'Alarmes'
                            },



                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [
                                    'desgaste rolamento',
                                    'desbalanceamento',
                                    'desalinhamento',
                                    'sistema de transmissão',
                                    'folgas e desgastes',
                                    'rigidez',
                                    'lubrificação deficiente',
                                    'outros'

                                ],
                                crosshair: false
                            },
                            credits: {
                                enabled: false
                            },
                            yAxis: {
                                min: 0,
                                visible:false
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.f} Qtd</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true,
                                enabled: false
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                },
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: false,
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
                                name: 'Alarme 1',
                                color: 'rgb(255,255,0)',
                                data: [
                                    {{ $vel_a1e }}
                                    ,{{ $vel_a1f }}
                                    ,{{ $vel_a1g }}
                                    ,{{ $vel_a1h }}
                                    ,{{ $vel_a1i }}
                                    ,{{ $vel_a1j }}
                                    ,{{ $vel_a1k }}
                                    ,{{ $vel_a1l }}]

                            }, {
                                name: 'Alarme 2',
                                color: 'rgb(255,0,0)',
                                data: [
                                    {{ $vel_a2e }}
                                    ,{{ $vel_a2f }}
                                    ,{{ $vel_a2g }}
                                    ,{{ $vel_a2h }}
                                    ,{{ $vel_a2i }}
                                    ,{{ $vel_a2j }}
                                    ,{{ $vel_a2k }}
                                    ,{{ $vel_a2l }}]

                            }]
                        });




                    </script>





                    <div class="card-footer small text-muted"> </div>
                </div>
            </div>

        </div>
        @endsection

    </div>

    </body>
    </html>