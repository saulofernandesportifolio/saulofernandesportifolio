
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
                    <a href="#">Consultas</a>
                </li>
                <li class="breadcrumb-item active">Feedbacks</li>
            </ol>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-comment-alt"></i>
                    Consultas</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')

                <!-- biblioteca graficos -->
                    {!! Html::script('js/code/highcharts.js') !!}
                    {!! Html::script('js/code/highcharts-3d.js') !!}
                    {!! Html::script('js/code/modules/exporting.js') !!}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="table-responsive aligncenter">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="small">Total Ocorrências</th>
                                        <th class="small">Com FeedBack</th>
                                    </tr>
                                    <tbody>
                                    <td class="small">{{ $cnt_oc }}</td>
                                    <td class="small">{{ $cnt_total }}</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive aligncenter">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="small">Tempo Total Maquina Parada</th>
                                        <th class="small">HH Normal</th>
                                        <th class="small">HH Extra</th>
                                        <th class="small">Custo Total</th>
                                    </tr>
                                    <tbody>
                                    <td class="small">{{ $cnt_total }}</td>
                                    <td class="small">1</td>
                                    <td class="small">2</td>
                                    <td class="small">1</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive aligncenter">

                        <br><br>


                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="small">Ocorrência</th>
                                <th class="small">Cliente</th>
                                <th class="small">Máquina</th>
                                <th class="small">Atividades intervenção</th>
                                <th class="small">Tipo Intervenção</th>
                                <th class="small">Executante</th>
                                <th class="small">Tempo Maquina Parada</th>
                                <th class="small">Status</th>
                                <th class="small">Detalhes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ocorrencias as $oc)
                                <tr align="center">
                                    <td class="small">{{ $oc->id }}</td>
                                    <td class="small">{{ $oc->cliente }}</td>
                                    <td class="small">{{ $oc->equipamento }}</td>
                                    <td class="small">{{ $oc->atividades_intervencao }}</td>
                                    <td class="small">{{ $oc->tipo_intervencao }}</td>
                                    <td class="small">{{ $oc->executante }}</td>
                                    <td class="small">{{ $oc->tempo_maq_parada }}</td>
                                    <td class="small">{{ $oc->desc_status }}</td>
                                    <td class="small">
                                        <button type="button" class="btn btn-primary-sm" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$oc->id) }}'">
                                            <i class="fas fa-list-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <?php echo $ocorrencias->render(); ?>


                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>