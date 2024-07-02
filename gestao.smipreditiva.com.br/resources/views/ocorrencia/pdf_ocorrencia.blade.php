<style type="text/css">



    @font-face {
        font-family: 'Lato', sans-serif;
        src: url({{ storage_path('fonts/SourceSansPro-Regular.ttf') }});
        font-weight: 400;
        font-size: 0.675em;
        font-style: normal;
    }

    @font-face {
        font-family: 'Lato', sans-serif;
        src:url({{ storage_path('fonts/SourceSansPro-ExtraLight.ttf') }});
        font-weight: 300;
        font-size: 0.675em;
        font-style: normal;
    }

    body {
        margin-left: 60px;
        margin-right: 60px;
        background-color: #fff;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        font-size: 0.675em;
        font-style: normal;

    }

    table {
        border-collapse: collapse;

    }

    table, th, td {
        border: 1px solid gray;
    }

    #pag {
        page-break-after: always;
    }



</style>
@foreach($ocorrencias as $ocorrencia)
<div id="pag">
    @foreach($cli as $clie)
        <table width="100%" border="1">
            <tr>
                <th width="25%" align="center"><img src="{{asset('img/logo.png')}}" alt="Logo" height="50px"></th>
                <th width="100%" align="center"><h4>Relatório de Diagnóstico e Prognóstico (Vibração)</h4></th>
                <th width="25%" align="center"><img src="{{asset('clientes/logos/'.$clie->logo)}}" alt="Logo" height="40px"></th>
            </tr>
        </table>
    @endforeach
    <br>

    <table width="100%">
        <tr>
            <th width="10%">Cliente:</th>
            <td width="70%">{{$ocorrencia->cliente}}</td>
            <td width="20%"><strong>N°:</strong>{{$ocorrencia->ocorrencia}}</td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <caption><strong>Equipamento</strong></caption>
        <tr>
            <th width="20%" align="center">Tag</th>
            <th width="20%" align="center">Setor</th>
            <th width="20%" align="center">Potência</th>
            <th width="20%" align="center">RPM</th>
            <th width="20%">Status Geral</th>
        </tr>
        <tr>
            <td width="20%">{{$ocorrencia->tag}}</td>
            <td width="20%">{{$ocorrencia->setor}}</td>
            <td width="20%">{{$ocorrencia->potencia}}</td>
            <td width="20%">{{$ocorrencia->rpm}}</td>
            @if($ocorrencia->status_geral == 'A1')
                <td width="20%" bgcolor="#FFFF00" >Alarme 1</td>
            @endif
            @if($ocorrencia->status_geral == 'A2')
                <td width="20%" bgcolor="#FF0000"><font color="white">Alarme 2</font></td>
            @endif
            @if($ocorrencia->status_geral == 'A0')
                <td width="20%" bgcolor="#00FF00">Normal</td>
            @endif
            @if($ocorrencia->status_geral == 'A4')
                <td width="20%" bgcolor="#0000CD"><font color="white">Não Monitadorado</font></td>
            @endif
        </tr>
    </table>
    <br>
    <table width="100%" >
        <caption><strong>Tecnicas Avalidada</strong></caption>
        <tr>
            <th width="25%" align="center">Valor Velocidade(mm/s)</th>
            <th width="25%" align="center"> Velocidade (ISO 10816)</th>
            <th width="25%" align="center">Valor Demodulação(gE)</th>
            <th width="25%" align="center">Demodulação</th>
        </tr>
        <tr>
            <td width="25%">{{$ocorrencia->valor_velocidade}}</td>
            @if($ocorrencia->velocidade == 'A1')
                <td width="25%" bgcolor="#FFFF00">Alarme 1</td>
            @endif
            @if($ocorrencia->velocidade == 'A2')
                <td width="25%" bgcolor="#FF0000"><font color="white">Alarme 2</font></td>
            @endif
            @if($ocorrencia->velocidade == 'A0')
                <td width="25%">Normal</td>
            @endif
            <td width="25%">{{$ocorrencia->valor_demod}}</td>
            @if($ocorrencia->demodulacao == 'A1')
                <td width="25%" bgcolor="#FFFF00">Alarme 1</td>
            @endif
            @if($ocorrencia->demodulacao == 'A2')
                <td width="25%" bgcolor="#FF0000"><font color="white">>Alarme 2</font></td>
            @endif
            @if($ocorrencia->demodulacao == 'A0')
                <td width="25%">Normal</td>
            @endif
        </tr>
    </table>
    <br>
    <table width="40%"¨>
        <tr>
            <th>Prazo de Intervenção:</th>
            <td>{{ $ocorrencia->prazo_intervensao }}</td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <caption><strong>Recomendações</strong></caption>
        <tr>
            <th width="25%" align="center">Diagnóstico</th>
            <th width="25%" align="center">Alarme</th>
            <th width="50%" align="center">Recomendação</th>
        @if($ocorrencia->desgaste_rolamentos == 'A0')
        @else
            <tr>
                <td width="25%">Desgaste Rolamentos</td>
                @if($ocorrencia->desgaste_rolamentos == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->desgaste_rolamentos }}</td>
                @elseif($ocorrencia->desgaste_rolamentos == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->desgaste_rolamentos }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_desgaste_rotalamentos }}</td>
            </tr>
        @endif
        @if($ocorrencia->desbalanceamento == 'A0')
        @else
            <tr>
                <td width="25%">Desbalanceamento</td>
                @if($ocorrencia->desbalanceamento == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->desbalanceamento }}</td>
                @elseif($ocorrencia->desbalanceamento == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->desbalanceamento }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_desbalanceamentos }}</td>
            </tr>
        @endif
        @if($ocorrencia->desalinhamento == 'A0')
        @else
            <tr>
                <td width="25%">Desalinhamento</td>
                @if($ocorrencia->desalinhamento == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->desalinhamento }}</td>
                @elseif($ocorrencia->desalinhamento == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->desalinhamento }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_desalinhamento }}</td>
            </tr>
        @endif
        @if($ocorrencia->sistema_transmissao == 'A0')
        @else
            <tr>
                <td width="25%">Sistema de Transmissão</td>
                @if($ocorrencia->sistema_transmissao == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->sistema_transmissao }}</td>
                @elseif($ocorrencia->sistema_transmissao == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->sistema_transmissao }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_sistema_transmissao }}</td>
            </tr>
        @endif
        @if($ocorrencia->folgas_desgaste == 'A0')
        @else
            <tr>
                <td width="25%">Folgas e desgastes</td>
                @if($ocorrencia->folgas_desgaste == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->folgas_desgaste }}</td>
                @elseif($ocorrencia->folgas_desgaste == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->folgas_desgaste }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_folgas_desgaste }}</td>
            </tr>
        @endif
        @if($ocorrencia->rigidez == 'A0')
        @else
            <tr>
                <td width="25%">Rigidez/Fixação</td>
                @if($ocorrencia->rigidez == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->rigidez }}</td>
                @elseif($ocorrencia->rigidez == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->rigidez }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_rigidez }}</td>
            </tr>
        @endif
        @if($ocorrencia->lubrificacao_deficiente == 'A0')
        @else
            <tr>
                <td width="25%">Lubrificação Deficiente</td>
                @if($ocorrencia->lubrificacao_deficiente == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->lubrificacao_deficiente}}</td>
                @elseif($ocorrencia->lubrificacao_deficiente == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->lubrificacao_deficiente}}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->recomendacao_lubrificacao_deficiente }}</td>
            </tr>
        @endif
        @if($ocorrencia->outros == 'A0')
        @else
            <tr>
                <td width="25%">Outros</td>
                @if($ocorrencia->outros == 'A1')
                    <td width="25%" bgcolor="#FFFF00">{{ $ocorrencia->outros }}</td>
                @elseif($ocorrencia->outros == 'A2')
                    <td width="25%" bgcolor="#FF0000"><font color="white">{{ $ocorrencia->outros }}</font></td>
                @endif
                <td width="50%">{{ $ocorrencia->desc_outros }}</td>
            </tr>
        @endif
    </table>
    <br>
    <table width="100%">
        <th width="25%">Observações</th>
        <td width="75%">{{$ocorrencia->obs}}</td>
    </table>
    <br>
    <table width="100%">
        @if($ocorrencia->grafico == Null)
            <td width="50%"></td>
        @else
            <td width="50%"><img src="{{asset('public/graficos/'.$ocorrencia->grafico)}}" alt="{{ $ocorrencia->grafico }}" height="200" width="400"></td>
        @endif
        @if($ocorrencia->grafico2 == Null)
            <td width="50%"></td>
        @else
            <td width="50%"><img src="{{asset('public/graficos/'.$ocorrencia->grafico2)}}" alt="{{ $ocorrencia->grafico2 }}" height="200" width="400"></td>
        @endif
    </table>
    <br>
    <table width="100%">
        <th width="25%">Comentarios relatório de campo</th>
        <td width="75%">{{$ocorrencia->desc_arquivo}}</td>
    </table>
    <br>
    <table width="100%">
        <tr>
            <th width="25%">Data de análise</th>
            <th width="75%">Analista</th>
        </tr>
        <tr>
            <td width="25%">{{$ocorrencia->data_cadastro}}</td>
            <td width="75%">{{$ocorrencia->usuario}}</td>
        </tr>
    </table>
</div>
@endforeach
