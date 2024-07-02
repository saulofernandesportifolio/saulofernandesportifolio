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
use App\Liberacao;

class BartenderController extends Controller
{
    //
    public function index(){

         $bartenders = DB::table('bartenders')
              ->select('bartenders.id',
                 'bartenders.nome',
                 'bartenders.cep',
                 'bartenders.endereco',
                 'bartenders.numero',
                 'bartenders.cidade',
                 'bartenders.uf',
                 'bartenders.bairro',
                 'bartenders.carro',
                 'bartenders.danca',
                 'bartenders.drinks',
                 'bartenders.simpatia',
                 'bartenders.beleza',
                 'bartenders.postura',
                 'bartenders.score',
                 'bartenders.genero',
                 'bartenders.tamanho',
                 'bartenders.apito',
                 'liberacaos.status',
                 DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
                 DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
                 'liberacaos.liberado')
             ->distinct()
             ->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')
             ->where('bartenders.ativo','=', 1)
             ->orderby('bartenders.nome','asc')
             ->get();

             /*$bartenders = DB::table('bartenders')
                          ->select('bartenders.id',
                              'bartenders.nome',
                              'bartenders.cep',
                              'bartenders.endereco',
                              'bartenders.numero',
                              'bartenders.cidade',
                              'bartenders.uf',
                              'bartenders.bairro',
                              'bartenders.carro',
                              'bartenders.danca',
                              'bartenders.drinks',
                              'bartenders.simpatia',
                              'bartenders.beleza',
                              'bartenders.postura',
                              'bartenders.score',
                              'bartenders.status',
                              'bartenders.genero',
                              DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
                              DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
                              'liberacaos.liberado')
                          ->distinct()
                          ->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')
                          ->orderby('bartenders.nome','asc')
                          ->simplePaginate(6);*/

        return view('bartenders.bartenders',['bartenders' => $bartenders]);

    }

    public function store(Request $request)
    {

        //validação de dados
        $this->validate($request, [
            'nome'   => 'required|string',
            'cep'    => 'required',
            'endereco' =>'required',
            'numero'   => 'required',
            'cidade'  =>'required|string',
            'uf'  =>'required',
            'genero' =>'required',
            'apito' => 'in:15 Anos,Adulto,Adulto e 15 Anos',
        ]);

        $bart=DB::table('bartenders')->orderBy('nome', 'desc')->first();

        //valida se for igual a null inicia protocolo com senao cria o proximo
        $gerarbart1 = empty($gerarbart1->bartender)? $gerarbart=1 : $gerarbart1->bartender+1;

        //calcula score
        $dan = $request->danca;
        $dri = $request->drinks;
        $sim = $request->simpatia;
        $bel = $request->beleza;
        $pos = $request->postura;

        $score = ($dan + $dri + $sim + $bel + $pos) /5;




        //insere dados em bartenders
        $bartender = new Bartender();

        $bartender->nome = $request->nome;
        $bartender->cep = $request->cep;
        $bartender->endereco = $request->endereco;
        $bartender->numero = $request->numero;
        $bartender->bairro = $request->bairro;
        $bartender->cidade = $request->cidade;
        $bartender->uf = $request->uf;
        $bartender->carro= $request->carro;
        $bartender->danca = $request->danca;
        $bartender->drinks = $request->drinks;
        $bartender->simpatia = $request->simpatia;
        $bartender->beleza = $request->beleza;
        $bartender->postura = $request->postura;
        $bartender->score = $score;
        $bartender->genero = $request->genero;
        $bartender->tamanho = $request->tamanho;
        $bartender->apito = $request->apito;

        $bartender->save();

        return redirect::to('/listabartenders')->with('message','Bartender cadastrado com suceso : '.$bartender->nome.' com Sucesso !');


    }

    public function new()

    {
        return view('bartenders.form_bartenders');

    }



    public function visualiza($id){
        //traz informações batenders lista
        $bartenders = DB::table('bartenders')->select('bartenders.id',
            'bartenders.nome',
            'bartenders.cep',
            'bartenders.endereco',
            'bartenders.numero',
            'bartenders.cidade',
            'bartenders.uf',
            'bartenders.bairro',
            'bartenders.carro',
            'bartenders.danca',
            'bartenders.drinks',
            'bartenders.simpatia',
            'bartenders.beleza',
            'bartenders.postura',
            'bartenders.score',
            'liberacaos.status',
            'bartenders.genero',
            'bartenders.tamanho',
            'bartenders.apito',
            DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
            DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
            'liberacaos.liberado')->distinct()->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')->where('bartenders.id','=',$id)->get();

        //pagina ocorrencia para visualizar os dados
        return view('bartenders.visual_bartenders',['bartenders' => $bartenders]);
    }


    public function update(Request $request)
    {


        function arrumadata($string2) {

            if($string2 == ''){
                $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2);
            }else{

                $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2);

            }
            return $data2;
        }

        //calcula score
        $dan = $request->danca;
        $dri = $request->drinks;
        $sim = $request->simpatia;
        $bel = $request->beleza;
        $pos = $request->postura;

        $score = ($dan + $dri + $sim + $bel + $pos) /5;




        //insere dados em bartenders
        $bartender = Bartender::find($request->id);

        $bartender->nome = $request->nome;
        $bartender->cep = $request->cep;
        $bartender->endereco = $request->endereco;
        $bartender->numero = $request->numero;
        $bartender->bairro = $request->bairro;
        $bartender->cidade = $request->cidade;
        $bartender->uf = $request->uf;
        $bartender->carro= $request->carro;
        $bartender->danca = $request->danca;
        $bartender->drinks = $request->drinks;
        $bartender->simpatia = $request->simpatia;
        $bartender->beleza = $request->beleza;
        $bartender->postura = $request->postura;
        $bartender->score = $score;
        $bartender->genero= $request->genero;
        $bartender->tamanho = $request->tamanho;
        $bartender->apito = $request->apito;
        $bartender->save();

        return redirect::to('/listabartenders')->with('message','Bartender editado com suceso : '.$bartender->nome.' com Sucesso !');


    }



    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';

            return redirect::to('/listabartenders');

        }
        //lista bartenders
        /*$bartenders = DB::table('bartenders')->select('*')->where('nome','LIKE','%'.$request->pesquisa.'%')->get();
        $bartenders = DB::table('bartenders')->where('nome','LIKE','%'.$request->pesquisa.'%')->simplePaginate(6);*/

        $bartenders = DB::table('bartenders')
            ->select('bartenders.id',
                'bartenders.nome',
                'bartenders.cep',
                'bartenders.endereco',
                'bartenders.numero',
                'bartenders.cidade',
                'bartenders.uf',
                'bartenders.bairro',
                'bartenders.carro',
                'bartenders.danca',
                'bartenders.drinks',
                'bartenders.simpatia',
                'bartenders.beleza',
                'bartenders.postura',
                'bartenders.score',
                'bartenders.genero',
                'bartenders.tamanho',
                'bartenders.apito',
                'liberacaos.status',
                DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
                DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
                'liberacaos.liberado')
            ->distinct()
            ->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')
            ->where('bartenders.nome','LIKE','%'.$request->pesquisa.'%')
            ->orderby('bartenders.nome','asc')
            ->get();

        /*$bartenders = DB::table('bartenders')
            ->select('bartenders.id',
                'bartenders.nome',
                'bartenders.cep',
                'bartenders.endereco',
                'bartenders.numero',
                'bartenders.cidade',
                'bartenders.uf',
                'bartenders.bairro',
                'bartenders.carro',
                'bartenders.danca',
                'bartenders.drinks',
                'bartenders.simpatia',
                'bartenders.beleza',
                'bartenders.postura',
                'bartenders.score',
                'bartenders.genero',
                'liberacaos.status',
                DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
                DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
                'liberacaos.liberado')
            ->distinct()
            ->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')
            ->where('bartenders.nome','LIKE','%'.$request->pesquisa.'%')
            ->orderby('bartenders.nome','asc')
            ->simplePaginate(6);*/

        return $this->index()->with(['bartenders' => $bartenders]);
    }

    public function libera(Request $request)
    {

         $request->limpa;
        if($request->limpa == 'Não') {
            //validação de dados
            $this->validate($request, [
                'data_inicial' => 'required',
                'data_final' => 'required',
                'libera' => 'in:Sim,Não',
                'check' => 'required'
            ]);
        }
        function arrumadata($string2) {

            if($string2 == ''){
                $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2);
            }else{

                $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2);

            }
            return $data2;
        }

        if($request->limpa == 'Não') {

            foreach ($request->check as $idbar) {
                //insere dados em bartenders
                $bartender = new Liberacao;
                $bartender->idbartenders = $idbar;
                $bartender->data_inicial = arrumadata($request->data_inicial);
                $bartender->data_final = arrumadata($request->data_final);
                $bartender->liberado = $request->libera;
                $bartender->save();


                //updatedados em bartenders
                $bartender=DB::table('liberacaos')
                ->where('idbartenders', $idbar)
                ->update(['status'=>'Disponivel']);
            }

            return redirect::to('/listabartenders')->with('message', 'Bartender Liberado: ' .$request->libera. ' com Sucesso !');
        }

        if($request->limpa == 'Sim') {

            //insere dados em bartenders
             Liberacao::query()->truncate();

            return redirect::to('/listabartenders')->with('message', 'Bartender Lista limpas com Sucesso !');
        }

    }

    public function excluir($id)
    {


          DB::table('bartenders')->where('id','=', $id)->delete();

          return redirect::to('/listabartenders')->with('message','Bartender Excluído Com Sucesso !');


    }

    public function desativar($id)
    {

        DB::table('bartenders')->where('id','=', $id)->update(['Ativo' => 2]);
        return redirect::to('/listabartenders')->with('message','Bartender Desativado Com Sucesso !');


    }

    public function reativacao(){

        $bartenders = DB::table('bartenders')
            ->select('bartenders.id',
                'bartenders.nome',
                'bartenders.cep',
                'bartenders.endereco',
                'bartenders.numero',
                'bartenders.cidade',
                'bartenders.uf',
                'bartenders.bairro',
                'bartenders.carro',
                'bartenders.danca',
                'bartenders.drinks',
                'bartenders.simpatia',
                'bartenders.beleza',
                'bartenders.postura',
                'bartenders.score',
                'bartenders.genero',
                'bartenders.tamanho',
                'bartenders.apito',
                'liberacaos.status',
                DB::raw('DATE_FORMAT(liberacaos.data_inicial , "%d/%m/%Y") as data_inicial'),
                DB::raw('DATE_FORMAT(liberacaos.data_final , "%d/%m/%Y") as data_final'),
                'liberacaos.liberado')
            ->distinct()
            ->leftjoin('liberacaos','liberacaos.idbartenders','=','bartenders.id')
            ->where('bartenders.ativo','=', 2)
            ->orderby('bartenders.nome','asc')
            ->get();

        return view('bartenders.bartendersreativar',['bartenders' => $bartenders]);

    }

    public function reativar($id)
    {

        DB::table('bartenders')->where('id','=', $id)->update(['Ativo' => 1]);
        return redirect::to('/listabartenders')->with('message','Bartender Reativado Com Sucesso !');


    }

}
