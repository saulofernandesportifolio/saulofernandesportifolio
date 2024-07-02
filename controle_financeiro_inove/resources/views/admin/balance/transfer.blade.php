@extends('adminlte::page')

@section('title', 'Transfererir')

@section('content_header')
    <h1>Efetuar Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Informe o recebedor</h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')
            @foreach($balance as $bc)
                <p><strong>Saldo atual: R$ </strong>{{ number_format($bc->montante, 2, ',','.') }}</p>
            @endforeach
            <form action="{{ url('admin/transferir') }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group">
                    <select name="nome_transferencia" class="form-control">
                        <option value="">Selecione Nome para Transferência</option>
                        @foreach($transferir as $trans)
                            @if($trans->id != 114 && $trans->id != 73 ) 
                            <option value="{{ $trans->id }}">{{ $trans->nome }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="input-group form-group">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" class="form-control" placeholder="Valor: somente numeros">
                    <span class="input-group-addon">,00</span>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" name="data" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                </div>
                <div class="form-group">
                    <textarea name="observacao" class="form-control" placeholder="Observações"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Transferir</button>
                    <button class="btn btn-warning" type="button" onclick="window.location='{{ url('admin/transfer-filtro') }}'">Voltar</button>
                </div>
            </form>
        </div>
    </div>
@stop