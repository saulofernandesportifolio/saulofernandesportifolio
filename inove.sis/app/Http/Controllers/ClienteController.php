<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Session;
use Redirect;
use App\User;
use DB;
use Input;
use App\Evento;
use App\Bartender;
use App\Cliente;

class ClienteController extends Controller
{
    //
    public function index()

    {

        $clientes = DB::table('clientes')->select('*')->get();
        /*$clientes = DB::table('clientes')->simplePaginate(6);*/

        return view('cliente.cliente',['clientes' => $clientes]);

    }

    public function store(Request $request, Cliente $cliente)
    {

        //validação de dados
        $this->validate($request, [
            'nome'   => 'required|string',
            
            'endereco' =>'required',
            'numero'   => 'required',
            'cidade'  =>'required|string',
            'uf'  =>'required',
            
            'telefone'=>'required',
            'responsavel'=>'required'
        ]);

        $cli=DB::table('clientes')->where('nome','=', $request->nome)->get();

        $cont=count($cli);

        if($cont > 0){

            return Redirect::to('/clientes/cadastro')
                ->with('erros','Esse cliente já existe na base !');
        }

        //insere dados em cliente
        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->cep = $request->cep;
        $cliente->endereco = $request->endereco;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->uf = $request->uf;
        /*$cliente->email = $request->email;*/
        $cliente->telefone = $request->telefone;
        $cliente->responsavel = $request->responsavel;
        $cliente->save();

        return redirect::to('/listaclientes')->with('message','Cliente cadastrado com suceso : '.$cliente->nome.' com Sucesso !');


    }

    public function new()

    {
        return view('cliente.form_cliente');

    }



    public function visualiza($id){
        //traz informações batenders lista
        $clientes = DB::table('clientes')->where('id','=',$id)->get();

        //pagina ocorrencia para visualizar os dados
        return view('cliente.visual_cliente',['clientes' => $clientes]);
    }


    public function update(Request $request)
    {


        //insere dados em cliente
        $cliente = Cliente::find($request->id);

        $cliente->nome = $request->nome;
        $cliente->cep = $request->cep;
        $cliente->endereco = $request->endereco;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->uf = $request->uf;
        /*$cliente->email = $request->email;*/
        $cliente->telefone = $request->telefone;
        $cliente->responsavel = $request->responsavel;
        $cliente->save();

        return redirect::to('/listaclientes')->with('message','Cliente editado com suceso : '.$cliente->nome.' com Sucesso !');


    }



    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
            return redirect::to('/listaclientes');
        }
        //lista bartenders
        $clientes = DB::table('clientes')->select('*')->where('nome','LIKE','%'.$request->pesquisa.'%')->get();
        $clientes = DB::table('clientes')->where('nome','LIKE','%'.$request->pesquisa.'%')->simplePaginate(6);

        return $this->index()->with(['clientes' => $clientes]);
    }

    public function excluir($id)
    {

          DB::table('clientes')->where('id','=', $id)->delete();

        
          return redirect::to('/listaclientes')->with('message','Cliente Excluído Com Sucesso !');

      

    }

}
