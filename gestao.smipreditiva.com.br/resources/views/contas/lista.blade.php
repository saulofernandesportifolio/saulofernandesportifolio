
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
                <li class="breadcrumb-item active">Ocorrências</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-folder-open"></i>
                    Ocorrências</div>
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
                                <th class="small">Ocorrência</th>
                                <th class="small">Cliente</th>
                                <th class="small">Máquina</th>
                                <th class="small">Status</th>
                                <th class="small">Velocidade</th>
                                <th class="small">Demodulacao</th>
                                <th class="small">Desalinhamento</th>
                                <th class="small">Desgaste rolamentos</th>
                                <th class="small">Desbalanceamento</th>
                                <th class="small">Sistema transmissao</th>
                                <th class="small">Folgas Desgaste</th>
                                <th class="small">Rigidez</th>
                                <th class="small">Lubrificacao Deficiente</th>
                                <th class="small">Outros</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ocorrencias as $oc)
                                <tr align="center">
                                    <td class="small">{{ $oc->ocorrencia }} <button type="button" class="btn btn-primary-sm" onclick="window.location='{{ url('/cliente/analise/visualiza/'.$oc->id) }}'">
                                            <i class="fas fa-list-alt"></i></button></td>
                                    <td class="small">{{ $oc->cliente }}</td>
                                    <td class="small">{{ $oc->equipamento }}</td>
                                    <td class="small">{{ $oc->desc_status }}</td>
                                    @if($oc->velocidade =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->velocidade }}" ></image></td>
                                    @elseif($oc->velocidade == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->velocidade }}" ></image></td>
                                    @elseif($oc->velocidade == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->velocidade }}" ></image></td>
                                    @elseif(empty($oc->velocidade) || $oc->velocidade == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->velocidade }}" ></image></td>
                                    @endif

                                    @if($oc->demodulacao =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->demodulacao }}" ></image></td>
                                    @elseif($oc->demodulacao == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->demodulacao }}" ></image></td>
                                    @elseif($oc->demodulacao == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->demodulacao }}" ></image></td>
                                    @elseif(empty($oc->demodulacao) || $oc->demodulacao == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->demodulacao }}" ></image></td>
                                    @endif

                                    @if($oc->desalinhamento =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->desalinhamento }}" ></image></td>
                                    @elseif($oc->desalinhamento == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desalinhamento }}" ></image></td>
                                    @elseif($oc->desalinhamento == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desalinhamento }}" ></image></td>
                                    @elseif(empty($oc->desalinhamento) || $oc->desalinhamento == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->desalinhamento }}" ></image></td>
                                    @endif

                                    @if($oc->desgaste_rolamentos =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->desgaste_rolamentos }}" ></image></td>
                                    @elseif($oc->desgaste_rolamentos == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desgaste_rolamentos }}" ></image></td>
                                    @elseif($oc->desgaste_rolamentos == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desgaste_rolamentos }}" ></image></td>
                                    @elseif(empty($oc->desgaste_rolamentos) || $oc->desgaste_rolamentos == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->desgaste_rolamentos }}" ></image></td>
                                    @endif

                                    @if($oc->desbalanceamento =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->desbalanceamento }}" ></image></td>
                                    @elseif($oc->desbalanceamento == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desbalanceamento }}" ></image></td>
                                    @elseif($oc->desbalanceamento == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->desbalanceamento }}" ></image></td>
                                    @elseif(empty($oc->desbalanceamento) || $oc->desbalanceamento == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->desbalanceamento }}" ></image></td>
                                    @endif

                                    @if($oc->sistema_transmissao =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->sistema_transmissao }}" ></image></td>
                                    @elseif($oc->sistema_transmissao == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->sistema_transmissao }}" ></image></td>
                                    @elseif($oc->sistema_transmissao == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->sistema_transmissao }}" ></image></td>
                                    @elseif(empty($oc->sistema_transmissao) || $oc->sistema_transmissao == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->sistema_transmissao }}" ></image></td>
                                    @endif

                                    @if($oc->folgas_desgaste =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->folgas_desgaste }}" ></image></td>
                                    @elseif($oc->folgas_desgaste == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->folgas_desgaste }}" ></image></td>
                                    @elseif($oc->folgas_desgaste == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->folgas_desgaste }}" ></image></td>
                                    @elseif(empty($oc->folgas_desgaste) || $oc->folgas_desgaste == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->folgas_desgaste }}" ></image></td>
                                    @endif

                                    @if($oc->rigidez =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->rigidez }}" ></image></td>
                                    @elseif($oc->rigidez == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->rigidez }}" ></image></td>
                                    @elseif($oc->rigidez == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->rigidez }}" ></image></td>
                                    @elseif(empty($oc->rigidez) || $oc->rigidez == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->rigidez }}" ></image></td>
                                    @endif

                                    @if($oc->lubrificacao_deficiente =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->lubrificacao_deficiente }}" ></image></td>
                                    @elseif($oc->lubrificacao_deficiente == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->lubrificacao_deficiente }}" ></image></td>
                                    @elseif($oc->lubrificacao_deficiente == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->lubrificacao_deficiente }}" ></image></td>
                                    @elseif(empty($oc->lubrificacao_deficiente) || $oc->lubrificacao_deficiente == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->lubrificacao_deficiente }}" ></image></td>
                                    @endif

                                    @if($oc->outros =="A1")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_amarelo.jpg') }}" height="30" width="15" title="{{ $oc->outros }}" ></image></td>
                                    @elseif($oc->outros == "A2")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->outros }}" ></image></td>
                                    @elseif($oc->outros == "A3")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_vermelho.jpg') }}" height="30" width="15" title="{{ $oc->outros }}" ></image></td>
                                    @elseif(empty($oc->outros) || $oc->outros == "A0")
                                        <td><image class="imagem_sinal" src="{{ url('/img/sinal_desligado.jpg') }}" height="30" width="15" title="{{ $oc->outros }}" ></image></td>
                                    @endif

                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        @if (isset($data_f))

                            <?php echo $ocorrencias->appends($data_f)->render(); ?>

                        @else

                            <?php echo $ocorrencias->render(); ?>

                        @endif




                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>