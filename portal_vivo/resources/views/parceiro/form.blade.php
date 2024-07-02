@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-auto col-md-offset-0">
            <div class="panel">
                <div class="panel-heading">Parceiro - Novo Protocolo</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                          <form class="form-horizontal" role="form" action="{{ url('/parceiro/salvar') }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                               <div class="form-group">
                                  <label for="pedido" class="col-md-1 control-label">Pedido</label>

                                  <div class="col-md-2">
                                      <input id="pedido" type="text" class="form-control" name="pedido" value="{{ old('pedido') }}" placeholder="Preencher Pedido">
                                  </div>
                                  <label for="pedido" class="col-md-2 control-label">CNPJ/CPF do Cliente</label>

                                  <div class="col-md-2">
                                      <input id="cnpj_ou_cpf" type="text" class="form-control" name="cnpj_ou_cpf" value="{{ old('cnpj_ou_cpf') }}" placeholder="Preencher CNPJ OU CPF"
                                             onblur="javascript: formatarCampo(this);" maxlength="18">
                                  </div>

                              </div>
                              <div class="form-group">
                                  <label for="descricao_defesa" class="col-md-1 control-label">Descrição/Defesa</label>

                                  <div class="col-md-10">
                                      <textarea rows="15" id="descricao_defesa" type="text" class="form-control" name="descricao_defesa" value="{{ old('descricao_defesa') }}" placeholder="Preencher Descrição/Defesa"></textarea>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="anexo" class="col-md-1 control-label">Anexo</label>
                                <div class="col-md-11 col-lg-11">
                                  <div class="input-group control-group increment" >
                                      <input type="file" name="filename[]" class="form-control" style="width:95%;">
                                      <div class="input-group-btn" style="left:-9%;">
                                          <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                      </div>
                                  </div>
                                  <div class="clone hide">
                                      <div class="aumentar_input_dow control-group input-group" style="margin-top:1%;">
                                          <input type="file" name="filename[]" class="form-control" style="width:110%;">
                                          <div class="input-group-btn" style="left:2.3%;">
                                              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                          </div>
                                      </div>
                                  </div>
                                </div>

                              </div>



                              <button type="submit" class="btn btn-success">
                                  <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                              <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro') }}'">
                                  <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                          </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
