<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;
use App\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class UserController extends Controller
{
    private $totalPagesPaginate = 5;
    public function profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(UpdateProfileFormRequest $request)
    {

        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);

        else
            unset($data['password']);    

        $data['image'] = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            if($user->image)
                $name = $user->image;
            else
            $name = $user->id.kebab_case($user->name);   
            
        $extension = $request->image->extension();   
        $nameFile = "{$name}.{$extension}"; 

        $data['image'] = $nameFile;
        
        $upload = $request->image->storeAs('users', $nameFile);        

        if (!$upload)
            return redirect()
                    ->back()
                    ->with('error', 'Não foi possivel efetuar o upload da imagem');
        }

       $update = $user->update($data);

        if ($update)
            return redirect()
                    ->route('profile')
                    ->with('success', 'Atualizado com sucesso!');

        return redirect()
                    ->back()
                    ->with('error', 'Não foi possivel atualizar o perfil!');

    }

    public function registrar()
    {
        return view('auth.registrar');
    }

    public function salvar(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = $request->_token;
        $user->save();

        return redirect::to('registrar')->with('success', 'Resgistro efetuado com sucesso!');
    }

    public function historicuser()
    {
        $historics = DB::table('users as a')
            ->select('a.id',
                'a.name',
                'a.email',
                'a.situacao',
                DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))->get();
        

        /*$historics = DB::table('users as a')
            ->select('a.id',
                'a.name',
                'a.email',
                'a.situacao',
                DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))->paginate($this->totalPagesPaginate);*/

        $date1='';
        $date2='';
        $tipo='';

        return view('auth.historics_user', compact('historics','date1', 'date2', 'tipo'));
    }

    public function searchHistoricuser(Request $request)
    {

        if(empty($request->situacao)){

            $request->situacao="%";
        }
        if(!empty($request->date1) && !empty($request->date2)) {
            $historics = DB::table('users as a')
                ->select('a.id',
                    'a.name',
                    'a.email',
                    'a.situacao',
                    DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))
                ->whereBetween('a.created_at', [$request->date1, $request->date2])
                ->where('a.situacao', 'like', '%' . $request->situacao . '%')
                ->get();
           /*
            $historics = DB::table('users as a')
                ->select('a.id',
                    'a.name',
                    'a.email',
                    'a.situacao',
                    DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))
                ->whereBetween('a.created_at', [$request->date1, $request->date2])
                ->where('a.situacao', 'like', '%' . $request->situacao . '%')
                ->paginate($this->totalPagesPaginate);*/

            $date1 = $request->date1;
            $date2 = $request->date2;
            $tipo = $request->situacao;
        }else{

            $historics = DB::table('users as a')
                ->select('a.id',
                    'a.name',
                    'a.email',
                    'a.situacao',
                    DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))
                ->where('a.situacao', 'like', '%' . $request->situacao . '%')
                ->get();
           
            /*
            $historics = DB::table('users as a')
                ->select('a.id',
                    'a.name',
                    'a.email',
                    'a.situacao',
                    DB::raw('DATE_FORMAT(a.created_at, "%d/%m/%Y %H:%i:%s")  as created_at'))
                ->where('a.situacao', 'like', '%' . $request->situacao . '%')
                ->paginate($this->totalPagesPaginate);*/

            $date1='';
            $date2='';
            $tipo='';

        }

        return view('auth.historics_user', compact('historics','date1', 'date2', 'tipo'));
    }

    public function ativar($id)
    {
        DB::table('users')->where('id','=',$id)->update(['situacao' => 'ATIVO']);
        $historics = DB::table('users')->select('*')->where('id','=',$id)->get();
        foreach ($historics as $ht){

            $nome= $ht->name;
        }

        return redirect::to('historic-user')->with('success', 'Usuário '.$nome.' Ativado com sucesso!');
    }

    public function desativar($id)
    {

        DB::table('users')->where('id','=',$id)->update(['situacao' => 'DESATIVO']);
        $historics = DB::table('users')->select('*')->where('id','=',$id)->get();
        foreach ($historics as $ht){

            $nome= $ht->name;
        }

        return redirect::to('historic-user')->with('success', 'Usuário '.$nome.' Desativado com sucesso!');
    }

    public function resetar($id)
    {
        DB::table('users')->where('id','=',$id)->update(['password' => bcrypt(123456)]);
        $historics = DB::table('users')->select('*')->where('id','=',$id)->get();
        foreach ($historics as $ht){

            $nome= $ht->name;
        }

        return redirect::to('historic-user')->with('success','Senha do Usuário '.$nome.' Resetada com sucesso senha é 123456 !');
    }

    public function alterarsenha()
    {
        return view('auth.alterar_senha');
    }

    public function alterarsenhasalvar(Request $request)
    {
        //validação de dados
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($request->iduser);
        $user->password = bcrypt($request->password);
        $user->remember_token = $request->_token;
        $user->save();

        return redirect::to('alterar_senha')->with('success', 'Alterada com sucesso!');
    }
}
