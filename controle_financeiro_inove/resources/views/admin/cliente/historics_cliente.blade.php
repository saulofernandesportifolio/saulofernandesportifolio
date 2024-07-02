@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1>Histórico</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Registar</a></li>
        <li><a href="">Cliente</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            @include('admin.includes.alerts')

            <form action="{{ url('historic-search-cliente') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}

                <select name="cliente" class="form-control">
                    @if(empty($tipo) || $tipo == '%')
                        <option value="">Todos</option>
                    @else
                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                        <option value="">Todos</option>
                        @foreach($historics1 as $ht )
                            <option value="{{ $ht->nome }}">{{ $ht->nome }}</option>
                        @endforeach
                    @endif
                        @foreach($historics1 as $ht )
                            <option value="{{ $ht->nome }}">{{ $ht->nome }}</option>
                        @endforeach
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
                        <th>Nome</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ $historic->nome }}</td>
                        <td><a href="{{ url('excluir_cliente/'.$historic->id) }}">EXCLUIR</a></td>
                    @endforeach
               </tbody>

            </table>
           
            </div>

        </div>
    </div>

@stop