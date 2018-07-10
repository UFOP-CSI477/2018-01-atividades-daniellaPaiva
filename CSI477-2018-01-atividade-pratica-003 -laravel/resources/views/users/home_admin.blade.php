@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuários</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Tipo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            @foreach($lista as $linha )
                                <tr>
                                    <td>{{$linha->type}}</td>
                                    <td>{{$linha->name}}</td>
                                    <td>{{$linha->email}}</td>
                                    <td align="center">
                                        <a href="users/{{$linha->id}}/editar" class="btn btn-info">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => 'users/'.$linha->id, 'style' => 'display: inline']) !!}
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
