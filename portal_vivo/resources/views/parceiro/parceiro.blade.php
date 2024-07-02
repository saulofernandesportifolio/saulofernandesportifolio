@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row">
        <div class="col-md-100 col-md-offset-100">
            <div class="panel">
                <div class="panel-heading">Protocolo  -  Fila com &nbsp;&nbsp;{{ $tl }}&nbsp;&nbsp;de um total de&nbsp;&nbsp;{{ $total }} abertos.</div>
                <div class="panel-body">
                    @include('login.success')
                    @include('login.erros')
                    <form class="navbar-form navbar-left" role="search" action="{{ url('/parceiro/busca') }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar">
                         </div>
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                        <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro/novo') }}'">
                            <i class="glyphicon glyphicon-plus"></i> Novo</button>
                    </form>

                    <br><br><br>
                      <div class="table-responsive aligncenter">

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Protocolo</th>
                                    <th>Pedido</th>
                                    <th>Status</th>
                                    <th>Visualizar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($protocolos as $protocolo)
                                <tr align="center">
                                    <td>{{ $protocolo->data_criacao }}</td>
                                    <td>{{ $protocolo->protocolo }}</td>
                                    <td>{{ $protocolo->pedido }}</td>
                                    <td>{{ $protocolo->status  }}</td>
                                    <td>
                                     <button type="button" class="btn btn-success" onclick="window.location='{{ url('/parceiro/visualiza/'.$protocolo->id) }}'">
                                      <i class="glyphicon glyphicon-list-alt"></i></button>
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
