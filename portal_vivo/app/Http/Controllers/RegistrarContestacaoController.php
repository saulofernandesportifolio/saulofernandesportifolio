<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;
use Redirect;
use App\User;
use DB;
use App\classe\minhaClasse;
use Input;

class RegistrarContestacaoController extends Controller
{

    //resetar senha
    public function registrar(){

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            return view('login.register_contestacao');

        }

    }

    //resetar senha
    public function verificarregistrar(Request $request){


        $this->validate($request, [
                're' => 'required|between:3,60|string',
                'nome' => 'required|between:3,60|string',
                'cpf'=>'required|min:11',
                'email' => 'required|email',
                'perfil' => 'required|alpha_num',
            ]);


            //verificar se já exite o RE
            $dados = DB::table('users')
                ->where('usuario', '=', $request->re)
                ->get();
            $cont = count($dados);
            if ($cont != 0) {
                $erros_bd = ['Já exixte um usuário com o mesmo RE'];

                return view('login.register_contestacao', compact('erros_bd'));
            }
            //verificar se já exite o email
            $dados1 = DB::table('users')
                     ->where('email', '=', $request->email)
                     ->get();
             $cont1 = count($dados1);
            if ($cont1 != 0) {
               $erros_bd = ['Já exixte um usuário com o mesmo e-mail'];

               return view('login.register_contestacao', compact('erros_bd'));
            }

            //verificar se já exite o cpf
            $dados1 = DB::table('users')
                      ->where('cpf', '=', $request->cpf)
                      ->get();
            $cont1 = count($dados1);
            if ($cont1 != 0) {
                 $erros_bd = ['Já exixte um usuário com o mesmo CPF'];

                return view('login.register_contestacao', compact('erros_bd'));
            }

            //inserir novo usuario
            $novo = new User;
            $novo->usuario = strtoupper($request->re);
            $novo->nome = strtoupper($request->nome);
            $novo->cnpj_cpf = $request->cpf;
            $novo->email = $request->email;
            $nova_senha = minhaClasse::criarCodigo();
            $novo->password = Hash::make($nova_senha);
            $novo->perfil = $request->perfil;
            $novo->turno = $request->turno;
            $novo->statususer = 1;
            $novo->primeiro_acesso = 1;
            $novo->save();


            $data = array(
                'login' => $novo->usuario,
                'nova_senha' => $nova_senha,
                'linksis' => 'http://portal.vivo.absbrasil.com'
            );


            Mail::send('email.emailcriacaosenha', $data, function ($msj) use ($novo) {
                $msj->from('resetsenhassistemas@gmail.com', 'Portal de Atendimento Massivo');
                $msj->to($novo->email)->subject('Criação de Usuário');
            });


            return redirect('/registrar_contestacao')->with('message', 'Usuário Cadastrado com Sucesso, e-mail com a senha e usuario enviado para a conta cadastrada !');


    }
}
