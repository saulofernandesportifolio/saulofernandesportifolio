@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ url('admin/depositar-filtro') }}" class="btn btn-primary"><i class="fa  fa-envelope-o" aria-hidden="true"> Depósito</i></a>
            @if ($amount > 0)
                <a href="{{ url('admin/saque') }}" class="btn btn-danger"><i class="fa   fa-ticket" aria-hidden="true"> Saque</i></a>
            @endif
            @if ($amount > 0)
                <a href="{{ url('admin/transfer-filtro') }}" class="btn btn-info"><i class="fa fa-exchange" aria-hidden="true"> Transferir</i></a>
            @endif
            @if ($amount > 0)
                <a href="{{ url('admin/pagamento') }}" class="btn btn-warning"><i class="fa  fa-barcode" aria-hidden="true"> Pagamento</i></a>
            @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>R$ {{ $amount }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="{{ url('admin/historic') }}" class="small-box-footer">Ver Histórico<i class ="fa fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
@stop