@extends('adminlte::page')

@section('title', 'Registar Cliente')

@section('content_header')
    <h1>Registrar Tarifas</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Home</a></li>
        <li><a href="">Registrar</a></li>
        <li><a href="">Tarifas</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form action="{{ url('cadastro-tarifa-cartao-salvar') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    @foreach($cartao as $cli)
                        <p><h4 align="center">Taifas Anteriores</h4></p>
                        <label>Tarifa no debito:</label>&nbsp{{ $cli->tarifa.'%' }}
                    @endforeach
                </div>
                <div class="form-group has-feedback">
                    @foreach($cartao as $cli)
                        <label>Tarifa no Credito 1 vez:</label>&nbsp{{ $cli->tarifa1.'%' }}
                    @endforeach
                </div>
                <div class="form-group has-feedback">
                    @foreach($cartao as $cli)
                        <label>Tarifa no Credito 2 vezes ou mais:</label>&nbsp{{ $cli->tarifa2.'%' }}
                    @endforeach
                </div>
                <div class="form-group has-feedback">
                <input name="tarifa_no_debito" id="tarifa_no_debito" placeholder="Tarifa no debito numero separado por ponto" class="form-control" value="{{ old('tarifa_no_debito') }}">
                </div>
                <div class="form-group has-feedback">
                 <input name="tarifa_no_credito_1_vez" id="tarifa_no_credito_1_vez" placeholder="Tarifa no Credito 1 vez numero separado por ponto" class="form-control" value="{{ old('tarifa_no_credito_1_vez') }}">
                </div>
                <div class="form-group has-feedback">
                <input name="tarifa_no_credito_2_vezes_ou_mais" id="tarifa_no_credito_2_vezes_ou_mais" placeholder="Tarifa no Credito 2 vezes ou mais numero separado por ponto" class="form-control" value="{{ old('tarifa_no_credito_2_vezes_ou_mais') }}">

                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                <button class="btn btn-warning btn-block btn-flat" type="button" onclick="window.location='{{ url('admin/balance') }}'">Voltar</button>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop