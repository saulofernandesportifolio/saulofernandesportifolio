<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use App\Ocorrecncia;
use Storage;
use Input;
use Zipper;
use Mail;
use App\User;
use App\Alarme;
use App\Recomendacao;


class AlarmesController extends Controller
{

    public function index()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $alarmes = Alarme::lists('alarme','id');
            $ocorrencias = Ocorrencia::all('id');

             //pagina contestacoes motivos
            return view('ocorrencia.alarme',compact('alarmes'));

        }
    }

    public function getRecomendacao(Request $request, $id){
        if($request->ajax()){
            $recoemendacaos = Recomendacao::recoemndacaos($id);
            return response()->json($recoemendacaos);

        }
    }



}
