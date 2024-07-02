@extends('layouts.app')

@section('content')

    <div class="container col-xs-12">

        <div class="row">
        @if(Session::get('perfil') == 1
          || Session::get('perfil') == 2
          || Session::get('perfil') == 3
          || Session::get('perfil') == 4
          || Session::get('perfil') == 7 )
            <!--<div class="col-md-26 col-md-offset-0">-->
        @else
            <div class="col-md-4 col-md-offset-4">
            @endif
           @if(Session::get('perfil') == 1
             || Session::get('perfil') == 2
             || Session::get('perfil') == 3
             || Session::get('perfil') == 4
             || Session::get('perfil') == 7 )
            <div class="panel1">
           @else
            <div class="panel">
           @endif
                @if(Session::get('perfil') == 1
                    || Session::get('perfil') == 2
                    || Session::get('perfil') == 3
                    || Session::get('perfil') == 4
                    || Session::get('perfil') == 7 )

                <div class="panel-heading1">Seja Bem Vindo !</div>
                @else
                 <div class="panel-heading">Seja Bem Vindo !</div>
                @endif
            </div>
            <div>
                @include('login.success')
                @include('login.erros')
                @if(Session::get('perfil') == 5
                  || Session::get('perfil') == 6 )


                  <!--<image class="imagem2" src="/img/autorizado2.jpg" height="220" width="420"></image>-->
                @endif


                @if(Session::get('perfil') == 1
                || Session::get('perfil') == 2
                || Session::get('perfil') == 3
                || Session::get('perfil') == 4
                || Session::get('perfil') == 7 )
                    <div class="table-responsive aligncenter">

                        <!-- biblioteca graficos -->
                        {!! Html::script('js/code/highcharts.js') !!}
                        {!! Html::script('js/code/highcharts-3d.js') !!}
                        {!! Html::script('js/code/modules/exporting.js') !!}

                        <div class="table-responsive aligncenter" style="height: auto; background: #ffffff; margin-top: 6px;">
                          <div id="container"  class="col-md-5 col-md-offset-0" style="background: transparent; min-width:420px; height: 220px; margin: 0 auto"></div>
                          <div id="container1" class="col-md-6 col-md-offset-3" style="background: transparent; min-width: 420px; height: 220px; margin: 0 auto"></div>
                          <div id="container2" class="col-md-5 col-md-offset-0" style="background: transparent; min-width: 420px; height: 250px; margin: 0 auto"></div>
                          <div id="container3" class="col-md-6 col-md-offset-3" style="background: transparent; min-width: 420px; height: 250px; margin: 0 auto"></div>
                        </div>

                        <!--<image class="imagem22" src="/img/autorizado2.jpg" height="60" width="100"></image>-->

                    </div>
                        <!--GRÁFICO PIE-->
                        <script type="text/javascript">
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 45,
                                        beta: 0
                                    },
                                    backgroundColor:'transparent'
                                },
                                 credits: {
                                 enabled: false
                                },
                                title: {
                                    text: 'Concluídos <?php echo date("M/Y"); ?>',
                                    style: {
                                        fontSize: '12px',
                                        fontWeight: 'bold'
                                    }
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        depth: 45,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.name}:<b>{point.percentage:.2f}%<b>'
                                        }
                                    }
                                },
                                series: [{
                                    type: 'pie',
                                    name: 'Total',
                                    style: {
                                        fontSize: '11px',
                                        fontWeight: 'bold',
                                    },
                                    data: [
                                            @foreach($graficos_conc as $gfc)
                                        {
                                            name: 'Procedente',
                                            y:{{ $gfc->Procedente }},
                                            color:'rgb(106,90,205)',
                                            sliced: false,
                                            selected: false
                                        },
                                        {
                                            name: 'Improcedente',
                                            y:{{ $gfc->Improcedente }},
                                            color:'rgb(100,149,237)'
                                        }
                                        @endforeach
                                    ]
                                }]
                            });
                        </script>
                        <!--GRÁFICO PIE -->

                        <!--GRÁFICO COLUMN-->
                        <script type="text/javascript">
                            Highcharts.chart('container1', {
                                chart: {
                                 type: 'column',
                                 backgroundColor:'transparent'
                                },
                                credits: {
                                enabled: false
                                },
                                title: {
                                    text: 'Concluídos Últimos 3 Meses',
                                    style: {
                                        fontSize: '12px',
                                        fontWeight: 'bold'
                                    }
                                },
                                xAxis: {
                                  skew3d: true,
                                  categories:['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                                  crosshair: false

                                },
                                yAxis: {
                                    min: 0,
                                    visible:false
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                                    footerFormat: '</table>',
                                    shared: true,
                                    useHTML: true,
                                    enabled: true
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    },
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y}',
                                            color:'black',
                                            style: {
                                                fontSize: '11px',
                                                fontWeight: 'bold'
                                            }
                                        }
                                    },
                                },
                                series: [{
                                    name: 'Procedente',
                                    color:'rgb(106,90,205)',
                                    @foreach($graficos_conc3proc as $gp)
                                    data: [{{ $gp->Jan }},{{ $gp->Fev }},{{ $gp->Mar }},{{ $gp->Abr }},{{ $gp->Mai }},{{ $gp->Jun }},{{ $gp->Jul }},{{ $gp->Ago }},{{ $gp->Set }},{{ $gp->Out }},{{ $gp->Nov }},{{ $gp->Dez }}],
                                    @endforeach
                                    drilldown: 'Procedente',
                                    pointPadding: 0

                                },{
                                    name: 'Improcedente',
                                    color:'rgb(100,149,237)',
                                    @foreach($graficos_conc3improc as $gi)
                                    data: [{{ $gi->Jan }},{{ $gi->Fev }},{{ $gi->Mar }},{{ $gi->Abr }},{{ $gi->Mai }},{{ $gi->Jun }},{{ $gi->Jul }},{{ $gi->Ago }},{{ $gi->Set }},{{ $gi->Out }},{{ $gi->Nov }},{{ $gi->Dez }}],
                                    @endforeach
                                    drilldown: 'Improcedente',
                                    pointPadding: 0
                                }]
                            });
                        </script>
                        <!--GRÁFICO COLUMN-->

                        <!--GRÁFICO TRAMITANDO-->
                        <script type="text/javascript">

                            Highcharts.chart('container2', {
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 45
                                    },
                                    backgroundColor:'transparent'
                                },
                                credits: {
                                    enabled: false
                                },
                                title: {
                                    text: 'Tramitando Sla em <?php echo date("M/Y"); ?>',
                                    style: {
                                        fontSize: '12px',
                                        fontWeight: 'bold'
                                    }
                                },
                                plotOptions: {
                                    pie: {
                                        innerSize: 60,
                                        depth: 45,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.name}:<b>{point.percentage:.2f}%<b>',


                                            style: {
                                                fontSize: '12px',
                                                fontWeight: 'bold',
                                                color:'black'
                                            }
                                        }
                                    },
                                },
                                series: [{
                                    type: 'pie',
                                    name: 'Total',
                                    data: [
                                        @foreach($graficos_sla as $gf_sla1)
                                        {
                                            name: 'Dentro do Prazo',
                                            y:{{ $gf_sla1->Em_analise_Dentro+$gf_sla1->Reanalise_Dentro }},
                                            color:'rgb(106,90,205)',
                                            sliced: false,
                                            selected: false
                                        },
                                        {
                                            name: 'Fora do Prazo',
                                            y:{{ $gf_sla1->Em_analise_Fora+$gf_sla1->Reanalise_Fora }},
                                            color:'rgb(100,149,237)'
                                        }

                                        @endforeach
                                    ]
                                }]
                            });
                        </script>
                        <!--GRÁFICO TRAMITANDO-->

                    <!--GRÁFICO TRAMITANDO qtd-->
                    <script type="text/javascript">

                        Highcharts.chart('container3', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: 0,
                                plotShadow: false,
                                backgroundColor:'transparent'
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: 'Tramitando em <?php echo date("M/Y"); ?>',
                                align: 'center',
                                style: {
                                    fontSize: '12px',
                                    fontWeight: 'bold'
                                }
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.y}</b>'
                            },
                            plotOptions: {
                                pie: {
                                    dataLabels: {
                                        enabled: true,
                                        style: {
                                            fontWeight: 'bold',
                                            color: 'black'
                                        },
                                        format: '{point.name}:<b>{point.y}<b>',
                                    },
                                    startAngle: -90,
                                    endAngle: 90,
                                    center: ['50%', '75%']
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Total',
                                innerSize: '50%',
                                data: [
                                    @foreach($graficos_slaqtd as $gf_slaqtd)
                                    {
                                        name: 'Em Análise',
                                        y:{{ $gf_slaqtd->Em_analise }},
                                        color:'rgb(106,90,205)',
                                        sliced: false,
                                        selected: false
                                    },
                                    {
                                        name: 'Reanálise',
                                        y:{{ $gf_slaqtd->Reanalise }},
                                        color:'rgb(100,149,237)'
                                    }
                                    @endforeach
                                ]
                            }]
                        });
                    </script>
                    <!--GRÁFICO TRAMITANDO qtd-->

                @endif

            </div>


            @if(Session::get('perfil') == 5
              || Session::get('perfil') == 6 )
            </div>
            @endif
        </div>
    </div>

@endsection