@extends('adminlte::page')

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Clientes</h3>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('auth.success')
                    @include('auth.erros')
                    <p><button type="button" class="btn" onclick="window.location='{{ url('clientes/cadastro') }}'" style="height: 30px; font-size: 12px;">
                            <i class="glyphicon glyphicon glyphicon-plus"> Novo</i></button>
                    </p>
                        <div class="table-responsive aligncenter">

                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>Bairro</th>
                                    <th>Abrir</th>
                                    <th>Excluir</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->cidade }}</td>
                                    <td>{{ $cliente->bairro }}</td>
                                    <td>
                                        <button type="button" class="btn" onclick="window.location='{{ url('/clientes/vizualiza/'.$cliente->id) }}'">
                                            <i class="glyphicon glyphicon-folder-open"></i></button>
                                    </td>

                                     <td>
                                         <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/clientes/excluir/'.$cliente->id) }}'" style="height: 30px; font-size: 12px;">
                                             <i class="glyphicon glyphicon-trash"></i></button>
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
