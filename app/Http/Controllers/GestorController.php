<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Jovem;
use App\Perfil;
use App\Cliente;
use App\Usuario;
use App\Papel;
use App\Permissao;

class GestorController extends Controller
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

    public function home(Jovem $jovem)
    {
        $sobre = $jovem->programaSobre();
        
       
        return view('inicial', compact('sobre','programaSobre'));

    }


    public function show(int $id, Jovem $jovem)
        {
            
            $gestores = $jovem->gestor($id);
            $nome = $jovem->gestorNome($id);
            return view('gestorId', compact('gestores','gestor','nome','gestorNome'));
        }

    public function gestores(Request $request, Jovem $jovem) {

        $dadosFiltros = $request->except('_token');
        $dominio = $jovem->dadoGestores($dadosFiltros);

        return view('gestores', compact('dadosFiltros','dominio','dadoGestores','jovem'));

    }

  
    public function avaliacaoPrograma(Jovem $jovem)
    {
       
        
       
        return view('avaliacao-programa');

    }

}
    