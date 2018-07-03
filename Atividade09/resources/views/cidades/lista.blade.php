@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cidades</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>Código</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                            @foreach( $cidades as $cidade )
                            <tr>
                                <td>{{$cidade->id}}</td>
                                <td>{{$cidade->nome}}</td>
                                <td>{{$cidade->estado_id}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
