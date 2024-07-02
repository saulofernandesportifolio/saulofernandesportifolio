@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1>Histórico</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        @include('admin.includes.alerts')
        <div class="box-header">
            <form action="{{ url('admin/historic-search') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}

                <input type="date" name="date1" class="form-control" value="{{ $date1 }}">
                <input type="date" name="date2" class="form-control" value="{{ $date2 }}">

                <select name="type" class="form-control">
                    @if(empty($tipo) || $tipo == '%')
                    <option value="%">Todos</option>
                    @else
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                    @endif
                    <option value="%">Todos</option>
                    <option value="DEPOSITO">DEPOSITADO</option>
                    <option value="SAQUE">SAQUE</option>
                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                    <option value="PAGAMENTO">PAGAMENTO</option>
                    <option value="RECEBIDO">RECEBIDO</option>
                </select>

                <select name="tipocompra" class="form-control">
                    @if(empty($tipocompra) || $tipocompra == '%')
                        <option value="">Todos</option>
                    @else
                        <option value="{{ $tipocompra }}">{{ $tipocompra }}</option>
                    @endif
                    <option value="%">Todos</option>
                    <option value="A vista">A vista</option>
                    <option value="No debito">No debito</option>
                    <option value="No credito">No credito</option>

                </select>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
                <!--<button type="reset" class="btn btn-danger">Limpar</button>-->
            </form>
        </div>
        <div class="box-body">
            <div class="table-responsive aligncenter">

            
            <table class="table table-hover table-bordered">
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Valor Tramitando</th>
                        <th>Valor Recebido</th>
                        <th>Valor Referente a Compra</th>
                        <th>Saldo Antes</th>
                        <th>Saldo Depois</th>
                        <th>Tipo</th>
                        <th>Tipo Compra</th>
                        <th>Data</th>
                        <th>Remetente</th>
                        <th>Observaçao</th>
                        <th>Recebido</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->montante ? $historic->montante : 0, '2', ',', '.') }}</td>
                        <td>{{ number_format($historic->recebido ? $historic->recebido : 0, '2', ',', '.') }}</td>
                        <td>{{ number_format($historic->valor_referente ? $historic->valor_referente : 0, '2', ',', '.') }}</td>
                        <td>{{ number_format($historic->total_antes ? $historic->total_antes : 0, '2', ',', '.') }}</td>
                        <td>{{ number_format($historic->total_depois ? $historic->total_depois : 0, '2', ',', '.') }}</td>
                        <td>{{ $historic->type }}</td>
                        <td>{{ $historic->tipo_compra }}</td>
                        <td>{{ $historic->data }}</td>
                        <td>
                        @if (empty($historic->nomecli))
                           {{ $empresa }}
                        @else
                        {{ $historic->nomecli }}
                        @endif
                        </td>
                        <td>{{ $historic->observacao }}</td>
                        @if($historic->type == 'DEPOSITO')
                        <td align="center">
                               <button type="button" class="btn btn-primary" onclick="window.location='{{ url('/historic/recebido/'.$historic->id) }}'" style="height: 30px; font-size: 12px;">
                                   SIM</button>
                        </td>
                        @else
                        <td align="center">
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('#') }}'" style="height: 30px; font-size: 12px;">
                                    RECEBIDO</button>
                        </td>
                        @endif
                        <td align="center">
                            <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/historic/excluir/'.$historic->id) }}'" style="height: 30px; font-size: 12px;">
                                <i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach

                   <tr>
                      <th style="text-align: left;background-color: #3c8dbc;color: #ffffff;">Total</th>
                       @foreach($total as $tl)
                       <th colspan="12" style="text-align: left;background-color: #3c8dbc;color: #ffffff;">{{ number_format($tl->total_geral ? $tl->total_geral : 0, '2', ',', '.') }}</th>
                       @endforeach
                       @foreach($total1 as $tl1)
                       <!--<th colspan="">{{ number_format($tl1->total_geral_antes ? $tl1->total_geral_antes : 0, '2', ',', '.') }}</th>-->
                       <!--<th colspan="5">{{ number_format($tl1->total_geral_depois ? $tl1->total_geral_depois : 0, '2', ',', '.') }}</th>-->
                       @endforeach
                   </tr>

                </tbody>

            </table>
            <table class="table table-hover table-bordered">
                <tr>
                    <th colspan="5" style="text-align: center;background-color: #3c8dbc;color: #ffffff;" >Saldos Atualizados</th>
                </tr>
                <tr>
                @foreach($total as $tl)
                    <!--<th colspan="">{{ number_format($tl->total_geral ? $tl->total_geral : 0, '2', ',', '.') }}</th>-->
                    @endforeach
                    @foreach($total1 as $tl1)
                        <th colspan="1">Saldos Anterior</th>
                        <th colspan="1">{{ number_format($tl1->total_geral_antes ? $tl1->total_geral_antes : 0, '2', ',', '.') }}</th>
                        <th colspan="1">Saldos Atual</th>
                        <th colspan="1">{{ number_format($tl1->total_geral_depois ? $tl1->total_geral_depois : 0, '2', ',', '.') }}</th>
                    @endforeach
                </tr>
            </table>
             
            
            </div>
        </div>
    </div>
@stop