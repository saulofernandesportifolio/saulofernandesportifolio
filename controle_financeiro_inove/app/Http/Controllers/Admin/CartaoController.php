<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cartao;
use DB;
class CartaoController extends Controller
{
    private $totalPagesPaginate = 5;

    public function atualizar()
    {

        $cartao = DB::table('cartoes')->get();

        return view('admin.cartao.cartao', compact('cartao'));
    }

    public function tarifasalvar(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'tarifa_no_debito' =>'required',
            'tarifa_no_credito_1_vez' =>'required',
            'tarifa_no_credito_2_vezes_ou_mais' =>'required',
        ]);

        DB::table('cartoes')->truncate();
        $sac = new Cartao;
        $sac->tarifa = $request->tarifa_no_debito;
        $sac->tarifa1 = $request->tarifa_no_credito_1_vez;
        $sac->tarifa2 = $request->tarifa_no_credito_2_vezes_ou_mais;
        $sac->save();
        $cliente = DB::table('tiposclientes')->get();
        return redirect('cadastro-tarifa-cartao')->with('success', 'Tarifas cadastradas com sucesso!');
    }

}
