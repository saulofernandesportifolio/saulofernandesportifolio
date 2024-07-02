@extends('adminlte::page')

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Bartenders Reativar</h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('auth.success')
                        @include('auth.erros')
                        <p><button type="button" class="btn" onclick="window.location='{{ url('listabartenders') }}'" style="height: 30px; font-size: 12px;">
                                <i class="glyphicon glyphicon glyphicon-arrow-left"> Lista Bartenders</i></button>

                        <div class="table-responsive aligncenter">

                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>Score</th>
                                    <th>Carro</th>
                                    <th>Genero</th>
                                    <th>Reativar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bartenders as $bartender)
                                    <tr>
                                        <td>{{ $bartender->nome }}</td>
                                        <td>{{ $bartender->cidade }}</td>
                                        <td>{{ $bartender->score }}</td>
                                        <td>{{ $bartender->carro }}</td>
                                        <td>{{ $bartender->genero }}</td>
                                        <td align="center">
                                            <button type="button" class="btn btn-success" onclick="window.location='{{ url('/bartenders/reativar/'.$bartender->id) }}'" style="height: 30px; font-size: 12px;">
                                                <i class="glyphicon glyphicon-ok"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <?php //echo $clientes->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

