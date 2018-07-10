<?php

namespace App\Http\Controllers;

use App\Procedure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();

        if(Auth::user()->type == 'admin'){
            return view('users.home_admin', ['lista' => $users]);
        }

    }


    public function novo(){

        return view('users.create');
    }

    public function editar($id){
        $user = User::findOrFail($id);

        return view('users.create', ['user' => $user]);
    }

    public function atualizar($id, Request $request){
        $user = User::findOrFail($id);

        $user->update($request->all());

        \Session::flash('mensagem_sucesso', 'Usuário editado com sucesso');

        return \Redirect::to('users');
    }

    public function salvar(Request $request){

        $user = new User();

        $user = $user->create($request->all());

        \Session::flash('mensagem_sucesso', 'Usuário criado com sucesso');

        return \Redirect::to('users');

    }

    public function deletar($id){
        $user = User::findOrFail($id);

        $user->delete();

        \Session::flash('mensagem_sucesso', 'Usuário excluído com sucesso');

        return \Redirect::to('users');
    }
}
