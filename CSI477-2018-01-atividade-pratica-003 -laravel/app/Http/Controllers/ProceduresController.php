<?php

namespace App\Http\Controllers;

use App\Procedure;
use Illuminate\Http\Request;

class ProceduresController extends Controller
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


    public function novo(){

        return view('procedures.create');
    }

    public function editar($id){
        $proc = Procedure::findOrFail($id);

        return view('procedures.create', ['proc' => $proc]);
    }

    public function atualizar($id, Procedure $request){
        $proc = Procedure::findOrFail($id);

        //$proc->update($request->all());

        \Session::flash('mensagem_sucesso', 'Procedimento editado com sucesso');

        return \Redirect::to('home');
    }

    public function salvar(Procedure $request){

        $proc = new Procedure();

        //$proc = $proc->create($request->all());

        \Session::flash('mensagem_sucesso', 'Procedimento marcado com sucesso');

        return \Redirect::to('home');

    }

    public function deletar($id){
        $proc = Procedure::findOrFail($id);

        //$proc->delete();

        \Session::flash('mensagem_sucesso', 'Procedimento excluída com sucesso');

        return \Redirect::to('home');
    }

}
