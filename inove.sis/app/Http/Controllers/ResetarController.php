<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;
use Redirect;
use App\User;
use DB;
use App\classe\minhaClasse;


class ResetarController extends Controller
{

    //resetar senha
    public function resetar(){

        return view('auth.passwords.email');

    }

    //recuperar
    public function recuperar(Request $request){

     //validation
        $this->validate($request,[
            'email'=>'required|email'
        ]);

        //buscar a conta de email do usuario

        $usuario = User::where('email',$request->email)->get();

        $cont=count($usuario);

        if($cont == 0){

           $erros_bd = ['O e-mail não está associado a nenhuma conta de usuário.'];

            return view('email.email',compact('erros_bd'));

        }

        //atualizar a senha nova do usuario no banco de dados (recuperacao)
         $usuario = $usuario->first();
        //criar uma nova senha aleatoria
         $nova_senha= minhaClasse::criarCodigo();
         $usuario->password = Hash::make($nova_senha);
         $usuario->primeiro_acesso=1;
         $usuario->recuperacao=2;
         $usuario->save();

         //enviar o email ao usuario com a nova senha
         //Mail::send(new emailRecuperarSenha($nova_senha))->to($usuario->email);

        $data= array(
         'nova_senha'=>$nova_senha,
          'linksis' =>'https://inove.sis.inovebartenders.com.br'
        );


        Mail::send('email.emailrecuperarsenha',$data ,function($msj) use ($usuario){
            $msj->from('resetsenhassistemas@gmail.com','Sistema Bartenders');
            $msj->to($usuario->email)->subject('Redefinição de Senha');
        });


        return redirect::to('resetar')->with('message','A senha foi resetada com sucesso por gentileza verificar a caixa de entrada ou spam do email !');
    }

}
