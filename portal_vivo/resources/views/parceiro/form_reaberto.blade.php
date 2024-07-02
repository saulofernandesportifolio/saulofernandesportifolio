@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
       <div class="col-md-auto col-md-offset-0">
            <div class="panel">
                <div class="panel-heading">Parceiro - Reabertura de Protocolo</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" action="{{ url('/parceiro/salvar_reaberto') }}" method="post">
                        {{ csrf_field() }}

                     @foreach($protocolos as $protocolo)
                            <input type="hidden" name="id" value="{{ $protocolo->id }}">
                            <div class="form-group">
                                <label for="data_hora" class="col-md-1 control-label">Data/Hora</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->data_criacao }}</p>
                                    <input type="hidden" name="data_criacao" value="{{ $protocolo->data_criacao }}">
                                </div>

                                <label for="protocolo" class="col-md-1 control-label">Protocolo</label>

                                <div class="col-md-1">
                                    <p class="form-control">{{ $protocolo->protocolo }}</p>
                                    <input type="hidden" name="protocolo" value="{{ $protocolo->protocolo }}">
                                </div>

                                <label for="pedido" class="col-md-1 control-label">Pedido</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->pedido }}</p>
                                    <input type="hidden" name="pedido" value="{{ $protocolo->pedido }}">
                                </div>

                                <label for="cnpj_cpf" class="col-md-1 control-label">CNPJ/CPF(Cliente)</label>

                                <div class="col-md-2">
                                    <p class="form-control">{{ $protocolo->cnpj_cpf }}</p>
                                    <input type="hidden" name="cnpj_cpf" value="{{ $protocolo->cnpj_cpf }}">
                                </div>
                            </div>
                      @endforeach
                        <div class="form-group">
                            <label for="descricao_defesa" class="col-md-1 control-label">Descrição/Defesa</label>

                            <div class="col-md-10">
                                <textarea rows="10" id="descricao_defesa" type="text" class="form-control" name="descricao_defesa" value="{{ old('descricao_defesa') }}" placeholder="Preencher Descrição/Defesa"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anexo" class="col-md-1 control-label">Anexo</label>

                            <div class="col-md-10 input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="clone hide">
                                <div class="col-md-10 control-group input-group" style="margin-top:10px; margin-left:98px;">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                        <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro/fechado') }}'">
                            <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
