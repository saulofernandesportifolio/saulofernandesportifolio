<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;
use App\Http\Requests;
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
use PDF;
use App\Lubrificacao;
use App\Ponto;
use App\Lubrificante;


class LubrificacaoController extends Controller
{
    //

    public function retornacliente($tag)
    {


        //função para executar a busca o pela tag
        function retorna($tag)
        {
            $result_aluno = DB::table('equipamentos as a')
                ->leftjoin('clientes as b', 'a.idclientes', '=', 'b.id')
                ->select('b.cliente', 'a.equipamento', 'a.setor', 'a.tag', 'a.potencia', 'a.rpm')
                ->where('a.id', '=', $tag)->orderBy('a.id', 'desc')->limit(1)->get();
            //contador para validar se retorno algum valor
            $cont = count($result_aluno);
            //se retornar 0 deixa os campos em branco senão efetua o preenchimento
            if (empty($cont)) {
                $valores['setor'] = '';
                $valores['equipamento'] = '';
                $valores['potencia'] = '';
                $valores['rpm'] = '';

            } elseif ($cont > 0) {
                foreach ($result_aluno as $al) {
                    $valores['setor'] = $al->setor;
                    $valores['equipamento'] = $al->equipamento;
                    $valores['potencia'] = $al->potencia;
                    $valores['rpm'] = $al->rpm;

                }
            }
            return json_encode($valores);
        }

        if (isset($tag)) {
            echo retorna($tag);
        }

    }

    public function cadastrar()
    {
        $lubri = DB::table('lubrificantes')
            ->get();

        $pontos = DB::table('pontos')
            ->get();

        $cli = DB::table('clientes')->select('id', 'cliente', 'contato')->get();

        return view('lubrificacao.form_cadastro', ['cli' => $cli, 'lubri' => $lubri, 'pontos' => $pontos]);
    }

    public function salvar(Request $request)
    {

        $this->validate($request, [

            'data_execucao' => 'required',
            'servico_executado' => 'required',
            'motivo' => 'required',
            'ponto' => 'required',
            'lubrificante' => 'required',
            'volume' => 'required',

        ]);

        $data_exec = $request->data_execucao = implode('-', array_reverse(explode('/', $request->data_execucao)));
        $data_prox_lubr = date('Y-m-d', strtotime('+15 days', strtotime($data_exec)));

        $lubrificacao = New Lubrificacao;
        $lubrificacao->tag = $request->tag;
        $lubrificacao->setor = $request->setor;
        $lubrificacao->equipamento = $request->equipamento;
        $lubrificacao->potencia = $request->potencia;
        $lubrificacao->rpm = $request->rpm;

        $cliente = DB::table('clientes')->where('id', '=', $request->cliente)->get();

        foreach ($cliente as $cl) {
            $lubrificacao->cliente = $cl->cliente;
        }

        $lubrificacao->idclientes = $request->cliente;
        $lubrificacao->data_execucao = $data_exec;
        $lubrificacao->servico_executado = $request->servico_executado;
        $lubrificacao->motivo = $request->motivo;
        $lubrificacao->ponto = $request->ponto;
        $lubrificacao->quantidade = $request->quantidade;
        $lubrificacao->lubrificante = $request->lubrificante;
        $lubrificacao->volume = $request->volume;
        $lubrificacao->frequencia = $request->frequencia;
        $lubrificacao->data_prox_lubri = $data_prox_lubr;
        $lubrificacao->save();

        return redirect::to('/lubrificacao/lista')->with('message', 'Registro adicioando com sucesso !');

    }

    public function lista()
    {
        $dt_now = date('Y-m-d');

        $lubrif = DB::table('lubrificacaos')
            ->orderBy('data_prox_lubri')
            ->simplePaginate(6);

        return view('lubrificacao.lista', ['lubrif' => $lubrif, 'dt_now' => $dt_now]);

    }

    public function visualiza($id)
    {
        $lubrif = DB::table('lubrificacaos')
            ->where('id', $id)
            ->get();

        return view('lubrificacao.visualiza', ['lubrif' => $lubrif]);

    }

    public function reedit($id)
    {
        $lubrif = DB::table('lubrificacaos')
            ->where('id', $id)
            ->get();

        return view('lubrificacao.pop_reedit', ['lubrif' => $lubrif]);

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */

    public function reSalva($id, Request $request)
    {

        $this->validate($request, [

            'data_execucao' => 'required',
            'servico_executado' => 'required',
            'motivo' => 'required',
            'ponto' => 'required',
            'lubrificante' => 'required',
            'volume' => 'required',

        ]);


        $data_exec = $request->data_execucao = implode('-', array_reverse(explode('/', $request->data_execucao)));
        $data_prox_lubr = date('Y-m-d', strtotime('+15 days', strtotime($data_exec)));

        $lub_up = DB::table('lubrificacaos')
            ->where('id', $id)
            ->update(['data_execucao' => $request->data_execucao,
                'servico_executado' => $request->servico_executado,
                'motivo' => $request->motivo,
                'ponto' => $request->ponto,
                'quantidade' => $request->quantidade,
                'lubrificante' => $request->lubrificante,
                'volume' => $request->volume,
                'data_prox_lubri' => $data_prox_lubr]);

        return view('lubrificacao.message_ok')->with('message', 'Registro atualizado com sucesso !');


    }

    public function listaLubrif()
    {
        $lubr = DB::table('lubrificantes')
            ->simplePaginate(6);

        return view('lubrificacao.lista_lubrificantes', ['lubr' => $lubr]);

    }

    public function cadLubrif()
    {
        $lubr = DB::table('lubrificantes')
            ->simplePaginate(6);

        return view('lubrificacao.form_lubrificantes', ['lubr' => $lubr]);

    }

    public function salvaLubrif(Request $request)
    {
        $lub = new Lubrificante();
        $lub->desc = $request->desc;
        $lub->save();

        return redirect::to('/lubrificacao/lubrificantes/lista')->with('message', 'Lubrificante adicioando com sucesso !');

    }

    public function listaPontos()
    {
        $pontos = DB::table('pontos')
            ->simplePaginate(6);

        return view('lubrificacao.lista_pontos',['pontos'=>$pontos]);

    }

    public function cadPontos()
    {
        $pontos = DB::table('pontos')
            ->simplePaginate(6);

        return view('lubrificacao.form_pontos', ['pontos' => $pontos]);

    }

    public function salvaPonto(Request $request)
    {
        $pnt = new Ponto();
        $pnt->desc = $request->desc;
        $pnt->save();

        return redirect::to('/lubrificacao/pontos/lista')->with('message', 'Ponto de Lubrificação adicioando com sucesso !');
    }




}
