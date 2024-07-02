@extends('adminlte::page')

@section('title', 'Registar Cliente')

@section('content_header')
    <h1>Registrar Cleinte</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Home</a></li>
        <li><a href="">Registrar</a></li>
        <li><a href="">Cliente</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form action="{{ url('admin/salvar') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <input type="text" name="nome" class="form-control" value="{{ old('nome') }}"
                           placeholder="Nome do Cliente/Funcionário">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select name="tipo_cliente" id="tipo_cliente" class="form-control">
                    <option value="">Selecione o Tipo</option>
                      @foreach($cliente as $cli)
                            <option value="{{ $cli->id }}">{{ $cli->descricao }}</option>
                      @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

