<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;
use App\User;
use DB;
use Input;
use Auth;

class AlterarSenhaController extends Controller
{

     public function index(){

         return view('usuario.altera_senha');
     }


      public function salvar(Request $request){

          $this->validate($request,[
              'password'=>'required|between:6,15',
              'password_confirmation'=>'required|same:password'
          ]);

          $iduser=$request->iduser;

          $nsenha=Hash::make($request->password);


          //registrar dados

          $request= User::find($iduser);
          $request->password=$nsenha;
          $request->primeiro_acesso=2;
          $request->update();

          //$message=['Senha alterada com sucesso !'];

          //return view('home')->with(compact('message'));

          return redirect('/listaevento')->with('message','Senha alterada com sucesso !');
      }


}      