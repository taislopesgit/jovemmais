<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Jovem;
use App\User;
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
        
        return view('home', compact('jovens','dadosFiltro','clientes','cursos','sobre', 'ususarios'));

    }
  
    public function show($id)
    {

        $jovem = Jovem::findOrFail($id);
        $verJovens = $jovem->jovemDadosId($id);
        $sobreJovem = $jovem->jovemSobreId($id);
        $evolucoes = $jovem->jovemEvolucaoId($id);
        $frequencia = $jovem->frequenciaJovem($id);

        return view('show', compact('jovem','verJovens','jovemDadosId','sobreJovem',
        'jovemSobreId','evolucoes', 'jovemEvolucaoId','frequencia','frequenciaJovem'
       ));

    }


    public function perfilGestor($id)
    {

        $jovem = Jovem::findOrFail($id);
        $verJovens = $jovem->jovemDados($id);
       
        return view('gestor', compact('jovem','verJovens'));

    }
}