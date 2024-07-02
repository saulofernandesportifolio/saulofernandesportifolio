
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

                        <form role="form" action="{{ url('/cliente/enviafeedback/'.$ocorrencia->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                 <div class="col-md-6">
                                      <label class="small" for="atividades_intervencao">Descrição das atividades:</label>
                                      <textarea class="form-control" rows="3" name="atividades_intervencao" id="atividades_intervencao"></textarea>
                                 </div>
                            </div>

                            <br>

                            <div classs="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="small" for="hh_normal">H/H Normal (R$):</label>
                                        <input type="text"  class="form-control" id="hh_normal" name="hh_normal" onKeyPress="return(moeda(this,'.',',',event))">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small" for="executante">Executante:</label>
                                        <input type="text"  class="form-control" id="executante" name="executante">
                                    </div>

                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="small" for="tipo_intervencao">Tipo Intervenção:</label>
                                        <div class="radio">
                                            <label><input type="radio" id="tipo_intervencao" name="tipo_intervencao" value="Programada"> Programada</label>
                                            <label><input type="radio" id="tipo_intervencao" name="tipo_intervencao" value="Não Programada"> Não Programada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="small" for="hh_extra">H/H Extra (R$):</label>
                                        <input type="text"  class="form-control" id="hh_extra" name="hh_extra" onKeyPress="return(moeda(this,'.',',',event))">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small" for="tempo_maq_parada">Tempo de Maquina Parada:</label>
                                        <input type="text"  onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="tempo_maq_parada" name="tempo_maq_parada">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="small" for="diagnostico">Tipo Intervenção:</label>
                                        <div class="radio">
                                            <label><input type="radio" id="diagnostico" name="diagnostico" value="Correto"> Correto</label>
                                            <label><input type="radio" id="diagnostico" name="diagnostico" value="Incorreto"> Incorreto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

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