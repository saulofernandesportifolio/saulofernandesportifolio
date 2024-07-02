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

class RegistrarTelefonicaController extends Controller
{
    //resetar senha
    public function registrar(){

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            return view('login.register_telefonica');

        }

    }

    //resetar senha
    public function verificarregistrar(Request $request){


        $this->validate($request, [
                'login' => 'required|between:3,60|string',
                'nome' => 'required|between:3,60|string',
                'cpf'=>'required|min:11',
                'email' => 'required|email',
                'perfil' => 'required|alpha_num',
            ]);


            //verificar se já exite o login redecorp
            $dados = DB::table('users')
                ->where('usuario', '=', $request->login)
                ->get();
            $cont = count($dados);
            if ($cont != 0) {
                $erros_bd = ['Já exixte um usuário com o mesmo Login Redecorp'];

                return view('login.register_telefonica', compact('erros_bd'));
            }

            //verificar se já exite o email
             $dados1 = DB::table('users')
                      ->where('usuario', '=', $request->email)
                      ->get();
              $cont1 = count($dados1);
             if ($cont1 != 0) {
                 $erros_bd = ['Já exixte um usuário com o mesmo e-mail'];

                 return view('login.register_telefonica', compact('erros_bd'));
             }

             //verificar se já exite o cpf
             $dados2 = DB::table('users')
                       ->where('cnpj_cpf', '=', $request->cpf)
                       ->get();
             $cont2 = count($dados2);
             if ($cont2 != 0) {
                 $erros_bd = ['Já exixte um usuário com o mesmo CPF'];

                return view('login.register_telefonica', compact('erros_bd'));
             }


             //inserir novo usuario
            $novo = new User;
            $novo->usuario = strtoupper($request->login);
            $novo->nome = strtoupper($request->nome);
            $novo->cnpj_cpf = $request->cnpj_cpf;
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


            return redirect('/registrar_telefonica')->with('message', 'Usuário Cadastrado com Sucesso, e-mail com a senha e usuario enviado para a conta cadastrada !');


    }

    public function formemail()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            //pagina parceiro
            return view('telefonica.form_altera_email');

        }
    }

    //resetar senha
    public function salvaremail(Request $request){

        $this->validate($request, [
            'adabas' => 'required|between:3,60|string',
            'email' => 'required|email',
        ]);

        //verificar se já exite o adabas
        $dados = DB::table('users')
            ->where('email', '=', $request->email)
            ->get();
        $cont = count($dados);
        if ($cont != 0){

            return redirect::to('/email_alterar')->with('erros','Já existe um adabas com o mesmo e-mail');
        }

        //verificar se já exite o adabas
        $dados1 = DB::table('users')
            ->where('usuario', '=', $request->adabas)
            ->get();
        $cont1 = count($dados1);
        if ($cont1 == 0){

            return redirect::to('/email_alterar')->with('erros','Não existe este usuário no sistema !');
        }

        foreach($dados1 as $dd){
            echo $dd->id;
        }


        //atualiza os dados com o novo protocolo criado
        $telefonica = User::find($dd->id);
        $telefonica->email = $request->email;
        $telefonica->save();

        return redirect('/email_alterar')->with('message', 'E-mail alterado com sucesso !');


    }


}
