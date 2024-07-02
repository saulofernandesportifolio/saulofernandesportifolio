@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
       <div class="col-md-100 col-md-offset-100">
            <div class="panel">
                <div class="panel-heading">Protocolo - Histórico Abertos
                  @foreach($protocolos as $protocolo)
                     @if(!empty($protocolo->motivo))
                          <button id="opcao" type="button" class="btn btn-success col-md-offset-9" onclick="#"><i class="glyphicon glyphicon-chevron-down"></i> Exibir Histórico</button>
                     @endif
                  @endforeach
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

                                    <tr align="center">
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

                        <br><br>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
