@extends('adminlte::page')

@section('title', 'Registar Cliente')

@section('content_header')
    <h1>Registrar User</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Home</a></li>
        <li><a href="">Registrar Cliente</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url('salvar') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
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
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.register') }}</button>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

