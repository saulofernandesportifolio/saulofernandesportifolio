<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cliente;
use DB;
class ClienteController extends Controller
{
    private $totalPagesPaginate = 5;

    public function index()
    {

        $cliente = DB::table('tiposclientes')->get();

        return view('admin.cliente.cliente', compact('cliente'));
    }

    public function clisalvar(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'nome' =>'required',
            'tipo_cliente' =>'required',

        ]);

        $sac = new Cliente;
        $sac->nome = $request->nome;
        $sac->tipocli = $request->tipo_cliente;
        $sac->save();
        $cliente = DB::table('tiposclientes')->get();
        return redirect('admin/cliente')->with('success', 'Cadastro efetuado com sucesso!');
    }

    public function historiccliente()
    {
        $historics = DB::table('clientes')->orderby('nome')->get();

        /*$historics = DB::table('clientes')->orderby('nome')->paginate($this->totalPagesPaginate);*/

        $historics1 = DB::table('clientes')->orderby('nome')->get();

        $tipo='';

        return view('admin.cliente.historics_cliente', compact('historics', 'tipo','historics1'));
    }
    public function searchHistoriccliente(Request $request)
    {
        if(empty($request->cliente)){

            $request->cliente="%";
        }

            $historics = DB::table('clientes as a')
                ->select('a.id',
                    'a.nome',
                    'a.tipocli')
                ->where('a.nome', 'like', $request->cliente. '%')
                ->orderby('nome')
                ->get();
        /*
        $historics = DB::table('clientes as a')
            ->select('a.id',
                'a.nome',
                'a.tipocli')
            ->where('a.nome', 'like', $request->cliente. '%')
            ->orderby('nome')
            ->paginate($this->totalPagesPaginate);*/

        $tipo= $request->cliente;

        $historics1 = DB::table('clientes')->orderby('nome')->get();
        return view('admin.cliente.historics_cliente', compact('historics', 'tipo','historics1'));

    }

    public function excluircliente($id){

       DB::table('clientes')->delete(['id' => $id]) ;

       return redirect('historic-cliente')->with('success', 'Excluído com sucesso!');

    }
}
