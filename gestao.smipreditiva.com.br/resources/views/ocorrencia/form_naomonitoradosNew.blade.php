
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Inicio -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Fomulários</a>
                </li>
                <li class="breadcrumb-item active">Análise de Vibração</li>
            </ol>
        @include('login.success')
        @include('login.erros')

        <!-- Conteúdo-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Análise de Vibração</div>
                <div class="card-body">
                    <h6>Dados técnicos do equipamento</h6>
                    <form role="form" action="{{ url('ocorrencia/new/save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        @foreach($equi as $eq)
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="tag">Tag:</label>
                                    <input type="text"  class="form-control" id="tag" name="tag" value="{{ $eq->tag }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Setor:</label>
                                    <input type="text"  class="form-control" id="setor" name="setor" value="{{ $eq->setor }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Cliente:</label>
                                    <input type="text"  class="form-control" id="cliente" name="cliente" value="{{$eq->cliente }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Equipamento:</label>
                                    <input type="text"  class="form-control" id="equipamento" name="equipamento" value="{{ $eq->equipamento }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="potencia">Potência:</label>
                                    <input type="text"  class="form-control" id="potencia" name="potencia" value="{{ $eq->potencia }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="rpm">RPM:</label>
                                    <input type="text"  class="form-control" id="rpm" name="rpm" value="{{ $eq->rpm }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                       <br>
                        <div class="row">
                            <h6>Status geral do equipamento</h6>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="small" for="status_geral">Status Geral:</label>
                                <select name="status_geral" id="status_geral" class="form-control">
                                    <option value="A4" selected>Não Monitorado</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A0">Normal</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="small" for="mes_analise">Mês Analise:</label>
                                <select name="mes_analise" id="mes_analise" class="form-control">
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="small" for="desc_arquivo">Observações:</label>
                                <textarea type="text"  class="form-control" id="obs_outros" name="obs_outros"></textarea>
                            </div>
                        </div>
                        <br>
                        <h6>Inserir dados</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="small" for="image">Selecione o relatório de campo:</label>
                                <input type="file" class="form-control" name="dados" id="dados">
                            </div>
                            <div class="col-md-4">
                                <label class="small" for="image">Selecione o espectro:</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="col-md-4">
                                <label class="small" for="image2">Selecione a curva de tendência:</label>
                                <input type="file" class="form-control" name="image2" id="image2">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="small" for="desc_arquivo">Observações relatório de campo:</label>
                                <textarea type="text"  class="form-control" id="desc_arquivo" name="desc_arquivo"></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h6>Técnicas avaliadas</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="small" for="valor_velocidade">Valor Velocidade(mm/s):</label>
                                <input type="text"  class="form-control" id="valor_velocidade" name="valor_velocidade">
                            </div>
                            <div class="col-md-3">

                                <label class="small" for="vel_iso">Velocidade (ISO 10816)</label>
                                <select name="vel_iso" id="vel_iso" class="form-control">
                                    <option value="A0" selected>Alarme</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                </select>

                            </div>
                            <div class="col-md-2">
                                <label class="small" for="valor_demodulacao">Valor Demodulação(gE):</label>
                                <input type="text"  class="form-control" id="valor_demodulacao" name="valor_demodulacao">
                            </div>
                            <div class="col-md-3">

                                <label class="small" for="demoludacao">Demodulação</label>
                                <select name="demoludacao" id="demoludacao" class="form-control">
                                    <option value="A0" selected>Alarme</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="small" for="alarme_deslocamento_x">Deslocamento X:</label>
                                    <select name="alarme_deslocamento_x" class="form-control" id="alarme_deslocamento_x" >
                                        <option value="A0" selected>Alarme</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="small" for="desc_deslocamento_x">Deslocamento X:</label>
                                <input type="text"  class="form-control" id="desc_deslocamento_x" name="desc_deslocamento_x">
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="small" for="alarme_deslocamento_y">Deslocamento Y:</label>
                                    <select name="alarme_deslocamento_y" class="form-control" id="alarme_deslocamento_y" >
                                        <option value="A0" selected>Alarme</option>
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="small" for="desc_deslocamento_y">Deslocamento Y:</label>
                                <input type="text"  class="form-control" id="desc_deslocamento_y" name="desc_deslocamento_y">
                            </div>
                        </div>
                        <br>
                        <br>
                        <h6>Diagnóstico</h6>
                        <br>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="desgaste_rolamentos">Desgaste Rolamentos:</label>
                                        <select name="desgaste_rolamentos" class="form-control" id="desgaste_rolamentos" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_desgaste_rolamentos">Descreva as recomendações para desgaste de rolamentos</label>
                                        <textarea type="text"  class="form-control" id="rec_desgaste_rolamentos" name="rec_desgaste_rolamentos"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="desbalanceamento">Desbalanceamento</label>
                                        <select name="desbalanceamento" class="form-control" id="desbalanceamento" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_desbalanceamento">Descreva as recomendações para desbalanceamento</label>
                                        <textarea type="text"  class="form-control" id="rec_desbalanceamento" name="rec_desbalanceamento"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="desalinhamento">Desalinhamneto</label>
                                        <select name="desalinhamento" class="form-control" id="desalinhamento" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_desalinhamento">Descreva as recomendações para desalinhamento</label>
                                        <textarea type="text"  class="form-control" id="rec_desalinhamento" name="rec_desalinhamento"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="sistema_transmissao">Sistema de Transmissão</label>
                                        <select name="sistema_transmissao" class="form-control" id="sistema_transmissao" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_desalinhamento">Descreva as recomendações para sistema de transmissão</label>
                                        <textarea type="text"  class="form-control" id="rec_sistema_transmissao" name="rec_sistema_transmissao"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="folgas_desgastes">Folgas e desgastes</label>
                                        <select name="folgas_desgastes" class="form-control" id="folgas_desgastes" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_folgas_desgastes">Descreva as recomendações para folgas e desgastes</label>
                                        <textarea type="text"  class="form-control" id="rec_folgas_desgastes" name="rec_folgas_desgastes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="rigidez">Rigidez</label>
                                        <select name="rigidez" class="form-control" id="rigidez" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_rigidez">Descreva as recomendações para rigidez</label>
                                        <textarea type="text"  class="form-control" id="rec_rigidez" name="rec_rigidez"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="lubrificacao_deficiente">Lubrificação Deficiente</label>
                                        <select name="lubrificacao_deficiente" class="form-control" id="lubrificacao_deficiente" >
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="rec_lubrificacao_deficiente">Descreva as recomendações para lubrificação deficiente</label>
                                        <textarea type="text"  class="form-control" id="rec_lubrificacao_deficiente" name="rec_lubrificacao_deficiente"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="outros">Outros</label>
                                        <select id="outros" name="outros" class="form-control">
                                            <option value="A0" selected>Alarme</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <label class="small" for="desc_outros">Descreva as recomendações para outros:</label>
                                        <textarea type="text"  class="form-control" id="desc_outros" name="desc_outros"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <label class="small" for="prazo_intervensao">Prazo de Intervenção</label>
                                        <select id="prazo_intervensao" name="prazo_intervensao" class="form-control">
                                            <option value="" selected>Selecione</option>
                                            <option value="Emergência - Atuar imediatamente">Emergência - Atuar imediatamente</option>
                                            <option value="Alto Risco - Atuar de 1 a 7 dias">Alto Risco - Atuar de 1 a 7 dias</option>
                                            <option value="Médio Risco - Atuar entre 7 a 20 dias">Médio Risco - Atuar entre 7 a 20 dias</option>
                                            <option value="Baixo Risco - Atuar entre 20 e 99 dias.">Baixo Risco - Atuar entre 20 e 99 dias.</option>
                                            <option value="Aguardar próximo monitoramento">Aguardar próximo monitoramento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br><br>
                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-save"></i>  Salvar</button>
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                                <i class="fas fa-undo-alt"></i> Voltar</button>
                        </div>
                    </form>
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>

        @endsection

    </div>


    </body>

    </html>
