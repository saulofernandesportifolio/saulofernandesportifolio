<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Session;
use Redirect;
use DB;
use App\Parceiro;
use App\Contestacoes;
use Storage;
use Input;
use Zipper;
use Mail;
use App\User;
use App\Motivo;
use App\Submotivo;
use App\File;



class ContestacoesController extends Controller
{

    public function index()
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
            $visao = DB::table('contestacoes as a')
                ->select('a.data_criacao','a.id')
                ->where('a.status','=','Em Análise')
                ->orWhere('a.status','=','Reanálise')
                ->get();


            foreach($visao as $visaoa){
                $visa = $visaoa->data_criacao;
                $iden = $visaoa->id;
                $diascorre=DiasUteis(date('d/m/Y',strtotime(substr($visa,0,10))));
                /*echo '<br>';
                echo $diascorre=DiasUteis(date('d/m/Y',strtotime(substr($visa,0,10))));
                echo '<br>';
                echo $iden;*/

                if($diascorre > 2){
                    $sla='Fora';
                }else{
                    $sla='Dentro';
                }

                $diac=DB::table('contestacoes as a')
                    ->where('a.id', '=',$iden)
                    ->update(['a.dias' => $diascorre,'a.sla' => $sla]);
            }




            $protocolos = DB::select('CALL fila_contestacoes(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_contestacoes')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

             $tl=count($protocolos);

             //pagina contestacoes
            return view('contestacoes.contestacoes', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }
    }

    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
              $request->pesquisa='%';
        }

        $protocolos = DB::select('CALL fila_contestacoes(?,?)', [Session::get('iduser'),$request->pesquisa]);
        $protocolos = DB::table('fila_contestacoes')->simplePaginate(6);


        return $this->index()->with(['protocolos' => $protocolos]);
    }


    public function novo($id)
    {

        if(empty($id)) {
            $id = Input::get('id');
        }
         $motivos = Motivo::lists('motivo','id');

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_visualiza_contestacoes(?)',[$id]);

        return view('contestacoes.form',['protocolos' => $protocolos], compact('motivos'));
    }

    public function getSubmotivos(Request $request, $id){
        if($request->ajax()){
            $submotivos = Submotivo::submotivos($id);
            return response()->json($submotivos);

        }
    }


    public function visualiza($id)
    {

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_visualiza_contestacoes_abertas(?)',[$id]);

        //pagina contestacao para visualizar os dados
        return view('contestacoes.form_visualiza',['protocolos' => $protocolos]);

    }


    public function fechado()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $protocolos = DB::select('CALL fila_contestacoes_fechado(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_contestacoes_fechado')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

            $tl=count($protocolos);

            //pagina contestacao
            return view('contestacoes.contestacoes_fechados', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }

    }


    public function fechadosup()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $protocolos = DB::select('CALL fila_contestacoes_fechado_sup(?)', ['%']);
            $protocolos = DB::table('fila_contestacoes_fechado_sup')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

            $tl=count($protocolos);

            //pagina contestacao
            return view('contestacoes.contestacoes_fechados_sup', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }

    }


    public function busca_fechadosup(Request $request)
    {


        if(empty($request->pesquisa)){
            $request->pesquisa='%';
        }

        $protocolos = DB::select('CALL fila_contestacoes_fechado_sup(?)',[$request->pesquisa]);
        $protocolos = DB::table('fila_contestacoes_fechado_sup')->simplePaginate(6);


        return $this->fechadosup()->with(['protocolos' => $protocolos]);
    }



    public function editarsup($id)
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{



            $protocolos = DB::select('CALL fila_contestacoes_fechado_sup_editar(?)', [$id]);
            $protocolos = DB::table('fila_contestacoes_fechado_sup_editar')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $idm=$prot->idmotivo;
                $idm2=$prot->idsubmotivo;
            }

             $motivos = DB::table('motivos')->select('motivo','id')->where('id','=',$idm)->get();

             $motivos2 = DB::table('motivos')->select('motivo','id')->get();

             $submotivos2 = DB::table('submotivos')->select('submotivo','id')->where('id','=',$idm2)->get();

            //pagina contestacao
            return view('contestacoes.form_editar', ['protocolos' => $protocolos,'motivos' => $motivos,'motivos2' => $motivos2,'submotivos2' => $submotivos2]);

        }
    }


    public function salvareditarsup(Request $request)
    {

        $request->id;
        //validação de dados
        $this->validate($request, [
            'protocolo' =>'required|string',
            'descricao' => 'required|string',
            'motivo'    =>'required|string',
            'submotivo' =>'required|string',
            'status'    =>'required|string'
        ]);

        //validação de dados
        $this->validate($request, [
            'anexo' => 'mimes:jpg,jpeg|max:4000'
        ]);


        //atualiza os dados
        $protocolo = Contestacoes::find($request->id);
        $protocolo->id_contestacao_op= Session::get('iduser');
        $protocolo->descricao = $request->descricao;
        $protocolo->motivos = $request->motivo;
        $protocolo->submotivos = $request->submotivo;
        $protocolo->status = $request->status;
        $protocolo->save();

        //atualiza os dados
        $protocolo = Parceiro::find($request->id_parc);
        $protocolo->status = $request->status;
        $protocolo->save();



        if(!empty(Input::file('filename'))){

            if ($request->hasfile('filename')) {

                $files = $request->file('filename');

                foreach ($files as $file) {
                    if (!empty($file)) {
                        $name = $file->getClientOriginalName();
                        $file->move(public_path() . '/images/'.$protocolo->protocolo.'contes', $name);

                        $data[] = $name;

                        $files = glob(public_path('images/'.$protocolo->protocolo.'contes/*.jpg'));
                        \Zipper::make(public_path('/images/'.$protocolo->protocolo.'contes.zip'))->add($files)->close();

                    }

                }

            }
        }



        if(!empty(Input::file('filename')) && !empty($data)) {
            $file = new File;
            $file->filename = json_encode($data);
            $file->protocolo = $protocolo->protocolo;
            $file->endereco_anexo = '/images/'.$protocolo->protocolo.'contes';
            $file->endereco_download='/images/'.$protocolo->protocolo.'contes.zip';
            $file->tramite='Contestacao';
            $file->save();


        }


        $data = array(
            'protocolo' => $request->protocolo,
            'status' => $request->status,
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('sistemaadmaviso@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Ateração de Status');
        });


        return redirect::to('/contestacao/fechado_sup')->with('message','Atualizado o protocolo : '.$protocolo->protocolo.' com Sucesso !');


    }





    public function busca_fechado(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
        }

        $protocolos = DB::select('CALL fila_contestacoes_fechado(?,?)', [Session::get('iduser'),$request->pesquisa]);
        $protocolos = DB::table('fila_contestacoes_fechado')->simplePaginate(6);


        return $this->fechado()->with(['protocolos' => $protocolos]);
    }


    public function visualiza_fechado($id)
    {

        //seleciona os dados para retorno da
        $protocolos = DB::select('CALL form_visualiza_contestacoes_fechado(?)',[$id]);
        $motivop='';
        foreach($protocolos as $protmotivo){

            $motivop.=$protmotivo->motivo;
        }


        //pagina contestacao para visualizar os dados
        return view('contestacoes.form_visualiza_fechados',['protocolos' => $protocolos,'motivop' => $motivop]);

    }


    public function reabrir(Request $request)
    {

        //validação de dados
        $this->validate($request, [
            'id' => 'required'

        ]);

         //insere os dados com o novo protocolo criado
        $protocolo = new Parceiro;
        $protocolo->pedido = $request->pedido;
        $protocolo->protocolo = $request->protocolo;
        $protocolo->cnpj_cpf = $request->cnpj_cpf;
        $protocolo->descricao_defesa = $request->descricao_defesa;
        $protocolo->status = 'Reanálise';
        $protocolo->email = $request->email;
        $protocolo->id_parceiro=Session::get('iduser');
        $protocolo->reaberto='Sim';
        $protocolo->save();



        $data = array(
            'protocolo' => $protocolo->protocolo,
            'status' => 'Reanálise',
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('sistemaadmaviso@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Alteração de Status');
        });


        //pagina contestacao para visualizar os dados
        return Redirect::to('contestacao/form_reaberto');


    }

    public function abrirform()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $protocolos = DB::select('CALL fila_contestacoes(?,?)', [Session::get('iduser'),'%']);
            $protocolos = DB::table('fila_contestacoes')->simplePaginate(6);

            foreach ($protocolos as $prot){

                $total=$prot->total;
            }
            if(empty($total)){
                $total=0;
            }

            $tl=count($protocolos);

            //pagina contestacao
            return view('contestacoes.form_reaberto', ['protocolos' => $protocolos,'tl'=>$tl,'total'=>$total]);

        }
    }

    public function salvarreaberto(Request $request)
    {

        //echo $request->id;
        //validação de dados
        $this->validate($request, [
            'protocolo' =>'required|string',
            'descricao_defesa' => 'required|string',
            'anexo' => 'image|mimes:jpeg,png,jpg|max:4000'
        ]);


        //upload img verifica se o campo esta diferente de vazio primeiro
        if(!empty($request->anexo)) {

            $image = $request->file('anexo');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/' . $input['imagename']);
            $image->move($destinationPath, $input['imagename']);

            \Zipper::make(public_path('/images/' . $input['imagename'] . '/' . $input['imagename'] . '.zip'))->add($destinationPath, $input['imagename'])->close();
        }

        //atualiza os dados com o novo protocolo criado
        $protocolo = Parceiro::find($request->id);
        $protocolo->descricao_defesa = $request->descricao_defesa;
        //verifica se o campo esta diferente de vazio
        if(!empty($request->anexo)) {
            $protocolo->endereco_anexo = '/images/' . $input['imagename'] . '/' . $input['imagename'];
            $protocolo->endereco_download = '/images/' . $input['imagename'] . '/' . $input['imagename'] . '.zip';
        }
        $protocolo->save();


        DB::select('CALL add_revisao_reaberto(?)',[$request->pedido]);



        $data = array(
            'protocolo' => $request->protocolo,
            'status' => 'Em Análise',
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('sistemaadmaviso@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Reabertura de Protocolo');
        });


        return redirect::to('/contestacao')->with('message','Reaberto protocolo : '.$protocolo->protocolo.' com Sucesso !');


    }


    public function salvarcontestacao(Request $request)
    {

        $request->id;
        //validação de dados
        $this->validate($request, [
            'protocolo' =>'required|string',
            'descricao' => 'required|string',
            'motivo'    =>'required|string',
            'submotivo' =>'required|string',
            'status'    =>'required|string'
        ]);

        //validação de dados
        $this->validate($request, [
            'anexo' => 'mimes:jpg,jpeg|max:4000'
        ]);


        //atualiza os dados
        $protocolo = Contestacoes::find($request->id);
        $protocolo->id_contestacao_op= Session::get('iduser');
        $protocolo->descricao = $request->descricao;
        $protocolo->motivos = $request->motivo;
        $protocolo->submotivos = $request->submotivo;
        $protocolo->status = $request->status;
        $protocolo->save();

        //atualiza os dados
        $protocolo = Parceiro::find($request->id_parc);
        $protocolo->status = $request->status;
        $protocolo->save();



        if(!empty(Input::file('filename'))){

            if ($request->hasfile('filename')) {

                $files = $request->file('filename');

                foreach ($files as $file) {
                    if (!empty($file)) {
                        $name = $file->getClientOriginalName();
                        $file->move(public_path() . '/images/'.$protocolo->protocolo.'contes', $name);

                        $data[] = $name;

                        $files = glob(public_path('images/'.$protocolo->protocolo.'contes/*.jpg'));
                        \Zipper::make(public_path('/images/'.$protocolo->protocolo.'contes.zip'))->add($files)->close();

                    }

                }

            }
        }



        if(!empty(Input::file('filename')) && !empty($data)) {
            $file = new File;
            $file->filename = json_encode($data);
            $file->protocolo = $protocolo->protocolo;
            $file->endereco_anexo = '/images/'.$protocolo->protocolo.'contes';
            $file->endereco_download='/images/'.$protocolo->protocolo.'contes.zip';
            $file->tramite='Contestacao';
            $file->save();


        }


        $data = array(
            'protocolo' => $request->protocolo,
            'status' => $request->status,
            'linksis' => 'http://portal.vivo.absbrasil.com'
        );


        Mail::send('email.emailstatusparceiro', $data, function ($msj) use ($protocolo) {
            $msj->from('sistemaadmaviso@gmail.com', 'Portal de Atendimento');
            $msj->to($protocolo->email)->subject('Ateração de Status');
        });


        return redirect::to('/contestacao')->with('message','Atualizado o protocolo : '.$protocolo->protocolo.' com Sucesso !');


    }




}
