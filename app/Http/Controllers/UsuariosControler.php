<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosControler extends Controller
{
    public function index(){
        return view("usuarios", ["texto" => "Lista de Usuarios:", "checagem" => false, "usuarios" => ["usuario1", "usuario2", "usuario3", "usuario4"]]);
    }
}
