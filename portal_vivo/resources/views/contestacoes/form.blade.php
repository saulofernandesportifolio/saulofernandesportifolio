@extends('layouts.app')

@section('content')
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
<div class="container">

   <div class="row">
       <div class="col-md-12 col-md-offset-0">
          <div class="panel">
            <div class="panel-heading">Contestações - Formulário</div>
                <div class="panel-body">

                    <!-- Inicio Modal -->
                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content ">
                                <div class="panel-heading panel">
                                    <div class="panel-heading panel">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center col-md-15 col-md-offset-1" id="myModalLabel">Anexo Visualizado</h4>
                                        <br>
                                    </div>
                                </div>
                                    @foreach($protocolos as $protocolo)
                                     <div class="panel-body box" style=" background-image: url({{ $protocolo->endereco_anexo }}); background-repeat: no-repeat; zoom: 60%; height:680px; margin-top: -40px; position: relative;">
                                     </div>
                                     @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal -->
                 <div class="div-responsive">
                    @include('login.success')
                    @include('login.erros')
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" action="{{ url('/contestacao/salvar') }}" method="post">
                        {{ csrf_field() }}

                        @foreach($protocolos as $protocolo)
                            <input type="hidden" name="id" value="{{ $protocolo->id }}">
                            <input type="hidden" name="id_parc" value="{{ $protocolo->id_parc }}">
                            <div align="center" id="opcao2" class="panel">
                                <div class="col-md-13 col-md-offset-11">
                                    <button type="button" class="btn btn-success" onclick="#"><i class="glyphicon glyphicon-chevron-down"></i> </button>
                                </div>
                            </div>
                        <div id="esconder22" class="esconder22">

                            <div class="form-group">
                                <label for="data_criacao" class="col-md-1 control-label">Data/Hora</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->data_criacao }}</p>
                                    <input type="hidden" name="protocolo" value="{{ $protocolo->data_criacao }}">
                                </div>
                                <label for="protocolo" class="col-md-1 control-label">Protocolo</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->protocolo }}</p>
                                    <input type="hidden" name="protocolo" value="{{ $protocolo->protocolo }}">
                                </div>
                                <label for="pedido" class="col-md-1 control-label">Pedido</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->pedido }}</p>
                                    <input type="hidden" name="pedido" value="{{ $protocolo->pedido }}">
                                </div>
                                <label for="pedido" class="col-md-1 control-label">CNPJ/CPF(Cliente)</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->cnpj_cpf }}</p>
                                    <input type="hidden" name="cnpj_cpf" value="{{ $protocolo->cnpj_cpf }}">
                                </div>
                            </div>



                             <div class="form-group">
                                  <label for="descricao_defesa" class="col-md-1 control-label">Historico Descrição/Defesa</label>

                                  <div class="col-md-11">
                                      <textarea rows="5" class="form-control" style="background: #fff;" readonly="readonly">{{ $protocolo->descricao_defesa }}</textarea>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="anexo" class="col-md-1 control-label">Anexo</label>

                                  <div class="col-md-7">

                                     <a href="{{ $protocolo->endereco_downloadparc }}"><i class="glyphicon glyphicon-download"></i> Download</a>
                                  </div>
                              </div>
                        </div>
                            <div align="center" id="opcao" class="panel">
                                <div class="col-md-13 col-md-offset-11">
                                   <button type="button" class="btn btn-success" onclick="#"><i class="glyphicon glyphicon-chevron-down"></i> </button>
                                </div>
                            </div>
                        <div id="esconder33" class="esconder33">
                            <div class="form-group">
                                <label for="motivo" class="col-md-1 control-label">Motivo</label>

                                <div class="col-md-3">
                                    <p>
                                        {!! Form::select('motivo',$motivos,null,['id'=>'motivo','class' => 'form-control','placeholder'=>'Selecione.....']) !!}

                                    </p>

                                </div>
                                <label for="submotivo" class="col-md-1 control-label">Sub Motivo</label>

                                <div class="col-md-7">
                                    <p>
                                        {!! Form::select('submotivo',['placeholder'=>'Selecione.....'],null,['id'=>'submotivo','class' => 'form-control']) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descricao" class="col-md-1 control-label">Descrição Contestação</label>

                                <div class="col-md-11">
                                    <textarea rows="5" name="descricao" id="descricao" class="form-control" style="background: #fff;" value="{{ old('descricao') }}" placeholder="Preencher Descrição contestação"></textarea>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="status" class="col-md-1 control-label">Status</label>
                            <div class="col-md-2">
                               <select name="status" id="status" class="form-control">
                                  <option value="Em análise">Em análise</option>
                                  <option value="Improcedente">Improcedente</option>
                                  <option value="Procedente">Procedente</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anexo" class="col-md-1 control-label">Anexo</label>
                          <div class="col-md-11 col-lg-11">
                            <div class="aumentar_input_dow input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control" style="width:114%;">
                                <div class="input-group-btn" style="left:12%;">
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="clone hide">
                                <div class="aumentar_input_dow control-group input-group" style="margin-top:1%;">
                                    <input type="file" name="filename[]" class="form-control" style="width:114%;">
                                    <div class="input-group-btn" style="left:12%;">
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                          </div>

                        </div>
                        </div>


                    <br><br>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('/contestacao') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>

                                </form>
                 </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection