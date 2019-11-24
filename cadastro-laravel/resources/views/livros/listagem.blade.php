@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Livros
                    <a class="float-right text-dark" href="{{ url('livros/novo') }}">Novo Cadastro</a>
                </div>

                <div class="card-body">
				@if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                @endif
                   <table class="table table-striped text-center">
                        <thead>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($livros as $livro)
                            <tr>
                                <td>{{$livro->titulo}}</td>
                                <td>{{$livro->autor}}</td>
                                
                                <td>
                                    <button class="btn btn-default btn-sm">
                                        <a href="livros/{{$livro->id}}/editar" class="text-dark">Editar</a></button>
                                    {!! Form::open(['method' => 'DELETE', 'url' => '/livros/'.$livro->id, 'style' => 'display:inline']) !!}
                                    <button type="submit" class="btn btn-default btn-sm">Excluir</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
