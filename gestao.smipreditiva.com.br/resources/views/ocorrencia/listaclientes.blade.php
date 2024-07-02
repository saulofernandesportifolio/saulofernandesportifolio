
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Clientes</a>
                </li>
                <li class="breadcrumb-item active">Consultas</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Clientes</div>
                <div class="card-body">

                @include('login.success')
                @include('login.erros')

                <!-- biblioteca graficos -->
                    {!! Html::script('js/code/highcharts.js') !!}
                    {!! Html::script('js/code/highcharts-3d.js') !!}
                    {!! Html::script('js/code/modules/exporting.js') !!}
                    <div class="table-responsive aligncenter">
                        <form class="navbar-form navbar-left" role="search" action="{{ url('/cliente/busca') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar Cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success-sm">
                                    <i class="fas fa-search-plus"></i> Pesquisar</button>
                                <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/cliente/cadastro') }}'">
                                    <i class="fas fa-id-card"></i> Inserir Cliente</button>


                            </div>

                        </form>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="small">Cliente</th>
                                <th class="small">Cidade</th>
                                <th class="small">UF</th>
                                <th class="small">Email</th>
                                <th class="small">Detalhes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cli)
                                <tr align="center">
                                    <td class="small">{{ $cli->cliente }}</td>
                                    <td class="small">{{ $cli->cidade }}</td>
                                    <td class="small">{{ $cli->estado }}</td>
                                    <td class="small">{{ $cli->email }}</td>

                                    <td> <button type="button" class="btn btn-warning-sm" onclick="window.location='{{ url('/cliente/cad/visualiza/'.$cli->id) }}'">
                                            <i class="fas fa-user-cog"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        <?php echo $clientes->render(); ?>


                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>