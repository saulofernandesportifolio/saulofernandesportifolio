<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use App\Contestacoes;
use Storage;
use Input;
use Zipper;
use Mail;
use App\User;
use App\Motivo;
use App\Submotivo;


class MotivosController extends Controller
{

    public function index()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $motivos = Motivo::lists('motivo','id');
            $protocolos = Contestacoes::all('id');

             //pagina contestacoes motivos
            return view('contestacoes.motivos',compact('motivos'));

        }
    }

    public function getSubmotivos(Request $request, $id){
        if($request->ajax()){
            $submotivos = Submotivo::submotivos($id);
            return response()->json($submotivos);

        }
    }



}
