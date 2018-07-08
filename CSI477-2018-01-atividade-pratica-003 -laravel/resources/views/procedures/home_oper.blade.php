@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Procedimentos</div>
                    <div class="card-body">
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
                                        <a href="tests/{{$linha->id}}/editar" class="btn btn-info">Editar</a>
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
