@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastro Evento</div>
                <!-- /.box-header -->
                <div class="box-body">
                        @include('auth.success')
                        @include('auth.erros')
                        <form  role="form" method="POST" action="{{ url('/addevento') }}" style="margin-left: 20px;">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                       <label class="small" for="data_evento">Data:</label>
                                      <div class='input-group date' id='datetimepicker5'>
                                          <input type='text' class="form-control cep" id="data_evento" name="data_evento" value="{{ old('data_evento') }}" placeholder="Data e hora do evento"/>
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                           </span>
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small" for="inicio_evento">Inicio do Evento:</label>
                                            <input type="text" onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="inicio_evento" name="inicio_evento" value="{{ old('inicio_evento') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="small" for="inicio_trabalho">Inicio do Trabalho:</label>
                                            <input type="text" onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="inicio_trabalho" name="inicio_trabalho" value="{{ old('inicio_trabalho') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <label for="cliente" >Cliente:</label>
                                        <select id="cliente" name="cliente" class="form-control" value="{{ old('cliente') }}">
                                            <option value="0" selected>Selecione</option>
                                            @foreach($cli as $clie)
                                               <option @if(old('cliente') == $clie->id) selected @endif value="{{ $clie->id }}">{{ $clie->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="small" for="animacao">Animação:</label>
                                        <div class="radio">
                                            <label><input type="radio" id="animacao" name="animacao" @if(old('animacao') == 'Sim') checked  @endif value="Sim">Sim</label>
                                            <label><input type="radio" id="animacao" name="animacao" @if(old('animacao') == 'Não') checked  @endif value="Não">Não</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="chegada_deposito">Chegada Depósito:</label>
                                        <input type="text" onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="chegada_deposito" name="chegada_deposito" value="{{ old('chegada_deposito') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="tipo">Tipo Evento:</label>
                                        <select class="form-control" id="tipo" name="tipo">
                                            <option value="0">Selecione</option>
                                            @foreach($tipos as $tp)
                                              <option @if(old('tipo') == $tp->tipo) selected @endif value="{{ $tp->tipo }}">{{ $tp->tipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small" for="evento">Outros:</label>
                                        <input type="text"  class="form-control" id="evento" name="evento" value="{{ old('evento') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small" for="pacote_contrado">Pacote:</label>
                                        <select class="form-control" id="pacote_contrado" name="pacote_contrado">
                                            <option value="0">Selecione</option>
                                            @foreach($paco as $pc)
                                              <option @if(old('pacote_contrado') == $pc->pacote) selected @endif value="{{ $pc->pacote }}">{{ $pc->pacote }}</option>
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
                                            <label><input type="radio" id="frutas" name="frutas" @if(old('frutas') == 'Sim') checked  @endif value="Sim">Sim</label>
                                            <label><input type="radio" id="frutas" name="frutas" @if(old('frutas') == 'Não') checked  @endif value="Não">Não</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtd_convidados">N°Convidados:</label>
                                        <input type="text"  class="form-control" id="qtd_convidados" name="qtd_convidados" value="{{ old('qtd_convidados') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtdbarh" style="color:darkblue;">Nº de Bartenders Homem:</label>
                                        <input type="text"  class="form-control" id="qtdbarth" name="qtdbarth" value="{{ old('qtdbarth') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtdbarm" style="color:deeppink">Nº de Bartenders Mulher:</label>
                                        <input type="text"  class="form-control" id="qtdbartm" name="qtdbartm" value="{{ old('qtdbartm') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="qtdbarm" style="color:#B30101">Nº de Bartenders:</label>
                                        <input type="text"  class="form-control" id="qtdbartt" name="qtdbartt" value="{{ old('qtdbartt') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="frutas">Com uma Mulher ?</label>
                                        <div class="radio">
                                            <label><input type="radio" id="frutas" name="mulher" @if(old('mulher') == 'Sim') checked  @endif value="Sim">Sim</label>
                                            <label><input type="radio" id="frutas" name="mulher" @if(old('mulher') == 'Não') checked  @endif value="Não">Não</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small" for="bar_contrado">Kit Bar:</label>
                                        <select class="form-control" id="bar_contrado" name="bar_contrado">
                                            <option value="0">Selecione</option>
                                            @foreach($bar as $br)
                                                <option @if(old('bar_contrado') == $br->bar) selected @endif value="{{ $br->bar }}">{{ $br->bar }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small" for="uniforme">Uniforme:</label>
                                        <input type="text"  class="form-control" id="uniforme" name="uniforme" value="{{ old('uniforme') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="small" for="observacao">Observação:</label>
                                        <textarea rows="4" class="form-control" id="observacao" name="observacao" value="{{ old('observacao') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="center">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('listaevento') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
