@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <h1>Efetuar Depósito</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3></h3>
        </div>
        <div class="box-body">    
            @include('admin.includes.alerts')
            <form action="{{ url('admin/depositar') }}" method="GET">
                {!! csrf_field() !!}
                <div class="form-group">
                    <select name="tipo_filtro" id="tipo_filtro" class="form-control">
                     <option value="">Selecione o Filtro</option>
                     @foreach($tiposclientes as $dep)
                         <option value="{{ $dep->id  }}">{{ $dep->descricao }}</option>
                     @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Filtrar</button>
                    <button class="btn btn-warning" type="button" onclick="window.location='{{ url('admin/balance') }}'">Voltar</button>
                </div>
            </form>
        </form>
    </div>
@stop


