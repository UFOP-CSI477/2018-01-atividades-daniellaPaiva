<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Requests\AlunoRequest;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function index(){

        $alunos = Aluno::get();

        return view('alunos.listaAdmin', ['alunos' => $alunos]);
    }

    public function listar(){

        $alunos = Aluno::get();

        return view('alunos.lista', ['alunos' => $alunos]);
    }

    public function novo(){
        return view('alunos.formulario');
    }

    public function salvar(AlunoRequest $request){

        $aluno = new Aluno();

        $aluno = $aluno->create($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno cadastrado com sucesso');

        return \Redirect::to('alunos/novo');

    }

    public function editar($id){
        $aluno = Aluno::findOrFail($id);

        return view('alunos.formulario', ['aluno' => $aluno]);
    }

    public function atualizar($id, AlunoRequest $request){
        $aluno = Aluno::findOrFail($id);

        $aluno->update($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno editado com sucesso');

        return \Redirect::to('alunos/'.$aluno->id.'/editar');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        \Session::flash('mensagem_sucesso', 'Aluno deletado com sucesso');

        return \Redirect::to('alunos/');

    }
}
