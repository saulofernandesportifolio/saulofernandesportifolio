@extends('adminlte::page')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cadastro Clientes</h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('auth.success')
                        @include('auth.erros')
                         <form  role="form" method="POST" action="{{ url('/addclientes') }}" style="margin-left: 20px;">
                            {{ csrf_field() }}

                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <label class="small" for="nome">Nome:</label>
                                        <input type="text"  class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Nome do Cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="cep">Cep:</label>
                                        <input onblur="javascript: formatarCampocep(this);" type="text"  class="form-control  cep" id="cep" name="cep" maxlength="9" value="{{ old('cep') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label class="small" for="endereco">Endereço:</label>
                                        <input type="text"  class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="small" for="numero">Nº:</label>
                                        <input type="text"  class="form-control" id="numero" name="numero" value="{{ old('numero') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="bairro">Bairro:</label>
                                        <input type="text"  class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="small" for="cidade">Cidade:</label>
                                        <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="small" for="uf">Uf:</label>
                                        <input type="text"  class="form-control uf" id="uf" name="uf" value="{{ old('uf') }}">
                                    </div>
                                </div>
                            </div>


                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-2">
                                         <label class="small" for="uf">Telefone:</label>
                                         <input type="text"  class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
                                     </div>
                                     <div class="col-md-2">
                                         <label class="small" for="uf">Responsável:</label>
                                         <input type="text"  class="form-control" id="responsavel" name="responsavel" value="{{ old('responsavel') }}">
                                     </div>
                                 </div>
                             </div>

                             </br>
                            <div class="row" align="center">
                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('listaclientes') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 </div>
@endsection

