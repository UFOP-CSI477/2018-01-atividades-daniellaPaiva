<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Http\Requests\CidadeRequest;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index(){
        $cidades = Cidade::get();

        return view('cidades.listaAdmin', ['cidades' => $cidades]);
    }

    public function listar(){
        $cidades = Cidade::get();

        return view('cidades.lista', ['cidades' => $cidades]);
    }

    public function novo(){
        return view('cidades.formulario');
    }

    public function salvar(CidadeRequest $request){

        $cidade = new Cidade();

        $cidade = $cidade->create($request->all());

        \Session::flash('mensagem_sucesso', 'Cidade cadastrada com sucesso');

        return \Redirect::to('cidades/novo');

    }

    public function editar($id){
        $cidade = Cidade::findOrFail($id);

        return view('cidades.formulario', ['cidade' => $cidade]);
    }

    public function atualizar($id, CidadeRequest $request){
        $cidade = Cidade::findOrFail($id);

        $cidade->update($request->all());

        \Session::flash('mensagem_sucesso', 'Cidade editada com sucesso');

        return \Redirect::to('cidades/'.$cidade->id.'/editar');
    }

    public function deletar($id){
        $cidade = Cidade::findOrFail($id);

        $cidade->delete();

        \Session::flash('mensagem_sucesso', 'Cidade excluída com sucesso');

        return \Redirect::to('cidades/');
    }
}
