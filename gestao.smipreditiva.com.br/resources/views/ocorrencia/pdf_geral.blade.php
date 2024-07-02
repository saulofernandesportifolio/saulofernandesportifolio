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

<div id="pag">
    @foreach($cli as $clie)
    <table width="100%" border="1">
        <tr>
            <th width="30%" align="center"><img src="{{asset('img/logo.png')}}" alt="Logo"  height="100" width="200"></th>
            <th width="40%" align="center"><h4>Relatório de Diagnóstico e Prognóstico (Vibração)</h4></th>
            <th width="30%" align="center"><img src="{{asset('clientes/logos/'.$clie->logo)}}" alt="Logo"  height="100" width="200"></th>
        </tr>
    </table>
        @endforeach
    <br>
        <table width="100%">
        <tr>
            <th width="10%">Cliente:</th>
            <td width="50%">{{$clie->cliente}}</td>
            <td width="20%">Localização</td>
            <td width="20%">{{$clie->cidade}}/{{$clie->estado}}</td>
        </tr>
         <tr>
             <th width="10%">Email:</th>
             <td width="50%">{{$clie->email}}</td>
             <td width="20%">Contato</td>
             <td width="20%">{{$clie->cidade}}/{{$clie->contato}}</td>
         </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 align="center"> Relatório de prestação de serviços por análises de vibrações. </h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p><h2 align="center">{{$mes}}/{{$ano}}</h2></p>
        <br>
        <br>
        <p align="center"><strong>Gerado em:</strong>{{date('d/m/Y')}}</p>
</div>
<div id="pag">
    <p align="center"><h3 align="center">FLUXO DE INFORMAÇÃO</h3></p>
    <br>
    <p>Para que o programa de manutenção preditiva por análises de vibrações seja aplicado com eficiência e sucesso, é fundamental que as informações sejam transmitidas de maneira clara e objetiva entre as partes.
        Visando facilitar o entendimento, foi desenvolvido o fluxo com as devidas etapas de ações / informações, bem como os responsáveis por cada uma delas.
    </p>
    <br>
    <p align="center"><img src="{{asset('pdf/image3.jpg/')}}"  height="300" width="500"></p>
    <br>
    <br>
    <p><strong>Definições de Indicadores:</strong>
        Para o monitoramento do programa de manutenção preditiva por análises de vibrações, a SMI Preditiva dispõe de ferramentas para medir a sua eficiência
    </p>
    <p><strong>Status de Alarmes:</strong>
        Esse indicador demostra a visão do último período de monitoramento. Com o percentual e quantidades de ativos, para cada status de condição
    </p>
    <p><strong>Acompanhamento de Diagnóstico:</strong>
        Visão geral dos diagnósticos desse relatório no último período monitorado. São demonstrados em ordem de atendimento, contribuindo a melhor visualização das solicitações de intervenções.
    </p>
    <p><strong>Backlog de Monitoramento:</strong>
        Apresentada a visão atual dos problemas detectados, acumuladas e executadas. Pelo fato de ocorrer o delay no feedback da manutenção esse índice é referente a medição interior.
        Abertas: Quantidade de Solicitações abertas durante o último período de monitoramento, essas solicitações são anexadas ao final do relatório.
        Executadas: Toda solicitação que é executada durante o mês vigente do monitoramento. Tal índice depende do feedback da equipe de manutenção da contratante dos trabalhos.
        Acumuladas: É calculado com a diferença entre a somatória das intervenções abertas e executadas.
    </p>
</div>

<div id="pag">

    <br>
    <table width="100%" border="1">
        <tr>
            <th width="100%" align="center"><h4>METODOLOGIA</h4></th>
        </tr>
        <tr>
            <td width="100%" align="left" height="120"><p align="center"><strong>Objetivos do Trabalho</strong></p>
                <p>   A Manutenção Preditiva por Análise de Vibrações consiste em realizar uma avaliação dos componentes de uma
                máquina em operação, isto é, em seu estado real de uso. Aliada a outras técnicas de inspeção e manutenção é
                    possível minimizar os riscos de parada de máquinas e processo produtivo por emergências.</p>
                <br>
                <p align="center"><strong>Identificação dos Pontos de Coleta e Nomenclatura.</strong></p>
                <p>   Na ilustração abaixo, podemos visualizar a sequência de identificação dos pontos de
                monitoramento para uma máquina simples. Equipamentos com maior número de mancais seguem a mesma sistemática,
                    sempre partindo do primeiro mancal do acionador (Traseira do acionador).</p></td>
            <br>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <td width="100%" align="center"><img src="{{asset('pdf/image1.jpg/')}}"  height="200" width="500"></td>
        </tr>
        <tr>
            <td width="100%" align="center">
                <br>
                Nomenclatura usual. Exemplos:
                <strong>Ponto 2HV:</strong> 2 (mancal LA), H (sentido HORIZONTAL) e V (técnica usada VELOCIDADE).
                <strong>Ponto 4VA:</strong> 4 (mancal LOA), V (sentido VERTICAL) e A (técnica usada ACELERAÇÃO).</td>
        </tr>
    </table>
    <br>
    <table width="80%" border="1">
        <tr>
            <td width="20%" bgcolor="#00FF00">Normal</td>
            <td width="80%">Máquina com níveis de vibração abaixo das Normas utilizadas</td>
        </tr>
        <tr>
            <td width="20%" bgcolor="#FFFF00">Alarme A1</td>
            <td width="80%">Níveis de vibração em Alerta conforme Normas utilizada</td>
        </tr>
        <tr>
            <td width="20%" bgcolor="#FF0000"><font color="white">Alarme A2</font></td>
            <td width="80%">Níveis de Críticos, conforme Normas utilizadas</td>
        </tr>
        <tr>
            <td width="20%" bgcolor="#0000CD"><font color="white">Não Monitorado</font></td>
            <td width="80%">Equipamento parado no momento da coleta de dados</td>
        </tr>
        <tr>
            <td width="20%">Nível Global</td>
            <td width="80%">Soma das forças vibratórias da máquina (Usual medição em RMS)</td>
        </tr>
        <tr>
            <td width="20%">Envelope (E)</td>
            <td width="80%">Técnica utilizada para avaliar rolamentos (Unidade de medida gE)</td>
        </tr>
        <tr>
            <td width="20%">Velocidade (V)</td>
            <td width="80%">Falhas em baixas frequências (Unidade de medida mm/s)</td>
        </tr>
        <tr>
            <td width="20%">Aceleração (A)</td>
            <td width="80%">Falhas em altas frequências (Unidade de medida g)</td>
        </tr>
    </table>
    <br>
    <p align="left">NORMAS: ISO 10816-3</p>
</div>
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
    <h3 align="center">Guia ilustrativo da Norma ISO para Análise de Vibração, com valores em Velocidade (mm/s RMS) e Envelope de Aceleração (gE Pico-Pico).</h3>
    <br>
    <br>
        <p><strong>1.	CLASSE 1 </strong>– Máquinas pequenas, até 20 CV.</p>
        <p><strong>2.	CLASSE 2 </strong>– Máquinas médias, 20 a 100 CV (base rígida) e até 400 CV (base flexível).</p>
        <p><strong>3.	CLASSE 3 </strong>– Máquinas grandes, acima de 100 CV.</p>
        <p><strong>4.	CLASSE 4 </strong>– Máquinas turbinadas. Observar a amplitude de deslocamento compatível com a RPM.</p>
        <br>
        <p align="center"><img src="{{asset('pdf/image2.jpg/')}}"  height="400" width="400"></p>
</div>
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
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Equipamento</th>
            <th>Setor</th>
            <th>Tag</th>
            <th>Potência</th>
            <th>RPM</th>
            <th>Status</th>
        </tr>
        </thead>
        @foreach($equi as $eq)
            <tr align="center">
                <td class="small">{{ $eq->cliente }}</td>
                <td class="small">{{ $eq->equipamento }}</td>
                <td class="small">{{ $eq->setor }}</td>
                <td class="small">{{ $eq->tag }}</td>
                <td class="small">{{ $eq->potencia }}</td>
                <td class="small">{{ $eq->rpm }}</td>
                @if(!isset($eq->status_geral))
                    <td bgcolor="#00FF00">Normal</td>
                @else
                    @if($eq->status_geral == "A1")
                        <td  bgcolor="#FFFF00">Alarme 1</td>
                    @elseif($eq->status_geral == "A2")
                        <td bgcolor="#FF0000"><font color="white">Alarme 2</font></td>
                    @elseif($eq->status_geral == "A0")
                        <td bgcolor="#00FF00">Normal</td>
                    @elseif($eq->status_geral == "")
                        <td bgcolor="#00FF00">Normal</td>
                    @elseif($eq->status_geral == "A4")
                        <td bgcolor="#0000CD"><font color="white">Não Monitorado</font></td>
                    @endif
            </tr>
            @endif
            </tbody>
        @endforeach
    </table>
</div>
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
                    <td width="25%" bgcolor="#FF0000"><font color="white">Alarme 2</font></td>
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