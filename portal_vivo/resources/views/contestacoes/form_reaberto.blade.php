@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel">
                <div class="panel-heading">Contestações - Reabertura de Protocolo</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" action="{{ url('/contestacao/salvar_reaberto') }}" method="post">
                        {{ csrf_field() }}

                     @foreach($protocolos as $protocolo)
                            <input type="hidden" name="id" value="{{ $protocolo->id }}">
                            <div class="form-group">
                                <label for="protocolo" class="col-md-4 control-label">Protocolo</label>

                                <div class="col-md-6">
                                    <p class="form-control">{{ $protocolo->protocolo }}</p>
                                    <input type="hidden" name="protocolo" value="{{ $protocolo->protocolo }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pedido" class="col-md-4 control-label">Pedido</label>

                                <div class="col-md-6">
                                    <p class="form-control">{{ $protocolo->pedido }}</p>
                                    <input type="hidden" name="pedido" value="{{ $protocolo->pedido }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pedido" class="col-md-4 control-label">CNPJ/CPF do Cliente</label>

                                <div class="col-md-6">
                                    <p class="form-control">{{ $protocolo->cnpj_cpf }}</p>
                                    <input type="hidden" name="cnpj_cpf" value="{{ $protocolo->cnpj_cpf }}">
                                </div>
                            </div>
                      @endforeach
                        <div class="form-group">
                            <label for="descricao_defesa" class="col-md-4 control-label">Descrição/Defesa</label>

                            <div class="col-md-6">
                                <textarea id="descricao_defesa" type="text" class="form-control" name="descricao_defesa" value="{{ old('descricao_defesa') }}" placeholder="Preencher Descrição/Defesa"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anexo" class="col-md-4 control-label">Anexo</label>

                            <div class="col-md-6">
                                <input type="file" name="anexo"/>
                            </div>
                        </div>

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
@endsection
