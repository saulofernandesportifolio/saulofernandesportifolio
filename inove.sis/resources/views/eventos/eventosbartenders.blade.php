@extends('adminlte::page')

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eventos Bartenders</h3>
                  <!-- /.box-header -->
                  <div class="box-body">
                      @include('auth.success')
                      @include('auth.erros')
                     <div class="table-responsive aligncenter">
                      <form name="form2" action="{{ url('/eventos/imprimilibera') }}" method="POST">
                            {{ csrf_field() }}

                        <div class="panel panel-default" align="center">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="panel-footer">
                                        <h4><b>Relatórios de Eventos:</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding-left: 2px; padding-right: 2px;">

                                  <div class="col-md-3">
                                     <label class="large" for="data_inicial">Data Inicial:</label>
                                       <div class='input-group date' id='datetimepicker5c'>
                                           <input type='text' class="form-control cep" id="data_inicial" name="data_inicial" value="{{ old('data_inicial') }}" placeholder="Data" onkeypress="Data(event,this);"/>
                                                <span class="input-group-addon">
                                                      <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                       </div>
                                  </div>

                                  <div class="col-md-3">

                                     <label class="large" for="data_final">Data Final:</label>
                                    <div class='input-group date' id='datetimepicker5c1'>
                                        <input type='text' class="form-control cep" id="data_final" name="data_final" value="{{ old('data_evento') }}" placeholder="Data" onkeypress="Data(event,this);"/>
                                           <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                    </div>
                                </div>
                             </div>
                            <br><br><br>
                            <div class="row" style="padding-left: 50px">
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon glyphicon-search"> Pesquisar</i></button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('listaevento') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                      </form>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
