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
                <li class="breadcrumb-item active">Criar Usuário</li>
            </ol>
        @include('login.success')
        @include('login.erros')

        <!-- Conteúdo-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    Registrar Usuário</div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/registrar_validar') }}">
                    {{ csrf_field() }}
                    <br>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Preencher E-mail">

                        </div>
                    </div>



                    <div class="form-group">
                        <label for="nome" class="col-md-4 control-label">Nome</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Preencher Razão ou Nome Completo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-md-4 control-label">CPF</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="Preencher com o CPF"
                                   onblur="javascript: formatarCampo(this);" maxlength="14">
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
                                <option value="3">Cliente</option>
                                <option value="2">Cliente-Gestor</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cliente" class="col-md-12 control-label">Selecione um cliente para vinculo:</label>
                                <div class="form-group">
                                <select id="cliente" name="cliente" class="form-control">
                                    <option value="0" selected>Selecione...</option>
                                    @foreach($cli as $clie)
                                        <option value="{{ $clie->cliente }}">{{ $clie->cliente }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div clas="row" align="center">
                        <button type="submit" class="btn btn-success-sm">
                            <i class="fas fa-save"></i>  Salvar</button>
                        <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                            <i class="fas fa-undo-alt"></i> Voltar</button>
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




