<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contestacao;
use App\Parceiro;
use App\User;
use DB;
Use Input;
use Excel;

class Exportar_baseController extends Controller
{
    //
    public function index(){


     return view('exportacao.exportar');
    }

    public function abrirexcel()
    {


        function dateEmMysql($dateSql){
            $ano= substr($dateSql, 6);
            $mes= substr($dateSql, 3,-5);
            $dia= substr($dateSql, 0,-8);
            return $ano."-".$mes."-".$dia;
        }

        $dataini=dateEmMysql(Input::get('data_1'));
        $datafin=dateEmMysql(Input::get('data_2'));
        $pesquisa=Input::get('pesquisa');

        if(empty($dataini) && empty($datafin)) {
            $data=date("Y-m-d");
            // Calcula uma data daqui 2 dias e 2 mêses
            $timestamp = strtotime($data . "-3 months 0 days");
            // Exibe o resultado
            $dataini = date('Y-m-d', $timestamp); //
            $datafin = date('Y-m-d');
        }


        $customer_data= DB::select('CALL portal_vivo.exporta_geral(?,?,?)', [$dataini, $datafin,$pesquisa]);

        return view('exportacao.lista',['customer_data' => $customer_data]);

    }



    public function gerar(){


        function dateEmMysql($dateSql){
            $ano= substr($dateSql, 6);
            $mes= substr($dateSql, 3,-5);
            $dia= substr($dateSql, 0,-8);
            return $ano."-".$mes."-".$dia;
        }

        if(!empty(Input::get('data_1')) && !empty(Input::get('data_2'))) {

            $dataini = dateEmMysql(Input::get('data_1'));
            $datafin = dateEmMysql(Input::get('data_2'));
            $pesquisa = Input::get('pesquisa');
        }elseif(empty(Input::get('data_1')) && empty(Input::get('data_2'))) {
            $data=date("Y-m-d");
            // Calcula uma data daqui 2 dias e 2 mêses
            $timestamp = strtotime($data . "-3 months 0 days");
            // Exibe o resultado
            $dataini = date('Y-m-d', $timestamp); //
            $datafin = date('Y-m-d');
            $pesquisa = Input::get('pesquisa');
        }


        $customer_data= DB::select('CALL portal_vivo.exporta_geral(?,?,?)', [$dataini, $datafin,$pesquisa]);

             $customer_array[] = array('data_hora',
                                    'protocolo',
                                    'pedido',
                                    'status',
                                    'cnpj_cpf',
                                    'descricao_defesa',
                                    'nome_parceiro',
                                    'operador_contestacao',
                                    'motivo',
                                    'sub motivo',
                                    'retorno_contestacao',
                                    'data_tratativa',
                                  );
        foreach($customer_data as $customer)
        {
            $customer_array[] = array('data_hora'=>$customer->data_hora,
                                    'protocolo'=>$customer->protocolo,
                                    'pedido'=>$customer->pedido,
                                    'status'=>$customer->status,
                                    'cnpj_cpf'=>$customer->cnpj_cpf,
                                    'descricao_defesa'=>$customer->descricao_defesa,
                                    'nome_parceiro'=>$customer->nome_parceiro,
                                    'operador_contestacao'=>$customer->operador_contestacao,
                                    'motivo'=>$customer->motivo,
                                    'sub motivo'=>$customer->submotivo,
                                    'retorno_contestacao'=>$customer->retorno_contestacao,
                                    'data_tratativa' => $customer->data_tratativa

            );
        }
        Excel::create('parceiro_massivo', function($excel) use ($customer_array){
            $excel->setTitle('parceiro_massivo');
            $excel->sheet('parceiro_massivo', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');




    }

}
