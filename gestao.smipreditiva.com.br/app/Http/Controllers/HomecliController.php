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


class HomecliController extends Controller
{

    public function index()
    {

        //Lista de equipamentos
        $equi = DB::table('equipamentos')
            ->leftJoin('ocorrencias', function($join) {
                $join->on('equipamentos.idclientes','=','ocorrencias.idclientes');
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->select('equipamentos.*','ocorrencias.id as idocorrencia','equipamentos.cliente as cliente',
                'ocorrencias.velocidade as velocidade','ocorrencias.demodulacao as demodulacao','ocorrencias.status_geral as status_geral')
            ->where('equipamentos.id_user_gestor',Session::get('iduser'))
            ->orderBY('equipamentos.id')
            ->simplePaginate(20);

        //count de ocorrencias e feedbacks para montagem dos graficos
        $ocorrencias = DB::table('ocorrencias')->select('mes')->distinct()->get();
        $ocorrencias1 = DB::table('ocorrencias')->select('ano')->distinct()->get();


        /***************janeiro**************************/
        //total de ocorrencias
        $cnt_totalgjan = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Janeiro'], ['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1jan = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Janeiro']])
            ->count();

        $cnt_a2jan = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjan = $cnt_a1jan + $cnt_a2jan;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgjan = $cnt_feed;

        /***************janeiro**************************/


        /***************fevereiro*************************/
        //total de ocorrencias
        $cnt_totalgfev = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Fevereiro'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();



        $cnt_a1fev = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2fev = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgfev = $cnt_a1fev + $cnt_a2fev;


        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgfev = $cnt_feed;

        /***************fevereiro**************************/

        /***************marco*************************/
        //total de ocorrencias
        $cnt_totalgmar = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Março'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1mar = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2mar = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Março']])
            ->count();

        $cnt_abertasgmar = $cnt_a1mar + $cnt_a2mar;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgmar = $cnt_feed;

        /***************marco**************************/


        /***************abril*************************/
        //total de ocorrencias
        $cnt_totalgabr = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Abril'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1abr = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2abr = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgabr = $cnt_a1abr + $cnt_a2abr;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgabr = $cnt_feed;

        /***************abril**************************/


        /***************maio*************************/
        //total de ocorrencias
        $cnt_totalgmai = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Maio'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1mai = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2mai = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgmai = $cnt_a1mai + $cnt_a2mai;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgmai = $cnt_feed;

        /***************maio**************************/


        /**************junho*************************/
        //total de ocorrencias
        $cnt_totalgjun = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Junho'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1jun = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2jun = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjun = $cnt_a1jun + $cnt_a2jun;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgjun = $cnt_feed;

        /***************junho**************************/

        /**************julho*************************/
        //total de ocorrencias
        $cnt_totalgjul = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Julho'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1jul = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2jul = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjul = $cnt_a1jul + $cnt_a2jul;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgjul = $cnt_feed;

        /***************julho**************************/


        /**************agosto*************************/
        //total de ocorrencias
        $cnt_totalgago = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Agosto'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1ago = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2ago = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgago = $cnt_a1ago + $cnt_a2ago;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgago = $cnt_feed;

        /***************agosto**************************/


        /**************setembro*************************/
        //total de ocorrencias
        $cnt_totalgset = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Setembro'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1set = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2set = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgset = $cnt_a1set + $cnt_a2set;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgset = $cnt_feed;

        /***************setembro**************************/


        /**************outubro*************************/
        //total de ocorrencias
        $cnt_totalgout = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Outubro'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1out = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2out = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgout = $cnt_a1out + $cnt_a2out;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgout = $cnt_feed;

        /***************outubro**************************/


        /**************novembro*************************/
        //total de ocorrencias
        $cnt_totalgnov = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Novembro'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1nov = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2nov = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgnov = $cnt_a1nov + $cnt_a2nov;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgnov = $cnt_feed;

        /***************novembro**************************/


        /**************dezembro*************************/
        //total de ocorrencias
        $cnt_totalgdez = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Dezembro'],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1dez = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2dez = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgdez = $cnt_a1dez + $cnt_a2dez;

        $cnt_feed = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano','=',date("Y")],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_feedgdez = $cnt_feed;

        /***************dezembro**************************/

        //mes
        $vel_m1 = DB::table('ocorrencias')
            ->where('ano','=',date("Y"))
            ->select('mes','ano')
            ->distinct()
            ->get();
        $jan='';
        $fev='';
        $mar='';
        $abr='';
        $mai='';
        $jun='';
        $jul='';
        $ago='';
        $set='';
        $out='';
        $nov='';
        $dez='';
        foreach ($vel_m1 as $vm){
            if ($vm->mes == 'Janeiro') {
                $jan .= 'Jan' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Fevereiro') {
                $fev .= 'Fev' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Março') {
                $mar .= 'Mar' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Abril') {
                $abr .= 'Abr' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Maio') {
                $mai .= 'Mai' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Junho') {
                $jun .= 'Jun' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Julho') {
                $jul .= 'Jul' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Agosto') {
                $ago .= 'Ago' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Setembro') {
                $set .= 'Set' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Outubro') {
                $out .= 'Out' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Novembro') {
                $nov .= 'Nov' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Dezembro') {
                $dez .= 'Dez' . "/" . $vm->ano;
            }
        }
        $jan=$jan;
        $fev=$fev;
        $mar=$mar;
        $abr=$abr;
        $mai=$mai;
        $jun=$jun;
        $jul=$jul;
        $ago=$ago;
        $set=$set;
        $out=$out;
        $nov=$nov;
        $dez=$dez;

        //inicia counts para montagem do grafico

        /***************janeiro**************************/

        $jan_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Janeiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cj = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Janeiro']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmjan2 = $jan_ala1 + $jan_ala2 + $jan_ala4;
        $cnt_nmjan = $eq - $cnt_nmjan2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim janeiro********************************************************/


        /***************fevereiro**************************************************************************/

        $fev_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Fevereiro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cf = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Fevereiro']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();



        $cnt_nmfev2 = $fev_ala1 + $fev_ala2 + $fev_ala4;
        $cnt_nmfev = $eq - $cnt_nmfev2;



        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim fevereiro********************************************************/



        /***************Março**************************************************************************/

        $mar_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Março']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
           ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cm = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Março']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmmar2 = $mar_ala1 + $mar_ala2 + $mar_ala4;
        $cnt_nmmar = $eq - $cnt_nmmar2;



        //fim counts para montagem do grafico


        /******************************fim março********************************************************/




        /***************Abril**************************************************************************/

        $abr_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Abril']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cab = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Abril']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmabr2 = $abr_ala1 + $abr_ala2 + $abr_ala4;
        $cnt_nmabr = $eq - $cnt_nmabr2;



        /******************************fim abril********************************************************/


        /***************Maio**************************************************************************/

        $mai_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Maio']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cma = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Maio']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmmai2 = $mai_ala1 + $mai_ala2 + $mai_ala4;
        $cnt_nmmai = $eq - $cnt_nmmai2;



        /******************************fim Maio********************************************************/


        /***************Junho**************************************************************************/

        $jun_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Junho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cjun = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Junho']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmjun2 = $jun_ala1 + $jun_ala2 + $jun_ala4;
        $cnt_nmjun = $eq - $cnt_nmjun2;



        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1



        /******************************fim Junho********************************************************/


        /***************Julho**************************************************************************/

        $jul_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Julho']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cjul = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Julho']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmjul2 = $jul_ala1 + $jul_ala2 + $jul_ala4;
        $cnt_nmjul = $eq - $cnt_nmjul2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Julho********************************************************/


        /***************Agosto**************************************************************************/
        $ago_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Agosto']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cago = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Agosto']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmago2 = $ago_ala1 + $ago_ala2 + $ago_ala4;
        $cnt_nmago = $eq - $cnt_nmago2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Agosto********************************************************/


        /***************Setembro**************************************************************************/

        $set_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Setembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cset = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Setembro']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmset2 = $set_ala1 + $set_ala2 + $set_ala4;
        $cnt_nmset = $eq - $cnt_nmset2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1

        /******************************fim Setembro********************************************************/

        /***************Outubro**************************************************************************/

        $out_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Outubro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cout = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Outubro']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmout2 = $out_ala1 + $out_ala2 + $out_ala4;
        $cnt_nmout = $eq - $cnt_nmout2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Outubro********************************************************/


        /***************Novembro**************************************************************************/

        $nov_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Novembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cnov = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Novembro']])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmnov2 = $nov_ala1 + $nov_ala2 + $nov_ala4;
        $cnt_nmnov = $eq - $cnt_nmnov2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Novembro********************************************************/

        /***************Dezembro**************************************************************************/

        $dez_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Dezembro']])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_cdez = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Dezembro']])
            ->where('equipamentos.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmdez2 = $dez_ala1 + $dez_ala2 + $dez_ala4;
        $cnt_nmdez = $eq - $cnt_nmdez2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1

        $cli = DB::table('clientes')->select('id','cliente','contato')
            ->where('id_user_gestor','=',Session::get('iduser'))
            ->get();



        /******************************fim Dezembro********************************************************/

        //Normais (sem ocorrências)
        $cnt_nmjan = $cnt_nmjan  - $cnt_totalgjan;
        $cnt_nmfev = $cnt_nmfev  - $cnt_totalgfev;
        $cnt_nmmar = $cnt_nmmar  - $cnt_totalgmar;
        $cnt_nmabr = $cnt_nmabr  - $cnt_totalgabr;
        $cnt_nmmai = $cnt_nmmai  - $cnt_totalgmai;
        $cnt_nmjun = $cnt_nmjun  - $cnt_totalgjun;
        $cnt_nmjul = $cnt_nmjul  - $cnt_totalgjul;
        $cnt_nmago = $cnt_nmago  - $cnt_totalgago;
        $cnt_nmset = $cnt_nmset  - $cnt_totalgset;
        $cnt_nmout = $cnt_nmout  - $cnt_totalgout;
        $cnt_nmnov = $cnt_nmnov  - $cnt_totalgnov;
        $cnt_nmdez = $cnt_nmdez  - $cnt_totalgdez;

        if($oc_cj == 0)
        {
            $cnt_nmjan = 0;
        }

        if($oc_cf == 0)
        {
            $cnt_nmfev = 0;
        }

        if($oc_cm == 0)
        {
            $cnt_nmmar = 0;
        }

        if($oc_cab == 0)
        {
            $cnt_nmabr = 0;
        }

        if($oc_cma == 0)
        {
            $cnt_nmmai = 0;
        }

        if($oc_cjun == 0)
        {
            $cnt_nmjun = 0;
        }

        if($oc_cjul == 0)
        {
            $cnt_nmjul = 0;
        }

        if($oc_cago == 0)
        {
            $cnt_nmago = 0;
        }

        if($oc_cset == 0)
        {
            $cnt_nmset = 0;
        }

        if($oc_cout == 0)
        {
            $cnt_nmout = 0;
        }

        if($oc_cnov == 0)
        {
            $cnt_nmnov = 0;
        }

        if($oc_cdez == 0)
        {
            $cnt_nmdez = 0;
        }

        //COUNT CARDS
        //sem alarmes
        $semt = $cnt_nmjan + $cnt_nmfev + $cnt_nmmar + $cnt_nmabr + $cnt_nmmai + $cnt_nmjun + $cnt_nmjul + $cnt_nmago +
            $cnt_nmset + $cnt_nmout + $cnt_nmnov + $cnt_nmdez;

        //A1
        $a1t = $jan_ala1 + $fev_ala1 + $mar_ala1 = $abr_ala1 + $mai_ala1 + $jun_ala1 + $jul_ala1 + $ago_ala1 +
                $set_ala1 + $out_ala1 + $nov_ala1 + $dez_ala1;

        //A2

        $a2t = $jan_ala2 + $fev_ala2 + $mar_ala2 = $abr_ala2 + $mai_ala2 + $jun_ala2 + $jul_ala2 + $ago_ala2 +
                $set_ala2 + $out_ala2 + $nov_ala2 + $dez_ala2;

        //Feedbacks
        $cnt_feedgt = $cnt_feedgjan + $cnt_feedgfev + $cnt_feedgmar + $cnt_feedgabr + $cnt_feedgmai +
            $cnt_feedgjun + $cnt_feedgjul + $cnt_feedgago + $cnt_feedgset + $cnt_feedgout +
            $cnt_feedgnov + $cnt_feedgdez;


        //Alarmes 4
        $total_al4 = $dez_ala4 + $nov_ala4 + $out_ala4 + $set_ala4 + $ago_ala4 + $jul_ala4 + $jun_ala4
            +$mai_ala4 + $abr_ala4 + $mar_ala4 + $fev_ala4 + $jan_ala4;

        //Abetas
        $eq = DB::table('equipamentos')
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();
   

        $oc_tt = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgt = $eq - $oc_tt;

        //% graficos

        //NÃO MONITORADOS
        if($jan_ala4 <> 0)
        {
            $jan_ala4p = $jan_ala4/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        }
        else {
            $jan_ala4p = 0;
        }

        if($fev_ala4 <> 0){
            $fev_ala4p = $fev_ala4/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        }

        else {
            $fev_ala4p = 0;
        }

        if($mar_ala4 <> 0) {
            $mar_ala4p = $mar_ala4/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        }
        else {
            $mar_ala4p = 0;
        }

        if($abr_ala4 <> 0) {
            $abr_ala4p = $abr_ala4/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        }
        else {
            $abr_ala4p = 0;
        }

        if($mai_ala4 <> 0){
            $mai_ala4p = $mai_ala4/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        }
        else {
            $mai_ala4p = 0;
        }

        if($jun_ala4 <> 0){
            $jun_ala4p = $jun_ala4/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        }
        else {
            $jun_ala4p = 0;
        }

        if($jul_ala4 <> 0) {
            $jul_ala4p = $jul_ala4/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        }
        else {
            $jul_ala4p = 0;
        }

        if($ago_ala4 <> 0) {
            $ago_ala4p = $ago_ala4/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        }
        else {
            $ago_ala4p = 0;
        }

        if($set_ala4 <> 0) {
            $set_ala4p = $set_ala4/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        }
        else {
            $set_ala4p = 0;
        }

        if($out_ala4 <> 0) {
            $out_ala4p = $out_ala4/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        }
        else {
            $out_ala4p = 0;
        }

        if($nov_ala4 <> 0) {
            $nov_ala4p = $nov_ala4/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        }

        else {
            $nov_ala4p = 0;
        }

        if($dez_ala4 <> 0) {
            $dez_ala4p = $dez_ala4/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        }
        else {
            $dez_ala4p = 0;
        }
        if($jan_ala1 <> 0){
            $jan_ala1p = $jan_ala1/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $jan_ala1p = 0;
        }

        //ALARME 1
        if($fev_ala1) {
            $fev_ala1p = $fev_ala1/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $fev_ala1p = 0;
        }

        if($mar_ala1) {
            $mar_ala1p = $mar_ala1/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $mar_ala1p = 0;
        }

        if($abr_ala1) {
            $abr_ala1p = $abr_ala1/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $abr_ala1p = 0;
        }
        if($mai_ala1) {
            $mai_ala1p = $mai_ala1/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $mai_ala1p = 0;
        }

        if($jun_ala1) {
            $jun_ala1p = $jun_ala1/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $jun_ala1p = 0;
        }
        if($jul_ala1) {
            $jul_ala1p = $jul_ala1/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $jul_ala1p = 0;
        }
        if($ago_ala1) {
            $ago_ala1p = $ago_ala1/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $ago_ala1p = 0;
        }
        if($set_ala1) {
            $set_ala1p = $set_ala1/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $set_ala1p = 0;
        }
        if($out_ala1) {
            $out_ala1p = $out_ala1/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $out_ala1p = 0;
        }
        if($nov_ala1) {
            $nov_ala1p = $nov_ala1/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $nov_ala1p = 0;
        }
        if($dez_ala1) {
            $dez_ala1p = $dez_ala1/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $dez_ala1p = 0;
        }

        //ALARME 2
        if($jan_ala2) {
            $jan_ala2p = $jan_ala2/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $jan_ala2p = 0;
        }
        if($fev_ala2) {
            $fev_ala2p = $fev_ala2/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $fev_ala2p = 0;
        }
        if($mar_ala2) {
            $mar_ala2p = $mar_ala2/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $mar_ala2p = 0;
        }
        if($abr_ala2) {
            $abr_ala2p = $abr_ala2/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $abr_ala2p = 0;
        }

        if($mai_ala2) {
            $mai_ala2p = $mai_ala2/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $mai_ala2p = 0;
        }

        if($jun_ala2) {
            $jun_ala2p = $jun_ala2/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $jun_ala2p = 0;
        }
        if($jul_ala2) {
            $jul_ala2p = $jul_ala2/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $jul_ala2p = 0;
        }
        if($ago_ala2) {
            $ago_ala2p = $ago_ala2/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $ago_ala2p = 0;
        }
        if($set_ala2) {
            $set_ala2p = $set_ala2/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $set_ala2p = 0;
        }
        if($out_ala2) {
            $out_ala2p = $out_ala2/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $out_ala2p = 0;
        }
        if($nov_ala2) {
            $nov_ala2p = $nov_ala2/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $nov_ala2p = 0;
        }
        if($dez_ala2) {
            $dez_ala2p = $dez_ala2/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $dez_ala2p = 0;
        }

        //NORMAIS
        if($cnt_nmjan) {
            $cnt_nmjanp = $cnt_nmjan/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $cnt_nmjanp = 0;
        }
        if($cnt_nmfev) {
            $cnt_nmfevp = $cnt_nmfev/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $cnt_nmfevp = 0;
        }
        if($cnt_nmmar) {
            $cnt_nmmarp = $cnt_nmmar/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $cnt_nmmarp = 0;
        }
        if($cnt_nmabr) {
            $cnt_nmabrp = $cnt_nmabr/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $cnt_nmabrp = 0;
        }
        if($cnt_nmmai) {
            $cnt_nmmaip = $cnt_nmmai/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $cnt_nmmaip = 0;
        }
        if($cnt_nmjun) {
            $cnt_nmjunp = $cnt_nmjun/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $cnt_nmjunp = 0;
        }
        if($cnt_nmjul) {
            $cnt_nmjulp = $cnt_nmjul/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $cnt_nmjulp = 0;
        }
        if($cnt_nmago) {
            $cnt_nmagop = $cnt_nmago/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $cnt_nmagop = 0;
        }
        if($cnt_nmset) {
            $cnt_nmsetp = $cnt_nmset/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $cnt_nmsetp = 0;
        }
        if($cnt_nmout) {
            $cnt_nmoutp = $cnt_nmout/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $cnt_nmoutp = 0;
        }
        if($cnt_nmnov) {
            $cnt_nmnovp = $cnt_nmnov/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $cnt_nmnovp = 0;
        }
        if($cnt_nmdez) {
            $cnt_nmdezp = $cnt_nmdez/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $cnt_nmdezp = 0;
        }


        $jan_ala1p = $jan_ala1p * 100;
        $fev_ala1p = $fev_ala1p * 100;
        $mar_ala1p = $mar_ala1p * 100;
        $abr_ala1p = $abr_ala1p * 100;
        $mai_ala1p = $mai_ala1p * 100;
        $jun_ala1p = $jun_ala1p * 100;
        $jul_ala1p = $jul_ala1p * 100;
        $ago_ala1p = $ago_ala1p * 100;
        $set_ala1p = $set_ala1p * 100;
        $out_ala1p = $out_ala1p * 100;
        $out_ala1p = $out_ala1p * 100;
        $nov_ala1p = $nov_ala1p * 100;
        $dez_ala1p = $dez_ala1p * 100;

        $jan_ala2p = $jan_ala2p * 100;
        $fev_ala2p = $fev_ala2p * 100;
        $mar_ala2p = $mar_ala2p * 100;
        $abr_ala2p = $abr_ala2p * 100;
        $mai_ala2p = $mai_ala2p * 100;
        $jun_ala2p = $jun_ala2p * 100;
        $jul_ala2p = $jul_ala2p * 100;
        $ago_ala2p = $ago_ala2p * 100;
        $set_ala2p = $set_ala2p * 100;
        $out_ala2p = $out_ala2p * 100;
        $out_ala2p = $out_ala2p * 100;
        $nov_ala2p = $nov_ala2p * 100;
        $dez_ala2p = $dez_ala2p * 100;

        $cnt_nmjanp = $cnt_nmjanp * 100;
        $cnt_nmfevp = $cnt_nmfevp * 100;
        $cnt_nmmarp = $cnt_nmmarp * 100;
        $cnt_nmabrp = $cnt_nmabrp * 100;
        $cnt_nmmaip = $cnt_nmmaip * 100;
        $cnt_nmjunp = $cnt_nmjunp * 100;
        $cnt_nmjulp = $cnt_nmjulp * 100;
        $cnt_nmagop = $cnt_nmagop * 100;
        $cnt_nmsetp = $cnt_nmsetp * 100;
        $cnt_nmoutp = $cnt_nmoutp * 100;
        $cnt_nmnovp = $cnt_nmnovp * 100;
        $cnt_nmdezp = $cnt_nmdezp * 100;

        $jan_ala4p = $jan_ala4p * 100;
        $fev_ala4p = $fev_ala4p * 100;
        $mar_ala4p = $mar_ala4p * 100;
        $abr_ala4p = $abr_ala4p * 100;
        $mai_ala4p = $mai_ala4p * 100;
        $jun_ala4p = $jun_ala4p * 100;
        $jul_ala4p = $jul_ala4p * 100;
        $ago_ala4p = $ago_ala4p * 100;
        $set_ala4p = $set_ala4p * 100;
        $out_ala4p = $out_ala4p * 100;
        $out_ala4p = $out_ala4p * 100;
        $nov_ala4p = $nov_ala4p * 100;
        $dez_ala4p = $dez_ala4p * 100;


        $ano=date('Y');
        $cli1 = '%';
        return view('cliente.home',['ocorrencias' => $ocorrencias, 'ocorrencias1' => $ocorrencias1,'ano'=>$ano,
            'cnt_abertasgjan' => $cnt_abertasgjan, 'cnt_feedgjan' => $cnt_feedgjan,'cnt_totalgjan' => $cnt_totalgjan,
            'cnt_abertasgfev' => $cnt_abertasgfev, 'cnt_feedgfev' => $cnt_feedgfev,'cnt_totalgfev' => $cnt_totalgfev,
            'cnt_abertasgmar' => $cnt_abertasgmar, 'cnt_feedgmar' => $cnt_feedgmar,'cnt_totalgmar' => $cnt_totalgmar,
            'cnt_abertasgabr' => $cnt_abertasgabr, 'cnt_feedgabr' => $cnt_feedgabr,'cnt_totalgabr' => $cnt_totalgabr,
            'cnt_abertasgmai' => $cnt_abertasgmai, 'cnt_feedgmai' => $cnt_feedgmai,'cnt_totalgmai' => $cnt_totalgmai,
            'cnt_abertasgjun' => $cnt_abertasgjun, 'cnt_feedgjun' => $cnt_feedgjun,'cnt_totalgjun' => $cnt_totalgjun,
            'cnt_abertasgjul' => $cnt_abertasgjul, 'cnt_feedgjul' => $cnt_feedgjul,'cnt_totalgjul' => $cnt_totalgjul,
            'cnt_abertasgago' => $cnt_abertasgago, 'cnt_feedgago' => $cnt_feedgago,'cnt_totalgago' => $cnt_totalgago,
            'cnt_abertasgset' => $cnt_abertasgset, 'cnt_feedgset' => $cnt_feedgset,'cnt_totalgset' => $cnt_totalgset,
            'cnt_abertasgout' => $cnt_abertasgout, 'cnt_feedgout' => $cnt_feedgout,'cnt_totalgout' => $cnt_totalgout,
            'cnt_abertasgnov' => $cnt_abertasgnov, 'cnt_feedgnov' => $cnt_feedgnov,'cnt_totalgnov' => $cnt_totalgnov,
            'cnt_abertasgdez' => $cnt_abertasgdez, 'cnt_feedgdez' => $cnt_feedgdez,'cnt_totalgdez' => $cnt_totalgdez,
            'jan' => $jan, 'fev' => $fev, 'mar' => $mar,'abr' => $abr, 'mai' => $mai, 'jun' => $jun, 'jul' => $jul, 'ago' => $ago, 'set' => $set, 'out' => $out,'nov' => $nov, 'dez' => $dez,
            'a1jan'=> $jan_ala1, 'a2jan'=>$jan_ala2, 'semjan'=>$jan_normal,
            'a1fev'=> $fev_ala1, 'a2fev'=>$fev_ala2, 'semfev'=>$fev_normal,
            'a1mar'=> $mar_ala1, 'a2mar'=>$mar_ala2, 'semmar'=>$mar_normal,
            'a1abr'=> $abr_ala1, 'a2abr'=>$abr_ala2, 'semabr'=>$abr_normal,
            'a1mai'=> $mai_ala1, 'a2mai'=>$mai_ala2, 'semmai'=>$mai_normal,
            'a1jun'=> $jun_ala1, 'a2jun'=>$jun_ala2, 'semjun'=>$jun_normal,
            'a1jul'=> $jul_ala1, 'a2jul'=>$jul_ala2, 'semjul'=>$jul_normal,
            'a1ago'=> $ago_ala1, 'a2ago'=>$ago_ala2, 'semago'=>$ago_normal,
            'a1set'=> $set_ala1, 'a2set'=>$set_ala2, 'semset'=>$set_normal,
            'a1out'=> $out_ala1, 'a2out'=>$out_ala2, 'semout'=>$out_normal,
            'a1nov'=> $nov_ala1, 'a2nov'=>$nov_ala2, 'semnov'=>$nov_normal,
            'a1dez'=> $dez_ala1, 'a2dez'=>$dez_ala2, 'semdez'=>$dez_normal,
            'cli' => $cli,'cli1'=>$cli1,
            'semt' => $semt,'a1t'=>$a1t,
            'a2t' => $a2t,'cnt_feedgt'=>$cnt_feedgt,
            'cnt_abertasgt' => $cnt_abertasgt,
            'equi' => $equi,
            'cnt_nmojan' => $cnt_nmjan, 'cnt_nmofev' => $cnt_nmfev, 'cnt_nmomar' => $cnt_nmmar, 'cnt_nmoabr' => $cnt_nmabr,
            'cnt_nmomai' => $cnt_nmmai,'cnt_nmojun' => $cnt_nmjun,'cnt_nmojul' => $cnt_nmjul,'cnt_nmoago' => $cnt_nmago,
            'cnt_nmoset' => $cnt_nmset, 'cnt_nmoout' => $cnt_nmout, 'cnt_nmonov' => $cnt_nmnov, 'cnt_nmodez' => $cnt_nmdez,
            'jan_ala4' => $jan_ala4, 'fev_ala4' => $fev_ala4, 'mar_ala4' => $mar_ala4, 'abr_ala4' => $abr_ala4, 'mai_ala4' => $mai_ala4, 'jun_ala4' => $jun_ala4,
            'jul_ala4' => $jul_ala4, 'ago_ala4' => $ago_ala4, 'set_ala4' => $set_ala4, 'out_ala4' => $out_ala4, 'nov_ala4' => $nov_ala4, 'dez_ala4' => $dez_ala4,
            'total_al4' => $total_al4,
            'jan_ala4p' => $jan_ala4p, 'fev_ala4p' => $fev_ala4p, 'mar_ala4p' => $mar_ala4p, 'abr_ala4p' => $abr_ala4p, 'mai_ala4p' => $mai_ala4p, 'jun_ala4p' => $jun_ala4p,
            'jul_ala4p' => $jul_ala4p, 'ago_ala4p' => $ago_ala4p, 'set_ala4p' => $set_ala4p, 'out_ala4p' => $out_ala4p, 'nov_ala4p' => $nov_ala4p, 'dez_ala4p' => $dez_ala4p,
            'a1janp'=> $jan_ala1p, 'a2janp'=>$jan_ala2p,
            'a1fevp'=> $fev_ala1p, 'a2fevp'=>$fev_ala2p,
            'a1marp'=> $mar_ala1p, 'a2marp'=>$mar_ala2p,
            'a1abrp'=> $abr_ala1p, 'a2abrp'=>$abr_ala2p,
            'a1maip'=> $mai_ala1p, 'a2maip'=>$mai_ala2p,
            'a1junp'=> $jun_ala1p, 'a2junp'=>$jun_ala2p,
            'a1julp'=> $jul_ala1p, 'a2julp'=>$jul_ala2p,
            'a1agop'=> $ago_ala1p, 'a2agop'=>$ago_ala2p,
            'a1setp'=> $set_ala1p, 'a2setp'=>$set_ala2p,
            'a1outp'=> $out_ala1p, 'a2outp'=>$out_ala2p,
            'a1novp'=> $nov_ala1p, 'a2novp'=>$nov_ala2p,
            'a1dezp'=> $dez_ala1p, 'a2dezp'=>$dez_ala2p,
            'cnt_nmojanp' => $cnt_nmjanp, 'cnt_nmofevp' => $cnt_nmfevp,
            'cnt_nmomarp' => $cnt_nmmarp, 'cnt_nmoabrp' => $cnt_nmabrp,
            'cnt_nmomaip' => $cnt_nmmaip,'cnt_nmojunp' => $cnt_nmjunp,
            'cnt_nmojulp' => $cnt_nmjulp,'cnt_nmoagop' => $cnt_nmagop,
            'cnt_nmosetp' => $cnt_nmsetp, 'cnt_nmooutp' => $cnt_nmoutp,
            'cnt_nmonovp' => $cnt_nmnovp, 'cnt_nmodezp' => $cnt_nmdezp,
        ]);



    }

    public function busca(Request $request)
    {


        if (empty($request->ano)) {
            $request->ano = date('Y');
        }

        if (empty($request->cliente)) {
            $request->cliente = '%';

        }

        if (empty($request->status_geral)) {
            $st_geral = 'Todos';
        }

        if ($request->status_geral == 'A0') {
            $st_geral = 'Normal';
        }

        if ($request->status_geral == 'A1') {
            $st_geral = 'Alarme 1';
        }

        if ($request->status_geral == 'A2') {
            $st_geral = 'Alarme 2';
        }

        if ($request->status_geral == 'A3') {
            $st_geral = 'Alarme 3';
        }

        if ($request->status_geral == 'A4') {
            $st_geral = 'Não Monitorados';

        }


        //Paginate
        if ($request->paginate == 0) {
            $pag = 20;
        } else {
            $pag = $request->paginate;
        }

        if (empty($request->b_tag)) {
            $request->b_tag = '%';

        }


        //Lista de equipamentos
        $equi = DB::table('equipamentos')
            ->leftJoin('ocorrencias', function ($join) {
                $join->on('equipamentos.idclientes', '=', 'ocorrencias.idclientes');
                $join->on('equipamentos.tag', '=', 'ocorrencias.tag');
                $join->on('equipamentos.setor', '=', 'ocorrencias.setor');
                $join->on('equipamentos.equipamento', '=', 'ocorrencias.equipamento');
                $join->on('equipamentos.potencia', '=', 'ocorrencias.potencia');
                $join->on('equipamentos.rpm', '=', 'ocorrencias.rpm');
            })
            ->select('equipamentos.*', 'ocorrencias.id as idocorrencia', 'equipamentos.cliente as cliente',
                'ocorrencias.velocidade as velocidade', 'ocorrencias.demodulacao as demodulacao', 'ocorrencias.status_geral as status_geral')
            ->where('equipamentos.idclientes', 'LIKE', $request->cliente)
            ->where('ocorrencias.status_geral', 'LIKE', $request->status_geral)
            ->where('equipamentos.tag', 'LIKE', '%' . $request->b_tag . '%')
            ->where('equipamentos.id_user_gestor',Session::get('iduser'))
            ->orderBY('equipamentos.id')
            ->simplePaginate($pag);

        if ($st_geral == 'Todos') {
            $equi = DB::table('equipamentos')
                ->leftJoin('ocorrencias', function ($join) {
                    $join->on('equipamentos.idclientes', '=', 'ocorrencias.idclientes');
                    $join->on('equipamentos.tag', '=', 'ocorrencias.tag');
                    $join->on('equipamentos.setor', '=', 'ocorrencias.setor');
                    $join->on('equipamentos.equipamento', '=', 'ocorrencias.equipamento');
                    $join->on('equipamentos.potencia', '=', 'ocorrencias.potencia');
                    $join->on('equipamentos.rpm', '=', 'ocorrencias.rpm');
                })
                ->select('equipamentos.*', 'ocorrencias.id as idocorrencia', 'equipamentos.cliente as cliente',
                    'ocorrencias.velocidade as velocidade', 'ocorrencias.demodulacao as demodulacao', 'ocorrencias.status_geral as status_geral')
                ->where('equipamentos.idclientes', 'LIKE', $request->cliente)
                ->where('equipamentos.tag', 'LIKE', '%' . $request->b_tag . '%')
                ->where('equipamentos.id_user_gestor', 'LIKE', Session::get('iduser'))
                ->orderBY('equipamentos.id')
                ->simplePaginate($pag);

        }

        if($request->status_geral == 'A0')
        {
            $equi = DB::table('equipamentos')
                ->leftJoin('ocorrencias', function ($join) {
                    $join->on('equipamentos.idclientes', '<>', 'ocorrencias.idclientes');
                    $join->on('equipamentos.tag', '<>', 'ocorrencias.tag');
                    $join->on('equipamentos.setor', '<>', 'ocorrencias.setor');
                    $join->on('equipamentos.equipamento', '<>', 'ocorrencias.equipamento');
                    $join->on('equipamentos.potencia', '<>', 'ocorrencias.potencia');
                    $join->on('equipamentos.rpm', '<>', 'ocorrencias.rpm');
                })
                ->select('equipamentos.*', 'ocorrencias.id as idocorrencia', 'equipamentos.cliente as cliente',
                    'ocorrencias.velocidade as velocidade', 'ocorrencias.demodulacao as demodulacao', 'ocorrencias.status_geral as status_geral')
                ->where('equipamentos.id_user_gestor', 'LIKE', Session::get('iduser'))
                ->where('equipamentos.idclientes', 'LIKE', $request->cliente)
                ->whereNull('ocorrencias.status_geral')
                ->orderBY('equipamentos.id')
                ->simplePaginate(1500);
        }

        $data_f = $request->all();


        $cli = DB::table('clientes')->select('id', 'cliente', 'contato')->where('id', 'LIKE', $request->cliente)->where('id_user_gestor','=',Session::get('iduser'))->get();
        $cli2 = DB::table('clientes')->select('id', 'cliente', 'contato')->where('id', 'NOT LIKE', $request->cliente)
            ->where('id_user_gestor','=',Session::get('iduser'))
            ->get();
        //count de ocorrencias e feedbacks para montagem dos graficos
        $ocorrencias = DB::table('ocorrencias')->select('mes')->distinct()->get();
        $ocorrencias1 = DB::table('ocorrencias')->select('ano')->distinct()->orderBy('ano', 'desc')->get();



        /***************janeiro**************************/
        //total de ocorrencias
        $cnt_totalgjan = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Janeiro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1jan = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Janeiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2jan = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Janeiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjan = $cnt_a1jan + $cnt_a2jan;

        $cnt_feedgjan = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Janeiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        /***************janeiro**************************/


        /***************fevereiro*************************/
        //total de ocorrencias
        $cnt_totalgfev = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Fevereiro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1fev = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Fevereiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2fev = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Fevereiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgfev = $cnt_a1fev + $cnt_a2fev;

        $cnt_feedgfev = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Fevereiro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        /***************fevereiro**************************/

        /***************marco*************************/


        //total de ocorrencias
        $cnt_totalgmar = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Março'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_a1mar = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Março'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2mar = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Março'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgmar = $cnt_a1mar + $cnt_a2mar;

        $cnt_feedgmar = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Março'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************marco**************************/


        /***************abril*************************/
        //total de ocorrencias
        $cnt_totalgabr = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Abril'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1abr = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Abril'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2abr = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Abril'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgabr = $cnt_a1abr + $cnt_a2abr;

        $cnt_feedgabr = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Abril'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************abril**************************/


        /***************maio*************************/
        //total de ocorrencias
        $cnt_totalgmai = DB::table('ocorrencias')
            ->where([['ano','=',date("Y")],['mes','=','Maio'],['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1mai = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Maio'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2mai = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Maio'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgmai = $cnt_a1mai + $cnt_a2mai;

        $cnt_feedgmai = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Maio'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************maio**************************/


        /**************junho*************************/
        //total de ocorrencias
        $cnt_totalgjun = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Junho'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1jun = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Junho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2jun = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Junho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjun = $cnt_a1jun + $cnt_a2jun;


        $cnt_feedgjun = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Junho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************junho**************************/

        /**************julho*************************/
        //total de ocorrencias
        $cnt_totalgjul = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Julho'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1jul = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Julho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2jul = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Julho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgjul = $cnt_a1jul + $cnt_a2jul;

        $cnt_feedgjul = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Julho'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************julho**************************/


        /**************agosto*************************/
        //total de ocorrencias
        $cnt_totalgago = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Agosto'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1ago = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Agosto'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2ago = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Agosto'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgago = $cnt_a1ago + $cnt_a2ago;

        $cnt_feedgago = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Agosto'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************agosto**************************/


        /**************setembro*************************/
        //total de ocorrencias
        $cnt_totalgset = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Setembro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1set = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Setembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2set = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Setembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgset = $cnt_a1set + $cnt_a2set;

        $cnt_feedgset = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Setembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();


        /***************setembro**************************/


        /**************outubro*************************/
        //total de ocorrencias
        $cnt_totalgout = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Outubro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1out = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Outubro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2out = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Outubro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgout = $cnt_a1out + $cnt_a2out;

        $cnt_feedgout = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'v'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************outubro**************************/


        /**************novembro*************************/
        //total de ocorrencias
        $cnt_totalgnov = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Novembro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1nov = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Novembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2nov = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Novembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgnov = $cnt_a1nov + $cnt_a2nov;

        $cnt_feedgnov = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Novembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************novembro**************************/


        /**************dezembro*************************/
        //total de ocorrencias
        $cnt_totalgdez = DB::table('ocorrencias')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Dezembro'], ['idclientes', 'LIKE', $request->cliente],['status',1]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a1dez = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date('Y')],['mes','=','Dezembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_a2dez = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date('Y')],['mes','=','Dezembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgdez = $cnt_a1dez + $cnt_a2dez;

        $cnt_feedgdez = DB::table('feedback')
            ->join('clientes','idclientes','=','clientes.id')
            ->where([['ano', '=', $request->ano], ['mes', '=', 'Dezembro'], ['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        /***************dezembro**************************/

        //mes
        $vel_m1 = DB::table('ocorrencias')
            ->where('ano', '=', $request->ano)
            ->select('mes', 'ano')
            ->distinct()
            ->get();
        $jan = '';
        $fev = '';
        $mar = '';
        $abr = '';
        $mai = '';
        $jun = '';
        $jul = '';
        $ago = '';
        $set = '';
        $out = '';
        $nov = '';
        $dez = '';
        foreach ($vel_m1 as $vm) {
            if ($vm->mes == 'Janeiro') {
                $jan .= 'Jan' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Fevereiro') {
                $fev .= 'Fev' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Março') {
                $mar .= 'Mar' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Abril') {
                $abr .= 'Abr' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Maio') {
                $mai .= 'Mai' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Junho') {
                $jun .= 'Jun' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Julho') {
                $jul .= 'Jul' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Agosto') {
                $ago .= 'Ago' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Setembro') {
                $set .= 'Set' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Outubro') {
                $out .= 'Out' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Novembro') {
                $nov .= 'Nov' . "/" . $vm->ano;
            } elseif ($vm->mes == 'Dezembro') {
                $dez .= 'Dez' . "/" . $vm->ano;
            }

        }

        $jan = $jan;
        $fev = $fev;
        $mar = $mar;
        $abr = $abr;
        $mai = $mai;
        $jun = $jun;
        $jul = $jul;
        $ago = $ago;
        $set = $set;
        $out = $out;
        $nov = $nov;
        $dez = $dez;

        //inicia counts para montagem do grafico
        /***************janeiro**************************/

        $jan_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Janeiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Janeiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Janeiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jan_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Janeiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->count();

        $oc_cj = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Janeiro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmjan2 = $jan_ala1 + $jan_ala2 + $jan_ala4;
        $cnt_nmjan = $eq - $cnt_nmjan2;

        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim janeiro********************************************************/


        /***************fevereiro**************************************************************************/

        $fev_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Fevereiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Fevereiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Fevereiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $fev_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Fevereiro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cf = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Fevereiro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();


        $cnt_nmfev2 = $fev_ala1 + $fev_ala2 + $fev_ala4;
        $cnt_nmfev = $eq - $cnt_nmfev2;



        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim fevereiro********************************************************/



        /***************Março**************************************************************************/

        $mar_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Março'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Março'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Março'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mar_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Março'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cm = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Março'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmmar2 = $mar_ala1 + $mar_ala2 + $mar_ala4;
        $cnt_nmmar = $eq - $cnt_nmmar2;



        //fim counts para montagem do grafico


        /******************************fim março********************************************************/




        /***************Abril**************************************************************************/

        $abr_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Abril'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Abril'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Abril'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $abr_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Abril'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cab = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Abril'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmabr2 = $abr_ala1 + $abr_ala2 + $abr_ala4;
        $cnt_nmabr = $eq - $cnt_nmabr2;



        /******************************fim abril********************************************************/


        /***************Maio**************************************************************************/

        $mai_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Maio'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Maio'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Maio'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $mai_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Maio'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cma = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Maio'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmmai2 = $mai_ala1 + $mai_ala2 + $mai_ala4;
        $cnt_nmmai = $eq - $cnt_nmmai2;



        /******************************fim Maio********************************************************/


        /***************Junho**************************************************************************/

        $jun_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Junho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Junho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Junho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jun_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Junho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cjun = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Junho'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmjun2 = $jun_ala1 + $jun_ala2 + $jun_ala4;
        $cnt_nmjun = $eq - $cnt_nmjun2;



        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1



        /******************************fim Junho********************************************************/


        /***************Julho**************************************************************************/

        $jul_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Julho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Julho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Julho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $jul_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Julho'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cjul = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Julho'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmjul2 = $jul_ala1 + $jul_ala2 + $jul_ala4;
        $cnt_nmjul = $eq - $cnt_nmjul2;



        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Julho********************************************************/


        /***************Agosto**************************************************************************/
        $ago_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Agosto'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Agosto'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Agosto'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $ago_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Agosto'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cago = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Agosto'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmago2 = $ago_ala1 + $ago_ala2 + $ago_ala4;
        $cnt_nmago = $eq - $cnt_nmago2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Agosto********************************************************/


        /***************Setembro**************************************************************************/

        $set_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Setembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Setembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Setembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $set_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Setembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cset = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Setembro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmset2 = $set_ala1 + $set_ala2 + $set_ala4;
        $cnt_nmset = $eq - $cnt_nmset2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1

        /******************************fim Setembro********************************************************/

        /***************Outubro**************************************************************************/

        $out_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Outubro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Outubro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Outubro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $out_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Outubro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cout = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Outubro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmout2 = $out_ala1 + $out_ala2 + $out_ala4;
        $cnt_nmout = $eq - $cnt_nmout2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Outubro********************************************************/


        /***************Novembro**************************************************************************/

        $nov_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Novembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Novembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Novembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $nov_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Novembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cnov = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Novembro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmnov2 = $nov_ala1 + $nov_ala2 + $nov_ala4;
        $cnt_nmnov = $eq - $cnt_nmnov2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Novembro********************************************************/

        /***************Dezembro**************************************************************************/

        $dez_normal = DB::table('ocorrencias')
            ->where([['status_geral','=','A0'],['ano','=',date("Y")],['mes','=','Dezembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala1 = DB::table('ocorrencias')
            ->where([['status_geral','=','A1'],['ano','=',date("Y")],['mes','=','Dezembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala2 = DB::table('ocorrencias')
            ->where([['status_geral','=','A2'],['ano','=',date("Y")],['mes','=','Dezembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $dez_ala4 = DB::table('ocorrencias')
            ->where([['status_geral','=','A4'],['ano','=',date("Y")],['mes','=','Dezembro'],['idclientes', 'LIKE', $request->cliente]])
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_cdez = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['ocorrencias.mes','=','Dezembro'],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_nmdez2 = $dez_ala1 + $dez_ala2 + $dez_ala4;
        $cnt_nmdez = $eq - $cnt_nmdez2;


        //fim counts para montagem do grafico

        //outros deficiente por alarmes (A1, A2 e A3)
        //A1


        /******************************fim Dezembro********************************************************/

        //Normais (sem ocorrências)
        $cnt_nmjan = $cnt_nmjan  - $cnt_totalgjan;
        $cnt_nmfev = $cnt_nmfev  - $cnt_totalgfev;
        $cnt_nmmar = $cnt_nmmar  - $cnt_totalgmar;
        $cnt_nmabr = $cnt_nmabr  - $cnt_totalgabr;
        $cnt_nmmai = $cnt_nmmai  - $cnt_totalgmai;
        $cnt_nmjun = $cnt_nmjun  - $cnt_totalgjun;
        $cnt_nmjul = $cnt_nmjul  - $cnt_totalgjul;
        $cnt_nmago = $cnt_nmago  - $cnt_totalgago;
        $cnt_nmset = $cnt_nmset  - $cnt_totalgset;
        $cnt_nmout = $cnt_nmout  - $cnt_totalgout;
        $cnt_nmnov = $cnt_nmnov  - $cnt_totalgnov;
        $cnt_nmdez = $cnt_nmdez  - $cnt_totalgdez;

        $ano = $request->ano;
        $cli1 = $request->cliente;



        //Abetas
        $eq = DB::table('equipamentos')
            ->where('idclientes','LIKE',$request->cliente)
            ->where('id_user_gestor',Session::get('iduser'))
            ->count();

        $oc_tt = DB::table('equipamentos')
            ->join('ocorrencias', function($join) {
                $join->on('equipamentos.tag','=','ocorrencias.tag');
                $join->on('equipamentos.setor','=','ocorrencias.setor');
                $join->on('equipamentos.equipamento','=','ocorrencias.equipamento');
                $join->on('equipamentos.potencia','=','ocorrencias.potencia');
                $join->on('equipamentos.rpm','=','ocorrencias.rpm');
            })
            ->where([['ocorrencias.ano','=',date("Y")],['equipamentos.idclientes', 'LIKE', $request->cliente]])
            ->where('ocorrencias.id_user_gestor',Session::get('iduser'))
            ->count();

        $cnt_abertasgt = $eq - $oc_tt;




        if($oc_cj == 0)
        {
            $cnt_nmjan = 0;
        }

        if($oc_cf == 0)
        {
            $cnt_nmfev = 0;
        }

        if($oc_cm == 0)
        {
            $cnt_nmmar = 0;
        }

        if($oc_cab == 0)
        {
            $cnt_nmabr = 0;
        }

        if($oc_cma == 0)
        {
            $cnt_nmmai = 0;
        }

        if($oc_cjun == 0)
        {
            $cnt_nmjun = 0;
        }

        if($oc_cjul == 0)
        {
            $cnt_nmjul = 0;
        }

        if($oc_cago == 0)
        {
            $cnt_nmago = 0;
        }

        if($oc_cset == 0)
        {
            $cnt_nmset = 0;
        }

        if($oc_cout == 0)
        {
            $cnt_nmout = 0;
        }

        if($oc_cnov == 0)
        {
            $cnt_nmnov = 0;
        }

        if($oc_cdez == 0)
        {
            $cnt_nmdez = 0;
        }


        if ($request->cliente == '%')
        {
            $cnt_nmojan = 0;
            $cnt_nmofev = 0;
            $cnt_nmomar = 0;
            $cnt_nmoabr = 0;
            $cnt_nmomai = 0;
            $cnt_nmojun = 0;
            $cnt_nmojul = 0;
            $cnt_nmoago = 0;
            $cnt_nmoset = 0;
            $cnt_nmoout = 0;
            $cnt_nmonov = 0;
            $cnt_nmodez = 0;

        }

        //COUNT CARDS
        //sem alarmes
        $semt = $cnt_nmjan + $cnt_nmfev + $cnt_nmmar + $cnt_nmabr + $cnt_nmmai + $cnt_nmjun + $cnt_nmjul + $cnt_nmago +
            $cnt_nmset + $cnt_nmout + $cnt_nmnov + $cnt_nmdez;

        //A1
        $a1t = $jan_ala1 + $fev_ala1 + $mar_ala1 = $abr_ala1 + $mai_ala1 + $jun_ala1 + $jul_ala1 + $ago_ala1 +
                $set_ala1 + $out_ala1 + $nov_ala1 + $dez_ala1;

        //A2

        $a2t = $jan_ala2 + $fev_ala2 + $mar_ala2 = $abr_ala2 + $mai_ala2 + $jun_ala2 + $jul_ala2 + $ago_ala2 +
                $set_ala2 + $out_ala2 + $nov_ala2 + $dez_ala2;

        //Feedbacks
        $cnt_feedgt = $cnt_feedgjan + $cnt_feedgfev + $cnt_feedgmar + $cnt_feedgabr + $cnt_feedgmai +
            $cnt_feedgjun + $cnt_feedgjul + $cnt_feedgago + $cnt_feedgset + $cnt_feedgout +
            $cnt_feedgnov + $cnt_feedgdez;


        //Alarmes 4
        $total_al4 = $dez_ala4 + $nov_ala4 + $out_ala4 + $set_ala4 + $ago_ala4 + $jul_ala4 + $jun_ala4
            +$mai_ala4 + $abr_ala4 + $mar_ala4 + $fev_ala4 + $jan_ala4;

        //% graficos

        //NÃO MONITORADOS
        if($jan_ala4 <> 0)
        {
            $jan_ala4p = $jan_ala4/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        }
        else {
            $jan_ala4p = 0;
        }

        if($fev_ala4 <> 0){
            $fev_ala4p = $fev_ala4/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        }

        else {
            $fev_ala4p = 0;
        }

        if($mar_ala4 <> 0) {
            $mar_ala4p = $mar_ala4/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        }
        else {
            $mar_ala4p = 0;
        }

        if($abr_ala4 <> 0) {
            $abr_ala4p = $abr_ala4/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        }
        else {
            $abr_ala4p = 0;
        }

        if($mai_ala4 <> 0){
            $mai_ala4p = $mai_ala4/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        }
        else {
            $mai_ala4p = 0;
        }

        if($jun_ala4 <> 0){
            $jun_ala4p = $jun_ala4/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        }
        else {
            $jun_ala4p = 0;
        }

        if($jul_ala4 <> 0) {
            $jul_ala4p = $jul_ala4/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        }
        else {
            $jul_ala4p = 0;
        }

        if($ago_ala4 <> 0) {
            $ago_ala4p = $ago_ala4/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        }
        else {
            $ago_ala4p = 0;
        }

        if($set_ala4 <> 0) {
            $set_ala4p = $set_ala4/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        }
        else {
            $set_ala4p = 0;
        }

        if($out_ala4 <> 0) {
            $out_ala4p = $out_ala4/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        }
        else {
            $out_ala4p = 0;
        }

        if($nov_ala4 <> 0) {
            $nov_ala4p = $nov_ala4/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        }

        else {
            $nov_ala4p = 0;
        }

        if($dez_ala4 <> 0) {
            $dez_ala4p = $dez_ala4/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        }
        else {
            $dez_ala4p = 0;
        }
        if($jan_ala1 <> 0){
            $jan_ala1p = $jan_ala1/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $jan_ala1p = 0;
        }

        //ALARME 1
        if($fev_ala1) {
            $fev_ala1p = $fev_ala1/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $fev_ala1p = 0;
        }

        if($mar_ala1) {
            $mar_ala1p = $mar_ala1/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $mar_ala1p = 0;
        }

        if($abr_ala1) {
            $abr_ala1p = $abr_ala1/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $abr_ala1p = 0;
        }
        if($mai_ala1) {
            $mai_ala1p = $mai_ala1/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $mai_ala1p = 0;
        }

        if($jun_ala1) {
            $jun_ala1p = $jun_ala1/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $jun_ala1p = 0;
        }
        if($jul_ala1) {
            $jul_ala1p = $jul_ala1/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $jul_ala1p = 0;
        }
        if($ago_ala1) {
            $ago_ala1p = $ago_ala1/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $ago_ala1p = 0;
        }
        if($set_ala1) {
            $set_ala1p = $set_ala1/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $set_ala1p = 0;
        }
        if($out_ala1) {
            $out_ala1p = $out_ala1/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $out_ala1p = 0;
        }
        if($nov_ala1) {
            $nov_ala1p = $nov_ala1/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $nov_ala1p = 0;
        }
        if($dez_ala1) {
            $dez_ala1p = $dez_ala1/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $dez_ala1p = 0;
        }

        //ALARME 2
        if($jan_ala2) {
            $jan_ala2p = $jan_ala2/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $jan_ala2p = 0;
        }
        if($fev_ala2) {
            $fev_ala2p = $fev_ala2/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $fev_ala2p = 0;
        }
        if($mar_ala2) {
            $mar_ala2p = $mar_ala2/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $mar_ala2p = 0;
        }
        if($abr_ala2) {
            $abr_ala2p = $abr_ala2/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $abr_ala2p = 0;
        }

        if($mai_ala2) {
            $mai_ala2p = $mai_ala2/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $mai_ala2p = 0;
        }

        if($jun_ala2) {
            $jun_ala2p = $jun_ala2/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $jun_ala2p = 0;
        }
        if($jul_ala2) {
            $jul_ala2p = $jul_ala2/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $jul_ala2p = 0;
        }
        if($ago_ala2) {
            $ago_ala2p = $ago_ala2/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $ago_ala2p = 0;
        }
        if($set_ala2) {
            $set_ala2p = $set_ala2/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $set_ala2p = 0;
        }
        if($out_ala2) {
            $out_ala2p = $out_ala2/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $out_ala2p = 0;
        }
        if($nov_ala2) {
            $nov_ala2p = $nov_ala2/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $nov_ala2p = 0;
        }
        if($dez_ala2) {
            $dez_ala2p = $dez_ala2/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $dez_ala2p = 0;
        }

        //NORMAIS
        if($cnt_nmjan) {
            $cnt_nmjanp = $cnt_nmjan/($jan_ala4 + $jan_ala2 + $jan_ala1 + $cnt_nmjan);
        } else {
            $cnt_nmjanp = 0;
        }
        if($cnt_nmfev) {
            $cnt_nmfevp = $cnt_nmfev/($fev_ala4 + $fev_ala2 + $fev_ala1 + $cnt_nmfev);
        } else {
            $cnt_nmfevp = 0;
        }
        if($cnt_nmmar) {
            $cnt_nmmarp = $cnt_nmmar/($mar_ala4 + $mar_ala2 + $mar_ala1 + $cnt_nmmar);
        } else {
            $cnt_nmmarp = 0;
        }
        if($cnt_nmabr) {
            $cnt_nmabrp = $cnt_nmabr/($abr_ala4 + $abr_ala2 + $abr_ala1 + $cnt_nmabr);
        } else {
            $cnt_nmabrp = 0;
        }
        if($cnt_nmmai) {
            $cnt_nmmaip = $cnt_nmmai/($mai_ala4 + $mai_ala2 + $mai_ala1 + $cnt_nmmai);
        } else {
            $cnt_nmmaip = 0;
        }
        if($cnt_nmjun) {
            $cnt_nmjunp = $cnt_nmjun/($jun_ala4 + $jun_ala2 + $jun_ala1 + $cnt_nmjun);
        } else {
            $cnt_nmjunp = 0;
        }
        if($cnt_nmjul) {
            $cnt_nmjulp = $cnt_nmjul/($jul_ala4 + $jul_ala2 + $jul_ala1 + $cnt_nmjul);
        } else {
            $cnt_nmjulp = 0;
        }
        if($cnt_nmago) {
            $cnt_nmagop = $cnt_nmago/($ago_ala4 + $ago_ala2 + $ago_ala1 + $cnt_nmago);
        } else {
            $cnt_nmagop = 0;
        }
        if($cnt_nmset) {
            $cnt_nmsetp = $cnt_nmset/($set_ala4 + $set_ala2 + $set_ala1 + $cnt_nmset);
        } else {
            $cnt_nmsetp = 0;
        }
        if($cnt_nmout) {
            $cnt_nmoutp = $cnt_nmout/($out_ala4 + $out_ala2 + $out_ala1 + $cnt_nmout);
        } else {
            $cnt_nmoutp = 0;
        }
        if($cnt_nmnov) {
            $cnt_nmnovp = $cnt_nmnov/($nov_ala4 + $nov_ala2 + $nov_ala1 + $cnt_nmnov);
        } else {
            $cnt_nmnovp = 0;
        }
        if($cnt_nmdez) {
            $cnt_nmdezp = $cnt_nmdez/($dez_ala4 + $dez_ala2 + $dez_ala1 + $cnt_nmdez);
        } else {
            $cnt_nmdezp = 0;
        }


        $jan_ala1p = $jan_ala1p * 100;
        $fev_ala1p = $fev_ala1p * 100;
        $mar_ala1p = $mar_ala1p * 100;
        $abr_ala1p = $abr_ala1p * 100;
        $mai_ala1p = $mai_ala1p * 100;
        $jun_ala1p = $jun_ala1p * 100;
        $jul_ala1p = $jul_ala1p * 100;
        $ago_ala1p = $ago_ala1p * 100;
        $set_ala1p = $set_ala1p * 100;
        $out_ala1p = $out_ala1p * 100;
        $out_ala1p = $out_ala1p * 100;
        $nov_ala1p = $nov_ala1p * 100;
        $dez_ala1p = $dez_ala1p * 100;

        $jan_ala2p = $jan_ala2p * 100;
        $fev_ala2p = $fev_ala2p * 100;
        $mar_ala2p = $mar_ala2p * 100;
        $abr_ala2p = $abr_ala2p * 100;
        $mai_ala2p = $mai_ala2p * 100;
        $jun_ala2p = $jun_ala2p * 100;
        $jul_ala2p = $jul_ala2p * 100;
        $ago_ala2p = $ago_ala2p * 100;
        $set_ala2p = $set_ala2p * 100;
        $out_ala2p = $out_ala2p * 100;
        $out_ala2p = $out_ala2p * 100;
        $nov_ala2p = $nov_ala2p * 100;
        $dez_ala2p = $dez_ala2p * 100;

        $cnt_nmjanp = $cnt_nmjanp * 100;
        $cnt_nmfevp = $cnt_nmfevp * 100;
        $cnt_nmmarp = $cnt_nmmarp * 100;
        $cnt_nmabrp = $cnt_nmabrp * 100;
        $cnt_nmmaip = $cnt_nmmaip * 100;
        $cnt_nmjunp = $cnt_nmjunp * 100;
        $cnt_nmjulp = $cnt_nmjulp * 100;
        $cnt_nmagop = $cnt_nmagop * 100;
        $cnt_nmsetp = $cnt_nmsetp * 100;
        $cnt_nmoutp = $cnt_nmoutp * 100;
        $cnt_nmnovp = $cnt_nmnovp * 100;
        $cnt_nmdezp = $cnt_nmdezp * 100;

        $jan_ala4p = $jan_ala4p * 100;
        $fev_ala4p = $fev_ala4p * 100;
        $mar_ala4p = $mar_ala4p * 100;
        $abr_ala4p = $abr_ala4p * 100;
        $mai_ala4p = $mai_ala4p * 100;
        $jun_ala4p = $jun_ala4p * 100;
        $jul_ala4p = $jul_ala4p * 100;
        $ago_ala4p = $ago_ala4p * 100;
        $set_ala4p = $set_ala4p * 100;
        $out_ala4p = $out_ala4p * 100;
        $out_ala4p = $out_ala4p * 100;
        $nov_ala4p = $nov_ala4p * 100;
        $dez_ala4p = $dez_ala4p * 100;

        $data_f = $request->all();





        return view('cliente.home',['ocorrencias' => $ocorrencias, 'ocorrencias1' => $ocorrencias1, 'ano'=>$ano,
            'cnt_abertasgjan' => $cnt_abertasgjan, 'cnt_feedgjan' => $cnt_feedgjan,'cnt_totalgjan' => $cnt_totalgjan,
            'cnt_abertasgfev' => $cnt_abertasgfev, 'cnt_feedgfev' => $cnt_feedgfev,'cnt_totalgfev' => $cnt_totalgfev,
            'cnt_abertasgmar' => $cnt_abertasgmar, 'cnt_feedgmar' => $cnt_feedgmar,'cnt_totalgmar' => $cnt_totalgmar,
            'cnt_abertasgabr' => $cnt_abertasgabr, 'cnt_feedgabr' => $cnt_feedgabr,'cnt_totalgabr' => $cnt_totalgabr,
            'cnt_abertasgmai' => $cnt_abertasgmai, 'cnt_feedgmai' => $cnt_feedgmai,'cnt_totalgmai' => $cnt_totalgmai,
            'cnt_abertasgjun' => $cnt_abertasgjun, 'cnt_feedgjun' => $cnt_feedgjun,'cnt_totalgjun' => $cnt_totalgjun,
            'cnt_abertasgjul' => $cnt_abertasgjul, 'cnt_feedgjul' => $cnt_feedgjul,'cnt_totalgjul' => $cnt_totalgjul,
            'cnt_abertasgago' => $cnt_abertasgago, 'cnt_feedgago' => $cnt_feedgago,'cnt_totalgago' => $cnt_totalgago,
            'cnt_abertasgset' => $cnt_abertasgset, 'cnt_feedgset' => $cnt_feedgset,'cnt_totalgset' => $cnt_totalgset,
            'cnt_abertasgout' => $cnt_abertasgout, 'cnt_feedgout' => $cnt_feedgout,'cnt_totalgout' => $cnt_totalgout,
            'cnt_abertasgnov' => $cnt_abertasgnov, 'cnt_feedgnov' => $cnt_feedgnov,'cnt_totalgnov' => $cnt_totalgnov,
            'cnt_abertasgdez' => $cnt_abertasgdez, 'cnt_feedgdez' => $cnt_feedgdez,'cnt_totalgdez' => $cnt_totalgdez,
            'jan' => $jan, 'fev' => $fev, 'mar' => $mar,'abr' => $abr, 'mai' => $mai, 'jun' => $jun, 'jul' => $jul, 'ago' => $ago, 'set' => $set, 'out' => $out,'nov' => $nov, 'dez' => $dez,
            'a1jan'=> $jan_ala1, 'a2jan'=>$jan_ala2, 'semjan'=>$jan_normal,
            'a1fev'=> $fev_ala1, 'a2fev'=>$fev_ala2, 'semfev'=>$fev_normal,
            'a1mar'=> $mar_ala1, 'a2mar'=>$mar_ala2, 'semmar'=>$mar_normal,
            'a1abr'=> $abr_ala1, 'a2abr'=>$abr_ala2, 'semabr'=>$abr_normal,
            'a1mai'=> $mai_ala1, 'a2mai'=>$mai_ala2, 'semmai'=>$mai_normal,
            'a1jun'=> $jun_ala1, 'a2jun'=>$jun_ala2, 'semjun'=>$jun_normal,
            'a1jul'=> $jul_ala1, 'a2jul'=>$jul_ala2, 'semjul'=>$jul_normal,
            'a1ago'=> $ago_ala1, 'a2ago'=>$ago_ala2, 'semago'=>$ago_normal,
            'a1set'=> $set_ala1, 'a2set'=>$set_ala2, 'semset'=>$set_normal,
            'a1out'=> $out_ala1, 'a2out'=>$out_ala2, 'semout'=>$out_normal,
            'a1nov'=> $nov_ala1, 'a2nov'=>$nov_ala2, 'semnov'=>$nov_normal,
            'a1dez'=> $dez_ala1, 'a2dez'=>$dez_ala2, 'semdez'=>$dez_normal,
            'cli' => $cli,'cli1'=>$cli1, 'cli2'=>$cli2,
            'semt' => $semt,'a1t'=>$a1t,
            'a2t' => $a2t,'cnt_feedgt'=>$cnt_feedgt,
            'cnt_abertasgt' => $cnt_abertasgt,
            'equi' => $equi,
            'status_geral'=>$request->status_geral,
            'st_geral'=>$st_geral,
            'data_f' => $data_f,
            'pag' => $pag,
            'cnt_nmojan' => $cnt_nmjan, 'cnt_nmofev' => $cnt_nmfev, 'cnt_nmomar' => $cnt_nmmar, 'cnt_nmoabr' => $cnt_nmabr,
            'cnt_nmomai' => $cnt_nmmai,'cnt_nmojun' => $cnt_nmjun,'cnt_nmojul' => $cnt_nmjul,'cnt_nmoago' => $cnt_nmago,
            'cnt_nmoset' => $cnt_nmset, 'cnt_nmoout' => $cnt_nmout, 'cnt_nmonov' => $cnt_nmnov, 'cnt_nmodez' => $cnt_nmdez,
            'jan_ala4' => $jan_ala4, 'fev_ala4' => $fev_ala4, 'mar_ala4' => $mar_ala4, 'abr_ala4' => $abr_ala4, 'mai_ala4' => $mai_ala4, 'jun_ala4' => $jun_ala4,
            'jul_ala4' => $jul_ala4, 'ago_ala4' => $ago_ala4, 'set_ala4' => $set_ala4, 'out_ala4' => $out_ala4, 'nov_ala4' => $nov_ala4, 'dez_ala4' => $dez_ala4,
            'total_al4' => $total_al4,
            'jan_ala4p' => $jan_ala4p, 'fev_ala4p' => $fev_ala4p, 'mar_ala4p' => $mar_ala4p, 'abr_ala4p' => $abr_ala4p, 'mai_ala4p' => $mai_ala4p, 'jun_ala4p' => $jun_ala4p,
            'jul_ala4p' => $jul_ala4p, 'ago_ala4p' => $ago_ala4p, 'set_ala4p' => $set_ala4p, 'out_ala4p' => $out_ala4p, 'nov_ala4p' => $nov_ala4p, 'dez_ala4p' => $dez_ala4p,
            'a1janp'=> $jan_ala1p, 'a2janp'=>$jan_ala2p,
            'a1fevp'=> $fev_ala1p, 'a2fevp'=>$fev_ala2p,
            'a1marp'=> $mar_ala1p, 'a2marp'=>$mar_ala2p,
            'a1abrp'=> $abr_ala1p, 'a2abrp'=>$abr_ala2p,
            'a1maip'=> $mai_ala1p, 'a2maip'=>$mai_ala2p,
            'a1junp'=> $jun_ala1p, 'a2junp'=>$jun_ala2p,
            'a1julp'=> $jul_ala1p, 'a2julp'=>$jul_ala2p,
            'a1agop'=> $ago_ala1p, 'a2agop'=>$ago_ala2p,
            'a1setp'=> $set_ala1p, 'a2setp'=>$set_ala2p,
            'a1outp'=> $out_ala1p, 'a2outp'=>$out_ala2p,
            'a1novp'=> $nov_ala1p, 'a2novp'=>$nov_ala2p,
            'a1dezp'=> $dez_ala1p, 'a2dezp'=>$dez_ala2p,
            'cnt_nmojanp' => $cnt_nmjanp, 'cnt_nmofevp' => $cnt_nmfevp,
            'cnt_nmomarp' => $cnt_nmmarp, 'cnt_nmoabrp' => $cnt_nmabrp,
            'cnt_nmomaip' => $cnt_nmmaip,'cnt_nmojunp' => $cnt_nmjunp,
            'cnt_nmojulp' => $cnt_nmjulp,'cnt_nmoagop' => $cnt_nmagop,
            'cnt_nmosetp' => $cnt_nmsetp, 'cnt_nmooutp' => $cnt_nmoutp,
            'cnt_nmonovp' => $cnt_nmnovp, 'cnt_nmodezp' => $cnt_nmdezp,
        ],['data_f' => $data_f]);


    }

}
