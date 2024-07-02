@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-100 col-md-offset-100">
            <div class="panel">
                <div class="panel-heading">Protocolos - Histórico Fechados
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if(!empty($motivop))
                            <button id="opcao" type="button" class="btn btn-success col-md-offset-7" onclick="#"><i class="glyphicon glyphicon-chevron-down"></i> Exibir Histórico</button>
                        @endif
                </div>
                <div class="panel-body">
                    <div class="table-responsive aligncenter">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            @foreach($protocolos as $protocolo)
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Protocolo</th>
                                    <th>Pedido</th>
                                    <th>Status</th>
                                    <th>CNPJ/CPF(Cliente)</th>
                                    <th>Anexo</th>
                                </tr>

                            </thead>
                            <tbody>
                             <tr align="center" >
                                <td>{{ $protocolo->data_criacao }}</td>
                                <td>{{ $protocolo->protocolo }}</td>
                                <td>{{ $protocolo->pedido }}</td>
                                <td>{{ $protocolo->status  }}</td>
                                <td>{{ $protocolo->cnpj_cpf  }}</td>
                                <td><a href="{{ $protocolo->endereco_downloadparc }}"><i class="glyphicon glyphicon-download"></i> Download</a></td>
                            </tr>
                            <tr>
                                <th colspan="6">Descrição/Defesa</th>

                            </tr>
                            <tr  align="center">

                                <td colspan="6">{{ $protocolo->descricao_defesa }}</td>
                            </tr>


                            @if(!empty($protocolo->motivo))
                                <tr id="esconder" class="esconder">
                                    <th colspan="6" class="panel2 panel-heading2">Informações Contestação</th>
                                </tr>
                                <tr id="esconder" class="esconder">
                                    <th colspan="1" >Data tratativa</th>
                                    <th colspan="1" >Motivo</th>
                                    <th colspan="3">Sub motivo</th>
                                    <th colspan="1" >Anexo</th>
                                </tr>

                                <tr id="esconder" class="esconder">
                                    <td colspan="1">{{ $protocolo->updated_at }}</td>
                                    <td colspan="1">{{ $protocolo->motivo }}</td>
                                    <td colspan="3">{{ $protocolo->submotivo }}</td>
                                    <td colspan="1"><a href="{{ $protocolo->endereco_downloadcontes }}"><i class="glyphicon glyphicon-download"></i> Download</a></td>

                                </tr>
                                <tr id="esconder" class="esconder">
                                    <th colspan="6">Retorno Contestação</th>

                                </tr>

                                <tr id="esconder" class="esconder">

                                    <td colspan="6">{{ $protocolo->descricao }}</td>
                                </tr>
                                <tr><td colspan="6" class="panel panel-heading"></td></tr>
                            @endif

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <br>
                        <div class="form-group">
                            <div class="col-md-10">
                                @foreach($protocolos as $protocolo)
                                  <form class="form-horizontal" role="form" action="{{ url('/parceiro/reabrir') }}" method="post">
                                      {{ csrf_field() }}
                                    <input type="hidden" name="id"  value="{{ $protocolo->id }}">
                                    <input type="hidden" name="protocolo"  value="{{ $protocolo->protocolo }}">
                                    <input type="hidden" name="pedido"  value="{{ $protocolo->pedido }}">
                                    <input type="hidden" name="cnpj_cpf"  value="{{ $protocolo->cnpj_cpf }}">

                                    @if($protocolo->val < 2 && $protocolo->dias <= 10)

                                    <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-repeat"></i>  Reabrir</button>
                                    @endif
                                      @endforeach
                                    <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro/fechado') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                                  </form>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
