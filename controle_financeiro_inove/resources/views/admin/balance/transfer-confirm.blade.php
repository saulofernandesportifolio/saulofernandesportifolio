@extends('adminlte::page')

@section('title', 'Confirmação de Transferência')

@section('content_header')
    <h1>Confirmação de Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</a></li>
        <li><a href="">Confirmação</a></li>
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
            @foreach($transferir1 as $tf)
                <p><strong>Recebedor: </strong>{{ $tf->nome }}</p>
            @endforeach
            <form action="{{ url('admin/transferir') }}" method="POST">
                {!! csrf_field() !!}

                @foreach($transferir1 as $tf)
                <input type="hidden" name="sender_id" value="{{ $tf->id }}">
                @endforeach
                <div class="input-group form-group">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" class="form-control" placeholder="Valor:">
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
                </div>
            </form>
        </div>
    </div>
@stop