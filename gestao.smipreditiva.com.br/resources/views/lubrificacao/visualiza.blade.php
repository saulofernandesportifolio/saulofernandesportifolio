
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">



        <div class="container-fluid">
        @foreach($lubrif as $lub)
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Consultas</a>
                </li>
                <li class="breadcrumb-item active">Lubrificação de Maquinas</li>
            </ol>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-folder-open"></i>
                        N°: {{$lub->id}} </div>
                    <div class="card-body">

                        @include('login.success')
                        @include('login.erros')

                            <h6>Dados técnicos do equipamento</h6>
                            <br>
                            {{ csrf_field() }}
                            <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="cliente" >Cliente:</label>
                                    <input type="text"  class="form-control" id="cliente" name="cliente" value="{{$lub->cliente }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="data_prox_lub" >Data Próxima Lubrificação:</label>
                                    <input type="text"  class="form-control" id="data_prox_lub" name="data_prox_lub" value="{{$lub->data_prox_lubri = implode('-', array_reverse(explode('-', $lub->data_prox_lubri))) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="tag">Tag:</label>
                                    <input type="text"  class="form-control" id="tag" name="tag" value="{{ $lub->tag }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Setor:</label>
                                    <input type="text"  class="form-control" id="setor" name="setor" value="{{ $lub->setor }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Equipamento:</label>
                                    <input type="text"  class="form-control" id="equipamento" name="equipamento" value="{{ $lub->equipamento }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary-sm" onclick="abrePopup()">
                                    <i class="fas fa-oil-can"></i> Atualizar Lubrificação</button>
                            </div>
                        </div>
                        <br>
                        <h6>Técnicas avaliadas</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_execucao" class="small" >Data Execução</label>
                                    <input type='text' class="form-control" id="data_execucao" name="data_execucao" value="{{$lub->data_execucao = implode('-', array_reverse(explode('-', $lub->data_execucao))) }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="ponto">Ponto:</label>
                                    <input type="text"  class="form-control" id="ponto" name="ponto" value="{{$lub->ponto }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="servico">Serviço:</label>
                                    <input type="text"  class="form-control" id="servico" name="servico" value="{{$lub->servico }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="lubrificante">Lubrificante:</label>
                                    <input type="text"  class="form-control" id="lubrificante" name="lubrificante" value="{{$lub->lubrificante }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="volume">Volume:</label>
                                    <input type="text"  class="form-control" id="volume" name="volume" value="{{$lub->volume }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="frequencia">Frequência:</label>
                                    <input type="text"  class="form-control" id="frequencia" name="frequencia" value="{{$lub->frequencia }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="servico_executado">Serviço Executado</label>
                                    <input type='text' class="form-control" id="servico_executado" name="servico_executado" value="{{$lub->servico_executado }}"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="small" for="motivo">Motivo:</label>
                                <textarea type="text"  class="form-control" id="motivo" name="motivo" value="{{$lub->motivo }}"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <div clas="row" align="center">
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                                <i class="fas fa-undo-alt"></i> Voltar</button>
                        </div>


                        @endforeach




                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>
        </div>
        @endsection

    </div>

    <script>

        function abrePopup()
        {
            window.open("{{ url('/lubrificacao/reedit/'.$lub->id) }}", "nome", "width=800, height=600");
        }
    </script>

    </body>
    </html>