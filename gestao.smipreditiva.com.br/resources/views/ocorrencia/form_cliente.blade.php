
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Clientes</a>
                </li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Clientes</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')

                    <form role="form" action="{{ url('/cliente/salvar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small" for="nome">Nome:</label>
                                    <input type="text"  class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="uf">UF:</label>
                                    <input type="text"  class="form-control" id="uf" name="uf" value="{{ old('uf') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="cidade">Cidade:</label>
                                    <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="contato">Contato:</label>
                                    <input type="text"  class="form-control" id="contato" name="contato" value="{{ old('contato') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="email">E-mail:</label>
                                    <input type="text"  class="form-control" id="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="small" for="image">Selecione o logo do cliente:</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>

                        <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="gestor" >Selecione o Gestor:</label>
                                    <select id="gestor" name="gestor" class="form-control">
                                        <option value="" selected>Selecione...</option>
                                        @foreach($user as $users)
                                            <option value="{{ $users->id }}">{{ $users->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-save"></i>  Salvar</button>
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                                <i class="fas fa-undo-alt"></i> Voltar</button>
                        </div>

                    </form>




                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>