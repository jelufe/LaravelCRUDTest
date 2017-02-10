@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe abaixo as informações do Cliente
                        <a class="pull-right" href="{{ url('/') }}">Logar Conta</a> </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_cadastro'))
                            <div class="alert alert-success">{{Session::get('mensagem_cadastro')}}</div>
                        @endif

                            {!! Form::open(['url' => 'Usuario/salvar']) !!}


                        {!! Form::label('nome', 'Nome:') !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                        {!! Form::label('login', 'Usúario:') !!}
                        {!! Form::input('text', 'login', null, ['class' => 'form-control', 'placeholder' => 'Usúario']) !!}
                        {!! Form::label('senha', 'Senha:') !!}
                        {!! Form::input('text', 'senha', null, ['class' => 'form-control',  'placeholder' => 'Senha']) !!}

                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
