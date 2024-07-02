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
use App\Cliente;

class RegistrarController extends Controller
{
    //resetar senha
    public function registrar(){

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $cli = DB::table('clientes')->select('id','cliente','contato')->get();

            return view('login.register', ['cli' => $cli]);

        }

    }

    //resetar senha
    public function verificarregistrar(Request $request){


        $this->validate($request, [
                'nome'  => 'required|between:3,60|string',
                'perfil'=>'required',
                'email' => 'required'
            ]);


            //verificar se já exite o login redecorp
            $dados = DB::table('users')
                ->where('usuario', '=', $request->usuario)
                ->get();
            $cont = count($dados);
            if ($cont != 0) {
                $erros_bd = ['Já exixte um usuário com o mesmo Login'];

                return view('login.register', compact('erros_bd'));
            }

            //verificar se já exite o email
             $dados1 = DB::table('users')
                      ->where('usuario', '=', $request->email)
                      ->get();
              $cont1 = count($dados1);

              if ($cont1 != 0) {
                 $erros_bd = ['Já exixte um usuário com o mesmo e-mail'];

                 return view('login.register', compact('erros_bd'));
             }

       
            


             //inserir novo usuario
            $novo = new User;
            $novo->usuario = $request->email;
            $novo->nome = strtoupper($request->nome);
            $novo->cnpj_cpf = $request->cpf;
            $novo->email = $request->email;
            $nova_senha = 'smi@123';
            $novo->password = Hash::make($nova_senha);
            $novo->perfil = $request->perfil;
            $novo->turno = $request->turno;
            $novo->statususer = 1;
            $novo->primeiro_acesso = 1;
            $novo->cliente = $request->cliente;
            $novo->save();


            $data = array(
                'login' => $novo->usuario,
                'nova_senha' => $nova_senha,
                'linksis' => 'http://ocorrencias.smipreditiva.com.br/'
            );

            /*
            Mail::send('email.emailcriacaosenha', $data, function ($msj) use ($novo) {
                $msj->from('resetsenhassistemas@gmail.com', 'Sistema Ocorrências');
                $msj->to($novo->email)->subject('Criação de Usuário');
            });

            */
            return redirect('/home')->with('message', 'Usuário Cadastrado com Sucesso, login =' .$request->usuario. ' senha smi@123');


    }

    public function editar()
    {

        if(!Session::has('login')){
            Session::flush();
            return redirect('/')
                ->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
        }else{

            $usuario=DB::table('users')->get();
            $usuario=DB::table('users')->simplePaginate(6);

            //pagina parceiro
            return view('login.editar',['usuario' => $usuario]);

        }
    }


    public function busca(Request $request)
    {

        if(empty($request->pesquisa)){
            $request->pesquisa='%';
        }

        $usuario=DB::table('users')->where('usuario','LIKE',$request->pesquisa)->get();
        $usuario=DB::table('users')->where('usuario','LIKE',$request->pesquisa)->simplePaginate(6);

        return $this->editar()->with(['usuario' => $usuario]);
    }



    public function alterar($id)
    {


        $usuario=DB::table('users')->where('id','=',$id)->get();

        //pagina parceiro
        return view('login.alterar_user',['usuario' => $usuario]);
    }


    //altera os dados
    public function alterado(Request $request)
    {

        //atualiza
        $novo1 = User::find($request->id);
        $novo1->usuario = $request->usuario;
        $novo1->nome = strtoupper($request->nome);
        $novo1->cnpj_cpf = $request->cpf;
        $novo1->email = $request->email;
        $novo1->perfil = $request->perfil;
        $novo1->save();

        return redirect('/editar')->with('message', 'Alterado com sucesso !');


    }

    public function novasenha()
    {

        return view('login.altera_senha');

    }


    public function alterarsenha(Request $request)
    {

        //atualiza no bd
        $upoc2 = DB::table('users')
            ->where('usuario',Session::get('usuario'))
            ->update(['password'=>Hash::make($request->password)]);

        $aces = DB::table('users')
            ->where('usuario',Session::get('usuario'))
            ->update(['primeiro_acesso'=> 2]);

        $ver = DB::table('users')
            ->where('usuario',Session::get('usuario'))
            ->first();

        if($ver->perfil == 2)
        {
            return redirect::to('/cliente/home')->with('message','Senha alterada com sucesso');
        }

        if($ver->perfil == 1)
        {
            return Redirect::to('/')->with('message','Senha alterada com sucesso');
        }

        if($ver->perfil == 3)
        {
            return Redirect::to('/cliente/conta/home')->with('message','Senha alterada com sucesso');
        }





    }


}
