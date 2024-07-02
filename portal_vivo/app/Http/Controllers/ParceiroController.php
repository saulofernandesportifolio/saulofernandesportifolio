<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Session;
use Redirect;
use DB;
use App\Parceiro;
use Storage;
use Input;
use Zipper;
use Mail;
use App\User;
use App\File;



class ParceiroController extends Controller
{

    public function index()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $protocolos = DB::select('CALL fila_parceiro(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_parceiro')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

             $tl=count($protocolos);

             //pagina parceiro
            return view('parceiro.parceiro', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }
    }


    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
              $request->pesquisa='%';
        }

        $protocolos = DB::select('CALL fila_parceiro(?,?)', [Session::get('iduser'),$request->pesquisa]);
        $protocolos = DB::table('fila_parceiro')->simplePaginate(6);

        //return view('parceiro.parceiro',['protocolos' => $protocolos]);

        return $this->index()->with(['protocolos' => $protocolos]);
    }


    public function novo()
    {

        //pagina parceiro
        return view('parceiro.form');

    }


    public function salvar(Request $request)
    {


        //validação de dados
        $this->validate($request, [
            'pedido' => 'required|between:11,14|string',
            'descricao_defesa' => 'required|string',
            'cnpj_ou_cpf'=>'required'
        ]);

        //validação de dados
        $this->validate($request, [
            'anexo' => 'mimes:jpg,jpeg|max:4000'
        ]);


        $this->validate($request, [
            'cnpj_ou_cpf'=>'required|min:11 para cpf'
        ]);
        $this->validate($request, [
            'cnpj_ou_cpf'=>'required|min:14 para cnpj'
        ]);

        $verif1=Parceiro::where('pedido','=',$request->pedido)
                          ->Wherein('status',['Procedente','Improcedente'])
                          ->get();

        $countv1=count($verif1);

        if($countv1 == 2){

            return redirect::to('/parceiro')->with('erros','O pedido já foi contestado por 2 vezes, por favor enviar e-mail para o scallation !');

        }

        $verif=Parceiro::where([['pedido','=',$request->pedido],['status','=','Em Análise']])->first();

        $countv=count($verif);

        if($countv > 0){


           return redirect::to('/parceiro')->with('erros','Já existe um protocolo Em Análise para este pedido !');

        }


        $verif=Parceiro::where([['pedido','=',$request->pedido],['status','=','Reanálise']])->first();

        $countv=count($verif);

        if($countv > 0){


            return redirect::to('/parceiro')->with('erros','Já existe um protocolo Em Reanálise para este pedido !');

        }



        //verificar o ultimo protocolo criado//
        $gerarprotocolo=DB::table('parceiros')->orderBy('protocolo', 'desc')->first();



          //valida se for igual a null inicia protocolo com senao cria o proximo
        $gerarprotocolo1 = empty($gerarprotocolo->protocolo)? $gerarprotocolo=1 : $gerarprotocolo->protocolo+1;

        //insere os dados com o novo protocolo criado
        $protocolo = new Parceiro;
        $protocolo->pedido = $request->pedido;
        $protocolo->protocolo = str_pad($gerarprotocolo1, 5, '0', STR_PAD_LEFT);
        $protocolo->cnpj_cpf = $request->cnpj_ou_cpf;
        $protocolo->descricao_defesa = $request->descricao_defesa;
        $protocolo->status = 'Em Análise';
        $protocolo->email = Session::get('email');
        $protocolo->id_parceiro=Session::get('iduser');
        $protocolo->data_tratamento=date('Y-m-d H:i:s');
        $protocolo->save();


        if(!empty(Input::file('filename'))){

            if ($request->hasfile('filename')) {

                $files = $request->file('filename');

                foreach ($files as $file) {
                    if (!empty($file)) {
                        $name = $file->getClientOriginalName();
                        $file->move(public_path() . '/images/'.$protocolo->protocolo.'parc', $name);

                        $data[] = $name;

                        $files = glob(public_path('images/'.$protocolo->protocolo.'parc/*.jpg'));
                        \Zipper::make(public_path('/images/'.$protocolo->protocolo.'parc.zip'))->add($files)->close();

                    }

                }

            }
        }



        if(!empty(Input::file('filename')) && !empty($data)) {
            $file = new File;
            $file->filename = json_encode($data);
            $file->protocolo = $protocolo->protocolo;
            $file->endereco_anexo = '/images/'.$protocolo->protocolo.'parc';
            $file->endereco_download='/images/'.$protocolo->protocolo.'parc.zip';
            $file->tramite='Parceiro';
            $file->save();


        }
        /*//sleciona para adicionar a nova revisao
        $contar=Parceiro::where('pedido','=',$request->pedido)->orderBy('id', 'desc')->first();
        $count=count($contar);
        if($count > 0) {*/
            DB::select('CALL add_revisao(?)',[$request->pedido]);
        //}


        $data = array(
            'protocolo' => str_pad($gerarprotocolo1, 5, '0', STR_PAD_LEFT),
            'status' => 'Em Análise',
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('resetsenhassistemas@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Abertura de Protocolo');
        });


        return redirect::to('/parceiro')->with('message','Gerado protocolo : '.$protocolo->protocolo.' com Sucesso !');


    }

    public function visualiza($id)
    {

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_visualiza_parceiro_abertas(?)',[$id]);

        //pagina parceiro para visualizar os dados
        return view('parceiro.form_visualiza',['protocolos' => $protocolos]);

    }


    public function fechado()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            //CALCULANDO DIAS NORMAIS
            //LISTA DE FERIADOS NO ANO
            function Feriados($ano,$posicao){

                $dia = 86400;
                $datas = array();
                $datas['pascoa'] = easter_date($ano);
                $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
                $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
                $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
                $feriados = array (

                    '01/01',
                    date('d/m',$datas['carnaval']),
                    date('d/m',$datas['sexta_santa']),
                    date('d/m',$datas['pascoa']),
                    '21/04',
                    '01/05',
                    '07/09',
                    date('d/m',$datas['corpus_cristi']),
                    '12/10',
                    '02/11',
                    '15/11',
                    '25/12'

                );

                if(!empty($feriados[$posicao])){
                    return $feriados[$posicao]."/".$ano;
                }
            }

            //FORMATA COMO TIMESTAMP
            function dataToTimestamp($data){
                $ano = substr($data, 6,4);
                $mes = substr($data, 3,2);
                $dia = substr($data, 0,2);
                return mktime(0, 0, 0, $mes, $dia, $ano);
            }

            //SOMA 01 DIA
            function Soma1dia($data){
                $ano = substr($data, 6,4);
                $mes = substr($data, 3,2);
                $dia = substr($data, 0,2);
                return   date("d/m/Y", mktime(0, 0, 0, $mes, $dia+1, $ano));
            }

            function SomaDiasUteis($xDataInicial,$xSomarDias){
                for($ii=1; $ii<=$xSomarDias; $ii++){
                    $xDataInicial=Soma1dia($xDataInicial);
                    for($i=0; $i<13; $i++){
                        //var_dump($xDataInicial,$xDataInicial==Feriados(date("Y"),$i));
                        //echo "<br />";

                        if($xDataInicial==Feriados(date("Y"),$i)){
                            $xDataInicial=Soma1dia($xDataInicial);
                        }else{
                            //VERIFICANDO SE EH DIA DE TRABALHO
                            if(date("w",dataToTimestamp($xDataInicial))=="0"){
                                //SE DIA FOR DOMINGO OU FERIADO, SOMA +1
                                $xDataInicial=Soma1dia($xDataInicial);
                                $xDataInicial=Soma1dia($xDataInicial);

                            }elseif(date("w", dataToTimestamp($xDataInicial))=="6"){
                                //SE DIA FOR SABADO, SOMA +2
                                $xDataInicial=Soma1dia($xDataInicial);
                                $xDataInicial=Soma1dia($xDataInicial);
                            }
                        }
                    }
                }
                return $xDataInicial;
            }

            //CALCULANDO DIAS NORMAIS
            /*Abaixo vamos calcular a diferença entre duas datas. Fazemos uma reversão da maior sobre a menor
            para não termos um resultado negativo. */
            function CalculaDias($xDataInicial, $xDataFinal){
                $time1 = dataToTimestamp($xDataInicial);
                $time2 = dataToTimestamp($xDataFinal);

                $tMaior = $time1>$time2 ? $time1 : $time2;
                $tMenor = $time1<$time2 ? $time1 : $time2;

                $diff = $tMaior-$tMenor;
                $numDias = $diff/86400; //86400 é o número de segundos que 1 dia possui
                return $numDias;
            }
            //CALCULA DIAS UTEIS
            /*É nesta função que faremos o calculo. Abaixo podemos ver que faremos o cálculo normal de dias ($calculoDias), após este cálculo, faremos a comparação de dia a dia, verificando se este dia é um sábado, domingo ou feriado e em qualquer destas condições iremos incrementar 1*/

            function DiasUteis($yDataInicial){

                $yDataFinal= date('d/m/Y');

                $diaFDS = 0; //dias não úteis(Sábado=6 Domingo=0)
                $calculoDias = CalculaDias($yDataInicial, $yDataFinal); //número de dias entre a data inicial e a final
                $diasUteis = 0;

                while($yDataInicial!=$yDataFinal){
                    $diaSemana = date("w", dataToTimestamp($yDataInicial));
                    if($diaSemana==0 || $diaSemana==6){
                        //se SABADO OU DOMINGO, SOMA 01
                        $diaFDS++;
                    }else{
                        //senão vemos se este dia é FERIADO
                        for($i=0; $i<=12; $i++){
                            if($yDataInicial==Feriados(date("Y"),$i)){
                                $diaFDS++;
                            }
                        }
                    }
                    $yDataInicial = Soma1dia($yDataInicial); //dia + 1
                }
                return $calculoDias - $diaFDS;
            }


            function qtddiasagora($data_inicial){

                // Define os valores a serem usados
                $data_inicial = $data_inicial;
                $data_final = date('Y-m-d H:i:s');
                // Usa a função strtotime() e pega o timestamp das duas datas:
                $time_inicial = strtotime($data_inicial);
                $time_final = strtotime($data_final);
                // Calcula a diferença de segundos entre as duas datas:
                $diferenca = $time_final - $time_inicial; // 19522800 segundos
                // Calcula a diferença de dias
                $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

                return $dias;
            }

            //tratamento aging dias uteis corridos
            $visao = DB::table('parceiros as a')
                ->select('a.data_tratamento','a.id','a.data_criacao','a.dias')
                ->where('a.status','=','Procedente')
                ->orWhere('a.status','=','Improcedente')
                ->get();


            foreach($visao as $visaoa){
                $visa = $visaoa->data_tratamento;
                $iden = $visaoa->id;
                $diascorre=DiasUteis(date('d/m/Y',strtotime(substr($visa,0,10))));
                /*echo '<br>';
                echo $diascorre=DiasUteis(date('d/m/Y',strtotime(substr($visa,0,10))));
                echo '<br>';
                echo $iden;*/

                if($diascorre > 10){
                    $sla='Fora';
                }else{
                    $sla='Dentro';
                }


                if($diascorre <= 11) {
                    $diac = DB::table('parceiros as a')
                        ->where('a.id', '=', $iden)
                        ->update(['a.dias' => $diascorre, 'a.sla' => $sla]);
               }
            }


            $protocolos = DB::select('CALL fila_parceiro_fechado(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_parceiro_fechado')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

            $tl=count($protocolos);

            //pagina parceiro
            return view('parceiro.parceiro_fechados', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }

    }

    public function busca_fechado(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
        }

        $protocolos = DB::select('CALL fila_parceiro_fechado(?,?)', [Session::get('iduser'),$request->pesquisa]);
        $protocolos = DB::table('fila_parceiro_fechado')->simplePaginate(6);


        return $this->fechado()->with(['protocolos' => $protocolos]);
    }


    public function visualiza_fechado($id)
    {

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_visualiza_parceiro_fechado(?)',[$id]);
        $motivop='';
        foreach($protocolos as $protmotivo){

           $motivop.=$protmotivo->motivo;
        }

        //pagina parceiro para visualizar os dados
        return view('parceiro.form_visualiza_fechados',['protocolos' => $protocolos,'motivop' => $motivop]);

    }

    public function reabrir(Request $request)
    {

        //validação de dados
        $this->validate($request, [
            'id' => 'required'

        ]);

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_reabrir_parceiro(?)',[$request->id]);
        /* //insere os dados com o novo protocolo criado
        $protocolo = new Parceiro;
        $protocolo->pedido = $request->pedido;
        $protocolo->protocolo = $request->protocolo;
        $protocolo->cnpj_cpf = $request->cnpj_cpf;
        $protocolo->descricao_defesa = $request->descricao_defesa;
        $protocolo->status = 'Reanálise';
        $protocolo->email = Session::get('email');
        $protocolo->id_parceiro=Session::get('iduser');
        $protocolo->reaberto='Sim';
        $protocolo->save();*/



        //pagina parceiro para visualizar os dados
        return view('parceiro.form_reaberto',['protocolos' => $protocolos]);


    }

    public function abrirform()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{


            $protocolos = DB::select('CALL fila_parceiro_rea(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_parceiro_rea')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

            $tl=count($protocolos);

            //pagina parceiro
            return view('parceiro.form_reaberto', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }
    }

    public function salvarreaberto(Request $request)
    {

        $request->id;
        //validação de dados
        $this->validate($request, [
            'protocolo' =>'required|string',
            'descricao_defesa' => 'required|string',
            'anexo' => 'image|mimes:jpeg,png,jpg|max:4000'
        ]);


        //atualiza os dados com o novo protocolo criado
        /*$protocolo = Parceiro::find($request->id);
        $protocolo->descricao_defesa = $request->descricao_defesa;
        $protocolo->reaberto='Ok';
        $protocolo->save();*/

        $protocolo = new Parceiro;
        $protocolo->pedido = $request->pedido;
        $protocolo->protocolo = $request->protocolo;
        $protocolo->cnpj_cpf = $request->cnpj_cpf;
        $protocolo->descricao_defesa = $request->descricao_defesa;
        $protocolo->status = 'Reanálise';
        $protocolo->email = Session::get('email');
        $protocolo->id_parceiro=Session::get('iduser');
        $protocolo->reaberto='Ok';
        $protocolo->save();



        if(!empty(Input::file('filename'))){

            if ($request->hasfile('filename')) {

                $files = $request->file('filename');

                foreach ($files as $file) {
                    if (!empty($file)) {
                        $name = $file->getClientOriginalName();
                        $file->move(public_path() . '/images/'.$protocolo->protocolo.'parc', $name);

                        $data[] = $name;

                        $files = glob(public_path('images/'.$protocolo->protocolo.'parc/*.jpg'));
                        \Zipper::make(public_path('/images/'.$protocolo->protocolo.'parc.zip'))->add($files)->close();

                    }

                }

            }
        }



        if(!empty(Input::file('filename')) && !empty($data)) {
            $file = new File;
            $file->filename = json_encode($data);
            $file->protocolo = $protocolo->protocolo;
            $file->endereco_anexo = '/images/'.$protocolo->protocolo.'parc';
            $file->endereco_download='/images/'.$protocolo->protocolo.'parc.zip';
            $file->tramite='Parceiro';
            $file->save();


        }


        DB::select('CALL add_revisao_reaberto(?)',[$request->pedido]);



        $data = array(
            'protocolo' => $request->protocolo,
            'status' => 'Em Análise',
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('resetsenhassistemas@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Reabertura de Protocolo');
        });


        return redirect::to('/parceiro')->with('message','Reaberto protocolo : '.$protocolo->protocolo.' com Sucesso !');


    }


}
