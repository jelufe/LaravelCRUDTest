<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;

class ClientesController extends Controller
{
    public function index(){

        session_start();
        if($_SESSION['id'] != null){
            $clientes = Cliente::get();
            return view('clientes.lista', ['clientes' => $clientes]);
        } else {
            return view('loginusuarios');
        }
    }

    public function novo(){
        session_start();
        if($_SESSION['id'] != null) {
            return view('clientes.formulario');
        } else {
            return view('loginusuarios');
        }
    }

    public function salvar(Request $request){
        session_start();
        if($_SESSION['id'] != null) {
            $cliente = new Cliente();

            $cliente = $cliente->create($request->all());

            \Session::flash('mensagem_sucesso', 'Cliente cadastrado com Sucesso!');

            return Redirect::to('Clientes/novo');
        } else {
            return view('loginusuarios');
        }
    }

    public function editar($id){
        session_start();
        if($_SESSION['id'] != null) {
            $cliente = Cliente::findOrFail($id);
            return view('clientes.formulario', ['cliente' => $cliente]);
        } else {
            return view('loginusuarios');
        }
    }

    public function atualizar($id, Request $request){
        session_start();
        if($_SESSION['id'] != null) {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            \Session::flash('mensagem_sucesso', 'Cliente atualizado com Sucesso!');
            return Redirect::to('Clientes/' . $cliente->id . '/editar');
        } else {
            return view('loginusuarios');
        }
    }

    public function deletar($id){
        session_start();
        if($_SESSION['id'] != null) {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();

            \Session::flash('mensagem_sucesso', 'Cliente deletado com Sucesso!');
            return Redirect::to('Clientes');
        } else {
            return view('loginusuarios');
        }
    }

}
