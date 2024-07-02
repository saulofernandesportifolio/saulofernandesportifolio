@extends('adminlte::page')

@section('title', 'Histórico de Transações')

@section('content_header')
    <h1>Histórico</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Registar</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            @include('admin.includes.alerts')

            <form action="{{ url('historic-search-user') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}

                <input type="date" name="date1" class="form-control" value="{{ $date1 }}">
                <input type="date" name="date2" class="form-control" value="{{ $date2 }}">

                <select name="type" class="form-control">
                    @if(empty($tipo) || $tipo == '%')
                    <option value="">Todos</option>
                    @else
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                    @endif
                    <option value="">Todos</option>
                    <option value="DEPOSITO">ATIVO</option>
                    <option value="SAQUE">DESATIVO</option>
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
                        <th>E-mail</th>
                        <th>Situacao</th>
                        <th>Data Criaçao</th>
                        <th>Ativar/Dasativar</th>
                        <th>Reset de Senha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historics as $historic)
                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ $historic->name }}</td>
                        <td>{{ $historic->email }}</td>
                        <td>{{ $historic->situacao }}</td>
                        <td>{{ $historic->created_at }}</td>
                        @if($historic->situacao == 'ATIVO')
                            <td><a href="{{ url('desativar/'.$historic->id) }}">DESATIVAR</a></td>
                        @else
                            <td><a href="{{ url('ativar/'.$historic->id) }}">ATIVAR</a></td>
                        @endif
                        <td><a href="{{ url('resetar/'.$historic->id) }}">EFETUAR RESET</a></td>
                     </tr>
                    @endforeach
               </tbody>

            </table>
            
            </div>

        </div>
    </div>

@stop