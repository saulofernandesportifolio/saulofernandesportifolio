@extends('adminlte::page')

@section('title', 'Registar User')

@section('content_header')
    <h1>Alterar Senha User</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Home</a></li>
        <li><a href="">Alterar Senha</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')
            <p class="login-box-msg">Alterar Senha</p>
            <form action="{{ url('alterar_senha-salvar') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                 <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar</button>
                <button class="btn btn-warning btn-block btn-flat" type="button" onclick="window.location='{{ url('admin/balance') }}'">Voltar</button>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

