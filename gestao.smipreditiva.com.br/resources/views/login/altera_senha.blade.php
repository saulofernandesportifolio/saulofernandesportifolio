@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Inicio -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Usuários</a>
                </li>
                <li class="breadcrumb-item active">Alterar Senha</li>
            </ol>
        @include('login.success')
        @include('login.erros')

        <!-- Conteúdo-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    Alterar Senha</div>
                <br>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/alterar_senha/salvar') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Senha</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Preencher senha">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Preencher senha">

                        </div>
                    </div>



                    <div clas="row" align="center">
                        <button type="submit" class="btn btn-success-sm">
                            <i class="fas fa-save"></i>  Salvar</button>

                    </div>
                </form>




                <div class="card-body">
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>

        @endsection

    </div>


    </body>

    </html>




