@extends('adminlte::page')

@section('content')
   <!-- Main content -->
     <div class="row">
         <div class="col-xs-12">
             <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Eventos Para Envio bartenders</h3>
                 </div>
                <!-- /.box-header -->
                 <div class="box-body">
                     @include('eventos.success')
                     @include('eventos.erros')
                     <p><button type="button" class="btn" onclick="window.location='{{ url('/listaeventobar') }}'" style="height: 30px; font-size: 12px;">
                             <i class="glyphicon glyphicon-arrow-left"> Voltar</i></button>
                     </p>
                     <div class="table-responsive aligncenter">
                         @foreach($eventos as $evento)
                             <br>
                         <table id="example" class="table table-striped table-bordered table-hover" style="background-color: #cecece">
                             <thead>
                             <tr>
                                 <th>Nº Evento</th>
                                 <td>{{ $evento->numero_evento}}</td>
                                 <th>Data Evento</th>
                                 <td>{{ $evento->data_evento}}</td>
                             </tr>
                             <tr>
                                 <th>Cidade</th>
                                 <td>{{ $evento->cidade }}</td>
                                 <th>Chegada ao depósito</th>
                                 <td>{{ $evento->chegada_deposito }}</td>
                             </tr>
                             <tr>
                                 <th>Bartenders</th>
                                 <td>{{ $evento->nomebar}}</td>
                                 <th>Carro</th>
                                 <td>{{ $evento->comcarro}}</td>
                             </tr>
                             <tr>
                                 <th>Tipo de Evento</th>
                                 <td>{{ $evento->tipo }}</td>
                                 <th>Uniforme</th>
                                 <td>{{ $evento->uniforme }}</td>
                             </tr>
                             </thead>
                         </table>
                         @endforeach

                         <?php //echo $eventos->render(); ?>
                     </div>
                 </div>
                 <!-- /.box-body -->
             </div>
              <!-- /.box -->
         </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
@endsection

