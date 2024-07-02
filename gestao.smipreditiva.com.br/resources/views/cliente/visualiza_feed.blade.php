
@extends('layouts.app2')

@section('content')



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
                    N° {{ $ocorrencia->idocorrencias }}</div>
                <div class="card-body">

                    @include('login.success')
                    @include('login.erros')

                    <form role="form" action="{{ url('/cliente/enviafeedback/'.$ocorrencia->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <label class="small" for="atividades_intervencao">Descrição das atividades:</label>
                                <textarea class="form-control" rows="3" name="atividades_intervencao" id="atividades_intervencao">{{$ocorrencia->atividades_intervencao }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div classs="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="small" for="hh_normal">H/H Normal (R$):</label>
                                    <input type="text"  class="form-control" id="hh_normal" name="hh_normal" onKeyPress="return(moeda(this,'.',',',event))" value="{{$ocorrencia->hh_normal }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="small" for="executante">Executante:</label>
                                    <input type="text"  class="form-control" id="executante" name="executante" value="{{$ocorrencia->executante }}">
                                </div>

                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="small" for="tipo_intervencao">Tipo Intervenção:</label>
                                    <input type="text"  class="form-control" id="tipo_intervencao" name="tipo_intervencao" value="{{$ocorrencia->tipo_intervencao }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="small" for="hh_extra">H/H Extra (R$):</label>
                                    <input type="text"  class="form-control" id="hh_extra" name="hh_extra" onKeyPress="return(moeda(this,'.',',',event))" value="{{$ocorrencia->hh_extra }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="small" for="tempo_maq_parada">Tempo de Maquina Parada:</label>
                                    <input type="text"  onkeypress="HoraMinuto(event,this);" maxlength="5" class="form-control" id="tempo_maq_parada" name="tempo_maq_parada" value="{{$ocorrencia->tempo_maq_parada }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="small" for="diagnostico">Tipo Intervenção:</label>
                                    <input type="text"  class="form-control" id="executante" name="executante" value="{{$ocorrencia->tipo_intervencao }}">
                                </div>
                            </div>
                        </div>



                        @endforeach

                    </form>
                    <div class="card-footer small text-muted"> </div>
                </div>
            </div>
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