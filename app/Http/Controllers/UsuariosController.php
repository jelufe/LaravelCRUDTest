<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
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

    public function entrar(Request $request){
        session_start();

        $login = $request->input('login');
        $senha = $request->input('senha');

        $ok = DB::table('usuarios')->where('login', $login)->first();

        $clientes = Cliente::get();

        if(empty($ok)){
            \Session::flash('mensagem_login', "Usúario não Existe!");
            return view('loginusuarios');
        } else {
            if($ok->senha == $senha){
                $_SESSION['id'] = $ok->id;
                $_SESSION['nome'] = $ok->nome;
                return view('clientes.lista', ['clientes' => $clientes]);

            } else {
                \Session::flash('mensagem_login', "Senha Incorreta!");
                return view('loginusuarios');
            }
        }

        return view('loginusuarios');



    }


    public function sair(){
        session_start();
        $_SESSION['id'] = null;
        return view('loginusuarios');
    }

    public function novo(){
        session_start();
        return view('novousuario');
    }

    public function salvar(Request $request){
        session_start();
        $login = $request->input('login');
        $ok = DB::table('usuarios')->where('login', $login)->first();

        if($ok == null){
            $usuario = new Usuario();

            $usuario = $usuario->create($request->all());

            \Session::flash('mensagem_cadastro', 'Usúario cadastrado com Sucesso!');

            return view('novousuario');
        } else {
            \Session::flash('mensagem_cadastro', 'Usúario já Cadastrado');

            return view('novousuario');
        }
    }

}
