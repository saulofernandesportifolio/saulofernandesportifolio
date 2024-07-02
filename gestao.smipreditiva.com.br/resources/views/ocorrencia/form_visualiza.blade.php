
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Consultas</a>
                </li>
                <li class="breadcrumb-item active">Ocorrência</li>
            </ol>
            @foreach($ocorrencias as $ocorrencia)

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-folder-open"></i>
                    N° {{ $ocorrencia->ocorrencia }}</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')

                    <form role="form" action="{{ url('/cliente/resalvar/'.$ocorrencia->id) }}" method="put" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10">
                                <h6>Dados técnicos do equipamento</h6>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success-sm" onclick="window.location='{{url('/ocorrencia/pdf/'.$ocorrencia->id)}}'">
                                    <i class="fas fa-file-pdf"></i>  PDF</button>
                                </button>
                            </div>
                        </div>
                        <br>
                        {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="status_geral">Status Geral:</label>
                                        @if($ocorrencia->status_geral == 'A1')
                                            <input type="text"  class="form-control" id="status_geral" name="status_geral" value="Alarme 1" readonly="readonly">
                                            @endif
                                        @if($ocorrencia->status_geral == 'A2')
                                            <input type="text"  class="form-control" id="status_geral" name="status_geral" value="Alarme 2" readonly="readonly">
                                            @endif
                                        @if($ocorrencia->status_geral == 'A0')
                                            <input type="text"  class="form-control" id="status_geral" name="status_geral" value="Normal" readonly="readonly">
                                            @endif
                                        @if($ocorrencia->status_geral == 'A4')
                                            <input type="text"  class="form-control" id="status_geral" name="status_geral" value="Não Monitadorado" readonly="readonly">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="tag">Tag:</label>
                                    <input type="text"  class="form-control" id="tag" name="tag" value="{{ $ocorrencia->tag }}" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Setor:</label>
                                    <input type="text"  class="form-control" id="setor" name="setor" value="{{ $ocorrencia->setor }}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Cliente:</label>
                                    <input type="text"  class="form-control" id="cliente" name="cliente" value="{{$ocorrencia->cliente }}" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Equipamento:</label>
                                    <input type="text"  class="form-control" id="equipamento" name="equipamento" value="{{ $ocorrencia->equipamento }}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="potencia">Potência:</label>
                                    <input type="text"  class="form-control" id="potencia" name="potencia" value="{{ $ocorrencia->potencia }}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="rpm">RPM:</label>
                                    <input type="text"  class="form-control" id="rpm" name="rpm" value="{{ $ocorrencia->rpm }}" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6>Técnicas avaliadas</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="small" for="valor_velocidade">Valor Velocidade(mm/s):</label>
                                <input type="text"  class="form-control" id="valor_velocidade" name="valor_velocidade" value="{{ $ocorrencia->valor_velocidade }}" readonly="readonly">
                            </div>
                            <div class="col-md-3">
                                <label class="small" for="vel_iso">Velocidade (ISO 10816)</label>
                                <input type="text"  class="form-control" id="vel_iso" name="vel_iso" value="{{ $ocorrencia->velocidade }}" readonly="readonly">
                            </div>
                            <div class="col-md-2">
                                <label class="small" for="valor_demodulacao">Valor Demodulação(gE):</label>
                                <input type="text"  class="form-control" id="valor_velocidade" name="valor_velocidade" value="{{ $ocorrencia->valor_demod }}" readonly="readonly">
                                ge
                            </div>
                            <div class="col-md-3">
                                <label class="small" for="demoludacao">Demodulação</label>
                                <input type="text"  class="form-control" id="demodulacao" name="demodulacao" value="{{ $ocorrencia->demodulacao }}" readonly="readonly">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="small" for="alarme_deslocamento_x">Deslocamento X:</label>
                                <input type="text"  class="form-control" id="alarme_deslocamento_x" name="alarme_deslocamento_x" value="{{ $ocorrencia->alarme_deslocamento_x }}" readonly="readonly">
                            </div>
                            <div class="col-md-3">
                                <label class="small" for="desc_deslocamento_x">Deslocamento X:</label>
                                <input type="text"  class="form-control" id="desc_deslocamento_x" name="desc_deslocamento_x" value="{{ $ocorrencia->desc_deslocamento_x }}" readonly="readonly">
                            </div>
                            <div class="col-md-2">
                                <label class="small" for="alarme_deslocamento_y">Deslocamento Y:</label>
                                <input type="text"  class="form-control" id="alarme_deslocamento_y" name="alarme_deslocamento_y" value="{{ $ocorrencia->alarme_deslocamento_y }}" readonly="readonly">
                            </div>
                            <div class="col-md-3">
                                <label class="small" for="desc_deslocamento_y">Deslocamento Y:</label>
                                <input type="text"  class="form-control" id="desc_deslocamento_y" name="desc_deslocamento_y" value="{{ $ocorrencia->desc_deslocamento_y }}" readonly="readonly">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-11">
                                <div class="table-responsive aligncenter">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th class="small">Diagnóstico</th>
                                            <th class="small">Alarme</th>
                                            <th class="small">Recomendação</th>
                                        @if($ocorrencia->desgaste_rolamentos == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Desgaste Rolamentos</td>
                                                <td class="small">{{ $ocorrencia->desgaste_rolamentos }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_desgaste_rotalamentos }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->desbalanceamento == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Desbalanceamento</td>
                                                <td class="small">{{ $ocorrencia->desbalanceamento }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_desbalanceamentos }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->desalinhamento == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Desalinhamento</td>
                                                <td class="small">{{ $ocorrencia->desalinhamento }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_desalinhamento }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->sistema_transmissao == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Sistema de Transmissão</td>
                                                <td class="small">{{ $ocorrencia->sistema_transmissao }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_sistema_transmissao }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->folgas_desgaste == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Folgas e desgastes</td>
                                                <td class="small">{{ $ocorrencia->folgas_desgaste }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_folgas_desgaste }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->rigidez == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Rigidez/Fixação</td>
                                                <td class="small">{{ $ocorrencia->rigidez }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_rigidez }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->lubrificacao_deficiente == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Lubrificação Deficiente</td>
                                                <td class="small">{{ $ocorrencia->lubrificacao_deficiente    }}</td>
                                                <td class="small">{{ $ocorrencia->recomendacao_lubrificacao_deficiente }}</td>
                                            </tr>
                                        @endif
                                        @if($ocorrencia->outros == 'A0')
                                            @else
                                            <tr>
                                                <td class="small">Outros</td>
                                                <td class="small">{{ $ocorrencia->outros }}</td>
                                                <td class="small">{{ $ocorrencia->desc_outros }}</td>
                                            </tr>
                                            @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="prazo_intervensao">Prazo de Intervenção</label>
                                        <input type="text"  class="form-control" id="prazo_intervensao" name="prazo_intervensao" value="{{ $ocorrencia->prazo_intervensao }}" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        <br>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="small" for="observacoes">Observações:</label>
                                <textarea class="form-control" rows="3" name="observacoes" id="observacoes" value="{{ $ocorrencia->obs }}" readonly="true">{{ $ocorrencia->obs }}</textarea>
                            </div>
                        </div>

                        @if($ocorrencia->grafico == Null)
                            <br>

                        @else

                            <div class="row">
                                <div class="col-md-8">
                                    <h6>Espectro</h6>
                                </div>
                                <img src="{{asset('public/graficos/'.$ocorrencia->grafico)}}" alt="{{ $ocorrencia->grafico }}" height="200" width="700">

                            </div>
                        @endif
                        @if($ocorrencia->grafico2 == Null)
                            <br>

                        @else

                            <div class="row">
                                <div class="col-md-8">
                                    <h6>Curva de Tendência</h6>
                                </div>
                                <img src="{{asset('public/graficos/'.$ocorrencia->grafico2)}}" alt="{{ $ocorrencia->grafico2 }}" height="200" width="700">

                            </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="small" for="desc_arquivo">Observações relatório de campo</label>
                                    <textarea class="form-control" rows="3" name="desc_arquivo" id="desc_arquivo" value="{{ $ocorrencia->desc_arquivo }}" readonly="true">{{ $ocorrencia->desc_arquivo }}</textarea>
                                </div>
                            </div>
                        </div>
                        <h6>Dados cadastro</h6>
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td class="small"><strong>Usuário</strong></td>
                                        <td class="small">{{ $ocorrencia->usuario }}</td>
                                        <td class="small"><strong>Data</strong></td>
                                        <td class="small">{{ $ocorrencia->data_cadastro }}</td>
                                        <td class="small"><strong>Hora Alteração</strong></td>
                                        <td class="small">{{ $ocorrencia->hora_cadastro }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary-sm" onclick="abrePopup()">
                                    <i class="fas fa-comment-alt"></i> Ver Feedback</button>
                            </div>
                        </div>
                        <br>

                        @if($ocorrencia->status == 1)

                            <strong>Status</strong>: Em aberto
                            <br>
                        @else
                            <h6><strong>Detalhes Fechamento</strong></h6>
                            <br>

                            <div class="row">
                                <strong> Status:</strong>{{ $ocorrencia->desc_status }}
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="small"><strong>Usuário Alteração</strong></td>
                                            <td class="small">{{ $ocorrencia->usuario_ult_alteracao }}</td>
                                            <td class="small"><strong>Anotações</strong></td>
                                            <td class="small">{{ $ocorrencia->analise }}</td>
                                        </tr>
                                        <tr>
                                            <td class="small"><strong>Data Alteração</strong></td>
                                            <td class="small">{{ $ocorrencia->data_ult_alt }}</td>
                                            <td class="small"><strong>Hora Alteração</strong></td>
                                            <td class="small">{{ $ocorrencia->hora_ult_alt }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        <br>
                        <div class="row">
                            @if($ocorrencia->status_geral == 'A4')
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success-sm" onclick="window.location='{{url('/ocorrencia/atulnaomonit/'.$ocorrencia->id)}}'">
                                    <i class="far fa-clipboard"></i>  Atualizar Não Monitorado</button>
                                </button>
                            </div>
                            @else
                                @endif
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success-sm" data-toggle="modal" data-target="#deletemodal" >
                                    <i class="fas fa-trash-alt"></i> Excluir</button>
                            </div>
                        </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success-sm" onclick="goBack()">
                                        <i class="fas fa-undo-alt"></i> Voltar</button>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </form>

                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>
            </div>
            @endsection

        </div>
    <script>

        function abrePopup()
        {
            window.open("{{ url('/ocorrencia/viusualizafeedback/'.$ocorrencia->id) }}", "nome", "width=800, height=600");
        }


        function abrePopup2()
        {
            window.open("{{ url('ocorrencia/enviaatulnaomonit/'.$ocorrencia->id) }}", "nome", "width=1000, height=800");
        }
    </script>


    </body>
        </html>