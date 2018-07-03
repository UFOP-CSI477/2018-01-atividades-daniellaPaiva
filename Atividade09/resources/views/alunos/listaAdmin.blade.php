@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alunos</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>Ações</th>
                            </tr>
                            @foreach( $alunos as $aluno )
                            <tr>
                                <td>{{$aluno->nome}}</td>
                                <td>{{$aluno->cidade}}</td>
                                <td align="center">
                                    <a href="alunos/{{$aluno->id}}/editar" class="btn btn-info">Editar</a>
                                    {!! Form::open(['method' => 'DELETE', 'url' => 'alunos/'.$aluno->id, 'style' => 'display: inline']) !!}
                                    <button type='submit' class="btn btn-danger">Excluir</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
