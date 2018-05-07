<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Redirect;

class userController extends Controller
{
    public function index(){
        $users = User::get();
        $roles = Role::get();
        return view('users.users-list',['users'=>$users],['roles'=>$roles]);
    }
    public function salvar(Request $request){

        if ($request->hasFile('foto')){
            //Identifica o role selecionado no formulário
            $roleId = intval($request->select_role);
            $role = Role::find($roleId);

            //Salva a Imagem de perfil e armazena o diretório
            $path = $request->file('foto')->store('imagens');

            $user = new User();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telefone = $request->telefone;
            $user->password = Hash::make($request->password);
            $user->dt_nascto = $request->dt_nascto;
            $user->cargo = $role->name;
            $user->salario = $request->salario;
            $user->foto = $path;
            $user->save();
        } else {
            //Identifica o role selecionado no formulário
            $roleId = intval($request->select_role);
            $role = Role::find($roleId);

            $user = new User();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telefone = $request->telefone;
            $user->password = Hash::make($request->password);
            $user->dt_nascto = $request->dt_nascto;
            $user->cargo = $role->name;
            $user->salario = $request->salario;
            $user->foto = null;
            //return $user;
            $user->save();
        }  
        return Redirect::to('/');
    }
    public function editar($id){
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view ('users.formulario', ['user'=>$user],['roles'=>$roles]);
    }
    public function atualizar(Request $request, $id){
        if ($request->hasFile('foto')){

            $path = $request->file('foto')->store('imagens');

            $roleId = intval($request->select_role);
            $role = Role::find($roleId);

            if ($roleId == 1 || $roleId == 2 || $roleId == 3 || $roleId == 4){
                $user = User::findOrFail($id);            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefone = $request->telefone;
                $user->dt_nascto = $request->dt_nascto;
                $user->cargo = $role->name;
                $user->salario = $request->salario;
                $user->foto = $path;
            } else {
                $user = User::findOrFail($id);            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefone = $request->telefone;
                $user->dt_nascto = $request->dt_nascto;
                $user->salario = $request->salario;
                $user->foto = $path;
            }
            $user->save();

        } else {
            $roleId = intval($request->select_role);
            $role = Role::find($roleId);

            if ($roleId == 1 || $roleId == 2 || $roleId == 3 || $roleId == 4){
                $user = User::findOrFail($id);            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefone = $request->telefone;
                $user->dt_nascto = $request->dt_nascto;
                $user->cargo = $role->name;
                $user->salario = $request->salario;
            } else {
                $user = User::findOrFail($id);            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefone = $request->telefone;
                $user->dt_nascto = $request->dt_nascto;
                $user->salario = $request->salario;
            }
            $user->save();
        }
            return Redirect::to('/');



    }
    public function excluir($id){
        $user = User::where('id',$id)->delete();
        return Redirect::to('/');
    }

}
