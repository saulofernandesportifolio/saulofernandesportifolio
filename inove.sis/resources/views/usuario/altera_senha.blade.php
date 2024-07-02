@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">É necessário alterar a senha</div>
                    <div class="panel-body">

                        @include('auth.success')
                        @include('auth.erros')

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
                            <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-user"></i> Salvar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection