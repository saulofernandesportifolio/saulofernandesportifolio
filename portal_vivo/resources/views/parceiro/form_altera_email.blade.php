@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel">
                <div class="panel-heading">Parceiro - Alterar E-mail</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                          <form class="form-horizontal" role="form" action="{{ url('/parceiro/email_alterar/salvar/') }}" method="post">
                              {{ csrf_field() }}
                               <div class="form-group">
                                  <label for="adabas" class="col-md-2 control-label">Adabas</label>

                                  <div class="col-md-3">
                                     @foreach($parceiros as $parceiro)
                                          <p class="form-control">{{ $parceiro->usuario }}</p>
                                          <input type="hidden" name="usuario" value="{{ $parceiro->usuario }}">
                                     @endforeach
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
                              <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro') }}'">
                                  <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                          </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection
