<?php

namespace App\Http\Controllers;

use App\Procedure;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tests = Test::get();

        $tests = DB::table('tests')
            ->join('users', 'tests.user_id', '=', 'users.id')
            ->join('procedures', 'tests.procedure_id', '=', 'procedures.id')
            ->select('users.name as username', 'procedures.name as procname', 'tests.id', 'tests.date')
            ->get();

        if(Auth::user()->type == 'admin'){
            return view('tests.tests', ['lista' => $tests]);
        }elseif (Auth::user()->type == 'patient'){
            return view('tests.mytests', ['lista' => $tests]);

        }

    }

    public function novo(){
        $procedures = Procedure::get();

        return view('tests.create', ['lista' => $procedures]);
    }

    public function editar($id){
        $test = Test::findOrFail($id);

        return view('tests.create', ['test' => $test]);
    }

    public function atualizar($id, Request $request){
        $test = Test::findOrFail($id);

        $test->update($request->all());

        \Session::flash('mensagem_sucesso', 'Exame editado com sucesso');

        return \Redirect::to('tests/'.$test->id.'/editar');
    }

    public function salvar(Request $request){

        $test = new Test();

        $test = $test->create($request->all());

        \Session::flash('mensagem_sucesso', 'Exame marcado com sucesso');

        return \Redirect::to('tests/novo');

    }
}
