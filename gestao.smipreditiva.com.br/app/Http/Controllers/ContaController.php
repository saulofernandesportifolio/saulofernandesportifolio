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

class ContaController extends Controller
{
    //
    public function listaAbertas()
    {
        $ocorrencias = DB::table('ocorrencias')
            ->where([['status','=',1],['ano','=',date('Y')]])
            ->where('cliente',Session::get('cliente'))
            ->simplePaginate(20);

        return view('contas.lista',['ocorrencias' => $ocorrencias]);
    }

    public function consultaList()
    {
        //pagina ocorrencia para visualizar os dados
        return view('contas.form_consulta_analise');

    }

    public function consultaFeed()
    {
        return view('cliente.form_consfeed');
    }

    public function consultaDash()
    {
        return view('contas.form_dashboard');

    }

    public function dashResult(Request $request)
    {
        $this->validate($request, [
            'data_ini' => 'required',
            'data_fim'=> 'required']);

        $request->data_ini = implode('-', array_reverse(explode('/', $request->data_ini)));

        $request->data_fim = implode('-', array_reverse(explode('/', $request->data_fim)));


        $ocorrencias = DB::table('ocorrencias')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->get();

        //total de ocorrencias
        $cnt_total = DB::table('ocorrencias')
            ->where('cliente',Session::get('cliente'))
            ->count();

        $cnt_totalg = $cnt_total;

        $cnt_abertas = DB::table('ocorrencias')
            ->where('status','=',1)
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->where('cliente',Session::get('cliente'))
            ->count();

        $cnt_abertasg = $cnt_abertas;

        $cnt_feed = DB::table('feedback')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();

        $cnt_feedg = $cnt_feed;


        //inicia counts para montagem do grafico

        //velocidades separados por alarmes (A1, A2 e A3)
        //A1
        $vel_a1 = DB::table('ocorrencias')
            ->where('velocidade','=','A1')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1c = $vel_a1;

        //A2
        $vel_a2 = DB::table('ocorrencias')
            ->where('velocidade','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2c = $vel_a2;

        //A3
        $vel_a3 = DB::table('ocorrencias')
            ->where('velocidade','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1d = $vel_b1;

        //A2
        $vel_b2 = DB::table('ocorrencias')
            ->where('demodulacao','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2d = $vel_b2;

        //A3
        $vel_b3 = DB::table('ocorrencias')
            ->where('demodulacao','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1e = $vel_c1;

        //A2
        $vel_c2 = DB::table('ocorrencias')
            ->where('desgaste_rolamentos','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2e = $vel_c2;

        //A3
        $vel_c3 = DB::table('ocorrencias')
            ->where('desgaste_rolamentos','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1f = $vel_d1;

        //A2
        $vel_d2 = DB::table('ocorrencias')
            ->where('desbalanceamento','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2f = $vel_d2;

        //A3
        $vel_d3 = DB::table('ocorrencias')
            ->where('desbalanceamento','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1g = $vel_e1;

        //A2
        $vel_e2 = DB::table('ocorrencias')
            ->where('desalinhamento','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2g = $vel_e2;

        //A3
        $vel_e3 = DB::table('ocorrencias')
            ->where('desalinhamento','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1h = $vel_f1;

        //A2
        $vel_f2 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2h = $vel_f2;

        //A3
        $vel_f3 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1i = $vel_g1;

        //A2
        $vel_g2 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2i = $vel_g2;

        //A3
        $vel_g3 = DB::table('ocorrencias')
            ->where('sistema_transmissao','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1j = $vel_h1;

        //A2
        $vel_h2 = DB::table('ocorrencias')
            ->where('rigidez','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2j = $vel_h2;

        //A3
        $vel_h3 = DB::table('ocorrencias')
            ->where('rigidez','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1k = $vel_i1;

        //A2
        $vel_i2 = DB::table('ocorrencias')
            ->where('lubrificacao_deficiente','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2k = $vel_i2;

        //A3
        $vel_i3 = DB::table('ocorrencias')
            ->where('lubrificacao_deficiente','=','A3')
            ->where('cliente',Session::get('cliente'))
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
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a1l = $vel_j1;

        //A2
        $vel_j2 = DB::table('ocorrencias')
            ->where('outros','=','A2')
            ->where('cliente',Session::get('cliente'))
            ->whereBetween('data_cadastro',array($request->data_ini,$request->data_fim))
            ->count();
        $vel_a2l = $vel_j2;

        //A3
        $vel_j3 = DB::table('ocorrencias')
            ->where('outros','=','A3')
            ->where('cliente',Session::get('cliente'))
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
}
