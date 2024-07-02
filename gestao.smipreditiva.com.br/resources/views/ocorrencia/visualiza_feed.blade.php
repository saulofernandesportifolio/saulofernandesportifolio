@extends('layouts.app2')

@section('content')

 <div id="content-wrapper">
     <div class="container-fluid">
         <br>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Feedback Ocorrência  -</a>
            </li>
            <li class="breadcrumb-item active">Ocorrência</li>
        </ol>
        @foreach($ocorrencias as $ocorrencia)

       <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-folder-open"></i> N° {{ $ocorrencia->ocorrencia }}</div>
                <div class="card-body">
                <br>
                        @foreach($feedbacks as $feed)

                            
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="small" for="atividades_intervencao">Descrição das atividades:</label>
                                            <textarea class="form-control" rows="3" name="atividades_intervencao" id="atividades_intervencao" value="{{ $feed->atividades_intervencao }}" readonly="true">{{ $feed->atividades_intervencao }}</textarea>
                                        </div>
                                    </div>
                             
                              
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="small" for="hh_normal">H/H Normal:</label>
                                            <input type="text"  class="form-control" id="hh_normal" name="hh_normal"  value="{{ $feed->hh_normal }}" readonly="true">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small" for="executante">Executante:</label>
                                            <input type="text"  class="form-control" id="executante" name="executante" value="{{ $feed->executante }}" readonly="true">
                                        </div>
                                    </div>
                                
                                <br><br>
                              
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <strong> Tipo Intervenção:</strong> {{ $feed->tipo_intervencao }}
                                        </div>
                                    </div>
                               
                              
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label class="small" for="hh_extra">H/H Extra:</label>
                                            <input type="text"  class="form-control" id="hh_extra" name="hh_extra" value="{{ $feed->hh_extra }}" readonly="true">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="small" for="tempo_maq_parada">Tempo de Maquina Parada:</label>
                                            <input type="text"  class="form-control" id="tempo_maq_parada" name="tempo_maq_parada" value="{{ $feed->tempo_maq_parada }}" readonly="true">
                                        </div>
                                    </div>
                               
                               
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <strong> Diagnóstico:</strong> {{ $feed->diagnostico }}
                                            </div>
                                        </div>
                                    </div>
                            

                            @endforeach
                         @endforeach
                        <div class="card-footer small text-muted"> </div>
                    </div>
                </div>
            </div>
            @endsection

    </div>