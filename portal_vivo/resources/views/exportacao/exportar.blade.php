@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel">
           <div class="panel-heading">Exportar - Base Massivo.</div>
             <div class="panel-body">
                    <br><br>
                <form method="POST"  action="{{ url("exportar/excel")}}" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                   <div class="col-md-0">
                     <input name="pesquisa" id="1" type="radio" value="1"  value="1" checked=""/>
                     <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Geral</font>
                     <input name="pesquisa" id="4" type="radio" value="4" />
                     <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data Criação</font>
                     <input name="pesquisa" id="5" type="radio" value="5" />
                     <font color="464646" size="2" face="Arial, Helvetica, sans-serif">Data tratativa</font>
                     <br /><br /><br /><br />
                     <div class='col-sm-5' style="width:100px;"><h6><b>Data inicial:</b></h6></div>
                     <div class='col-sm-6' style="width:155px;">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker5'>
                                <input type='text' class="form-control campo_calendar" name="data_1" placeholder="Preencher"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                        </div>
                     </div>

                     <div class='col-sm-7' style="width:100px;"><h6><b>Data final:</b></h6></div>
                     <div class='col-sm-8' style="width:155px;">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker5b'>
                                <input type='text' class="form-control campo_calendar" name="data_2" placeholder="Preencher"/>
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                        </div>
                     </div>

                   </div>
                 </div>
                 <br><br><br><br>
                  <div class="form-group">
                    <div class="col-md-10">
                      <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-floppy-saved"></i>  Gerar</button>
                       <button type="button" class="btn btn-success" onclick="window.location='{{ url('/') }}'">
                        <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                    </div>
                  </div>
                </form>
             </div>
          </div>
        </div>
      </div>
   </div>
</div>
@endsection

