@extends('adminlte::page')

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Evento - Detalhes/Editar </h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('auth.success')
                        @include('auth.erros')
                        <form role="form" method="POST" action="{{ url('/updateevento') }}" style="margin-left: 20px;">
                            {{ csrf_field() }}

                            @foreach($eventos as $evento)
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="small" for="numero_evento">Nº Evento:</label>
                                         <p><span class="glyphicon glyphicon-calendar"></span> {{ $evento->numero_evento }}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                     <div class="col-md-3">
                                          <label class="small" for="data_evento">Data:</label>
                                          <div class='input-group date' id='datetimepicker5'>
                                             <input type='text' class="form-control cep" id="data_evento" name="data_evento" value="{{ $evento->data_evento }}" placeholder="Data do evento" />
                                              <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                              </span>
                                          </div>
                                     </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small" for="inicio_evento">Inicio do Evento:</label>
                                            <input type="text" onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="inicio_evento" name="inicio_evento" value="{{ $evento->inicio_evento }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small" for="inicio_trabalho">Inicio do Trabalho:</label>
                                            <input type="text" onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="inicio_trabalho" name="inicio_trabalho" value="{{ $evento->inicio_trabalho }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <label for="cliente" >Cliente:</label>
                                         <select id="cliente" name="cliente" class="form-control">
                                             @foreach($cli as $clie)
                                            <option value="{{ $clie->id }}" selected>{{ $clie->nome }}</option>
                                             @endforeach
                                             @foreach($cli2 as $clie2)
                                                <option value="{{ $clie2->id }}">{{ $clie2->nome }}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="small" for="score">Score:</label>
                                        <input type="text"  class="form-control" id="score" name="score" value="{{ $evento->score }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="cep">Cep do evento:</label>
                                        <input onblur="javascript: formatarCampocep(this);" type="text"  class="form-control  cep" id="cep" name="cep" maxlength="9" value="{{ $evento->cep_do_evento }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="uf">Bairro:</label>
                                        <input type="text"  class="form-control" id="bairro" name="bairro" value="{{ $evento->bairro }}" style="height: 30px; font-size: 12px;">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small" for="cidade">Cidade:</label>
                                        <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ $evento->cidade }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="small" for="uf">Uf:</label>
                                        <input type="text"  class="form-control uf" id="uf" name="uf" value="{{ $evento->uf }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                             <br>
                            <div class="row">
                              <div class="form-group">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                              <th colspan="8"><h5><b>Bartenders Selecionado</b></h5></th>
                                                <th colspan="3">
                                                 <a href="#exampleModal"  class="btn btn-deep-purple" onclick="javascript: resultado.innerHTML = '<input type=\'hidden\' value=\'{{ $evento->id }}\' name=\'idev\' /><input type=\'hidden\' value=\'adicionar\' name=\'vale\' />'" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                                 Adicionar&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-share"></i></a></th>
                                            </tr>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Cidade</th>
                                                <th>Dança</th>
                                                <th>Drinks</th>
                                                <th>Simpatia</th>
                                                <th>Beleza</th>
                                                <th>Postura</th>
                                                <th>Score</th>
                                                <th>Carro</th>
                                                <th>Editar</th>
                                                <th>Retirar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bartenders2 as $bar)
                                            <tr>
                                                <td>{{ $bar->nome }}</td>
                                                <td>{{ $bar->cidade }}</td>
                                                <td>{{ $bar->danca }}</td>
                                                <td>{{ $bar->drinks }}</td>
                                                <td>{{ $bar->simpatia }}</td>
                                                <td>{{ $bar->beleza }}</td>
                                                <td>{{ $bar->postura }}</td>
                                                <td>{{ $bar->score }}</td>
                                                <td>{{ $bar->carro }}</td>
                                                <td>
                                                <a href="#exampleModal"  class="btn btn-deep-purple" onclick="javascript: resultado.innerHTML = '<input type=\'hidden\' value=\'{{ $bar->id }}\' name=\'idbart\' /><input type=\'hidden\' value=\'{{ $evento->id }}\' name=\'idev\' /><input type=\'hidden\' value=\'update\' name=\'vale\' />'" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                                <i class="glyphicon glyphicon-edit"></i></a></td>
                                                <td>
                                                    <a href="#exampleModal1"  class="btn btn-deep-purple" onclick="javascript: resultados.innerHTML = '<input type=\'hidden\' value=\'{{ $bar->id }}\' name=\'idbart\' /><input type=\'hidden\' value=\'{{ $evento->id }}\' name=\'idev\' /><input type=\'hidden\' value=\'delete\' name=\'vale\' />'" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">
                                                        <i class="glyphicon glyphicon-trash"></i></a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                   </div>
                                </div>
                              </div>
                            </div>

                            @foreach($eventos as $evento)
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="small" for="animacao">Animação:</label>
                                        <div class="radio">
                                            @if($evento->animacao == 'Sim')
                                              <label><input type="radio" id="animacao" name="animacao" value="Sim" checked>Sim</label>
                                               <label><input type="radio" id="animacao" name="animacao" value="Não">Não</label>
                                            @else
                                               <label><input type="radio" id="animacao" name="animacao" value="Não" checked>Não</label>
                                               <label><input type="radio" id="animacao" name="animacao" value="Sim">Sim</label>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="chegada_deposito">Chegada Depósito:</label>
                                        <input type="text"  class="form-control" id="chegada_deposito" name="chegada_deposito" value="{{ $evento->chegada_deposito }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                       <div class="col-md-2">
                                            <label class="small" for="tipo">Tipo Evento:</label>
                                            <select class="form-control" id="tipo" name="tipo">
                                                <option value="{{ $evento->tipo }}">{{ $evento->tipo }}</option>
                                                @foreach($tipos as $tp)
                                                    <option value="{{ $tp->tipo }}">{{ $tp->tipo }}</option>
                                                @endforeach
                                           </select>
                                      </div>
                                     <div class="col-md-4">
                                          <label class="small" for="evento">Evento:</label>
                                          <input type="text"  class="form-control" id="evento" name="evento" value="{{ $evento->evento }}">
                                     </div>
                                     <div class="col-md-4">
                                         <label class="small" for="pacote_contrado">Pacote:</label>
                                         <select class="form-control" id="pacote_contrado" name="pacote_contrado">
                                            <option value="{{ $evento->pacote_contrado }}">{{ $evento->pacote_contrado }}</option>
                                            @foreach($paco as $pc)
                                               <option value="{{ $pc->pacote }}">{{ $pc->pacote }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="frutas">Frutas:</label>
                                        <div class="radio">
                                            @if($evento->animacao == 'Sim')
                                              <label><input type="radio" id="frutas" name="frutas" value="Sim" checked>Sim</label>
                                              <label><input type="radio" id="frutas" name="frutas" value="Não">Não</label>
                                            @else
                                              <label><input type="radio" id="frutas" name="frutas" value="Sim">Sim</label>
                                              <label><input type="radio" id="frutas" name="frutas" value="Não" checked>Não</label>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtd_convidados">N°Convidados:</label>
                                        <input type="text"  class="form-control" id="qtd_convidados" name="qtd_convidados" value="{{ $evento->n_convidados }}" >
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtdbarh" style="color:darkblue;">Nº de Bartenders Homem:</label>
                                        <input type="text"  class="form-control" id="qtdbarth" name="qtdbarth" value="{{ $evento->qtd_bar_homem }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtdbarm" style="color:deeppink">Nº de Bartenders Mulher:</label>
                                        <input type="text"  class="form-control" id="qtdbartm" name="qtdbartm" value="{{ $evento->qtd_bar_mulher }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class="form-group">
                                   <div class="col-md-4">
                                       <label class="small" for="bar_contrado">Kit Bar:</label>
                                       <select class="form-control" id="bar_contrado" name="bar_contrado">
                                           <option value="{{ $evento->bar_contrado }}">{{ $evento->bar_contrado }}</option>
                                           @foreach($bares as $br1)
                                               <option value="{{ $br1->bar }}">{{ $br1->bar }}</option>
                                           @endforeach
                                       </select>
                                   </div>

                                   <div class="col-md-5">
                                       <label class="small" for="uniforme">Uniforme:</label>
                                       <input type="text"  class="form-control" id="uniforme" name="uniforme" value="{{ $evento->uniforme }}">
                                   </div>

                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="small" for="observacao">Observação:</label>
                                        <textarea rows="4" class="form-control" id="observacao" name="observacao" value="{{ $evento->observacao }}">{{ $evento->observacao }}</textarea>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <input type="hidden" name="id" value="{{ $evento->id }}">
                            <div class="row" align="center">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                @if($evento->fila == 1 )
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('listaevento') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                                @else
                                    <button type="button" class="btn btn-success" onclick="window.location='{{ url('listaeventopendentes') }}'">
                                        <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                                @endif

                                @if($evento->fila == 2 )
                                    <button type="button" class="btn" onclick="window.location='{{ url('listaeventorealizado/'.$evento->id) }}'">
                                        <i class="glyphicon glyphicon-ok"></i> Realizado</button>
                                @endif

                                @if($evento->fila == 3 )
                                    <button type="button" class="btn" onclick="window.location='{{ url('listaeventoreabrir/'.$evento->id) }}'">
                                        <i class="glyphicon glyphicon-question-sign"></i> Reabrir</button>
                                @endif

                            </div>
                   </form>
               </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Selecione o Bartenders Disponiveis</h5>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('/updateeventobar') }}">
                    {{ csrf_field() }}

                    <div id="resultado"></div>
                    <div class="form-group">
                         <select class="form-control" name="bartender1" id="SelectBartenders">
                             <option value="">Selecione</option>
                            @foreach($bartenders3 as $SelectBartenders)
                                <option value="{{ $SelectBartenders->id }}">{{ $SelectBartenders->nome }}</option>
                            @endforeach

                        </select>
                        <label for="carro" class="control-label">Carro</label>
                          <select name="SelectBartendersresultado" id="SelectBartendersresultado" class="form-control" disabled ="true">
                            <option value="">Selecione</option>
                          </select>

                        <label for="cidade" class="control-label">Cidade</label>
                          <select name="SelectBartendersresultado1" id="SelectBartendersresultado1" class="form-control" disabled ="true">
                            <option value="">Selecione</option>
                         </select>

                        <label for="bairro" class="control-label">Bairro</label>
                        <select name="SelectBartendersresultado2" id="SelectBartendersresultado2" class="form-control" disabled ="true">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Efetuar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Retirar Bartenders Da Lista ? </h5>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('/updateeventobar') }}">
                    {{ csrf_field() }}
                    <div id="resultados" align="center"></div>

                    <div align="center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success">Sim</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

