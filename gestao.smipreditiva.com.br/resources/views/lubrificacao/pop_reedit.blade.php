@extends('layouts.app2')

@section('content')

    <div id="content-wrapper">
        <div class="container-fluid">
            <br>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Lubrificação de Maquinas  -</a>
                </li>
                <li class="breadcrumb-item active"></li>
            </ol>
            @include('login.success')
            @include('login.erros')

            @foreach($lubrif as $lub)

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-folder-open"></i> N° {{ $lub->id }}</div>
                    <div class="card-body">
                        <form role="form" action="{{ url('lubrificacao/resalva/'.$lub->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
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
                        </div>

                        </form>
                        @endforeach
                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>
        </div>
        @endsection

    </div>