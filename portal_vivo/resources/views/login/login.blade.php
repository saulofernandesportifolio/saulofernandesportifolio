@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    @include('login.erros')
                    @include('login.success')
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/logar') }}">
                       {{ csrf_field() }}

                        <div class="form-group">
                            <label for="usuario" class="col-md-4 control-label">Usuário</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Usuário"
                                        onblur="javascript: formatarCampo(this);" maxlength="14">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lembrar Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input id="cont" type="hidden" class="form-control" name="cont" value="">
                                <input id="cont2" type="hidden" class="form-control" name="cont2" value="">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" style="background-color: #ffffff;" href="{{ url('/resetar') }}">Esqueceu a senha ?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
