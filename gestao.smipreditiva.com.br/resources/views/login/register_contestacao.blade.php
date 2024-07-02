@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Registrar - Usuário Contestação</div>
                <div class="panel-body">

                    @include('login.success')
                    @include('login.erros')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registrar_validar_contestacao') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="re" class="col-md-4 control-label">RE</label>

                            <div class="col-md-6">
                              <input id="re" type="text" class="form-control" name="re" value="{{ old('usuario') }}" placeholder="Preencher RE">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Preencher Nome Completo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cnpj_cpf') }}" placeholder="Preencher com CPF"
                                        onblur="javascript: formatarCampo(this);" maxlength="14">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Preencher E-mail">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="perfil" class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">
                            <select name="perfil" class="form-control">
                              <option value="">Selecione.....</option>
                                @if(Session::get('perfil') == 1)
                                  <option value="1">Administrador</option>
                                @endif
                                @if(Session::get('perfil') == 1 || Session::get('perfil') == 7)
                                <option value="6">Contestação</option>
                                @if(Session::get('perfil') == 1 || Session::get('perfil') == 7)
                              <option value="7">Supervisor</option>
                                @endif
                                @endif
                            </select>
                            </div>
                        </div>

                        <!--  <div class="form-group">
                            <label for="perfil" class="col-md-4 control-label">Turno</label>

                      <div class="col-md-6">
                                <select name="turno" class="form-control">
                                    <option value="">Selecione.....</option>
                                    <option value="Diurno">Diurno</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Noturno">Noturno</option>
                                </select>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Registrar
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
