@extends('adminlte::page')

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Clientes - Detalhes/Editar</h3>
                    <div class="panel-body">
                         <form  role="form" method="POST" action="{{ url('/updateclientes') }}" style="margin-left: 20px;">
                            {{ csrf_field() }}

                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <label class="small" for="nome">Nome:</label>
                                        @foreach($clientes as $cli)
                                        <input type="text"  class="form-control" id="nome" name="nome" value="{{ $cli->nome }}" placeholder="Nome do bartenders">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-2">
                                         <label class="small" for="cep">Cep:</label>
                                         @foreach($clientes as $cli)
                                         <input onblur="javascript: formatarCampocep(this);" type="text"  class="form-control  cep" id="cep" name="cep" maxlength="9" value="{{ $cli->cep }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-5">
                                         <label class="small" for="endereco">Endereço:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control" id="endereco" name="endereco" value="{{ $cli->endereco }}">
                                         @endforeach
                                     </div>
                                     <div class="col-md-1">
                                         <label class="small" for="numero">Nº:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control" id="numero" name="numero" value="{{ $cli->numero }}">
                                         @endforeach
                                     </div>
                                     <div class="col-md-2">
                                         <label class="small" for="bairro">Bairro:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control" id="bairro" name="bairro" value="{{ $cli->bairro }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-3">
                                         <label class="small" for="cidade">Cidade:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control" id="cidade" name="cidade" value="{{ $cli->cidade }}">
                                         @endforeach
                                     </div>

                                     <div class="col-md-3">
                                         <label class="small" for="uf">Uf:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control uf" id="uf" name="uf" value="{{ $cli->uf }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group">
                                     <div class="col-md-3">
                                         <label class="small" for="uf">Telefone:</label>
                                         @foreach($clientes as $cli)
                                             <input type="text"  class="form-control" id="telefone" name="telefone" value="{{ $cli->telefone }}">
                                         @endforeach
                                     </div>
                                     <div class="col-md-2">
                                         <label class="small" for="uf">Responsável:</label>
                                         @foreach($clientes as $cli)
                                         <input type="text"  class="form-control" id="responsavel" name="responsavel" value="{{ $cli->responsavel }}">
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                           </br>
                            <input type="hidden" name="id" value="{{ $cli->id }}">
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

