@extends('adminlte::page')

@section('content')
   <!-- Main content -->
     <div class="row">
         <div class="col-xs-12">
             <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Lista de Eventos Fechados</h3>
                 </div>
                <!-- /.box-header -->
                 <div class="box-body">
                     @include('eventos.success')
                     @include('eventos.erros')
                     <p>
                         <button type="button" class="btn" onclick="window.location='{{ url('/listaeventopendentes') }}'" style="height: 30px; font-size: 12px;">
                             <i class="glyphicon glyphicon-exclamation-sign"> Pendentes</i></button>
                         <button type="button" class="btn" onclick="window.location='{{ url('/listaevento') }}'" style="height: 30px; font-size: 12px;">
                             <i class="glyphicon glyphicon-arrow-left"> Abertos</i></button>

                     </p>
                     <div class="table-responsive aligncenter">
                         <table id="example" class="table table-striped table-bordered table-hover">
                             <thead>
                             <tr>
                                 <th>Nº do Evento</th>
                                 <th>Data Evento</th>
                                 <th>Cliente</th>
                                 <th>Tipo de Festa</th>
                                 <th>Cidade</th>
                                 <th>horário do depósito</th>
                                 <th>Abrir</th>
                                 <th>Excluir</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 @foreach($eventos as $evento)
                                     <td>{{ $evento->numero_evento}}</td>
                                     <td>{{ $evento->data_evento}}</td>
                                     <td>{{ $evento->cliente}}</td>
                                     <td>{{ $evento->tipo }}</td>
                                     <td>{{ $evento->cidade }}</td>
                                     <td>{{ $evento->chegada_deposito }}</td>
                                     <td>
                                         <button type="button" class="btn" onclick="window.location='{{ url('/evento/vizualiza/'.$evento->id) }}'" style="height: 30px; font-size: 12px;">
                                             <i class="glyphicon glyphicon-folder-open"></i></button>
                                     </td>
                                     <td>
                                         <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/evento/excluir/'.$evento->id) }}'" style="height: 30px; font-size: 12px;">
                                             <i class="glyphicon glyphicon-trash"></i></button>
                                     </td>

                             </tr>
                             @endforeach
                             </tbody>
                         </table>


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

