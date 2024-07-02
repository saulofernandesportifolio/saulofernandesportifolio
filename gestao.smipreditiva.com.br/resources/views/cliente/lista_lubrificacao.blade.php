
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
                <li class="breadcrumb-item active">Lubrificação de maquinas</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-folder-open"></i>
                    Lubrificação de maquinas</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')

                <!-- biblioteca graficos -->
                    {!! Html::script('js/code/highcharts.js') !!}
                    {!! Html::script('js/code/highcharts-3d.js') !!}
                    {!! Html::script('js/code/modules/exporting.js') !!}
                    <div class="table-responsive aligncenter">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="small">ID</th>
                                <th class="small">Cliente</th>
                                <th class="small">Máquina</th>
                                <th class="small">Data Execucao</th>
                                <th class="small">Data Proxima Lubrificacao</th>
                                <th class="small">Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lubrif as $lb)
                                <tr align="center">
                                    <td class="small">{{ $lb->id }} <button type="button" class="btn btn-primary-sm" onclick="window.location='{{ url('cliente/lubrificacao/visualiza/'.$lb->id) }}'">
                                            <i class="fas fa-list-alt"></i></button></td>
                                    <td class="small">{{ $lb->cliente }}</td>
                                    <td class="small">{{ $lb->equipamento }}</td>
                                    <td class="small">{{ $dt_ex = implode('-', array_reverse(explode('-', $lb->data_execucao))) }}</td>
                                    <td class="small">{{ $dt_prx = implode('-', array_reverse(explode('-', $lb->data_prox_lubri))) }}</td>
                                    @if($lb->data_prox_lubri > $dt_now)
                                        <td class="small"><image class="imagem_sinal" src="{{ url('/img/sinal_verde.jpg') }}" height="30" width="15" title="vencendo hoje}" ></td>
                                    @endif
                                    @if($lb->data_prox_lubri == $dt_now)
                                        <td class="small"><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="vencendo hoje}" ></td>
                                    @endif
                                    @if($lb->data_prox_lubri < $dt_now)
                                        <td class="small"><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="vencendo hoje}" ></td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        @if (isset($data_f))

                            <?php echo $lubrif->appends($data_f)->render(); ?>

                        @else

                            <?php echo $lubrif->render(); ?>

                        @endif
                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>