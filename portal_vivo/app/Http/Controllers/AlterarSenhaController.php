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

class AlterarSenhaController extends Controller
{

     public function index(){

         return view('login.altera_senha');
     }


      public function salvar(Request $request){

          $this->validate($request,[
              'password'=>'required|between:6,15',
              'password_confirmation'=>'required|same:password'
          ]);

          $iduser=Input::get('iduser');

          $nsenha=Hash::make(Input::get('password'));


          //registrar dados

          $request= User::find($iduser);
          $request->password=$nsenha;
          $request->primeiro_acesso=2;
          $request->update();

          //$message=['Senha alterada com sucesso !'];

          //return view('home')->with(compact('message'));

          return redirect('/')->with('message','Senha alterada com sucesso !');
      }


}      