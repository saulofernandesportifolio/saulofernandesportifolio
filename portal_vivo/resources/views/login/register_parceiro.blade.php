@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Registrar - Usuário Parceiro</div>
                <div class="panel-body">

                    @include('login.success')
                    @include('login.erros')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registrar_validar_parceiro') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="re" class="col-md-4 control-label">Adabas</label>

                            <div class="col-md-6">
                              <input id="adabas" type="text" class="form-control" name="adabas" value="{{ old('adabas') }}" placeholder="Preencher Adabas">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Razão/Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Preencher Razão ou Nome Completo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">CNPJ/CPF</label>

                            <div class="col-md-6">
                                <input id="cnpj_ou_cpf" type="text" class="form-control" name="cnpj_ou_cpf" value="{{ old('cnpj_ou_cpf') }}" placeholder="Preencher com CNPJ ou CPF"
                                        onblur="javascript: formatarCampo(this);" maxlength="18">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Preencher E-mail">

                            </div>
                        </div>

                        <div class="form-group">
                              <input id="perfil" type="hidden" class="form-control" name="perfil" value="5">

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
