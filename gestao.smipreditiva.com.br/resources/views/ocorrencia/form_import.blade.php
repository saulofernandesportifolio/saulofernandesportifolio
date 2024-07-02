
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
                    <a href="#">Back-End</a>
                </li>
                <li class="breadcrumb-item active">Massivo Equipamentos</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-database"></i>
                    Importar Base</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form class="form-vertical" role="form" action="{{ url('/adm/enviaimport ') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente" class="small">Cliente</label>
                                    <select id="cliente" name="cliente" class="form-control" style="height:30px;">
                                        <option value="0" selected>Todos</option>
                                        @foreach($cli as $clie)
                                            <option value="{{ $clie->id }}">{{ $clie->cliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">

                                {!! Form::label('Selecionar arquivo:') !!}

                                {!! Form::input('file','Carga') !!}

                            </div>
                        </div>


                        <br>

                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-save"></i>  Salvar</button>
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                                <i class="fas fa-undo-alt"></i> Voltar</button>
                        </div>

                    </form>


                    <div class="card-footer small text-muted"> </div>
                </div>
            </div>

        </div>
        @endsection

    </div>

    </body>
    </html>