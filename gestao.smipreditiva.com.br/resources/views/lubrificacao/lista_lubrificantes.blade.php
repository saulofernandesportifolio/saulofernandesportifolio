
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
                    <a href="#">Lubrificantes</a>
                </li>
                <li class="breadcrumb-item active">Lista</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-oil-can"></i>
                    Lubrificantes
                </div>
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
                            <div class="form-group">
                                <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/lubrificacao/lubrificantes/cadastro') }}'">
                                    <i class="fas fa-plus-square"></i> Inserir Lubrificante</button>


                            </div>

                        </form>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="small">ID</th>
                                <th class="small">Marca - Descrição</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lubr as $lub)
                                <tr align="center">
                                    <td class="small">{{ $lub->id }}</td>
                                    <td class="small">{{ $lub->desc }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        <?php echo $lubr->render(); ?>


                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>

            </div>
            @endsection

        </div>

        </body>
        </html>