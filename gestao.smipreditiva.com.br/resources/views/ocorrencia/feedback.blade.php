@extends('layouts.app2')

@section('title', 'Page Title')

@section('sidebar')

    @extends('layouts.sidebar')


@endsection

@section('content')


    <div class="container">
    <div class="row">
        <div class="col-md-100 col-md-offset-100">
            <div class="panel">
                <div class="panel-heading">Feedback Ocorrência  -
                </div>
                <div class="panel-body">
                    @foreach($ocorrencias as $ocorrencia)
                        <form role="form" action="{{ url('/ocorrencia/enviafeedback/'.$ocorrencia->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <strong> Ocorrência N°:</strong>{{ $ocorrencia->ocorrencia }}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="small" for="atividades_intervencao">Descrição das atividades:</label>
                                        <textarea class="form-control" rows="3" name="atividades_intervencao" id="atividades_intervencao"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="hh_normal">H/H Normal:</label>
                                        <input type="text"  class="form-control" id="hh_normal" name="hh_normal">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small" for="executante">Executante:</label>
                                        <input type="text"  class="form-control" id="executante" name="executante">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="small" for="tipo_intervencao">Tipo Intervenção:</label>
                                        <div class="radio">
                                            <label><input type="radio" id="tipo_intervencao" name="tipo_intervencao" value="Programada">Programada</label>
                                            <label><input type="radio" id="tipo_intervencao" name="tipo_intervencao" value="Não Programada">Não Programada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="small" for="hh_extra">H/H Extra:</label>
                                        <input type="text"  class="form-control" id="hh_extra" name="hh_extra">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small" for="tempo_maq_parada">Tempo de Maquina Parada:</label>
                                        <input type="time" onkeypress="HoraMinuto(event,this);" maxlength="1" class="form-control" id="tempo_maq_parada" name="tempo_maq_parada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="small" for="diagnostico">Tipo Intervenção:</label>
                                        <div class="radio">
                                            <label><input type="radio" id="diagnostico" name="diagnostico" value="Correto">Correto</label>
                                            <label><input type="radio" id="diagnostico" name="diagnostico" value="Incorreto">Incorreto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div clas="row" align="center">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>  Salvar</button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ url('/home') }}'">
                                    <i class="glyphicon glyphicon-arrow-left"></i> Voltar</button>
                            </div>
                            @endforeach
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection