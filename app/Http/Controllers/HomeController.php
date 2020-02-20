<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Jovem;
use App\Perfil;
use App\Usuario;
use App\Cliente;
use App\Curso;
use App\Polo;
use App\Disciplina;
use App\Disciplina_diaria;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Jovem $jovem)
    {
        

        $dadosFiltro = $request->except('_token');
        $jovens = $jovem->filtroDados($dadosFiltro);
        $clientes = Cliente::orderBy('razao_social','asc')->orderBy('nome_fantasia','asc')->get();
        $cursos = Curso::orderBy('nome')->get();
        $sobre = $jovem->programaSobre();
      
        

        return view('home', compact('jovens','dadosFiltro','clientes','cursos','sobre', 'usuarios'));

    }
  
    public function show($id)
    {

        $jovem = Jovem::findOrFail($id);
        $verJovens = $jovem->jovemDados1($id);
        $sobreJovem = $jovem->jovemSobre1($id);
        $evolucoes = $jovem->jovemEvolucao($id);
       
<<<<<<< HEAD
        return view('show', compact('jovem','verJovens','jovemDados1','sobreJovem','jovemSobre1','evolucoes', 'jovemEvolucao'));
=======
        return view('show', compact('jovem','verJovens','jovemDados','sobreJovem','jovemSobre','evolucoes', 'jovemEvolucao'));
>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee

    }


    public function perfilGestor($id)
    {

        $jovem = Jovem::findOrFail($id);
        $verJovens = $jovem->jovemDados($id);
       
        return view('gestor', compact('jovem','verJovens'));

    }

<<<<<<< HEAD
=======

   
    
   
  

>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee
   
}