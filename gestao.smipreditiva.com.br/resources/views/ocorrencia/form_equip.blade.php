
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
                    <a href="#">Equipamentos</a>
                </li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-tools"></i>
                    Equipamentos</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form role="form" action="{{ url('/equipamento/salvar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cliente" >Cliente:</label>
                                    <select id="cliente" name="cliente" class="form-control">
                                        <option value="0" selected>Selecione...</option>
                                        @foreach($cli as $clie)
                                            <option value="{{ $clie->id }}">{{ $clie->cliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Equipamento:</label>
                                    <input type="text"  class="form-control" id="equipamento" name="equipamento" value="{{ old('equipamento') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="setor">Setor:</label>
                                    <input type="text"  class="form-control" id="setor" name="setor" value="{{ old('setor') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="tag">Tag:</label>
                                    <input type="text"  class="form-control" id="tag" name="tag" value="{{ old('tag') }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="potencia">Potência:</label>
                                    <input type="text"  class="form-control" id="potencia" name="potencia" value="{{ old('potencia') }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="rpm">RPM:</label>
                                    <input type="text"  class="form-control" id="rpm" name="rpm" value="{{ old('rpm') }}">
                                </div>
                            </div>
                        </div>

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