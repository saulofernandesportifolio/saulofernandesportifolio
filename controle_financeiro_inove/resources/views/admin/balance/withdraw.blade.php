@extends('adminlte::page')

@section('title', 'Saque')

@section('content_header')
    <h1>Efetuar Saque</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Saque</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3></h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')     

            <form action="{{ url('admin/sacar') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                <div class="input-group" class="form-control">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" class="form-control" placeholder="Valor do depósito somente numeros">
                    <span class="input-group-addon">,00</span>
                </div>
                </div>
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" name="data" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                </div>
                </div>
                <div class="form-group">
                    <select name="sacado" class="form-control">
                        <option value="">Selecione o Sacado</option>
                        @foreach($depositante as $dep)
                            @if($dep->id != 73)
                            <option value="{{ $dep->id }}">{{ $dep->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="observacao" class="form-control" placeholder="Observações"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Sacar</button>
                    <button class="btn btn-warning" type="button" onclick="window.location='{{ url('admin/balance') }}'">Voltar</button>

                </div>
            </form>
        </div>
    </div>
@stop