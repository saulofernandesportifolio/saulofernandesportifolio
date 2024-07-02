@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading">Editar - Usuário</div>
                <div class="panel-body">

                    @include('login.success')
                    @include('login.erros')

                    @foreach($usuario as $us)
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editar/alterado/'.$us->id) }}">
                        {{ csrf_field() }}
                        @endforeach

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                @foreach($usuario as $us)
                                <input id="nome" type="text" class="form-control" name="usuario" value="{{ $us->usuario }}" placeholder="Preencher Razão ou Nome Completo">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                @foreach($usuario as $us)
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $us->nome }}" placeholder="Preencher Razão ou Nome Completo">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                @foreach($usuario as $us)
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $us->cnpj_cpf }}" placeholder="Preencher com o CPF"
                                        onblur="javascript: formatarCampo(this);" maxlength="14">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                @foreach($usuario as $us)
                                <input id="email" type="email" class="form-control" name="email" value="{{ $us->email }}" placeholder="Preencher E-mail">
                                @endforeach
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="perfil" class="col-md-4 control-label">Perfil</label>
                            <div class="col-md-6">
                                <select name="perfil" class="form-control">
                                    @foreach($usuario as $us)
                                        @if($us->perfil == 1)
                                         <option value="1">Administrador</option>
                                        @else
                                         <option value="2">Cliente</option>
                                        @endif
                                    @endforeach
                                    @if(Session::get('perfil') == 1)
                                        <option value="1">Administrador</option>
                                    @endif
                                    <option value="2">Cliente</option>
                                </select>
                            </div>
                        </div>
                        @foreach($usuario as $us)
                        <input type="hidden" value="{{ $us->id }}" name="id">
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Alterar
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
