@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe abaixo seu Usúario e Senha
                        <a class="pull-right" href="{{ url('Usuario/novo') }}">Nova Conta</a> </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_login'))
                            <div class="alert alert-success">{{Session::get('mensagem_login')}}</div>
                        @endif

                        {!! Form::open(['url' => 'Usuario']) !!}

                        {!! Form::label('login', 'Usúario:') !!}
                        {!! Form::input('text', 'login', null, ['class' => 'form-control', 'placeholder' => 'Usúario']) !!}
                        {!! Form::label('senha', 'Senha:') !!}
                        {!! Form::input('text', 'senha', null, ['class' => 'form-control',  'placeholder' => 'Senha']) !!}

                        {!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
