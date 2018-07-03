@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Aluno</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($aluno, ['method' => 'PATCH', 'url' => 'alunos/'.$aluno->id]) !!}
                        @else
                            {!! Form::open(['url' => 'alunos/salvar']) !!}
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('nome', 'Nome') !!}
                                {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('mail', 'Email') !!}
                                {!! Form::input('text', 'mail', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::label('rua', 'Rua') !!}
                                {!! Form::input('text', 'rua', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Rua']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::label('numero', 'Numero') !!}
                                {!! Form::input('text', 'numero', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Numero']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::label('bairoo', 'Bairro') !!}
                                {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Bairro']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::label('cep', 'CEP') !!}
                                {!! Form::input('text', 'cep', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'CEP']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('cidade_id', 'Cidade') !!}
                                {!! Form::input('text', 'cidade_id', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Cidade']) !!}
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
