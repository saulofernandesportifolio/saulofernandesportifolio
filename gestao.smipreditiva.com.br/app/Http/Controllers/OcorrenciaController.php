<?php

namespace App\Http\Controllers;

use App\Equipamento;
use App\Http\Requests;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Session;
use Redirect;
use App\User;
use App\Alarme;
use App\Recomendacao;
use App\Ocorrencia;
use DB;
use Input;
use App\Feedback;
use App\Evento;
use App\Cliente;
use Excel;
use App\SelectCliente;
use App\SelectClienteresultado;
use File;
use PDF;




class OcorrenciaController extends Controller
{

    public function testelay()
    {

        return view('teste');

    }

    public function show()
    {


        //$desgasterolamentos = Alarme::pluck('alarme','id');

        $desgasterolamentos = DB::table('alarmes')->select('id','alarme')->get();

        $recomendacaosA1 = DB::table('recomendacaos')->select('id','recomendacao','idalarme')->get();

        //select de recomendações
        //desgaste rolamentos
        $rec_desrol = DB::table('recomendacaos')->select('id','recomendacao','idalarme')->get();

        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        //desgaste rolamentos
        //$rec_desba = DB::table('recomendacaos')->select('id','recomendacao','idalarme')->where('idalarme',3)->get();




        //pagina principal
        return view('ocorrencia.ocorrencia',['rec_desrol' => $rec_desrol],['cli' => $cli]);
    }

    public function getRecomendacaos(Request $request, $id){
        if($request->ajax()){
            $recomendacaos = Recomendacao::recomendacaos($id);
            return response()->json($recomendacaos);

        }
    }


    public function SelectClienteresultado(Request $request, $idclientes){
        if($request->ajax()){
            $SelectClienteresultados = SelectClienteresultado::SelectClienteresultados($idclientes);
            return response()->json($SelectClienteresultados);

        }
    }
    

    //pesquisa se cliente consta no cadastro
    public function retornacliente($tag)
    {


        //função para executar a busca o pela tag
        function retorna($tag)
        {
            $result_aluno = DB::table('equipamentos as a')
                ->leftjoin('clientes as b', 'a.idclientes', '=', 'b.id')
                ->select('b.cliente','a.equipamento','a.setor','a.tag','a.potencia','a.rpm')
                ->where('a.id','=',$tag)->orderBy('a.id', 'desc')->limit(1)->get();
             //contador para validar se retorno algum valor
              $cont=count($result_aluno);
           //se retornar 0 deixa os campos em branco senão efetua o preenchimento
           if(empty($cont)){
               $valores['setor'] = '';
               $valores['equipamento'] = '';
               $valores['potencia'] = '';
               $valores['rpm'] = '';

           }elseif($cont > 0){
               foreach ($result_aluno as $al) {
                   $valores['setor'] = $al->setor;
                   $valores['equipamento'] = $al->equipamento;
                   $valores['potencia'] = $al->potencia;
                   $valores['rpm'] = $al->rpm;

               }
           }
            return json_encode($valores);
        }

        if (isset($tag)){
            echo retorna($tag);
        }

    }


    public function salvar(Request $request)
    {


        $this->validate($request, [

            'setor' => 'required',
            'cliente' => 'required',
            'tag' => 'required',
            'equipamento' => 'required',
            'potencia' => 'required',
            'rpm' => 'required',
            'vel_iso' => 'in:A0,A1,A2,A3',
            'demoludacao' => 'in:A0,A1,A2,A3',
            'desgasterolamentos' => 'in:A0,A1,A2,A3',
            'desbalanceamento' => 'in:A0,A1,A2,A3',
            'desalinhamento' => 'in:A0,A1,A2,A3',
            'sistema_transmissao' => 'in:A0,A1,A2,A3',
            'folgas' => 'in:A0,A1,A2,A3',
            'rigidez' => 'in:A0,A1,A2,A3',
            'lubrificacao' => 'in:A0,A1,A2,A3',
            'outros' => 'in:A0,A1,A2,A3'

        ]);

        //validação de dados
        $this->validate($request, [
            'image' => 'mimes:jpeg'
        ]);



        if($request->status_geral == 'A0' || $request->status_geral == 'A4')
        {
            $status = 2;
            $disc = 'Fechada';
        }


       else{
           $status = 1;
           $disc = 'Em aberto';
       }

        $val_tg = DB::table('ocorrencias')
            ->where('tag',$request->tag)
            ->where('setor',$request->setor)
            ->where('equipamento',$request->equipamento)
            ->where('potencia', $request->potencia)
            ->where('rpm', $request->rpm)
            ->where('status',1)
            ->count();

        if($val_tg > 0)
        {
            $val_tg_2 = DB::table('ocorrencias')
                ->where('tag',$request->tag)
                ->where('setor',$request->setor)
                ->where('equipamento',$request->equipamento)
                ->where('potencia', $request->potencia)
                ->where('rpm', $request->rpm)
                ->where('status',1)
                ->first();

            return redirect::to('/home  ')->with('message','Não foi possivel gerar ocorrência. Equipamento com ocorrência em aberta n° '.$val_tg_2->ocorrencia.'!');
        }


        $rec_des_rol = count($request->rec_desgaste_rolamentos);
        $rec_desba = count($request->rec_desbalanceamento);
        $rec_desa = count($request->rec_desalinhamento);
        $rec_sis_tra = count($request->rec_sistema_transmissao);
        $rec_folgas = count($request->rec_folgas_desgastes);
        $rec_rig = count($request->rec_rigidez);
        $rec_lub = count($request->rec_lubrificacao_deficiente);





        //verificar o ultimo protocolo criado//
        $gerarocorrencia = DB::table('ocorrencias')->orderBy('ocorrencia', 'desc')->first();
        
        //seleciona a tag pelo id para cadastrar o nome no campo tag
        $tagg=DB::table('equipamentos')->where('id','=',$request->tag)->get();

        foreach ($tagg as $tg){

            $tg = $tg->tag;
        }

        //valida se for igual a null inicia protocolo com senao cria o proximo
        $gerarocorrencia1 = empty($gerarocorrencia->ocorrencia) ? $gerarocorrencia = 1 : $gerarocorrencia->ocorrencia + 1;

        //insere os dados com o novo ocorrencia
        $ocorrencia = new Ocorrencia;
        $ocorrencia->ocorrencia = str_pad($gerarocorrencia1, 5, '0', STR_PAD_LEFT);
        $ocorrencia->tag = $request->tag;
        $ocorrencia->setor = $request->setor;
        $ocorrencia->equipamento = $request->equipamento;
        $ocorrencia->potencia = $request->potencia;
        $ocorrencia->rpm = $request->rpm;
        $ocorrencia->status_geral = $request->status_geral;
        $ocorrencia->velocidade = $request->vel_iso;
        $ocorrencia->demodulacao = $request->demoludacao;
        $ocorrencia->valor_velocidade = $request->valor_velocidade;
        $ocorrencia->valor_demod = $request->valor_demodulacao;
        $ocorrencia->alarme_deslocamento_x = $request->alarme_deslocamento_x;
        $ocorrencia->desc_deslocamento_x = $request->desc_deslocamento_x;
        $ocorrencia->alarme_deslocamento_y = $request->alarme_deslocamento_y;
        $ocorrencia->desc_deslocamento_y = $request->desc_deslocamento_y;
        $ocorrencia->desgaste_rolamentos = $request->desgaste_rolamentos;
        $ocorrencia->recomendacao_desgaste_rotalamentos = $request->rec_desgaste_rolamentos;
        $ocorrencia->desbalanceamento = $request->desbalanceamento;
        $ocorrencia->recomendacao_desbalanceamentos = $request->rec_desbalanceamento;
        $ocorrencia->desalinhamento = $request->desalinhamento;
        $ocorrencia->recomendacao_desalinhamento = $request->rec_desalinhamento;
        $ocorrencia->sistema_transmissao = $request->sistema_transmissao;
        $ocorrencia->recomendacao_sistema_transmissao = $request->rec_sistema_transmissao;
        $ocorrencia->folgas_desgaste = $request->folgas_desgastes;
        $ocorrencia->recomendacao_folgas_desgaste = $request->rec_folgas_desgastes;
        $ocorrencia->rigidez = $request->rigidez;
        $ocorrencia->recomendacao_rigidez = $request->rec_rigidez;
        $ocorrencia->lubrificacao_deficiente = $request->lubrificacao_deficiente;
        $ocorrencia->recomendacao_lubrificacao_deficiente = $request->rec_lubrificacao_deficiente;
        $ocorrencia->outros = $request->outros;
        $ocorrencia->desc_outros = $request->desc_outros;
        $ocorrencia->prazo_intervensao = $request->prazo_intervensao;
        $ocorrencia->obs = $request->obs_outros;
        $ocorrencia->status = $status;
        $ocorrencia->anotacoes = $request->analise;


        $cliente=DB::table('clientes')->where('id','=',$request->cliente)->get();
        foreach ( $cliente as $cl) {
            $ocorrencia->cliente = $cl->cliente;
            $ocorrencia->idclientes = $request->cliente;
            $ocorrencia->id_user_gestor = $cl->id_user_gestor;
        }
        
        $ocorrencia->idclientes = $request->cliente;
        $ocorrencia->desc_status = $disc;
        $ocorrencia->usuario =Session::get('nome');
        $ocorrencia->data_cadastro= date("Y-m-d");
        $ocorrencia->hora_cadastro= date("H:i:s");
        $ocorrencia->desc_arquivo = $request->desc_arquivo;

        if($request->mes_analise == '')
        {
            if(date('-m-') == "-01-"){
                $mes="Janeiro";
                $ano=date("Y");
            }elseif(date('-m-') == "-02-"){
                $mes="Fevereiro";
                $ano=date("Y");
            }elseif(date('-m-') == "-03-"){
                $mes="Março";
                $ano=date("Y");
            }elseif(date('-m-') == "-04-"){
                $mes="Abril";
                $ano=date("Y");
            }elseif(date('-m-') == "-05-"){
                $mes="Maio";
                $ano=date("Y");
            }elseif(date('-m-') == "-06-"){
                $mes="Junho";
                $ano=date("Y");
            }elseif(date('-m-') == "-07-"){
                $mes="Julho";
                $ano=date("Y");
            }elseif(date('-m-') == "-08-"){
                $mes="Agosto";
                $ano=date("Y");
            }elseif(date('-m-') == "-09-"){
                $mes="Setembro";
                $ano=date("Y");
            }elseif(date('-m-') == "-10-"){
                $mes="Outubro";
                $ano=date("Y");
            }elseif(date('-m-') == "-11-"){
                $mes="Novembro";
                $ano=date("Y");
            }elseif(date('-m-') == "-12-"){
                $mes="Dezembro";
                $ano=date("Y");
            }
            $ocorrencia->mes = $mes;
            $ocorrencia->ano = $ano;
        }

        else {
            $ano=date("Y");
            $ocorrencia->mes = $request->mes_analise;
            $ocorrencia->ano = $ano;
        }
        $ocorrencia->save();


        $oc1=DB::table('ocorrencias')->orderBy('id', 'desc')->first();
        $oc2=DB::table('ocorrencias')->where('id',$oc1->id)->get();
        
        // checking file is valid grafico
        if($request->image <> '')
        {
            if ($request->file('image')->isValid()) {
                $destinationPath = 'public/graficos'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = '1'.$oc1->id.'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path

                //atualiza no bd
                $upoc = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['grafico'=>$fileName]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        // checking file is valid grafico2
        if($request->image2 <> '')
        {
            if ($request->file('image2')->isValid()) {
                $destinationPath1 = 'public/graficos'; // upload path
                $extension1 = $request->file('image2')->getClientOriginalExtension(); // getting image extension
                $fileName1 = '2'.$oc1->id.'.'.$extension1; // renameing image
                $request->file('image2')->move($destinationPath1, $fileName1); // uploading file to given path

                //atualiza no bd
                $upoc1 = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['grafico2'=>$fileName1]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        // checking file is valid dados
        if($request->dados <> '')
        {
            if ($request->file('dados')->isValid()) {

                $destinationPath2 = 'public/excel'; // upload path
                $extension2 = $request->file('dados')->getClientOriginalExtension(); // getting image extension
                $fileName2 = '3'.$oc1->id.'.'.$extension2; // renameing image
                $request->file('dados')->move($destinationPath2, $fileName2); // uploading file to given path

                //atualiza no bd
                $upoc2 = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['arquivo'=>$fileName2]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        $cli = DB::table('clientes')->where('id',$oc1->idclientes)->get();


/*
        return \PDF::loadView('ocorrencia.pdf_ocorrencia',['ocorrencias'=>$oc2, 'cli'=>$cli])
            ->setPaper('a4', 'landscape')
            ->download('analise_vibracao-'.$oc1->ocorrencia.'.pdf')
            ->redirect::to('/home')->with('message','Gerado ocorrência : '.$oc1->ocorrencia.' com Sucesso !');
*/
        return redirect::to('/ocorrencia/consulta')->with('message','Gerado ocorrência : '.$ocorrencia->ocorrencia.' com Sucesso !');





    }


    public function index(){

        $ocorrencias = DB::select('CALL ocorrencia(?,?)', [Session::get('nome'), '%']);
        $ocorrencias = DB::table('ocorrencias')->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);

    }


    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
        }


        $ocorrencias = DB::select('CALL ocorrencia(?,?)', [Session::get('nome'),$request->pesquisa]);
        $ocorrencias = DB::table('ocorrencias')->where('ocorrencia','LIKE',$request->pesquisa)->simplePaginate(6);

        //return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);

        return $this->index()->with(['ocorrencias' => $ocorrencias ]);
    }


    public function visualiza($id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id', $id)->get();


        $id_c = DB::table('ocorrencias')->where('id',$id)->first();



        //pagina ocorrencia para visualizar os dados
        return view('ocorrencia.form_visualiza', ['ocorrencias' => $ocorrencias]);

    }

    //função feedback
    public function feedback($id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->get();

        //pagina ocorrencia para visualizar os dados
        return view('ocorrencia.feedback',['ocorrencias' => $ocorrencias]);

    }

    public function enviafeedback(Request $request, $id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->first();

        //salva registros na tabela de feedback
        $feed = new Feedback;
        $feed->idocorrencias = $ocorrencias->id;
        $feed->cliente = $ocorrencias->cliente;
        $feed->atividades_intervencao = $request->atividades_intervencao;
        $feed->hh_normal = $request->hh_normal;
        $feed->executante = $request->executante;
        $feed->tipo_intervencao = $request->tipo_intervencao;
        $feed->hh_extra = $request->hh_extra;
        $feed->tempo_maq_parada = $request->tempo_maq_parada;
        $feed->diagnostico = $request->diagnostico;
        $feed->usuario =Session::get('nome');
        $feed->data_cadastro= date("Y-m-d");
        $feed->hora_cadastro= date("H:i:s");

        if(date('-m-') == "-01-"){
            $mes="Janeiro";
            $ano=date("Y");
        }elseif(date('-m-') == "-02-"){
            $mes="Fevereiro";
            $ano=date("Y");
        }elseif(date('-m-') == "-03-"){
            $mes="Março";
            $ano=date("Y");
        }elseif(date('-m-') == "-04-"){
            $mes="Abril";
            $ano=date("Y");
        }elseif(date('-m-') == "-05-"){
            $mes="Maio";
            $ano=date("Y");
        }elseif(date('-m-') == "-06-"){
            $mes= "Junho";
            $ano= date("Y");
        }elseif(date('-m-') == "-07-"){
            $mes="Julho";
            $ano=date("Y");
        }elseif(date('-m-') == "-08-"){
            $mes="Agosto";
            $ano=date("Y");
        }elseif(date('-m-') == "-09-"){
            $mes="Setembro";
            $ano=date("Y");
        }elseif(date('-m-') == "-10-"){
            $mes="Outubro";
            $ano=date("Y");
        }elseif(date('-m-') == "-11-"){
            $mes="Novembro";
            $ano=date("Y");
        }elseif(date('-m-') == "-12-"){
            $mes="Dezembro";
            $ano=date("Y");
        }
        $feed->mes = $mes;
        $feed->ano = $ano;

        $feed->save();


        return redirect::to('/ocorrencia/lista')->with('message','Feedback Inserio na ocorrência n° : '.$ocorrencias->id.' com Sucesso !');

    }

    //vusualiza feedback

    public function vizualizafeed($id)
    {

        $feedbacks = DB::table('feedback')->where('idocorrencias',$id)->get();

        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->get();

        return view('ocorrencia.visualiza_feed',['feedbacks' => $feedbacks], ['ocorrencias' => $ocorrencias]);

    }

    public function consultaFeed()
    {

        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        //pagina ocorrencia para visualizar os dados
        return view('ocorrencia.form_consfeed',['cli' => $cli]);

    }

    public function feedlist(Request $request)
    {
        $this->validate($request, [
            'data_ini' => 'required',
            'data_fim'=> 'required']);

         
          $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));
         
          $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));

        if($request->cliente <> '0')
        {

            $ocorrencias1 = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',$request->cliente)
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))->get();

             //verificar se contém o cliente na tabela feedback
            if(count($ocorrencias1) <=0){
                return redirect::to('/ocorrencia/consultafeed')->with('erros', 'Sem dados deste cliente refetente ao periodo solicitado');
            }

            $ocorrencias = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',$request->cliente)
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->simplePaginate(6);


            $cnt_total = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',$request->cliente)
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_oc = DB::table('ocorrencias')
                ->where('cliente',$request->cliente)
                ->count();


            $sum_custo = DB::table('feedback')
                ->where('cliente',$request->cliente)
                ->sum('h_custo');

            $som_hh_e = DB::table('feedback')
                ->where('cliente',$request->cliente)
                ->sum('hh_extra');

            $som_hh_n = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',$request->cliente)
                ->sum('a.hh_normal');

            $tp_maq_parada = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->selectRaw('sum(a.tempo_maq_parada) as tmp_maq, b.cliente')
                ->where('b.cliente',$request->cliente)
                ->groupBy('b.cliente')
                ->get();
        }

        else
        {
            
            $cnt_total=0;
            $cnt_oc=0;
            $sum_custo=0;
            $som_hh_e=0;
            $som_hh_n=0;
            $tp_maq_parada=0;
            
            $ocorrencias = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->simplePaginate(6);

        }

        return view('ocorrencia.listafeed',['ocorrencias' => $ocorrencias,'cnt_total' => $cnt_total,'cnt_oc' => $cnt_oc,'sum_custo' => $sum_custo
        ,'som_hh_e' => $som_hh_e,'som_hh_n' => $som_hh_n,'tp_maq_parada' => $tp_maq_parada]);

    }


    public function download($id)
    {

        //$dl = File::find($id);
        //return Storage::download($dl->path, $dl->title);


    }



    //funções para indicadores

    public function dashselcliente()
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        //pagina ocorrencia para visualizar os dados
        return view('ocorrencia.form_dashboard',['cli' => $cli]);


    }


    public function enviadash(Request $request)
    {

        $this->validate($request, [
            'data_ini' => 'required',
            'data_fim'=> 'required']);

          $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));
         
          $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));

        if($request->cliente <> '0')
        {
            $ocorrencias = DB::table('ocorrencias')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->get();

            //total de ocorrencias
            $cnt_total = DB::table('ocorrencias')
                ->where('cliente',$request->cliente)
                ->count();

            $cnt_totalg = $cnt_total;

            $cnt_abertas = DB::table('ocorrencias')
                ->where('status','=',1)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->where('cliente',$request->cliente)
                ->count();

            $cnt_abertasg = $cnt_abertas;

            $cnt_feed = DB::table('feedback')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_feedg = $cnt_feed;


            //inicia counts para montagem do grafico

            //velocidades separados por alarmes (A1, A2 e A3)
            //A1
            $vel_a1 = DB::table('ocorrencias')
                ->where('velocidade','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1c = $vel_a1;

            //A2
            $vel_a2 = DB::table('ocorrencias')
                ->where('velocidade','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2c = $vel_a2;

            //A3
            $vel_a3 = DB::table('ocorrencias')
                ->where('velocidade','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3c = $vel_a3;
            //fim counts para montagem do grafico

            //velocidades separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //demodulacao separados por alarmes (A1, A2 e A3)
            //A1
            $vel_b1 = DB::table('ocorrencias')
                ->where('demodulacao','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1d = $vel_b1;

            //A2
            $vel_b2 = DB::table('ocorrencias')
                ->where('demodulacao','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2d = $vel_b2;

            //A3
            $vel_b3 = DB::table('ocorrencias')
                ->where('demodulacao','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3d = $vel_b3;
            //fim counts para montagem do grafico

            //demodulacao separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //desgaste rolamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_c1 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1e = $vel_c1;

            //A2
            $vel_c2 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2e = $vel_c2;

            //A3
            $vel_c3 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3e = $vel_c3;
            //fim counts para montagem do grafico

            //desgaste rolamento separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_d1 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1f = $vel_d1;

            //A2
            $vel_d2 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2f = $vel_d2;

            //A3
            $vel_d3 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3f = $vel_d3;
            //fim counts para montagem do grafico

            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_e1 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1g = $vel_e1;

            //A2
            $vel_e2 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2g = $vel_e2;

            //A3
            $vel_e3 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3g = $vel_e3;
            //fim counts para montagem do grafico

            //desalinhamento separados por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //sistema de transmissão separados por alarmes (A1, A2 e A3)
            //A1
            $vel_f1 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1h = $vel_f1;

            //A2
            $vel_f2 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2h = $vel_f2;

            //A3
            $vel_f3 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3h = $vel_f3;
            //fim counts para montagem do grafico

            //sistema de transmissão separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //folgas e desgastes separados por alarmes (A1, A2 e A3)
            //A1
            $vel_g1 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1i = $vel_g1;

            //A2
            $vel_g2 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2i = $vel_g2;

            //A3
            $vel_g3 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3i = $vel_g3;
            //fim counts para montagem do grafico

            //folgas e desgastes separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //rigidez separados por alarmes (A1, A2 e A3)
            //A1
            $vel_h1 = DB::table('ocorrencias')
                ->where('rigidez','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1j = $vel_h1;

            //A2
            $vel_h2 = DB::table('ocorrencias')
                ->where('rigidez','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2j = $vel_h2;

            //A3
            $vel_h3 = DB::table('ocorrencias')
                ->where('rigidez','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3j = $vel_h3;
            //fim counts para montagem do grafico

            //rigidez separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1
            $vel_i1 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1k = $vel_i1;

            //A2
            $vel_i2 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2k = $vel_i2;

            //A3
            $vel_i3 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3k = $vel_i3;
            //fim counts para montagem do grafico

            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1
            $vel_j1 = DB::table('ocorrencias')
                ->where('outros','=','A1')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1l = $vel_j1;

            //A2
            $vel_j2 = DB::table('ocorrencias')
                ->where('outros','=','A2')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2l = $vel_j2;

            //A3
            $vel_j3 = DB::table('ocorrencias')
                ->where('outros','=','A3')
                ->where('cliente',$request->cliente)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3l = $vel_j3;
            //fim counts para montagem do grafico
        }

        else
        {
            $ocorrencias = DB::table('ocorrencias')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->get();

            //total de ocorrencias
            $cnt_total = DB::table('ocorrencias')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_totalg = $cnt_total;

            $cnt_abertas = DB::table('ocorrencias')
                ->where('status','=',1)
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_abertasg = $cnt_abertas;

            $cnt_feed = DB::table('feedback')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_feedg = $cnt_feed;


            //inicia counts para montagem do grafico

            //velocidades separados por alarmes (A1, A2 e A3)
            //A1
            $vel_a1 = DB::table('ocorrencias')
                ->where('velocidade','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1c = $vel_a1;

            //A2
            $vel_a2 = DB::table('ocorrencias')
                ->where('velocidade','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2c = $vel_a2;

            //A3
            $vel_a3 = DB::table('ocorrencias')
                ->where('velocidade','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3c = $vel_a3;
            //fim counts para montagem do grafico

            //velocidades separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //demodulacao separados por alarmes (A1, A2 e A3)
            //A1
            $vel_b1 = DB::table('ocorrencias')
                ->where('demodulacao','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1d = $vel_b1;

            //A2
            $vel_b2 = DB::table('ocorrencias')
                ->where('demodulacao','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2d = $vel_b2;

            //A3
            $vel_b3 = DB::table('ocorrencias')
                ->where('demodulacao','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3d = $vel_b3;
            //fim counts para montagem do grafico

            //demodulacao separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //desgaste rolamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_c1 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1e = $vel_c1;

            //A2
            $vel_c2 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2e = $vel_c2;

            //A3
            $vel_c3 = DB::table('ocorrencias')
                ->where('desgaste_rolamentos','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3e = $vel_c3;
            //fim counts para montagem do grafico

            //desgaste rolamento separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_d1 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1f = $vel_d1;

            //A2
            $vel_d2 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2f = $vel_d2;

            //A3
            $vel_d3 = DB::table('ocorrencias')
                ->where('desbalanceamento','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3f = $vel_d3;
            //fim counts para montagem do grafico

            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //desbalanceamento separados por alarmes (A1, A2 e A3)
            //A1
            $vel_e1 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1g = $vel_e1;

            //A2
            $vel_e2 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2g = $vel_e2;

            //A3
            $vel_e3 = DB::table('ocorrencias')
                ->where('desalinhamento','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3g = $vel_e3;
            //fim counts para montagem do grafico

            //desalinhamento separados por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //sistema de transmissão separados por alarmes (A1, A2 e A3)
            //A1
            $vel_f1 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1h = $vel_f1;

            //A2
            $vel_f2 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2h = $vel_f2;

            //A3
            $vel_f3 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3h = $vel_f3;
            //fim counts para montagem do grafico

            //sistema de transmissão separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //folgas e desgastes separados por alarmes (A1, A2 e A3)
            //A1
            $vel_g1 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1i = $vel_g1;

            //A2
            $vel_g2 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2i = $vel_g2;

            //A3
            $vel_g3 = DB::table('ocorrencias')
                ->where('sistema_transmissao','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3i = $vel_g3;
            //fim counts para montagem do grafico

            //folgas e desgastes separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //rigidez separados por alarmes (A1, A2 e A3)
            //A1
            $vel_h1 = DB::table('ocorrencias')
                ->where('rigidez','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1j = $vel_h1;

            //A2
            $vel_h2 = DB::table('ocorrencias')
                ->where('rigidez','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2j = $vel_h2;

            //A3
            $vel_h3 = DB::table('ocorrencias')
                ->where('rigidez','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3j = $vel_h3;
            //fim counts para montagem do grafico

            //rigidez separados por alarmes (A1, A2 e A3)
            //A1


            //inicia counts para montagem do grafico
            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1
            $vel_i1 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1k = $vel_i1;

            //A2
            $vel_i2 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2k = $vel_i2;

            //A3
            $vel_i3 = DB::table('ocorrencias')
                ->where('lubrificacao_deficiente','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3k = $vel_i3;
            //fim counts para montagem do grafico

            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1

            //inicia counts para montagem do grafico
            //lubrificação deficiente por alarmes (A1, A2 e A3)
            //A1
            $vel_j1 = DB::table('ocorrencias')
                ->where('outros','=','A1')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a1l = $vel_j1;

            //A2
            $vel_j2 = DB::table('ocorrencias')
                ->where('outros','=','A2')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a2l = $vel_j2;

            //A3
            $vel_j3 = DB::table('ocorrencias')
                ->where('outros','=','A3')
                ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();
            $vel_a3l = $vel_j3;
            //fim counts para montagem do grafico
        }


        return view('ocorrencia.dashboardoc',['request'=>$request,'cnt_total' => $cnt_total,
            'vel_a1c' => $vel_a1c, 'vel_a2c' => $vel_a2c, 'vel_a3c' => $vel_a3c
            ,'vel_a1d' => $vel_a1d, 'vel_a2d' => $vel_a2d, 'vel_a3d' => $vel_a3d
            ,'vel_a1e' => $vel_a1e, 'vel_a2e' => $vel_a2e, 'vel_a3e' => $vel_a3e
            ,'vel_a1f' => $vel_a1f, 'vel_a2f' => $vel_a2f, 'vel_a3f' => $vel_a3f
            ,'vel_a1g' => $vel_a1g, 'vel_a2g' => $vel_a2g, 'vel_a3g' => $vel_a3g
            ,'vel_a1h' => $vel_a1h, 'vel_a2h' => $vel_a2h, 'vel_a3h' => $vel_a3h
            ,'vel_a1i' => $vel_a1i, 'vel_a2i' => $vel_a2i, 'vel_a3i' => $vel_a3i
            ,'vel_a1j' => $vel_a1j, 'vel_a2j' => $vel_a2j, 'vel_a3j' => $vel_a3j
            ,'vel_a1k' => $vel_a1k, 'vel_a2k' => $vel_a2k, 'vel_a3k' => $vel_a3k
            ,'vel_a1l' => $vel_a1l, 'vel_a2l' => $vel_a2l, 'vel_a3l' => $vel_a3l
            ,'cnt_totalg' => $cnt_totalg, 'cnt_abertasg' => $cnt_abertasg, 'cnt_feedg' => $cnt_feedg]);


    }

    public function listaNormais()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where('velocidade','=','A0')
            ->orWhere('demodulacao','=','A0')
            ->orWhere('desgaste_rolamentos','=','A0')
            ->orWhere('desbalanceamento','=','A0')
            ->orWhere('desalinhamento','=','A0')
            ->orWhere('sistema_transmissao','=','A0')
            ->orWhere('folgas_desgaste','=','A0')
            ->orWhere('rigidez','=','A0')
            ->orWhere('lubrificacao_deficiente','=','A0')
            ->orWhere('outros','=','A0')
            ->where('ano','=',date('Y'))
            ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);
    }

    public function listaAlarme1()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where('velocidade','=','A1')
            ->orWhere('demodulacao','=','A1')
            ->orWhere('desgaste_rolamentos','=','A1')
            ->orWhere('desbalanceamento','=','A1')
            ->orWhere('desalinhamento','=','A1')
            ->orWhere('sistema_transmissao','=','A1')
            ->orWhere('folgas_desgaste','=','A1')
            ->orWhere('rigidez','=','A1')
            ->orWhere('lubrificacao_deficiente','=','A1')
            ->orWhere('outros','=','A1')
            ->where('ano','=',date('Y'))
            ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);
    }

    public function listaAlarme2()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where('velocidade','=','A2')
            ->orWhere('demodulacao','=','A2')
            ->orWhere('desgaste_rolamentos','=','A2')
            ->orWhere('desbalanceamento','=','A2')
            ->orWhere('desalinhamento','=','A2')
            ->orWhere('sistema_transmissao','=','A2')
            ->orWhere('folgas_desgaste','=','A2')
            ->orWhere('rigidez','=','A2')
            ->orWhere('lubrificacao_deficiente','=','A2')
            ->orWhere('outros','=','A2')
            ->where('ano','=',date('Y'))
            ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);
    }



    public function listaFeed()
    {
        $cnt_total=0;
        $cnt_oc=0;
        $sum_custo=0;
        $som_hh_e=0;
        $som_hh_n=0;
        $tp_maq_parada=0;


        $ocorrencias = DB::table('feedback as a')
            ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
            ->where('b.ano','=',date('Y'))
            ->simplePaginate(6);

        return view('ocorrencia.listafeed',['ocorrencias' => $ocorrencias,'cnt_total' => $cnt_total,'cnt_oc' => $cnt_oc,'sum_custo' => $sum_custo
            ,'som_hh_e' => $som_hh_e,'som_hh_n' => $som_hh_n,'tp_maq_parada' => $tp_maq_parada]);

    }


    public function listaAbertas()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where([['status','=',1],['ano','=',date('Y')]])
            ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);
    }

    public function listaTotal()
    {
        $ocorrencias = DB::table('ocorrencias')
           ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);


    }

    public function listaDesrol()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->simplePaginate(6);

        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias]);


    }

    //Consultas e filtros

    public function consulta()
    {
        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        //pagina ocorrencia para visualizar os dados
        return view('ocorrencia.form_consulta   ',['cli' => $cli]);


    }


    public function lista(Request $request)
    {
        $data_f = $request->all();

        $ocorrencias = Ocorrencia::where(function($query) use($request) {
            
          $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));
         
          $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));


            if(!empty($request->id))
                $query->where('ocorrencia',$request->id);

            if($request->cliente <> '0')
                $query->where('cliente',$request->cliente);

            if(!empty($request->data_ini) && !empty($request->data_fim))
                $query->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim));

            if($request->status <> '0')
                $query->where('status',$request->status);

        })
            ->simplePaginate(6);


        return view('ocorrencia.lista',['ocorrencias' => $ocorrencias], ['data_f' => $data_f]);


    }


    //Importar bases

    public function importEqui()
    {

        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        return view('ocorrencia.form_import',['cli' => $cli]);

    }


    public function enviaImport(Request $request)
    {


        if($request->cliente == 0){

            return redirect::to('/adm/importar')->with('erros','É necessario selecionar o cliente que vai ser vinculado a carga !');

        }

        $cli = DB::table('clientes')
            ->where('id',$request->cliente)
            ->first();

        if($request->hasFile('Carga'))
        {

            $fileItself = $request->file('Carga');

            $load = Excel::load($fileItself, function($reader){
            })->get();

            if(!empty($load) && $load->count())
            {
                foreach ($load as $key => $value) {

                     $equi = new Equipamento();
                     $equi->idclientes = $request->cliente;
                     $equi->cliente = $cli->cliente;
                     $equi->equipamento = $value->equipamento;
                     $equi->setor = $value->setor;
                     $equi->tag = $value->tag;
                     $equi->potencia = $value->potencia;
                     $equi->rpm = $value->rpm;

                    if(date('-m-') == "-01-"){
                        $mes="Janeiro";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-02-"){
                        $mes="Fevereiro";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-03-"){
                        $mes="Março";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-04-"){
                        $mes="Abril";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-05-"){
                        $mes="Maio";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-06-"){
                        $mes="Junho";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-07-"){
                        $mes="Julho";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-08-"){
                        $mes="Agosto";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-09-"){
                        $mes="Setembro";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-10-"){
                        $mes="Outubro";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-11-"){
                        $mes="Novembro";
                        $ano=date("Y");
                    }elseif(date('-m-') == "-12-"){
                        $mes="Dezembro";
                        $ano=date("Y");
                    }
                    $equi->mes = $mes;
                    $equi->ano = $ano;
                     $equi->save();

                }

            }

        }

        return redirect::to('/adm/importar')->with('message','Base importada com sucesso!');

    }

     public function novaOcorrenciaHome($id)
    {
        $desgasterolamentos = DB::table('alarmes')->select('id','alarme')->get();

        $recomendacaosA1 = DB::table('recomendacaos')->select('id','recomendacao','idalarme')->get();

        //select de recomendações
        //desgaste rolamentos
        $rec_desrol = DB::table('recomendacaos')->select('id','recomendacao','idalarme')->get();

        $equi = DB::table('equipamentos')
            ->where('id', $id)
            ->get();
       // dd($equi);

        return view('ocorrencia.form_naomonitoradosNew',['rec_desrol' => $rec_desrol], ['equi' => $equi]);

    }

    public function salvaNovaOcorrencia(Request $request)
    {

        $this->validate($request, [

            'setor' => 'required',
            'cliente' => 'required',

            'equipamento' => 'required',
            'potencia' => 'required',
            'rpm' => 'required',
            'vel_iso' => 'in:A0,A1,A2,A3',
            'demoludacao' => 'in:A0,A1,A2,A3',
            'desgasterolamentos' => 'in:A0,A1,A2,A3',
            'desbalanceamento' => 'in:A0,A1,A2,A3',
            'desalinhamento' => 'in:A0,A1,A2,A3',
            'sistema_transmissao' => 'in:A0,A1,A2,A3',
            'folgas' => 'in:A0,A1,A2,A3',
            'rigidez' => 'in:A0,A1,A2,A3',
            'lubrificacao' => 'in:A0,A1,A2,A3',
            'outros' => 'in:A0,A1,A2,A3'

        ]);

        //validação de dados
        $this->validate($request, [
            'image' => 'mimes:jpeg'
        ]);

        if($request->status_geral == 'A0' || $request->status_geral == 'A4')
        {
            $status = 2;
            $disc = 'Fechada';
        }


        else{
            $status = 1;
            $disc = 'Em aberto';
        }

        $val_tg = DB::table('ocorrencias')
            ->where('tag',$request->tag)
            ->where('setor',$request->setor)
            ->where('equipamento',$request->equipamento)
            ->where('potencia', $request->potencia)
            ->where('rpm', $request->rpm)
            ->where('status',1)
            ->count();

        if($val_tg > 0)
        {
            $val_tg_2 = DB::table('ocorrencias')
                ->where('tag',$request->tag)
                ->where('setor',$request->setor)
                ->where('equipamento',$request->equipamento)
                ->where('potencia', $request->potencia)
                ->where('rpm', $request->rpm)
                ->where('status',1)
                ->first();

            return redirect::to('/home  ')->with('message','Não foi possivel gerar ocorrência. Equipamento com ocorrência em aberta n° '.$val_tg_2->ocorrencia.'!');
        }



        $rec_des_rol = count($request->rec_desgaste_rolamentos);
        $rec_desba = count($request->rec_desbalanceamento);
        $rec_desa = count($request->rec_desalinhamento);
        $rec_sis_tra = count($request->rec_sistema_transmissao);
        $rec_folgas = count($request->rec_folgas_desgastes);
        $rec_rig = count($request->rec_rigidez);
        $rec_lub = count($request->rec_lubrificacao_deficiente);





        //verificar o ultimo protocolo criado//
        $gerarocorrencia = DB::table('ocorrencias')->orderBy('ocorrencia', 'desc')->first();

       //valida se for igual a null inicia protocolo com senao cria o proximo
        $gerarocorrencia1 = empty($gerarocorrencia->ocorrencia) ? $gerarocorrencia = 1 : $gerarocorrencia->ocorrencia + 1;

        //insere os dados com o novo ocorrencia
        $ocorrencia = new Ocorrencia;
        $ocorrencia->ocorrencia = str_pad($gerarocorrencia1, 5, '0', STR_PAD_LEFT);
        $ocorrencia->tag = $request->tag;
        $ocorrencia->setor = $request->setor;
        $ocorrencia->equipamento = $request->equipamento;
        $ocorrencia->potencia = $request->potencia;
        $ocorrencia->rpm = $request->rpm;
        $ocorrencia->status_geral = $request->status_geral;
        $ocorrencia->velocidade = $request->vel_iso;
        $ocorrencia->demodulacao = $request->demoludacao;
        $ocorrencia->valor_velocidade = $request->valor_velocidade;
        $ocorrencia->valor_demod = $request->valor_demodulacao;
        $ocorrencia->alarme_deslocamento_x = $request->alarme_deslocamento_x;
        $ocorrencia->desc_deslocamento_x = $request->desc_deslocamento_x;
        $ocorrencia->alarme_deslocamento_y = $request->alarme_deslocamento_y;
        $ocorrencia->desc_deslocamento_y = $request->desc_deslocamento_y;
        $ocorrencia->desgaste_rolamentos = $request->desgaste_rolamentos;
        $ocorrencia->recomendacao_desgaste_rotalamentos = $request->rec_desgaste_rolamentos;
        $ocorrencia->desbalanceamento = $request->desbalanceamento;
        $ocorrencia->recomendacao_desbalanceamentos = $request->rec_desbalanceamento;
        $ocorrencia->desalinhamento = $request->desalinhamento;
        $ocorrencia->recomendacao_desalinhamento = $request->rec_desalinhamento;
        $ocorrencia->sistema_transmissao = $request->sistema_transmissao;
        $ocorrencia->recomendacao_sistema_transmissao = $request->rec_sistema_transmissao;
        $ocorrencia->folgas_desgaste = $request->folgas_desgastes;
        $ocorrencia->recomendacao_folgas_desgaste = $request->rec_folgas_desgastes;
        $ocorrencia->rigidez = $request->rigidez;
        $ocorrencia->recomendacao_rigidez = $request->rec_rigidez;
        $ocorrencia->lubrificacao_deficiente = $request->lubrificacao_deficiente;
        $ocorrencia->recomendacao_lubrificacao_deficiente = $request->rec_lubrificacao_deficiente;
        $ocorrencia->outros = $request->outros;
        $ocorrencia->desc_outros = $request->desc_outros;
        $ocorrencia->prazo_intervensao = $request->prazo_intervensao;
        $ocorrencia->obs = $request->obs_outros;
        $ocorrencia->status = $status;
        $ocorrencia->anotacoes = $request->analise;

        $cliente=DB::table('clientes')->where('cliente','=',$request->cliente)->get();
        foreach ( $cliente as $cl) {
            $ocorrencia->cliente = $cl->cliente;
            $ocorrencia->idclientes = $cl->id;
            $ocorrencia->id_user_gestor = $cl->id_user_gestor;
        }

        $ocorrencia->cliente = $request->cliente;
        $ocorrencia->desc_status = $disc;
        $ocorrencia->usuario =Session::get('nome');
        $ocorrencia->data_cadastro= date("Y-m-d");
        $ocorrencia->hora_cadastro= date("H:i:s");
        $ocorrencia->desc_arquivo = $request->desc_arquivo;

        if($request->mes_analise == '')
        {
            if(date('-m-') == "-01-"){
                $mes="Janeiro";
                $ano=date("Y");
            }elseif(date('-m-') == "-02-"){
                $mes="Fevereiro";
                $ano=date("Y");
            }elseif(date('-m-') == "-03-"){
                $mes="Março";
                $ano=date("Y");
            }elseif(date('-m-') == "-04-"){
                $mes="Abril";
                $ano=date("Y");
            }elseif(date('-m-') == "-05-"){
                $mes="Maio";
                $ano=date("Y");
            }elseif(date('-m-') == "-06-"){
                $mes="Junho";
                $ano=date("Y");
            }elseif(date('-m-') == "-07-"){
                $mes="Julho";
                $ano=date("Y");
            }elseif(date('-m-') == "-08-"){
                $mes="Agosto";
                $ano=date("Y");
            }elseif(date('-m-') == "-09-"){
                $mes="Setembro";
                $ano=date("Y");
            }elseif(date('-m-') == "-10-"){
                $mes="Outubro";
                $ano=date("Y");
            }elseif(date('-m-') == "-11-"){
                $mes="Novembro";
                $ano=date("Y");
            }elseif(date('-m-') == "-12-"){
                $mes="Dezembro";
                $ano=date("Y");
            }
            $ocorrencia->mes = $mes;
            $ocorrencia->ano = $ano;
        }

        else {
            $ano=date("Y");
            $ocorrencia->mes = $request->mes_analise;
            $ocorrencia->ano = $ano;
        }
        $ocorrencia->save();


        $oc1=DB::table('ocorrencias')->orderBy('id', 'desc')->first();

        // checking file is valid grafico
        if($request->image <> '')
        {
            if ($request->file('image')->isValid()) {
                $destinationPath = 'public/graficos'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = '1'.$oc1->id.'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path

                //atualiza no bd
                $upoc = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['grafico'=>$fileName]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        // checking file is valid grafico2
        if($request->image2 <> '')
        {
            if ($request->file('image2')->isValid()) {
                $destinationPath1 = 'public/graficos'; // upload path
                $extension1 = $request->file('image2')->getClientOriginalExtension(); // getting image extension
                $fileName1 = '2'.$oc1->id.'.'.$extension1; // renameing image
                $request->file('image2')->move($destinationPath1, $fileName1); // uploading file to given path

                //atualiza no bd
                $upoc1 = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['grafico2'=>$fileName1]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        // checking file is valid dados
        if($request->dados <> '')
        {
            if ($request->file('dados')->isValid()) {

                $destinationPath2 = 'public/excel'; // upload path
                $extension2 = $request->file('dados')->getClientOriginalExtension(); // getting image extension
                $fileName2 = '3'.$oc1->id.'.'.$extension2; // renameing image
                $request->file('dados')->move($destinationPath2, $fileName2); // uploading file to given path

                //atualiza no bd
                $upoc2 = DB::table('ocorrencias')
                    ->where('id',$oc1->id)
                    ->update(['arquivo'=>$fileName2]);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            }

        }

        /*
        return \PDF::loadView('ocorrencia.pdf_ocorrencia',['ocorrencias'=>$oc2, 'cli'=>$cli])
            ->setPaper('a4', 'landscape')
            ->download('analise_vibracao-'.$oc1->ocorrencia.'.pdf');
        */

        return redirect::to('/ocorrencia/consulta')->with('message','Gerado ocorrência : '.$ocorrencia->ocorrencia.' com Sucesso !');
    }

    public function delRegister($id)
    {
        $del = DB::table('ocorrencias')
            ->where('id',$id)
            ->delete();

        return redirect::to('/home  ')->with('message','Registro excluido com Sucesso !');
    }

    public function atulnaomonit($id)
    {
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->get();


        return view('ocorrencia.form_atual_naomonit',['ocorrencias' => $ocorrencias]);
    }

    public function enviaatulnaomonit($id, Request $request)
    {

        $up = Ocorrencia::find($id);
        $up->status_geral = 'A4';
        $up->status = 2;
        $up->desc_status = 'Fechada';
        $up->obs = $request->obs;
        $up->usuario_ult_alteracao = Session::get('nome');
        $up->data_ult_alt = date("Y-m-d");
        $up->hora_ult_alt = date("H:i:s");

        if(date('-m-') == "-01-"){
            $mes="Janeiro";
            $ano=date("Y");
        }elseif(date('-m-') == "-02-"){
            $mes="Fevereiro";
            $ano=date("Y");
        }elseif(date('-m-') == "-03-"){
            $mes="Março";
            $ano=date("Y");
        }elseif(date('-m-') == "-04-"){
            $mes="Abril";
            $ano=date("Y");
        }elseif(date('-m-') == "-05-"){
            $mes="Maio";
            $ano=date("Y");
        }elseif(date('-m-') == "-06-"){
            $mes="Junho";
            $ano=date("Y");
        }elseif(date('-m-') == "-07-"){
            $mes="Julho";
            $ano=date("Y");
        }elseif(date('-m-') == "-08-"){
            $mes="Agosto";
            $ano=date("Y");
        }elseif(date('-m-') == "-09-"){
            $mes="Setembro";
            $ano=date("Y");
        }elseif(date('-m-') == "-10-"){
            $mes="Outubro";
            $ano=date("Y");
        }elseif(date('-m-') == "-11-"){
            $mes="Novembro";
            $ano=date("Y");
        }elseif(date('-m-') == "-12-"){
            $mes="Dezembro";
            $ano=date("Y");
        }
        $up->mes = $mes;
        $up->ano = $ano;
        $up->save();

        return redirect::to('/home')->with('message','Dados atualizado com Sucesso !');

    }

    public function geraPDF($id)
    {
        $oc2 = DB::table('ocorrencias')->where('id', $id)->get();

        $oc1 = DB::table('ocorrencias')->where('id', $id)->first();

        $cli = DB::table('clientes')->where('id',$oc1->idclientes)->get();

        return \PDF::loadView('ocorrencia.pdf_ocorrencia',['ocorrencias'=>$oc2, 'cli'=>$cli])
            ->setPaper('a4', 'landscape')
            ->download('analise_vibracao-'.$oc1->ocorrencia.'.pdf');

    }

}
