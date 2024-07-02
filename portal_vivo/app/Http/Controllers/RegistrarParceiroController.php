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

class RegistrarParceiroController extends Controller
{

    //resetar senha
    public function registrar(){

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            return view('login.register_parceiro');

        }

    }

    //resetar senha
    public function verificarregistrar(Request $request){


        $this->validate($request, [
                'adabas' => 'required|between:3,60|string',
                'nome' => 'required|between:3,60|string',
                'cnpj_ou_cpf'=>'required',
                'email' => 'required|email',
                'perfil' => 'required|alpha_num',
            ]);

          $this->validate($request, [
            'cnpj_ou_cpf'=>'required|min:11 para cpf'
              ]);
          $this->validate($request, [
            'cnpj_ou_cpf'=>'required|min:14 para cnpj'
          ]);

            //verificar se já exite o adabas
            $dados = DB::table('users')
                ->where('usuario', '=', $request->adabas)
                ->get();
            $cont = count($dados);
            if ($cont != 0) {
                $erros_bd = ['Já exixte um usuário com o mesmo adabas'];

                return view('login.register_parceiro', compact('erros_bd'));
            }

             //verificar se já exite o email
             $dados1 = DB::table('users')
                    ->where('email', '=', $request->email)
                    ->get();
             $cont1 = count($dados1);
             if ($cont1 != 0) {
                $erros_bd = ['Já exixte um usuário com o mesmo e-mail'];

                return view('login.register_parceiro', compact('erros_bd'));
             }

            //verificar se já exite o cpf ou cnpj
             $dados2 = DB::table('users')
                      ->where('cnpj_cpf', '=', $request->cnpj_ou_cpf)
                      ->get();
             $cont2 = count($dados2);
             if ($cont2 != 0) {
                 if(strlen($request->cnpj_ou_cpf) == 14) {
                     $erros_bd = ['Já exixte um usuário com o mesmo CPF'];
                 }elseif(strlen($request->cnpj_ou_cpf) == 18) {
                     $erros_bd = ['Já exixte um usuário com o mesmo CNPJ'];
                 }

                  return view('login.register_parceiro', compact('erros_bd'));
             }



            //inserir novo usuario
            $novo = new User;
            $novo->usuario = strtoupper($request->adabas);
            $novo->nome = strtoupper($request->nome);
            $novo->cnpj_cpf = $request->cnpj_ou_cpf;
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


            return redirect('/registrar_parceiro')->with('message', 'Usuário Cadastrado com Sucesso, e-mail com a senha e usuario enviado para a conta cadastrada !');


    }


    public function formemail()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{


            $parceiros=User::where('usuario','=',[Session::get('usuario')])->get();



            //pagina parceiro
            return view('parceiro.form_altera_email',['parceiros' => $parceiros]);

        }
    }

     //resetar senha
    public function salvaremail(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
        ]);

        //verificar se já exite o adabas
        $dados = DB::table('users')
            ->where('email', '=', $request->email)
            ->get();
        $cont = count($dados);
        if ($cont != 0) {

            return redirect::to('/parceiro/email_alterar')->with('erros','Já exixte um usuário com o mesmo e-mail');
        }

        //atualiza os dados com o novo protocolo criado
        $parceiro = User::find(Session::get('iduser'));
        $parceiro->email = $request->email;
        $parceiro->save();

        return redirect('/parceiro/email_alterar')->with('message', 'E-mail alterado com sucesso !');


    }

}
