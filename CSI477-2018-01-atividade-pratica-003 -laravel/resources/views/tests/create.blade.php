@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Marcar Exame</div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($test, ['method' => 'PATCH', 'url' => 'tests/'.$test->id]) !!}
                        @else
                            {!! Form::open(['url' => 'tests/salvar']) !!}
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                {!! Form::label('procedure_id', 'Procedimento') !!}
                                <select class="form-control" name="procedure_id" id="procedure_id">
                                    <option value="0">Selecione:</option>
                                    <!-- Procedures //-->
                                    @foreach( $lista as $proc )
                                        <option value="{{$proc->id}}">{{$proc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('date', 'Data') !!}
                                {!! Form::input('date', 'date', null, ['class' => 'form-control', 'autofocus']) !!}
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
