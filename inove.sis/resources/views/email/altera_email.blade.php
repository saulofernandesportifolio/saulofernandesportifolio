@extends('adminlte::master')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel">
                <div class="panel-heading">Alterar E-mail</div>
                <div class="panel-body">
                    @include('auth.erros')
                    @include('auth.success')
                          <form class="form-horizontal" role="form" action="{{ url('/email_alterar/salvar/') }}" method="post">
                              {{ csrf_field() }}
                               <div class="form-group">
                                  <label for="usuario" class="col-md-2 control-label">Cpf</label>

                                  <div class="col-md-4">
                                      <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="Preencher cpf" onblur="javascript: formatarCampo(this);" maxlength="14">
                                  </div>
                               </div>
                              <div class="form-group">
                                  <label for="descricao_defesa" class="col-md-2 control-label">Novo E-mail</label>

                                  <div class="col-md-6">
                                      <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Preencher email">
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success">
                                  <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                              <button type="button" class="btn btn-success" onclick="window.location='{{ url('/') }}'">
                                  <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                          </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
