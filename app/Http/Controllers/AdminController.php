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

class AdminController extends Controller
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

    
<<<<<<< HEAD
=======
   
/*
    public function rolesPermissions()
    {
       auth()->user()->name;

       
    }*/
 
    public function usuario()
    {
       
        $funcoes = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.id')
        ->join('roles', 'role_id', '=', 'roles.id')
            
        
        ->select(
            'users.id',
            'users.name as nome',
            'users.email',
            'users.created_at',
            'roles.name'
            
        )
    
        ->Paginate(10);    
        return view('usuario', compact('funcoes'));
    }

>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee
    
    public function gestores()
    {
        $dominio= DB::table('tb_jovem')
        ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
        ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

        ->select(
            
            'tb_jovem.nome as jovem',
            'tb_jovem.id_jovem',
            'tb_contato.id_contato',
            'tb_contato.email',
            'tb_contato.celular',
            'tb_cliente.nome_fantasia as empresa',  
            'tb_contato.nome'
        )
      

        ->orderBy('tb_contato_cliente.id_contato_cliente')
        ->Paginate(10);    
        return view('gestores', compact('dominio'));
    }


  
    public function show(int $id, Jovem $jovem)
    {
        
        $gestores = $jovem->gestor($id);
<<<<<<< HEAD
        return view('gestor', compact('gestores','gestor'));
}


    public function jovem(Request $request, Jovem $jovem)
    {  
    
        $usuarios = Jovem::where('id_usuario', Auth::id())->get();
        $verJovens = $jovem->jovemDados2();
        $sobreJovem = $jovem->jovemSobre2();
        $evolucoes = $jovem->jovemEvolucao2();
   
    return view('perfil-jovem', compact('verJovens','jovemDados2','sobreJovem','jovemSobre2',
    'evolucoes', 'jovemEvolucao2','usuarios'));
}


        public function perfilJovem(Request $request, Jovem $jovem)
        {  
            $gestores = Jovem::where('id_usuario', Auth::id())->get();
            $jovemPerfil = $jovem->perfilJovem();
           return view('perfil-gestor', compact('gestores','jovemPerfil','perfilJovem'));
        }
=======
     return view('gestor', compact('gestores','gestor'));
}

    public function jovem(int $id)
{  
    
    $jovem = Jovem::findOrFail($id);
    $verJovens = $jovem->jovemDados($id);
    $sobreJovem = $jovem->jovemSobre($id);
    $evolucoes = $jovem->jovemEvolucao($id);
   
    return view('jovem', compact('jovem','verJovens','jovemDados','sobreJovem','jovemSobre','evolucoes', 'jovemEvolucao'));
}
>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee


}