@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alunos</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Nome</th>
                                <th>Cidade</th>
                            </tr>
                            @foreach( $alunos as $aluno )
                            <tr>
                                <td>{{$aluno->nome}}</td>
                                <td>{{$aluno->cidade_id}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
