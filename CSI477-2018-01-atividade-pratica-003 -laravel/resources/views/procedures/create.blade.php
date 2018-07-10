@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Procedimento</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($proc, ['method' => 'PATCH', 'url' => 'procedures/'.$proc->id]) !!}
                        @else
                            {!! Form::open(['url' => 'procedures/salvar']) !!}
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('price', 'Preço') !!}
                                {!! Form::input('text', 'price', null, ['class' => 'form-control', 'autofocus']) !!}
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
