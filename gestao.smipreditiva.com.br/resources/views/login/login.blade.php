
@extends('layouts.app2')

@section('sidebar')

    @extends('layouts.sidebar')


@section('content')

    <body class="bg-dark">

    @include('login.erros')
    @include('login.success')

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/logar') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="form-label-group">
                            <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Usuário"
                                   onblur="javascript: formatarCampo(this);" maxlength="100">
                            <label for="usuario">Login</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Senha">
                            <label for="password">Senha</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Lembrar
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>

                    </div>

                </form>
                <div class="text-center">
                    <a class="d-block small" href="forgot-password.html">Esqueceu a senha?</a>
                </div>
            </div>
        </div>
    </div>
        @endsection
    </body>
    </html>