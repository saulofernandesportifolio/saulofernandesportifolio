@extends('adminlte::page')

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Bartenders</h3>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('auth.success')
                    @include('auth.erros')
                    <p><button type="button" class="btn" onclick="window.location='{{ url('bartenders/cadastro') }}'" style="height: 30px; font-size: 12px;">
                            <i class="glyphicon glyphicon glyphicon-plus"> Novo</i></button>
                        <button type="button" class="btn" onclick="window.location='{{ url('bartenders/reativacao') }}'" style="height: 30px; font-size: 12px;">
                            <i class="glyphicon glyphicon glyphicon-plus"> Reativação</i></button>
                    </p>
                        <form name="form2" action="{{ url('/bartenders/libera') }}" method="POST">
                            {{ csrf_field() }}
                          <div class="panel panel-default">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="panel-footer">
                                        <h4><b>Disponibilidade Para Eventos:</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="panel-body">
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

                                <div class="col-md-2">
                                    <label class="large" for="liberado">Limpar:</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="limpa" name="limpa" value="Não" checked>
                                        <label class="custom-control-label" for="defaultChecked">Não</label>
                                        <input type="radio" class="custom-control-input" id="limpa" name="limpa" value="Sim">
                                        <label class="custom-control-label" for="limpa">Sim</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="large" for="liberado">Liberado:</label>
                                    <div class="form-group">
                                    <select name="libera" id="libera" class="form-control-box bradius">
                                        <option value="">Selecione</option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label></label>
                                    <button type="submit" class="btn btn-danger">Atualizar</button>
                                </div>
                             </div>
                            </div>
                          </div>
                         <div class="table-responsive aligncenter">
                               <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" id="checkbox" value="1" onclick="return selecionar_todas(this.checked);" /></th>
                                 <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>Score</th>
                                    <th>Carro</th>
                                    <th>Genero</th>
                                    <th>Apito</th>
                                    <th>Periodo</th>
                                    <th>Liberado</th>
                                    <th>Status</th>
                                    <th>Abrir</th>
                                    <th>Desativar</th>
                                    <th>Excluir</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bartenders as $bartender)
                                    <tr>
                                    <td><input type="checkbox" name="check[]" value="{{ $bartender->id }}" value="{{ old('data_evento') }}"></td>
                                    <td>{{ $bartender->nome }}</td>
                                    <td>{{ $bartender->cidade }}</td>
                                    <td>{{ $bartender->score }}</td>
                                    <td>{{ $bartender->carro }}</td>
                                    <td>{{ $bartender->genero }}</td>
                                    <td>{{ $bartender->apito }}</td>
                                    @if(empty($bartender->data_inicial))
                                      <td>-----</td>
                                    @else
                                      <td>De: {{ $bartender->data_inicial }} até {{ $bartender->data_final }}</td>
                                    @endif
                                    @if(empty($bartender->data_inicial))
                                      <td>-----</td>
                                    @else
                                      <td>{{ $bartender->liberado }}</td>
                                    @endif
                                      <td>{{ $bartender->status }}</td>
                                    <td>
                                        <button type="button" class="btn" onclick="window.location='{{ url('/bartenders/vizualiza/'.$bartender->id) }}'">
                                            <i class="glyphicon glyphicon-folder-open"></i></button>
                                    </td>

                                     <td align="center">
                                       <button type="button" class="btn btn-danger" onclick="window.location='{{ url('/bartenders/desativar/'.$bartender->id) }}'" style="height: 30px; font-size: 12px;">
                                        <i class="glyphicon glyphicon-remove"></i></button>
                                    </td>


                                     <td align="center">
                                         <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/bartenders/excluir/'.$bartender->id) }}'" style="height: 30px; font-size: 12px;">
                                             <i class="glyphicon glyphicon-trash"></i></button>
                                     </td>



                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            <?php //echo $bartenders->render(); ?>
                        </div>
                         </form>
                </div>
            </div>
        </div>
    </div>
@endsection
