@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-100 col-md-offset-100">
                <div class="panel">
                    <div class="panel-heading">Cadastro Cliente
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{ url('#') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @foreach($clientes as $cli)

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small" for="nome">Nome:</label>
                                        <input type="text"  class="form-control" id="nome" name="nome" value="{{ $cli->cliente }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="small" for="uf">UF:</label>
                                        <input type="text"  class="form-control" id="uf" name="uf" value="{{ $cli->estado }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small" for="cidade">Cidade:</label>
                                        <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ $cli->cidade }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="contato">Contato:</label>
                                        <input type="text"  class="form-control" id="contato" name="contato" value="{{ $cli->contato }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="small" for="email">E-mail:</label>
                                        <input type="text"  class="form-control" id="email" name="email" value="{{ $cli->email }}">
                                    </div>
                                </div>
                            </div>

                            @endforeach

                            <div clas="row" align="left">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('/home') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection