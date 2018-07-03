@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Cidade</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($cidade, ['method' => 'PATCH', 'url' => 'cidades/'.$cidade->id]) !!}
                        @else
                            {!! Form::open(['url' => 'cidades/salvar']) !!}
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('nome', 'Cidade') !!}
                                {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('estado_id', 'Estado') !!}
                                {!! Form::input('text', 'estado_id', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Estado']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
