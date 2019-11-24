@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informações do Livro
                    <a class="float-right text-dark" href="{{ url('livros') }}">Listagem</a>
                </div>

                <div class="card-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                @endif

                @if(Request::is('*/editar'))
                    {!! Form::model($livro, ['method' => 'PATCH','url' => 'livros/'.$livro->id])!!}
                @else
                    {!! Form::open(['url' => 'livros/salvar']) !!}
                @endif

                
                
                {!! Form::input('text','titulo',null,['class' => 'form-control','autofocus','placeholder' => 'Título']) !!}

                {!! Form::input('text','autor',null,['class' => 'form-control','placeholder' => 'Autor']) !!}


                {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
