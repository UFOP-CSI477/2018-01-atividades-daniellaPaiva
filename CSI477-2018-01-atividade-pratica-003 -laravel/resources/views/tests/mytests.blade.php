@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Exames</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" >
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Procedimento</th>
                                <th>Data</th>
                            </tr>
                            @foreach($lista as $linha )
                                <tr>
                                    <td>{{$linha->id}}</td>
                                    <td>{{$linha->procname}}</td>
                                    <td>{{$linha->date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
