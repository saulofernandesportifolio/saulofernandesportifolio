
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Inicio -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Fomulários</a>
                </li>
                <li class="breadcrumb-item active">Lubrificação de maquinas</li>
            </ol>
        @include('login.success')
        @include('login.erros')

        <!-- Conteúdo-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Lubrificação de maquinas</div>
                <div class="card-body">
                    <h6>Dados técnicos do equipamento</h6>
                    <form role="form" action="{{ url('/lubrificacao/salvar') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="cliente" >Cliente:</label>
                                    <select id="SelectCliente" name="cliente" class="form-control">
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
                                    <label class="small" for="tag">Tag:</label>
                                <!--<input type="text"  class="form-control" id="tag" name="tag" value="{{ old('tag') }}">-->

                                    <select name="tag" id="SelectClienteresultado" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="setor">Setor:</label>
                                    <input type="text"  class="form-control" id="setor" name="setor" value="{{ old('setor') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="equipamento">Equipamento:</label>
                                    <input type="text"  class="form-control" id="equipamento" name="equipamento" value="{{ old('equipamento') }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6>Técnicas avaliadas</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_execucao" class="small" >Data Execução</label>
                                    <div class='input-group date' id='datetimepicker5'>
                                        <input type='text' class="form-control" id="data_execucao" name="data_execucao" style="height:30px;" placeholder="dd/mm/aaaa"/>
                                        <span class="input-group-addon">
                                                 <span class="far fa-calendar-alt"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="ponto">Ponto:</label>
                                    <select id="ponto" name="ponto" class="form-control">
                                        <option value="" selected>Selecione...</option>
                                        @foreach($pontos as $pnt)
                                            <option value="{{ $pnt->desc }}">{{ $pnt->desc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="lubrificante">Lubrificante:</label>
                                    <select id="lubrificante" name="lubrificante" class="form-control">
                                        <option value="" selected>Selecione...</option>
                                        @foreach($lubri as $lb)
                                            <option value="{{ $lb->desc }}">{{ $lb->desc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small" for="volume">Volume:</label>
                                    <input type="text"  class="form-control" id="volume" name="volume">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small" for="frequencia">Frequência:</label>
                                    <input type="text"  class="form-control" id="frequencia" name="frequencia">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="servico_executado">Serviço Executado</label>
                                    <select id="servico_executado" name="servico_executado" class="form-control">
                                        <option value="0" selected>Selecione</option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="small" for="motivo">Motivo:</label>
                                <textarea type="text"  class="form-control" id="motivo" name="motivo"></textarea>
                            </div>
                        </div>

                        <br><br>
                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-save"></i>  Salvar</button>
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('/home') }}'">
                                <i class="fas fa-undo-alt"></i> Voltar</button>
                        </div>
                    </form>
                    <div class="card-footer small text-muted"></div>
                </div>
            </div>
        </div>

        @endsection

    </div>


    </body>

    </html>
