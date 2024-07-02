
@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">


            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Consultas</a>
                </li>
                <li class="breadcrumb-item active">Análise de Vibração</li>
            </ol>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-filter"></i>
                    Consultas</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form class="form-vertical" role="form" action="{{ url('/ocorrencia/lista') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="id" class="small">Ocorrência n°</label>
                                    <input type="text" id="id" name="id" class="form-control" style="height:30px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente" class="small" >Cliente</label>
                                    <select id="cliente" name="cliente" class="form-control" style="height:30px;">
                                        <option value="0" selected>Selecione...</option>
                                        @foreach($cli as $clie)
                                            <option value="{{ $clie->cliente }}">{{ $clie->cliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_ini" class="small" >Data Cadastro</label>
                                    <div class='input-group date' id='datetimepicker5'>
                                        <input type='text' class="form-control" id="data_ini" name="data_ini" style="height:30px;" placeholder="dd/mm/aaaa"/>
                                        <span class="input-group-addon">
                                                 <span class="far fa-calendar-alt"></span>
                                              </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_fim" class="small">Final</label>
                                    <div class='input-group date' id='datetimepicker5b'>
                                        <input type='text' class="form-control" id="data_fim" name="data_fim" style="height:30px;" placeholder="dd/mm/aaaa"/>
                                        <span class="input-group-addon">
                                                 <span class="far fa-calendar-alt"></span>
                                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="small">Status</label>
                                    <select id="status" name="status" class="form-control" style="height:30px;">
                                        <option value="0" selected>Selecione...</option>
                                        <option value="1">Aberta</option>
                                        <option value="2">Fechada</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <br>

                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-search-plus"></i>  Buscar</button>
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
