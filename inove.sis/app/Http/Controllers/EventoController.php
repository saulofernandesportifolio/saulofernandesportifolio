<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use function MongoDB\BSON\toJSON;
use Session;
use Redirect;
use App\User;
use DB;
use Input;
use App\Evento;
use App\Bartender;
use App\Cliente;
use App\Escala;
use App\SelectBartenders;
use App\SelectBartendersresultado;
use App\SelectBartendersresultado1;
use App\SelectBartendersresultado2;
use Auth;

class EventoController extends Controller{
    //tela inicial
    public function index() {


        $user1=Auth::user()->usuario;
        $user=DB::table('users')->select('*')->where('usuario',$user1)->get();


        foreach($user as $us){
           $teste = $us->primeiro_acesso;
           $iduser = $us->id;
        }


        if($teste == 1){

          return view('auth.passwords.reset',['iduser' => $iduser]);

        }

    //lista eventos
      $eventos = DB::table('eventos')->select('id',
                                              'idclientes',
                                              'numero_evento',
                                              'cliente',
                                              'evento',
                                              'cidade',
                                              'chegada_deposito',
                                              'carro',
                                              'tipo',
                                              'uniforme',
                                              'observacao',
                                              DB::raw('DATE_FORMAT(data_evento , "%d/%m/%Y") as data_evento'),
                                              'data_evento as dt1',
                                              'score',
                                              'qtd_bartenders',
                                              'bartenders',
                                              'animacao',
                                              'hora_evento',
                                              'pacote_contrado',
                                              'adicionais',
                                              'frutas',
                                              'n_convidados',
                                              'gerada')->where('fila','=',1)->get();
      /*
      $eventos = DB::table('eventos')->select('id',
          'idclientes',
          'cliente',
          'evento',
          'cidade',
          'chegada_deposito',
          'carro',
          'tipo',
          'uniforme',
          'observacao',
          DB::raw('DATE_FORMAT(data_evento , "%d/%m/%Y %H:%i:%s") as data_evento'),
          'score',
          'qtd_bartenders',
          'bartenders',
          'animacao',
          'hora_evento',
          'pacote_contrado',
          'adicionais',
          'frutas',
          'n_convidados')->simplePaginate(6);*/
/*
        $data=date('Y-m-d');
        $disp=DB::table('bartenders as a')
            ->distinct()
            ->select('a.id','a.nome','a.carro','a.danca','a.drinks','a.simpatia','a.beleza','a.postura','a.score')
            ->join('escalas as b', 'b.idbartenders','=','a.id')
            ->join('eventos as c', 'b.ideventos','=','c.id')
            ->join('liberacaos as d', 'd.idbartenders','=','a.id')
            ->where([['d.liberado','=','Sim'],[DB::raw('DATE_FORMAT(c.data_evento , "%Y-%m-%d")'),'<>',$data]])
            ->update(['d.status' => 'Disponivel']);*/

      return view('eventos.eventos',['eventos' => $eventos]);

    }




    public function pendentes() {


        //lista eventos
        $eventos = DB::table('eventos')->select('id',
            'idclientes',
            'numero_evento',
            'cliente',
            'evento',
            'cidade',
            'chegada_deposito',
            'carro',
            'tipo',
            'uniforme',
            'observacao',
            DB::raw('DATE_FORMAT(data_evento , "%d/%m/%Y") as data_evento'),
            'data_evento as dt1',
            'score',
            'qtd_bartenders',
            'bartenders',
            'animacao',
            'hora_evento',
            'pacote_contrado',
            'bar_contrado',
            'adicionais',
            'frutas',
            'n_convidados',
            'gerada')->where('fila','=',2)->get();



        return view('eventos.eventos_pendentes',['eventos' => $eventos]);

    }




      public function new(){
          //form cadastro eventos
          //Lista bartenders
          $bart = DB::table('bartenders as a')->orderByRaw('a.score DESC')->get();
          //lista clientes
          $cli = DB::table('clientes as b')->orderByRaw('b.nome')->get();
          //lista pacotes
          $paco = DB::table('pacotes as a')->orderByRaw('a.pacote')->get();
          //lista bailes
          $tipos = DB::table('tipos as a')->orderByRaw('a.tipo')->get();

          //lista kit bares
          $bar = DB::table('bares as a')->orderByRaw('a.bar')->get();

          return view('eventos.form_evento', ['bart'=>$bart, 'cli'=>$cli, 'paco' => $paco, 'tipos' => $tipos, 'bar' => $bar]);
      }

    //Insere registros no BD
    public function store(Request $request){



        //validação de dados
         $this->validate($request, [
            'data_evento' =>'required',
            'cliente' =>'required',
            'evento'  =>'required|string',
            'animacao' =>'in:Sim,Não',
            'chegada_deposito' =>'required|string',
            'tipo' =>'in:15 Anos,Adulto',
            'pacote_contrado' =>'in:Combo Neon,Combo Fresh,Combo Clássico,Ilha Mista,Ilha Caipirinhas 1,Ilha Caipirinhas 2,Ilha de Coqueteis',
            'frutas' =>'in:Sim,Não',
            'qtd_convidados' => 'required|string',
            'uniforme' => 'required|string',
            'bar_contrado' =>'in:Clássica P,Capitonê Preta G - C/T,Capitonê Preta P - C/T,Capitonê Preta G - S/T,Capitonê Preta P - S/T,Capitonê Branca G - C/T,Capitonê Branca P - C/T,Capitonê Branca G - S/T,Capitonê Branca P - S/T,Vintage G - C/T,Vintage G - S/T,Neon Estática P,Neon Led G,Neon Led P',
             /*'qtdbarth' => 'required|integer',
             'qtdbartm' => 'required|integer',
             'qtdbartt' => 'required|integer',*/
        ]);


        function arrumadatahora($string2) {

            if($string2 == ''){
                $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
            }else{

                $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2)." ".substr($string2,10,9);

            }
            return $data2;
        }

        if(empty($request->qtdbarth) && empty($request->qtdbartm) && empty($request->qtdbartt)){

            return redirect()->back();
        }

        if(empty($request->qtdbarth)){
             $request->qtdbarth=0;
        }
        if(empty($request->qtdbartm)){
            $request->qtdbartm=0;
        }
        if(empty($request->qtdbartt)){
            $request->qtdbartt=0;
        }

        if(!empty($request->qtdbartt)) {
            if ($request->mulher == 'Sim') {

                $request->qtdbarth = $request->qtdbartt - 1;
                $request->qtdbartm = 1;
            }else{

                $request->qtdbarth = $request->qtdbartt;
            }
        }

        //verificar o ultimo evento criado//
        $gerarevento = DB::table('eventos')->orderBy('numero_evento', 'desc')->first();

        //valida se for igual a null inicia protocolo com senao cria o proximo
        $gerarevento1 = empty($gerarevento->numero_evento) ? $gerarevento = 1 : $gerarevento->numero_evento + 1;
         //insere dados em eventos
         $evento = new Evento();
         $evento->numero_evento = str_pad($gerarevento1, 5, '0', STR_PAD_LEFT);;
         $evento->idclientes = $request->cliente;
         $evento->evento = $request->evento;
         $evento->chegada_deposito = $request->chegada_deposito;
         $evento->carro = $request->carro;
         $evento->tipo = $request->tipo;
         $evento->uniforme = $request->uniforme;
         $evento->observacao = $request->observacao;
         $evento->data_evento = arrumadatahora($request->data_evento);
         $evento->inicio_trabalho = $request->inicio_trabalho;
         $evento->inicio_evento = $request->inicio_evento;
         $evento->qtd_bartenders = $request->qtdbarth + $request->qtdbartm;
         $evento->qtd_bar_homem = $request->qtdbarth;
         $evento->qtd_bar_mulher = $request->qtdbartm;
         $evento->animacao = $request->animacao;
         $evento->pacote_contrado = $request->pacote_contrado;
         $evento->bar_contrado = $request->bar_contrado;
         $evento->frutas = $request->frutas;
         $evento->n_convidados = $request->qtd_convidados;
         //$evento->score = $request->score;
         //atualiza cep,bairro,cidade,uf
         $cliente=DB::table('clientes')->select('*')->where('id','=',$request->cliente)->get();
         foreach($cliente as $cli){
            $evento->cep_do_evento = $cli->cep;
            $evento->bairro = $cli->bairro;
            $evento->cidade = $cli->cidade;
            $evento->uf = $cli->uf;
            $evento->cliente = $cli->nome;
         }
         $evento->save();

         //seleciona ultimo ID do banco
         $ev1=DB::table('eventos')->orderBy('id', 'desc')->first();

         //recebe id evento
         $id = $ev1->id;

        return redirect::to('/evento/vizualiza/'.$id)->with('message','Evento cadastrado com suceso : '.$request->tipo.' com Sucesso !');
    }




    public function visualiza($id){
        //seleciona os dados para retorno da
        //traz informações do evento
        $eventos = DB::table('eventos')->where('id',$id)->select('id',
            'idclientes',
            'numero_evento',
            'cliente',
            'evento',
            'cidade',
            'bairro',
            'uf',
            'cep_do_evento',
            'chegada_deposito',
            'carro',
            'tipo',
            'uniforme',
            'observacao',
            DB::raw('DATE_FORMAT(data_evento , "%d/%m/%Y") as data_evento'),
            DB::raw('DATE_FORMAT(inicio_evento, "%H:%i") as inicio_evento'),
            DB::raw('DATE_FORMAT(inicio_trabalho,"%H:%i") as inicio_trabalho'),
            'data_evento as dt1',
            'score',
            'qtd_bartenders',
            'qtd_bar_homem',
            'qtd_bar_mulher',
            'bartenders',
            'animacao',
            'hora_evento',
            'pacote_contrado',
            'bar_contrado',
            'adicionais',
            'frutas',
            'n_convidados',
            'fila')->get();

        //traz informações da escala
        $escalas = DB::table('escalas')->where('ideventos',$id)->get();

        //traz informaçoes do nome e id batenders selecionado
        $bartenders = DB::table('bartenders as a')
                       ->leftJoin('eventos as b', 'a.id','=', 'b.carro')
                       ->where('b.id',$id)
                       ->select('a.id','a.nome')->get();

        //traz informações batenders lista
        $bartenders2 = DB::table('bartenders as a')
                       ->leftJoin('escalas as b', 'a.id','=','b.idbartenders')
                       ->leftjoin('eventos as c','c.id','=','b.ideventos')
                       ->where('c.id','=',$id)
                       ->select('a.id', 'a.nome','a.carro','a.cidade','a.danca','a.drinks','a.simpatia','a.beleza','a.postura','a.score')
                       ->get();

        //traz informaçoes do nome e id batenders disponiveis
       foreach ($eventos as $evdt) {

           $dataev = $evdt->dt1;
       }
           $bartenders3 = DB::table('bartenders as a')
               ->select('a.id',
                   'a.nome',
                   'a.cep',
                   'a.endereco',
                   'a.numero',
                   'a.cidade',
                   'a.uf',
                   'a.bairro',
                   'a.carro',
                   'a.danca',
                   'a.drinks',
                   'a.simpatia',
                   'a.beleza',
                   'a.postura',
                   'a.score',
                   'd.status',
                   'd.data_inicial',
                   'd.data_final',
                   'd.liberado')
               ->join('liberacaos as d', 'd.idbartenders', '=', 'a.id')
               ->where([['d.status', '=', 'Disponivel'], ['d.liberado', '=', 'Sim']])
               ->get();

               //->where([['d.status', '=', 'Disponivel'], ['d.liberado', '=', 'Sim'],['d.data_inicial', '>=', $dataev],['d.data_final', '<=', $dataev]])

        //traz informaçoes do nome e id cliente
        $cli = DB::table('clientes as a')->leftJoin('eventos as b', 'a.id','=', 'b.idclientes')->where('b.id',$id)->select('a.id','a.nome')->get();
        //lista os clientes
        $cli2 = DB::table('clientes')->get();

        //lista pacotes
        $paco = DB::table('pacotes as a')->orderByRaw('a.pacote')->get();
        //lista pacotes
        $tipos = DB::table('tipos as a')->orderByRaw('a.tipo')->get();
        //lista kit bares
        $bares = DB::table('bares as a')->orderByRaw('a.bar')->get();

        //pagina ocorrencia para visualizar os dados
        return view('eventos.visual_eventos',['eventos' => $eventos, 'escalas' => $escalas, 'bartenders' => $bartenders, 'bartenders2' => $bartenders2, 'bartenders3' => $bartenders3, 'cli' => $cli,'cli2' => $cli2, 'paco' => $paco, 'tipos' => $tipos, 'bares' => $bares]);
    }




    //resultado do select bartender1
    public function SelectBartendersresultado(Request $request, $id){
        if($request->ajax()){
            $SelectBartendersresultados = SelectBartendersresultado::SelectBartendersresultados($id);
            return response()->json($SelectBartendersresultados);

        }
    }
    //resultado do select bartender1
    public function SelectBartendersresultado1(Request $request, $id){
        if($request->ajax()){
            $SelectBartendersresultados1 = SelectBartendersresultado1::SelectBartendersresultados1($id);
            return response()->json($SelectBartendersresultados1);

        }
    }
    //resultado do select bartender1
    public function SelectBartendersresultado2(Request $request, $id){
        if($request->ajax()){
            $SelectBartendersresultados2 = SelectBartendersresultado2::SelectBartendersresultados2($id);
            return response()->json($SelectBartendersresultados2);

        }
    }

    //Edita registros no BD
    public function update(Request $request){

        function arrumadatahora($string2) {

            if($string2 == ''){
                $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
            }else{

                $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2)." ".substr($string2,10,9);

            }
            return $data2;
        }


        //verificar o ultimo protocolo criado//

        //verifica a quantidade de bartenders dentro do array
        $count = count($request->qtd_bartenders);

        if(empty($request->qtdbarth)){
            $request->qtdbarth=0;
        }
        if(empty($request->qtdbartm)){
            $request->qtdbartm=0;
        }

        //insere dados em eventos
        $evento = Evento::find($request->id);
        $evento->idclientes = $request->cliente;
        $evento->evento = $request->evento;
        $evento->cep_do_evento = $request->cep;
        $evento->bairro = $request->bairro;
        $evento->cidade = $request->cidade;
        $evento->uf = $request->uf;
        $evento->chegada_deposito = $request->chegada_deposito;
        $evento->carro = $request->carro;
        $evento->tipo = $request->tipo;
        $evento->uniforme = $request->uniforme;
        $evento->observacao = $request->observacao;
        $evento->data_evento = arrumadatahora($request->data_evento);
        $evento->inicio_trabalho = $request->inicio_trabalho;
        $evento->inicio_evento = $request->inicio_evento;
        $evento->qtd_bartenders = $request->qtdbarth + $request->qtdbartm;
        $evento->qtd_bar_homem = $request->qtdbarth;
        $evento->qtd_bar_mulher = $request->qtdbartm;
        $evento->animacao = $request->animacao;
        $evento->pacote_contrado = $request->pacote_contrado;
        $evento->bar_contrado = $request->bar_contrado;
        $evento->frutas = $request->frutas;
        $evento->n_convidados = $request->qtd_convidados;
        $evento->save();

        //seleciona ultimo ID do banco
        /*$ev1=DB::table('eventos')->orderBy('id', 'desc')->first();
        //cria um for para adicionar resgistros na tabela escala
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                $escala = new Escala();
                $escala->ideventos = $ev1->id;
                $escala->idbartenders = $request->bartender[$i];
               // $escala->save();
            }
        }
        */
        //'/evento/vizualiza/{id}'
        //'/listaevento'
        return redirect::to('/listaevento')->with('message','Evento : '.$request->tipo.' editado com Sucesso !');
    }

    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
            //lista eventos
            return redirect::to('/listaevento');
        }

        //lista eventos
        $eventos = DB::table('eventos')->select('*')->where('id','LIKE',$request->pesquisa)->get();
        $eventos = DB::table('eventos')->where('cliente','LIKE',$request->pesquisa)->simplePaginate(6);

        return $this->index()->with(['eventos' => $eventos]);
    }


    public function updatebar(Request $request)
    {

      if( $request->vale == "update") {
          DB::table('escalas')
              ->where([['ideventos', $request->idev], ['idbartenders', $request->idbart]])
              ->update(['idbartenders' => $request->bartender1]);

          DB::table('liberacaos')
              ->where('idbartenders', $request->bartender1)
              ->update(['status' => 'Selecionado']);

          DB::table('liberacaos')
              ->where('idbartenders', $request->idbart)
              ->update(['status' => 'Disponivel']);

         $id = $request->idev;
       return redirect::to('/evento/vizualiza/'.$id)->with('message','Bartender Editado Com Sucesso !');

      }elseif( $request->vale == "adicionar") {

            DB::table('escalas')->insert(
                ['ideventos' => $request->idev, 'idbartenders' => $request->bartender1]
            );

            $ev = DB::table('escalas')
                ->select('ideventos')
                ->where('ideventos','=',$request->idev)->get();
            $conta = count($ev);

            DB::table('eventos')
                ->where('id',$request->idev)
                ->update(['qtd_bartenders' => $conta]);

            DB::table('liberacaos')
                ->where('idbartenders',$request->bartender1)
                ->update(['status' => 'Selecionado']);

            $id = $request->idev;

         return redirect::to('/evento/vizualiza/'.$id)->with('message','Bartender Adicionado Com Sucesso !');

      }elseif( $request->vale == "delete") {

          DB::table('escalas')->where([
              ['ideventos','=', $request->idev],['idbartenders','=',$request->idbart]]
          )->delete();

          $ev = DB::table('escalas')
              ->select('ideventos')
              ->where('ideventos','=',$request->idev)->get();
          $conta = count($ev);

         /* DB::table('eventos')
              ->where('id',$request->idev)
              ->update(['qtd_bartenders' => $conta]);*/

          DB::table('liberacaos')
              ->where('idbartenders',$request->idbart)
              ->update(['status' => 'Disponivel']);

           if(empty($conta)){
              DB::table('eventos')
               ->where('id',$request->idev)
               ->update(['gerada' => NULL]);
               DB::table('eventos')
                   ->where('id',$request->idev)
                   ->update(['fila' => 1]);
            }
          $id = $request->idev;
         if(empty($conta)){

             return redirect::to('/listaeventopendentes')->with('message','Bartender Retirado Com Sucesso, Evento Retornado Para Abertos !');
         }
          return redirect::to('/evento/vizualiza/'.$id)->with('message','Retirar ou Alterar proximo Bartender  Com Sucesso !');

      }



    }


    public function gerabart()
    {

        //$gera=DB::table('eventos')->where('id','=',$id)->get();
        //$gera=DB::table('eventos')->where('fila','=',1)->get();
        $gera = DB::select('CALL inovebar_sis.eventos_order()');


        foreach($gera as $gr) {

            /*echo "evento: ".$gr->id;
            echo '<br>';
            echo "tipo de evento: ".$gr->tipo;
            echo '<br>';
            echo "total de bartenders: ".$gr->qtd_bartenders;
            echo '<br>';
            echo "bartenders homem: ".$gr->qtd_bar_homem;
            echo '<br>';
            echo "bartenders mulher: ".$gr->qtd_bar_mulher;
            echo '<br>';
            echo "cidade: ".$gr->cidade;
            echo '<br>';
            echo '<br>';*/

            $gr->id;
            $gr->tipo;
            $gr->qtd_bartenders;
            $gr->qtd_bar_homem;
            $gr->qtd_bar_mulher;
            $gr->cidade;
            $gr->data_evento;


            if(!empty($gr->qtd_bar_homem)) {
                $esch = DB::select('CALL inovebar_sis.escala_homem(?,?,?,?,?)', [$gr->qtd_bar_homem, $gr->id, $gr->cidade, $gr->data_evento, $gr->tipo]);

                $tl = count($esch);

                DB::table('eventos as a')
                    ->join('escalas as b','b.ideventos','=','a.id')
                    ->where('a.fila','=', 1)
                    ->update(['a.fila' => 2]);
            }

            if(!empty($gr->qtd_bar_mulher)) {
                $escm = DB::select('CALL inovebar_sis.escala_mulher(?,?,?,?,?)', [$gr->qtd_bar_mulher, $gr->id, $gr->cidade, $gr->data_evento, $gr->tipo]);

                $tl1 = count($escm);

                DB::table('eventos as a')
                    ->join('escalas as b','b.ideventos','=','a.id')
                    ->where('a.fila','=', 1)
                    ->update(['a.fila' => 2]);
            }


        }

        return redirect::to('/listaevento')->with('message', 'Gerada escala com Sucesso, o evento consta em pendentes agora!');

    }



   public function excluir($id)
    {

          DB::table('eventos')->where('id','=', $id)->delete();

          DB::table('escalas')->where('ideventos','=', $id)->delete();


          return redirect::to('/listaevento')->with('message','Evento Excluído Com Sucesso !');



    }

    public function fechado(){


        //lista eventos
        $eventos = DB::table('eventos')->select('id',
            'idclientes',
            'numero_evento',
            'cliente',
            'evento',
            'cidade',
            'chegada_deposito',
            'carro',
            'tipo',
            'uniforme',
            'observacao',
            DB::raw('DATE_FORMAT(data_evento , "%d/%m/%Y") as data_evento'),
            'data_evento as dt1',
            'score',
            'qtd_bartenders',
            'bartenders',
            'animacao',
            'hora_evento',
            'pacote_contrado',
            'adicionais',
            'frutas',
            'n_convidados',
            'gerada')->where('fila','=',3)->get();

        return view('eventos.eventosfechado',['eventos' => $eventos]);



    }

    public function realizado($id){

        DB::table('eventos')->where('id','=',$id)->update(['fila' => 3]);

        return redirect::to('/listaeventofechado')->with('message','Evento Realizado Com Sucesso !');

    }

    public function reabrir($id){

        DB::table('eventos')->where('id','=',$id)->update(['fila' => 2]);

        return redirect::to('/listaeventopendentes')->with('message','Evento Reaberto em Pendente Com Sucesso !');

    }


    public function listaev(){

     return view('eventos.eventosbartenders');

    }

    public function listarevbart(Request $request){


        //validação de dados
        $this->validate($request, [
            'data_inicial' =>'required',
            'data_final' =>'required',

        ]);


        //echo $request->data_inicial;
        //echo '<br>';
        $data1 = implode('-', array_reverse(explode('/', $request->data_inicial)));

        //echo '<br>';
        $data2 = implode('-', array_reverse(explode('/', $request->data_final)));

        //lista eventos
        $eventos = DB::table('eventos as a')->select('a.id',
            'a.idclientes',
            'a.numero_evento',
            'a.cliente',
            'a.evento',
            'a.cidade',
            'a.chegada_deposito',
            'a.carro',
            'a.tipo',
            'a.uniforme',
            'a.observacao',
            DB::raw('DATE_FORMAT(a.data_evento , "%d/%m/%Y") as data_evento'),
            'a.data_evento as dt1',
            'a.score',
            'a.qtd_bartenders',
            'a.bartenders',
            'a.animacao',
            'a.hora_evento',
            'a.pacote_contrado',
            'a.adicionais',
            'a.frutas',
            'a.n_convidados',
            'a.gerada',
            'c.nome as nomebar',
            'c.carro as comcarro')
            ->join('escalas as b','b.ideventos','=','a.id')
            ->leftjoin('bartenders as c','c.id','=','b.idbartenders')
            ->where('a.fila','=',2)
            ->whereBetween('a.data_evento', [$data1, $data2])->get();



        return view('eventos.eventosimprimi',['eventos' => $eventos]);



    }


}
