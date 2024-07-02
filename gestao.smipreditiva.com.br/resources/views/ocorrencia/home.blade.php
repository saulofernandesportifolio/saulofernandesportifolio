@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-100 col-md-offset-100">
                <div class="panel">
                    <div class="panel-heading">Dashboard  -
                    </div>
                    <div class="panel-body">


                        <!-- biblioteca graficos -->
                        {!! Html::script('js/code/highcharts.js') !!}
                        {!! Html::script('js/code/highcharts-3d.js') !!}
                        {!! Html::script('js/code/modules/exporting.js') !!}


                        <div class="row">
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
                                    categories: ["<a href='{{ url('/ocorrencia/lista/abertas') }}'>Abertas</a>", "<a href='{{ url('/ocorrencia/lista/feedbacks') }}'>Com Feed</a>"
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

                        </div>

                        <div class="row">
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
                                        "<a href='{{ url('/ocorrencia/lista/desrol') }}'>desgaste rolamentos</a>",
                                        "<a href='{{ url('/ocorrencia/lista/desbalanceamento') }}'>desbalanceamento</a>",
                                        "<a href='{{ url('/ocorrencia/lista/desalinhamento') }}'>desalinhamento</a>",
                                        "<a href='{{ url('/ocorrencia/lista/sistransm') }}'>sistema de transmissão</a>",
                                        "<a href='{{ url('/ocorrencia/lista/folgasdesg') }}'>folgas e desgaste</a>",
                                        "<a href='{{ url('/ocorrencia/lista/rigidez') }}'>rigidez</a>",
                                        "<a href='{{ url('/ocorrencia/lista/lubrificacao') }}'>lubrificação deficiente</a>",
                                        "<a href='{{ url('/ocorrencia/lista/outros') }}'>outros</a>"

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

                                }, ]
                            });




                        </script>
                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection