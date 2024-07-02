
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
                    <a href="#">Consultas</a>
                </li>
                <li class="breadcrumb-item active">Ocorrência</li>
            </ol>
            @foreach($ocorrencias as $ocorrencia)

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-folder-open"></i>
                        N° {{ $ocorrencia->ocorrencia }}</div>
                    <div class="card-body">

                        @include('login.success')
                        @include('login.erros')

                        <form role="form" action="{{ url('/ocorrencia/enviaatulnaomonit/'.$ocorrencia->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="small" for="obs">Observações:</label>
                                    <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                                </div>
                            </div>

                            <br>

                            <div clas="row" align="center">
                                <button type="submit" class="btn btn-success-sm">
                                    <i class="fas fa-save"></i>  Salvar</button>
                                <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/cliente/home') }}'">
                                    <i class="fas fa-undo-alt"></i> Voltar</button>
                            </div>

                            @endforeach

                        </form>
                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>
        </div>
        @endsection

    </div>


    </body>
    </html>