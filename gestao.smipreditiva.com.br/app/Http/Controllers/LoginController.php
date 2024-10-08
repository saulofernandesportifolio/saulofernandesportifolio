<?php

namespace App\Http\Controllers;

use App\Contestacoes;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Khill\Lavacharts\Lavacharts;
use Mail;
use Session;
use Redirect;
use App\User;
use DB;
use App\classe\minhaClasse;
use Input;

class LoginController extends Controller
{
    public function index(){
        //$message=0;
        if(!Session::has('login')){

            return $this->login()
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            return redirect::to('/home');

        }

    }

    //retornar a pagina de login
    public function login(){

        return view('login.login');

    }

    //deslogar do sistema
    public function logout(){
       //logout destruir a sessão e redirecionar para a pagina de login
        Session::flush();

        return redirect::to('/')->with('message','Usuário Deslogado com Sucesso !');

    }

    //retornar a pagina de login
    public function executarlogin(Request $request){


        $this->validate($request,[
         'usuario'=>'required',
         'password'=>'required'
        ]);

        //verificar se o usuário existe
        $usuario=DB::table('users')->where('usuario','=',$request->usuario)->first();
         $cont=count($usuario);
        if($cont == 0){
           $erros_bd =['Essa conta de usuário não existe !'];

            return Redirect::to('/')
                ->with('erros','Essa conta de usuário não existe !');

        }else
        //verificar se a senha corresponde com a do banco de dados
        if(!Hash::check($request->password,$usuario->password)){
            $erros_bd =['A senha está incorreta!'];

            return Redirect::to('/')
                ->with('erros','A senha está incorreta!');

         }
         //abrir session usuarios
         Session::put('login','sim');
         Session::put('usuario',$usuario->usuario);
         Session::put('nome',$usuario->nome);
         Session::put('perfil',$usuario->perfil);
         Session::put('primeiro_acesso',$usuario->primeiro_acesso);
         Session::put('iduser',$usuario->id);
         Session::put('email',$usuario->email);
         Session::put('cliente',$usuario->cliente);

        if($usuario->primeiro_acesso == 1){

            $iduser = Session::has('iduser');
            return view('login.altera_senha',['iduser' => $iduser]);

        }


        //identifica perfil clientes
        if($usuario->perfil == 2)
        {

            return redirect::to('/cliente/home');

        }

        if($usuario->perfil == 3)
        {

            return redirect::to('/cliente/conta/home');

        }

        elseif($usuario->perfil == 6 )
        {

            return redirect::to('/contestacao');
        }

        else{


            return Redirect::to('/');

        }
    }

}
