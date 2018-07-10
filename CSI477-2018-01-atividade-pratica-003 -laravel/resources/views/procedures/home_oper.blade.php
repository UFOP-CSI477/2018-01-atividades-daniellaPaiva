@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Procedimentos</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Procedimentos</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                            @foreach($lista as $linha )
                                <tr>
                                    <td>{{$linha->id}}</td>
                                    <td>{{$linha->name}}</td>
                                    <td>{{$linha->price}}</td>
                                    <td align="center">
                                        <a href="procedures/{{$linha->id}}/editar" class="btn btn-info">Editar</a>
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
