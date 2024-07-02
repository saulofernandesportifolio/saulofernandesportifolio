<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationMoneyFormRequest;
use App\Http\Requests\ValidationTransferFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function MongoDB\BSON\toJSON;
use App\User;
use App\Models\Historico;
use App\Models\Historico1;
use App\Models\Balanco;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Transferencia;
use App\SelectClientes;
use App\SelectClientesresultado;
use DB;
use PhpParser\Node\Expr\Empty_;

class BalancoController extends Controller
{

    private $totalPagesPaginate = 5;

    public function index()
    {
        /*
        if(empty($amount)){
            //$amount='0,00';
            DB::table('balancos')->insert(['user_id' => 1,'empresa_id'=>1]);
        }*/

        $balance = DB::table('balancos')->get();
        foreach ($balance as $bl) {
            $amount = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
        }
        //dd(auth()->user());
        //dd(auth()->user()->name);
        //dd(auth()->user()->balance);


        return view('admin.balance.index', compact('amount'));
    }

    public function depositarfiltro()
    {
        $tiposclientes = DB::table('tiposclientes')->get();
        return view('admin.balance.depositar_filtro', compact('tiposclientes'));
    }

    public function depositar(Request $request)
    {
         //validação de dados
        $this->validate($request, [
            'tipo_filtro' =>'required',

        ]);

        $depositante = Cliente::where('tipocli',$request->tipo_filtro)->orderby('nome')->get();
        //$tiposclientes = DB::table('tiposclientes')->get();
        return view('admin.balance.depositar', compact('depositante'));
    }

    public function depositarStore(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'valor' => 'required',
            'data' =>'required|date',
            'tipo_deposito' =>'required',
            'qtd_vezes' =>'required',
            'depositante' =>'required',
        ]);


       function moedaPhp($str_num){
        $resultado = str_replace('.', '', $str_num); // remove o ponto
        $resultado = str_replace(',', '.', $resultado); // substitui a vírgula por ponto
        return floatval($resultado); // transforma a saída em FLOAT
       }

       if($request->tipo_deposito == 'A vista' && $request->qtd_vezes == 'Dinheiro'){

          $balance = DB::table('balancos')->get();
          foreach ($balance as $bl) {

            //$montante= $bl->montante ? $bl->montante : 0;
            $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');

          }
         //$vlrref = $request->valor;
         //echo $request->valor;
         //echo '<br>';
         /*$nv=$request->valor;
         //echo '<br>';
           $request->valor-$nv;*/

         $mo = $montante ; //VALOR 1 250,59
         $mt = $request->valor;    //VALOR 2 20,19
         $vt = moedaPhp($mo) + moedaPhp($mt);  //SOMA
         //echo $vt; // retorna: 270.78

            $hist = new Historico;
            $hist->user_id = 1;
            $hist->type = 'DEPOSITO';
            $hist->montante = moedaPhp($mt);
            $hist->recebido = '0.00';
            $hist->valor_referente = moedaPhp($mt);
            $hist->total_antes = moedaPhp($mo);
            $hist->total_depois = $vt;
            $hist->user_id_transaction = $request->depositante;
            $hist->data = $request->data;
            $hist->tipo_compra = $request->tipo_deposito;
            $hist->observacao= $request->observacao;
            $hist->save();

            $balan = balanco::find(1);
            $balan->montante = $vt;
            $balan->save();

       }

       if($request->tipo_deposito == 'No debito' && $request->qtd_vezes == '1'){

           $tarifa=DB::table('cartoes')->select('tarifa')->get();
           foreach($tarifa as $tf){
             $tarifacalc = $tf->tarifa;
           }

          $vlrref = moedaPhp($request->valor);
         //echo $request->valor;
         //echo '<br>';
         $nv=moedaPhp($request->valor) * $tarifacalc/100;
         //echo '<br>';
          $vlrref-$nv;
         //echo '<br>';
          $vr=($vlrref-$nv)/$request->qtd_vezes;
         //echo '<br>';
          $vr=number_format($vr ? $vr: 0, '2', ',', '.');
         //echo '<br>';

         for($i=0;$i < $request->qtd_vezes;$i++) {

              $balance = DB::table('balancos')->get();
              foreach ($balance as $bl) {

                //$montante= $bl->montante ? $bl->montante : 0;
                $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
               }

             $mo = $montante ; //VALOR 1 250,59
             $mt = $vr;    //VALOR 2 20,19
             $vt = moedaPhp($mo) + moedaPhp($mt);  //SOMA


            $data = date('Y-m-d', strtotime("+$i month", strtotime($request->data)));
            $hist = new Historico;
            $hist->user_id = 1;
            $hist->type = 'DEPOSITO';
            $hist->montante = moedaPhp($mt);
            $hist->recebido = '0.00';
            $hist->valor_referente = $vlrref;
            $hist->total_antes = moedaPhp($mo);
            $hist->total_depois = $vt;
            $hist->user_id_transaction = $request->depositante;
            $hist->data = $data;
            $hist->tipo_compra = $request->tipo_deposito;
            $hist->observacao= $request->observacao;
            $hist->save();

            $balan = balanco::find(1);
            $balan->montante = $vt;
            $balan->save();

        }

      }

      if($request->tipo_deposito == 'No credito' && $request->qtd_vezes == '1'){
          //echo $request->valor;
          //echo '<br>';
         $tarifa1=DB::table('cartoes')->select('tarifa1')->get();
         foreach($tarifa1 as $tf1){
            $tarifacalc1 = $tf1->tarifa1;
         }

         $vlrref = moedaPhp($request->valor);

         $nv=moedaPhp($request->valor) * $tarifacalc1 /100;
         //echo '<br>';
          $vlrref-$nv;
        //echo '<br>';
        $vr=($vlrref-$nv)/$request->qtd_vezes;
        $vr=number_format($vr ? $vr: 0, '2', ',', '.');
        //echo '<br>';
        for($i=0;$i < $request->qtd_vezes;$i++) {

            $balance = DB::table('balancos')->get();
            foreach ($balance as $bl) {

                $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
            }

            $mo = $montante ; //VALOR 1 250,59
            $mt = $vr;    //VALOR 2 20,19
            $vt = moedaPhp($mo) + moedaPhp($mt);  //SOMA

            $data1 = date('Y-m-d', strtotime("+1 month", strtotime($request->data)));
            $data = date('Y-m-d', strtotime("+$i month", strtotime($data1)));
            $hist = new Historico;
            $hist->user_id = 1;
            $hist->type = 'DEPOSITO';
            $hist->montante = moedaPhp($mt);
            $hist->recebido = '0.00';
            $hist->valor_referente = $vlrref;
            $hist->total_antes = moedaPhp($mo);
            $hist->total_depois = $vt;
            $hist->user_id_transaction = $request->depositante;
            $hist->data = $data;
            $hist->tipo_compra = $request->tipo_deposito;
            $hist->observacao= $request->observacao;
            $hist->save();

            $balan = balanco::find(1);
            $balan->montante = $vt;
            $balan->save();
        }
      }

      if($request->tipo_deposito == 'No credito' && $request->qtd_vezes > '1'){

         //echo $request->valor;
         //echo '<br>';
         $tarifa2=DB::table('cartoes')->select('tarifa2')->get();
         foreach($tarifa2 as $tf2){
            $tarifacalc2 = $tf2->tarifa2;
         }
         $vlrref = moedaPhp($request->valor);

         $nv=moedaPhp($request->valor) * $tarifacalc2 /100;
         //echo '<br>';
          $vlrref-$nv;
          //echo '<br>';
          $vr=($vlrref-$nv)/$request->qtd_vezes;
          $vr=number_format($vr ? $vr: 0, '2', ',', '.');
         //echo '<br>';
         for($i=0;$i < $request->qtd_vezes;$i++) {

            $balance = DB::table('balancos')->get();
            foreach ($balance as $bl) {

                $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
            }

             $mo = $montante ; //VALOR 1 250,59
             $mt = $vr;    //VALOR 2 20,19
             $vt = moedaPhp($mo) + moedaPhp($mt);  //SOMA

            $data1 = date('Y-m-d', strtotime("+1 month", strtotime($request->data)));
            $data = date('Y-m-d', strtotime("+$i month", strtotime($data1)));
            $hist = new Historico;
            $hist->user_id = 1;
            $hist->type = 'DEPOSITO';
            $hist->montante = moedaPhp($mt);
            $hist->recebido = '0.00';
            $hist->valor_referente = $vlrref;
            $hist->total_antes = moedaPhp($mo);
            $hist->total_depois = $vt;
            $hist->user_id_transaction = $request->depositante;
            $hist->data = $data;
            $hist->tipo_compra = $request->tipo_deposito;
            $hist->observacao= $request->observacao;
            $hist->save();

            $balan = balanco::find(1);
            $balan->montante = $vt;
            $balan->save();
         }
      }


       return redirect('admin/balance')->with('success', 'Depósito recebido com sucesso!');

    }

    public function withdraw()
    {
        $depositante = Cliente::where('tipocli',3)->orderby('nome')->get();

        return view('admin.balance.withdraw', compact('depositante'));
    }

    public function withdrawStore(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'valor' => 'required',
            'data' =>'required|date',
            'sacado' =>'required',
        ]);


        function moedaPhp($str_num){
            $resultado = str_replace('.', '', $str_num); // remove o ponto
            $resultado = str_replace(',', '.', $resultado); // substitui a vírgula por ponto
            return floatval($resultado); // transforma a saída em FLOAT
        }

        
        $balance = DB::table('balancos')->get();
        foreach ($balance as $bl) {
            $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
        }

        $mo = $montante ; //VALOR 1 250,59
        $mt = $request->valor;    //VALOR 2 20,19
        $vt = moedaPhp($mo) - moedaPhp($mt);  //SOMA

        $sac = new Historico;
        $sac->user_id = 1;
        $sac->type = 'SAQUE';
        $sac->montante = moedaPhp($mt);
        $sac->recebido = '0.00';
        $sac->valor_referente = moedaPhp($mt);
        $sac->total_antes = moedaPhp($mo);
        $sac->total_depois =$vt;
        $sac->user_id_transaction = $request->sacado;
        $sac->data = $request->data;
        $sac->observacao= $request->observacao;
        $sac->save();

        $balan = balanco::find(1);
        $balan->montante = $vt;
        $balan->save();

        return redirect('admin/balance')->with('success', 'Saque efetuado com sucesso!');

    }


    public function transferifiltro()
    {
        $tiposclientes = DB::table('tiposclientes')->get();
        return view('admin.balance.transfer_filtro', compact('tiposclientes'));
    }


    public function transfer(Request $request)
    {
        if(empty($request->tipo_filtro)){

            return redirect()->back()->with('erros', 'Obrigatório preencher o campo tipo_filtro !');
        }

        $tipo_filtro = $request->tipo_filtro;

        $transferir = Cliente::where('tipocli',$tipo_filtro)->orderby('nome')->get();

        $balance = DB::table('balancos')->get();
        return view('admin.balance.transfer',  compact('balance','transferir'));
    }


    public function transferStore(Request $request)
    {

        if ($request->nome_transferencia === auth()->user()->id) {
            return redirect()
                ->back()
                ->with('error', 'Não é possivel transferir para você mesmo!');
        }

        //validação de dados
        $this->validate($request, [
            'nome_transferencia' =>'required',
            'valor' =>'required',
            'data' =>'required',
        ]);

        function moedaPhp($str_num){
            $resultado = str_replace('.', '', $str_num); // remove o ponto
            $resultado = str_replace(',', '.', $resultado); // substitui a vírgula por ponto
            return floatval($resultado); // transforma a saída em FLOAT
        }


        $balance = DB::table('balancos')->get();
        foreach ($balance as $bl) {
            $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
        }

        $mo = $montante ; //VALOR 1 250,59
        $mt = $request->valor;    //VALOR 2 20,19
        $vt = moedaPhp($mo) - moedaPhp($mt);  //SOMA


        $trans = new Historico;
        $trans->user_id = 1;
        $trans->type = 'TRANSFERENCIA';
        $trans->montante = moedaPhp($mt);
        $trans->recebido = '0.00';
        $trans->valor_referente = moedaPhp($mt);
        $trans->total_antes = moedaPhp($mo);
        $trans->total_depois =$vt;
        $trans->user_id_transaction = $request->nome_transferencia;
        $trans->data = $request->data;
        $trans->observacao= $request->observacao;
        $trans->save();

        $balan = balanco::find(1);
        $balan->montante = $vt;
        $balan->save();

        $nomet = DB::table('clientes')->where('id','=',$request->nome_transferencia)->get();
        foreach($nomet as $nt){
            $nometrans = $nt->nome;
        }

        return redirect('admin/balance')->with('success', 'Transferência para '.$nometrans.' efetuada com sucesso!');
    }




    public function pagamento()
    {
        return view('admin.balance.pagamento');
    }

    public function pagarStore(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'valor' =>'required',
            'data' =>'required|date',
            'Descricao_do_Pagamento' =>'required',
        ]);

        function moedaPhp($str_num){
            $resultado = str_replace('.', '', $str_num); // remove o ponto
            $resultado = str_replace(',', '.', $resultado); // substitui a vírgula por ponto
            return floatval($resultado); // transforma a saída em FLOAT
        }

        $balance = DB::table('balancos')->get();
        foreach ($balance as $bl) {
            $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
        }

        $mo = $montante ; //VALOR 1 250,59
        $mt = $request->valor;    //VALOR 2 20,19
        $vt = moedaPhp($mo) - moedaPhp($mt);  //SOMA

        $pag = new Historico;
        $pag->user_id = 1;
        $pag->type = 'PAGAMENTO';
        $pag->montante = moedaPhp($mt);
        $pag->recebido = '0.00';
        $pag->valor_referente = moedaPhp($mt);
        $pag->total_antes = moedaPhp($mo);
        $pag->total_depois =$vt;
        $pag->user_id_transaction = $request->tipoacao;
        $pag->data = $request->data;
        $pag->observacao= $request->observacao;
        $pag->save();

        $balan = balanco::find(1);
        $balan->montante = $vt;
        $balan->save();

        return redirect('admin/balance')->with('success', 'Pagamento efetuado com sucesso!');

    }


    public function historic()
    {
        $historics = DB::table('historicos as a')
                    ->select('a.id',
                             'a.user_id',
                             'a.type',
                             'a.tipo_compra',
                             'a.montante',
                             'a.recebido',
                             'a.valor_referente',
                             'a.total_antes',
                             'a.total_depois',
                             'b.nome as nomecli',
                             DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                             'a.observacao')
                    ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
                    ->orderby('a.id', 'asc')
                    ->get();
      
 $empresa= 'Inove Bartenders';
       $total = DB::table('historicos as a')
            ->select(DB::raw('SUM(a.montante) as total_geral'))
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->get();
       /*
        $historics = DB::table('historicos as a')
            ->select('a.id',
                'a.user_id',
                'a.type',
                'a.tipo_compra',
                'a.montante',
                'a.recebido',
                'a.valor_referente',
                'a.total_antes',
                'a.total_depois',
                'b.nome as nomecli',
                DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                'a.observacao')
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->paginate($this->totalPagesPaginate);*/

        $date1='';
        $date2='';
        $tipo='';
        $tipocompra='';
        $total1 = DB::table('historicos as a')
            ->select(DB::raw('a.total_antes as total_geral_antes'),
                DB::raw('a.total_depois as total_geral_depois'))
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->where('a.type','=','DEPOSITO')
            ->orderby('a.id', 'desc')
            ->limit(1)
            ->get();

     /*$links = $historics
            ->appends(['empresa' => $empresa, 'historics' => $historics,'total' => $total, 'total1' => $total1 ,'date1' => $date1, 'date2' => $date2, 'tipo' => $tipo, 'tipocompra' => $tipocompra])
            ->links();*/

        return view('admin.balance.historics',['empresa' => $empresa], compact('historics','total','total1','date1','date2','tipo','tipocompra'));

    }

    public function searchHistoric(Request $request)
    {

        if(empty($request->type)){

            $request->type="%";
        }
        if(empty($request->tipocompra)){

            $request->tipocompra="%";
        }
        if(!empty($request->date1) && !empty($request->date2)){
        $historics = DB::table('historicos as a')
            ->select('a.id',
                'a.user_id',
                'a.type',
                'a.tipo_compra',
                'a.montante',
                'a.recebido',
                'a.valor_referente',
                'a.total_antes',
                'a.total_depois',
                'b.nome as nomecli',
                DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                'a.observacao')
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->whereBetween('a.data', [$request->date1, $request->date2])
            ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
            ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
            ->orderby('a.id', 'asc')
            ->get();
         
        $empresa= 'Inove Bartenders';
        $total = DB::table('historicos as a')
            ->select(DB::raw('SUM(a.montante) as total_geral'))
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->whereBetween('a.data', [$request->date1, $request->date2])
            ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
            ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
            ->get();

            $total1 = DB::table('historicos as a')
                ->select(DB::raw('a.total_antes as total_geral_antes'),
                    DB::raw('a.total_depois as total_geral_depois'))
                ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
                ->whereBetween('a.data', [$request->date1, $request->date2])
                ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
                ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
                ->orderby('a.id', 'desc')
                ->limit(1)
                ->get();
        /*
        $historics = DB::table('historicos as a')
            ->select('a.id',
                'a.user_id',
                'a.type',
                'a.tipo_compra',
                'a.montante',
                'a.recebido',
                'a.valor_referente',
                'a.total_antes',
                'a.total_depois',
                'b.nome as nomecli',
                DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                'a.observacao')
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->whereBetween('a.data', [$request->date1, $request->date2])
            ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
            ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
            ->paginate($this->totalPagesPaginate); */


            $date1=$request->date1;
            $date2=$request->date2;
            $tipo=$request->type;
            $tipocompra=$request->tipocompra;
        }else{
            $historics = DB::table('historicos as a')
                ->select('a.id',
                    'a.user_id',
                    'a.type',
                    'a.tipo_compra',
                    'a.montante',
                    'a.recebido',
                    'a.valor_referente',
                    'a.total_antes',
                    'a.total_depois',
                    'b.nome as nomecli',
                    DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                    'a.observacao')
                ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
                ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
                ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
                ->orderby('a.id', 'asc')
                ->get();
            //->paginate($this->totalPagesPaginate);
            $empresa= 'Inove Bartenders';
            $total = DB::table('historicos as a')
                ->select(DB::raw('SUM(a.montante) as total_geral'))
                ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
                ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
                ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
                ->get();
            /*
            $historics = DB::table('historicos as a')
                ->select('a.id',
                    'a.user_id',
                    'a.type',
                    'a.tipo_compra',
                    'a.montante',
                    'a.recebido', 
                    'a.valor_referente',
                    'a.total_antes',
                    'a.total_depois',
                    'b.nome as nomecli',
                    DB::raw('DATE_FORMAT(a.data , "%d/%m/%Y") as data'),
                    'a.observacao')
                ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
                ->where([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','like','%'.$request->tipocompra.'%']])
                ->orWhere([['a.type','like', '%'.$request->type.'%'],['a.tipo_compra','=', NULL]])
                ->paginate($this->totalPagesPaginate);*/

            $date1=$request->date1;
            $date2=$request->date2;
            $tipo=$request->type;
            $tipocompra=$request->tipocompra;
        }

        $total1 = DB::table('historicos as a')
            ->select(DB::raw('a.total_antes as total_geral_antes'),
                DB::raw('a.total_depois as total_geral_depois'))
            ->leftJoin('clientes as b','b.id','=','a.user_id_transaction')
            ->where('a.type','=','DEPOSITO')
            ->orderby('a.id', 'desc')
            ->limit(1)
            ->get();
               
     /*        $_token = $request->except('_token');


     $links = $historics
            ->appends(['empresa' => $empresa, 'historics' => $historics,'total' => $total, 'total1' => $total1 ,'date1' => $date1, 'date2' => $date2, 'tipo' => $tipo, 'tipocompra' => $tipocompra,'_token'=> $_token])
            ->links();*/

                   return view('admin.balance.historics',['empresa' => $empresa], compact('historics','total','total1','date1','date2','tipo','tipocompra'));
    }


    public function historicexcluir($id)
    {


        DB::table('historicos')->delete(['id' => $id]);

        DB::select('CALL tratarsaldo');

        DB::select('CALL tratarsaldo1');

        $montante1=DB::table('historicos')->orderby('id','desc')->limit(1)->get();

        foreach ($montante1 as $mt){

            $montante=$mt->total_depois;
        }

        DB::table('balancos')->where('id','=',1)->update(['montante' => $montante]);

        return redirect('admin/historic')->with('success', 'Excluido com sucesso!');
    }

    public function recebidoStore($id)
    {
        /*//validação de dados
        $this->validate($request, [
            'valor' => 'required',
            'data' =>'required|date',
            'sacado' =>'required',
        ]);*/


        function moedaPhp($str_num){
            $resultado = str_replace('.', '', $str_num); // remove o ponto
            $resultado = str_replace(',', '.', $resultado); // substitui a vírgula por ponto
            return floatval($resultado); // transforma a saída em FLOAT
        }

        
        $balance = DB::table('balancos')->get();
        foreach ($balance as $bl) {
            $montante = number_format($bl->montante ? $bl->montante : 0, '2', ',', '.');
        }

        $hist = Historico::where('id','=',$id)->first();

        /*
        $mo = $montante ; //VALOR 1250,59
        $mt = $request->valor;    //VALOR 2 20,19*/

        $mo = $montante ; //VALOR total
        //echo '<br>';
        $mt = $hist->montante;    //VALOR a descontar
        //echo '<br>';
        //echo moedaPhp($mt); 
        //echo '<br>';
        $vt = moedaPhp($mo) - $mt;  //subtrai*/
        
        $sac = Historico::find($id);
        $sac->user_id = 1;
        $sac->type = 'RECEBIDO';
        $sac->montante = 0;
        $sac->recebido = $mt;
        $sac->total_antes = 0;
        $sac->total_depois =0;
        $sac->data = $hist->data;
        $sac->observacao= $hist->observacao;
        $sac->save();

        $balan = balanco::find(1);
        $balan->montante = $vt;
        $balan->save();


        
        DB::select('CALL tratarsaldo');

        DB::select('CALL tratarsaldo1');

        $montante1=DB::table('historicos')->orderby('id','desc')->limit(1)->get();

        foreach ($montante1 as $mt){

            $montante=$mt->total_depois;
        }

        DB::table('balancos')->where('id','=',1)->update(['montante' => $montante]);

        return Redirect()->back()->with('message', 'Valor Recebido com sucesso!');

    }

    public function zerarbd()
    {

        DB::table('balancos')->truncate();
        DB::table('historicos')->truncate();

        DB::table('balancos')->insert(['user_id' => 1],['montante' => 0], ['empresa_id' => 1]);


        return redirect('admin/balance')->with('success', 'Banco zerado com sucesso!');
    }

}
