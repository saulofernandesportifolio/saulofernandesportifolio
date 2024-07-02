
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
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-oil-can"></i>
                    Lubrificantes</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form role="form" action="{{ url('/lubrificacao/lubrificantes/salvar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Marca - Descrição:</label>
                                    <input type="text"  class="form-control" id="desc" name="desc" value="{{ old('Marca - Descrição') }}">
                                </div>
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