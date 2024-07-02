
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
                    <a href="#">Relatórios</a>
                </li>
                <li class="breadcrumb-item active">Ocorrências</li>
            </ol>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Dashboard</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form class="form-vertical" role="form" action="{{ url('/cliente/contas/enviadash ') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="tipo_form" name="tipo_form" class="form-control">
                                        <option value="0" selected>Análise de Vibração</option>
                                        <option value="A">Termografica</option>
                                        <option value="2">Balanceamento Dinâmico</option>
                                        <option value="3">Alinhamento a Laser de Eixos</option>
                                        <option value="4">Alinhamento a Laser de Polias</option>
                                        <option value="5">Lubrificação de Máquinas</option>
                                        <option value="6">Ultrassom</option>
                                        <option value="7">Medição de Espessura</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_ini" class="small">Data Cadastro</label>
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


                        <br>

                        <div clas="row" align="center">
                            <button type="submit" class="btn btn-success-sm">
                                <i class="fas fa-search-plus"></i>  Buscar</button>
                            <button type="button" class="btn btn-success-sm" onclick="window.location='{{ url('cliente/home') }}'">
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