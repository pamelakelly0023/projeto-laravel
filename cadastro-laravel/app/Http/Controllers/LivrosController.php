<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Livro;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class LivrosController extends Controller
{
    public function index(){
        $livros = Livro::get();

        return view('livros.listagem',['livros' => $livros]);
    }

    public function novo(){
        return view ('livros.formulario');
    }

    public function salvar (Request $request){
        $livro = new Livro();

        $livro = $livro->create($request->all());

        \Session::flash('mensagem_sucesso','Livro cadastrado com sucesso');
        return Redirect::to('livros/novo');
    }

    public function editar($id){
        $livro = Livro::findOrFail($id);

        return view('livros.formulario',['livro' => $livro]);
    }

    public function atualizar ($id, Request $request){
        $livro = Livro::findOrFail($id);

        $livro->update($request->all());

        \Session::flash ('mensagem_sucesso', 'Livro alterado com sucesso');
        return Redirect::to('livros/'.$livro->id.'/editar');
    }
    public function deletar($id){
        $livro = Livro::findOrFail($id);

        $livro->delete();

        \Session::flash('mensagem_sucesso','Livro deletado com sucesso');
        return Redirect::to('livros');
    }
}
