@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-auto col-md-offset-auto">
            <div class="panel">
                <div class="panel-heading">Protocolos  -  Fila com &nbsp;{{ $tl }}&nbsp;&nbsp;de um total de&nbsp;&nbsp;{{ $total }} fechados.</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                    <form class="navbar-form navbar-left" role="search" action="{{ url('/contestacao/busca_fechado_sup') }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar">
                         </div>
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                        </form>
                      <br><br><br>
                      <div class="table-responsive align-left">

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Protocolo</th>
                                    <th>Pedido</th>
                                    <th>Status</th>
                                    <th>Dias</th>
                                    <th>Sla</th>
                                    <th>Nível Sla</th>
                                    <th>Visualizar</th>
                                    <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($protocolos as $protocolo)
                                      @if($protocolo->dias >= 0 && $protocolo->dias <= 1)
                                         <tr align="center" style="color:#006400;">
                                      @elseif($protocolo->dias == 2)
                                          <tr align="center" style="color:#DAA520;">
                                      @elseif($protocolo->dias > 2  )
                                          <tr align="center" style="color:#FF0000;">
                                      @endif
                                    <td>{{ $protocolo->created_at }}</td>
                                    <td>{{ $protocolo->protocolo }}</td>
                                    <td>{{ $protocolo->pedido }}</td>
                                    <td>{{ $protocolo->status  }}</td>
                                    <td>{{ $protocolo->dias }}</td>
                                    <td>{{ $protocolo->sla }}</td>
                                      @if($protocolo->dias >= 0 && $protocolo->dias <= 1)
                                          <td><image class="imagem_sinal" src="/img/sinal_verde.jpg" height="30" width="15"></image></td>
                                      @elseif($protocolo->dias == 2)
                                          <td><image class="imagem_sinal" src="/img/sinal_amarelo.jpg" height="30" width="15"></image></td>
                                      @elseif($protocolo->dias > 2 )
                                          <td><image class="imagem_sinal" src="/img/sinal_vermelho.jpg" height="30" width="15"></image></td>
                                      @endif
                                    <td>
                                     <button type="button" class="btn btn-success" style="margin-top:-6px;" onclick="window.location='{{ url('/contestacao/visualiza_fechado/'.$protocolo->id) }}'">
                                      <i class="glyphicon glyphicon-list-alt"></i></button>
                                    </td>
                                     <td>
                                        <button type="button" class="btn btn-success" style="margin-top:-6px;"  onclick="window.location='{{ url('/contestacao/form_editar/'.$protocolo->id) }}'">
                                        <i class="glyphicon glyphicon-pencil"></i></button>
                                     </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <?php echo $protocolos->render(); ?>
                      </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
