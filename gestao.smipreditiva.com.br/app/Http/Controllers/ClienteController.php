<?php

namespace App\Http\Controllers;

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
use App\Equipamento;
use App\Lubrificacao;

class ClienteController extends Controller
{
    //cadastro cliente
    public function novo()
    {
        $user = User::where('perfil',2)->get();

        return view('ocorrencia.form_cliente',['user'=> $user]);

    }

    public function salvar(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'uf' => 'required',
            'cidade' => 'required',
            'contato' => 'required',
            'email' => 'required']);

        $cliente = new Cliente;
        $cliente->cliente = $request->nome;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->uf;
        $cliente->email = $request->email;
        $cliente->contato = $request->contato;
        $cliente->id_user_gestor = $request->gestor;
        $cliente->save();

        $id_cli = DB::table('clientes')->orderBy('id', 'desc')->first();

        $up_eq = Equipamento::where('idclientes', $id_cli->id)->update(['id_user_gestor'=>$request->gestor]);


        // checking file is valid grafico
        if($request->image <> '')
        {
            if ($request->file('image')->isValid()) {
                $destinationPath = 'clientes/logos'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = '1'.$id_cli->id.'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path

                //atualiza no bd
                $upoc = DB::table('clientes')
                    ->where('id',$id_cli->id)
                    ->update(['logo'=>$fileName]);
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

        return redirect::to('/cliente/lista')->with('message','Cliente cadastrado com Sucesso !');
    }

    public function lista()
    {
        $clientes = DB::table('clientes')->simplePaginate(6);

        return view('ocorrencia.listaclientes',['clientes' => $clientes]);

    }



    public function equipamento()
    {
        $equipamentos= DB::table('equipamentos as a')
            ->join('clientes as c', 'c.id', '=', 'a.idclientes')
            ->select('a.id'
                ,'c.cliente'
                ,'a.equipamento'
                ,'a.setor'
                ,'a.tag'
                ,'a.potencia'
                ,'a.rpm'
            )
           ->simplePaginate(20);

        return view('ocorrencia.listaequipamentos',['equipamentos' => $equipamentos]);

    }

    public function equinovo()
    {

        $cli = DB::table('clientes')->select('id','cliente','contato')->get();

        return view('ocorrencia.form_equip',['cli' => $cli]);

    }

    public function equisalva(Request $request)
    {

        $this->validate($request, [
            'equipamento' => 'required',
            'setor' => 'required',
            'tag' => 'required',
            'rpm' => 'required',
            'potencia' => 'required']);

        $cli = DB::table('clientes')
            ->where('id',$request->cliente)
            ->first();

        $equipamentos = new Equipamento();
        $equipamentos->idclientes = $request->cliente;
        $equipamentos->cliente = $cli->cliente;
        $equipamentos->equipamento = $request->equipamento;
        $equipamentos->setor = $request->setor;
        $equipamentos->tag = $request->tag;
        $equipamentos->potencia = $request->potencia;
        $equipamentos->rpm = $request->rpm;

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
        $equipamentos->mes = $mes;
        $equipamentos->ano = $ano;


        $equipamentos->save();

        return redirect::to('/cliente/equipamentos')->with('message','Equipamento cadastrado com Sucesso !');
    }

    public function ocorrencias()
    {

        $ocorrencias = DB::table('ocorrencias')
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);

    }

    public function abertas()
    {

        $sec = Session::get('cliente');

        $clien = DB::table('clientes')->select('id','cliente','contato')
            ->where('id_user_gestor',Session::get('iduser'))
            ->first();


        $ocorrencias = DB::table('ocorrencias')
            ->where('id_user_gestor',Session::get('iduser'))
            ->where('status',1)
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);

    }



    public function visualiza($id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->get();

        $recom =  DB::table('eventos')
            ->join('recomendacaos', 'recomendacaos.id' , '=', 'eventos.idrecomendacaos')
            ->select('recomendacaos.recomendacao', 'recomendacaos.idalarme')
            ->where('eventos.idocorrencias',$id)
            ->groupBy('recomendacaos.recomendacao', 'recomendacaos.idalarme')
            ->get();

        $oc1 = DB::table('ocorrencias')->where('id',$id)->first();

        $cnt_total = DB::table('feedback')
            ->select(DB::raw('count(*) as qnt_cnt, cliente'))
            ->where('idocorrencias',$oc1->id)
            ->groupBy('cliente')
            ->get();

        $cnt = count($cnt_total);

        //pagina ocorrencia para visualizar os dados
        return view('cliente.form_visualiza',['ocorrencias' => $ocorrencias],['recom' => $recom], ['cnt' => $cnt]);

    }

    public function feedback($id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->get();

        //pagina ocorrencia para visualizar os dados
        return view('cliente.feedback',['ocorrencias' => $ocorrencias]);

    }

    public function visualizafeedback($id)
    {

        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('feedback')->where('idocorrencias',$id)->get();

        //pagina ocorrencia para visualizar os dados
        return view('cliente.visualiza_feed',['ocorrencias' => $ocorrencias]);

    }

    public function enviafeedback(Request $request, $id)
    {


        //seleciona os dados para retorno da
        //$protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);
        $ocorrencias = DB::table('ocorrencias')->where('id',$id)->first();

        $cnt_total = DB::table('feedback')
            ->select(DB::raw('count(*) as qnt_cnt, cliente'))
            ->where('idocorrencias',$ocorrencias->id)
            ->groupBy('cliente')
            ->get();

        $cnt = count($cnt_total);

        if($cnt >= 1)
        {
            return redirect::to('/cliente/analise/visualiza/'.$ocorrencias->id)->with('message','Ocorrência ja possui feedback');
        }

        else
        {
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
            $feed->save();

            if(Session::get('perfil') == 2)
            {
                return redirect::to('/cliente/home')->with('message','Feedback Inserio na ocorrência com Sucesso !');
            }

            if(Session::get('perfil') == 3)
            {
                return redirect::to('/cliente/conta/home')->with('message','Feedback Inserio na ocorrência com Sucesso !');
            }


        }
    }

    public function resalvar(Request $request, $id)
    {

        if($request->status == 1)
        {
            $dis = "Em aberto";
        }

        if($request->status == 2)
        {
            $dis = "Fechado";
        }


        //atualiza no bd
        $up = Ocorrencia::find($id);
        $up->status = $request->status;
        $up->desc_status = $dis;
        $up->analise = $request->analise;
        $up->usuario_ult_alteracao = Session::get('nome');
        $up->data_ult_alt = date("Y-m-d");
        $up->hora_ult_alt = date("H:i:s");
        $up->save();



        if(Session::get('perfil') == 2)
        {
            return redirect::to('/cliente/home')->with('message','Ocorrência atualizada com Sucesso !');
        }

        if(Session::get('perfil') == 3)
        {
            return redirect::to('/cliente/conta/home')->with('message','Ocorrência atualizada com Sucesso !');
        }

    }


    public function listaLubrif()
    {
        $dt_now = date('Y-m-d');

        $clien = DB::table('clientes')->select('id','cliente','contato')
            ->where('id_user_gestor',Session::get('iduser'))
            ->first();

        $lubrif = DB::table('lubrificacaos')
            ->orderBy('data_prox_lubri')
            ->where('idclientes',$clien->id)
           ->simplePaginate(20);

        return view('cliente.lista_lubrificacao', ['lubrif' => $lubrif, 'dt_now' => $dt_now]);

    }

    public function visualizaLubrif($id)
    {
        $lubrif = DB::table('lubrificacaos')
            ->where('id', $id)
            ->get();

        return view('cliente.visualiza_lubrif', ['lubrif' => $lubrif]);

    }

    public function consultaList()
    {

        //pagina ocorrencia para visualizar os dados
        return view('cliente.form_consulta_analise');


    }


    public function listResult(Request $request)
    {
        $data_f = $request->all();



        $ocorrencias = Ocorrencia::where(function($query) use($request) {

            $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));

            $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));

            if( Session::get('perfil') == 2)
            {
                $cliente = Session::get('id');

                if(!empty($request->id))
                    $query->where('ocorrencia',$request->id);

                if($cliente <> '0')
                    $query->where('id_user_gestor',$cliente);

                if(!empty($request->data_ini) && !empty($request->data_fim))
                    $query->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim));

                if($request->status <> '0')
                    $query->where('status',$request->status);
            }

            if( Session::get('perfil') == 3)
            {
                $cliente = Session::get('cliente');

                if(!empty($request->id))
                    $query->where('ocorrencia',$request->id);

                if($cliente <> '0')
                    $query->where('cliente',$cliente);

                if(!empty($request->data_ini) && !empty($request->data_fim))
                    $query->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim));

                if($request->status <> '0')
                    $query->where('status',$request->status);
            }
        })
           ->simplePaginate(20);


        return view('cliente.lista',['ocorrencias' => $ocorrencias], ['data_f' => $data_f]);


    }

    public function consultaFeed()
    {

        return view('cliente.form_consfeed');

    }

    public function feedList(Request $request)
    {
        $this->validate($request, [
            'data_ini' => 'required',
            'data_fim'=> 'required']);

        $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));

        $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));

        if( Session::get('perfil') == 2)
        {
            $ocorrencias1 = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.id_user_gestor',Session::get('iduser'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))->get();

            //verificar se contém o cliente na tabela feedback
            if(count($ocorrencias1) <=0){
                return redirect::to('cliente/analise/feed')->with('erros', 'Sem dados deste cliente refetente ao periodo solicitado');
            }

            $ocorrencias = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.id_user_gestor',Session::get('iduser'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->simplePaginate(20);


            $cnt_total = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.id_user_gestor',Session::get('iduser'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_oc = DB::table('ocorrencias')
                ->where('id_user_gestor',Session::get('iduser'))
                ->count();


            $sum_custo = DB::table('feedback')
                ->join('clientes', 'feedback.idclientes','=','id')
                ->where('clientes.id_user_gestor',Session::get('iduser'))
                ->sum('feedback.h_custo');

            $som_hh_e = DB::table('feedback')
                ->join('clientes', 'feedback.idclientes','=','id')
                ->where('clientes.id_user_gestor',Session::get('iduser'))
                ->sum('feedback.hh_extra');

            $som_hh_n = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.id_user_gestor',Session::get('iduser'))
                ->sum('a.hh_normal');

            $tp_maq_parada = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->selectRaw('sum(a.tempo_maq_parada) as tmp_maq, b.cliente')
                ->where('b.id_user_gestor',Session::get('iduser'))
                ->groupBy('b.cliente')
                ->get();

        }

        if( Session::get('perfil') == 3)
        {
            $ocorrencias1 = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',Session::get('cliente'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))->get();

            //verificar se contém o cliente na tabela feedback
            if(count($ocorrencias1) <=0){
                return redirect::to('cliente/contas/analise/feed')->with('erros', 'Sem dados deste cliente refetente ao periodo solicitado');
            }

            $ocorrencias = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',Session::get('cliente'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->simplePaginate(20);


            $cnt_total = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',Session::get('cliente'))
                ->whereBetween('b.data_cadastro',array($request->data_ini,$request->data_fim))
                ->count();

            $cnt_oc = DB::table('ocorrencias')
                ->where('cliente',Session::get('cliente'))
                ->count();


            $sum_custo = DB::table('feedback')
                ->where('cliente',Session::get('cliente'))
                ->sum('h_custo');

            $som_hh_e = DB::table('feedback')
                ->where('cliente',Session::get('cliente'))
                ->sum('hh_extra');

            $som_hh_n = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->where('b.cliente',Session::get('cliente'))
                ->sum('a.hh_normal');

            $tp_maq_parada = DB::table('feedback as a')
                ->join('ocorrencias as b', 'a.idocorrencias', '=', 'b.id')
                ->selectRaw('sum(a.tempo_maq_parada) as tmp_maq, b.cliente')
                ->where('b.cliente',Session::get('cliente'))
                ->groupBy('b.cliente')
                ->get();

        }

        return view('cliente.lista_feed',['ocorrencias' => $ocorrencias,'cnt_total' => $cnt_total,'cnt_oc' => $cnt_oc,'sum_custo' => $sum_custo
            ,'som_hh_e' => $som_hh_e,'som_hh_n' => $som_hh_n,'tp_maq_parada' => $tp_maq_parada]);


    }

    public function consultaDash()
    {
        return view('cliente.form_dashboard');

    }

    public function dashResult(Request $request)
    {
        $this->validate($request, [
            'data_ini' => 'required',
            'data_fim'=> 'required']);

        $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));

        $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));


        $ocorrencias = DB::table('ocorrencias')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->get();

        //total de ocorrencias
        $cnt_total = DB::table('ocorrencias')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_totalg = $cnt_total;

        $cnt_abertas = DB::table('ocorrencias')
            ->where('status','=',1)
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasg = $cnt_abertas;

        $cnt_feed = DB::table('feedback')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();

        $cnt_feedg = $cnt_feed;


        //inicia counts para montagem do grafico

        //velocidades separados por alarmes (A1, A2 e A3)
        //A1
        $vel_a1 = DB::table('ocorrencias')
            ->where('velocidade','=','A1')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1c = $vel_a1;

        //A2
        $vel_a2 = DB::table('ocorrencias')
            ->where('velocidade','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2c = $vel_a2;

        //A3
        $vel_a3 = DB::table('ocorrencias')
            ->where('velocidade','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1d = $vel_b1;

        //A2
        $vel_b2 = DB::table('ocorrencias')
            ->where('demodulacao','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2d = $vel_b2;

        //A3
        $vel_b3 = DB::table('ocorrencias')
            ->where('demodulacao','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1e = $vel_c1;

        //A2
        $vel_c2 = DB::table('ocorrencias')
            ->where('desgaste_rolamentos','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2e = $vel_c2;

        //A3
        $vel_c3 = DB::table('ocorrencias')
            ->where('desgaste_rolamentos','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1f = $vel_d1;

        //A2
        $vel_d2 = DB::table('ocorrencias')
            ->where('desbalanceamento','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2f = $vel_d2;

        //A3
        $vel_d3 = DB::table('ocorrencias')
            ->where('desbalanceamento','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1g = $vel_e1;

        //A2
        $vel_e2 = DB::table('ocorrencias')
            ->where('desalinhamento','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2g = $vel_e2;

        //A3
        $vel_e3 = DB::table('ocorrencias')
            ->where('desalinhamento','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1h = $vel_f1;

        //A2
        $vel_f2 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2h = $vel_f2;

        //A3
        $vel_f3 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1i = $vel_g1;

        //A2
        $vel_g2 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2i = $vel_g2;

        //A3
        $vel_g3 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1j = $vel_h1;

        //A2
        $vel_h2 = DB::table('ocorrencias')
            ->where('rigidez','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2j = $vel_h2;

        //A3
        $vel_h3 = DB::table('ocorrencias')
            ->where('rigidez','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1k = $vel_i1;

        //A2
        $vel_i2 = DB::table('ocorrencias')
            ->where('lubrificacao_deficiente','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2k = $vel_i2;

        //A3
        $vel_i3 = DB::table('ocorrencias')
            ->where('lubrificacao_deficiente','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
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
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1l = $vel_j1;

        //A2
        $vel_j2 = DB::table('ocorrencias')
            ->where('outros','=','A2')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2l = $vel_j2;

        //A3
        $vel_j3 = DB::table('ocorrencias')
            ->where('outros','=','A3')
            ->where('id_user_gestor',Session::get('iduser'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a3l = $vel_j3;
        //fim counts para montagem do grafico

        return view('cliente.dashboardoc',['request'=>$request,'cnt_total' => $cnt_total,
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
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);
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
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);
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
            ->where('b.cliente',Session::get('cliente'))
           ->simplePaginate(20);

        return view('cliente.listafeed',['ocorrencias' => $ocorrencias,'cnt_total' => $cnt_total,'cnt_oc' => $cnt_oc,'sum_custo' => $sum_custo
            ,'som_hh_e' => $som_hh_e,'som_hh_n' => $som_hh_n,'tp_maq_parada' => $tp_maq_parada]);

    }

    /*
     * Funções para o CARDS
     */

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
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);
    }


    public function listaAbertas()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where([['status','=',1],['ano','=',date('Y')]])
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);
    }

    public function listaTotal()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where('id_user_gestor',Session::get('iduser'))
           ->simplePaginate(20);

        return view('cliente.lista',['ocorrencias' => $ocorrencias]);


    }
    
    public function edit($id)
    {
        $cli = DB::table('clientes')->where('id', $id)->get();

        $user = DB::table('users')->where('perfil', 2)->get();

        return view('ocorrencia.form_editarcliente', ['cli'=>$cli, 'user'=> $user]);
    }

    public function resave($id, Request $request)
    {
        if($request->image <> '')
        {
            if ($request->file('image')->isValid()) {
                $destinationPath = 'clientes/logos'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = '1'.$id.'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path

                //atualiza no bd
                $upoc = DB::table('clientes')
                    ->where('id',$id)
                    ->update(['logo'=>$fileName]);
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

        $up = Cliente::find($id);
        $up->id_user_gestor = $request->gestor;
        $up->save();

        $oc = Ocorrencia::where('idclientes', $id)
            ->update(['id_user_gestor' => $request->gestor]);

        $up_eq = Equipamento::where('idclientes', $id)->update(['id_user_gestor'=>$request->gestor]);

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
