@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row">
        <div class="col-md-5 col-md-offset-3">
          <div class="panel">
            <div class="panel-heading">Contestações - Motivos</div>
                <div class="panel-body">

                    @include('login.success')
                    @include('login.erros')
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" action="{{ url('#') }}" method="post">
                                 <div class="form-group">
                                 <label for="motivo" class="col-md-4 control-label">Motivo</label>

                                 <div class="col-md-6">
                                   <p>
                                    {!! Form::select('motivo',$motivos,null,['id'=>'motivo']) !!}

                                   </p>

                                 </div>
                              </div>

                             <div class="form-group">
                                 <label for="submotivo" class="col-md-4 control-label">Sub Motivo</label>

                                <div class="col-md-6">
                                 <p>
                                    {!! Form::select('submotivo',['placeholder'=>'Selecione.....'],null,['id'=>'submotivo']) !!}
                                 </p>
                               </div>
                            </div>
                          <br><br>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('/contestacao') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>

                    </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection