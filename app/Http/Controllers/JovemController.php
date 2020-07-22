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


class JovemController extends Controller
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
 

  
    public function jovemEdit($id)
    {
        $jovem = Jovem::find($id);
        return view('perfil-edit',compact('jovem'));
    }
  
    public function jovemUpdate(Request $request, $id)
    {

        
        $form = $request ->all();
        $update = auth()->user()->update($form);
      
    
        if($update)
            return redirect()
                        ->route('jovem')
                        ->with('success', 'Dados atualizados com sucesso!');
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao atualizar o perfil');
            }
        




    public function faceJovem(Request $request, Jovem $jovem)
    {  
    
        $face = $jovem->faceToface();
        $relatorioJovem = $jovem->RelacaoJovemGestor();
        $dashFrequencia = $jovem->frequencia();
        $dashSatisfacao = $jovem->satisfacao();
        $jovemParticipante = $jovem->participante();
        $nome = $jovem->nomeGestor();
        $progressoJovem = $jovem->RelacaoProgresso();
        $concluidoJovem = $jovem->RelacaoConcluido();
        
   
        return view('face', compact('face','faceToface','relatorioJovem','RelacaoJovemGestor',
        'dashFrequencia', 'frequencia', 'dashSatisfacao', 'satisfacao','jovemParticipante','participante',
    'nome','nomeGestor','RelacaoProgresso','progressoJovem','concluidoJovem', 'RelacaoConcluido'));

    }
    
    public function ocorrenciaJovem(Request $request, Jovem $jovem)
    {  
    
        
   
        $face = $jovem->faceToface();
        $relatorioJovem = $jovem->RelacaoJovemGestor();
        $ocorrencias = $jovem ->ocorrenciaJovem();
   
        return view('ocorrencia-jovem', compact('ocorrencias','ocorrenciaJovem','face','faceToface','relatorioJovem','RelacaoJovemGestor'));

    }

        
    public function avaliacaoJovem(Request $request, Jovem $jovem)
    {  
    
    
        return view('avaliacao-jovem');

    }
    



    public function jovemPerfil(Request $request, Jovem $jovem)
    {  
    
        $usuarios = Jovem::where('id_usuario', Auth::id())->get();
        $verJovens = $jovem->jovemDadosUser();
        $sobreJovem = $jovem->jovemSobreUser();
        $evolucoes = $jovem->jovemEvolucaoUser();
        $frequencias = $jovem->frequenciaUser();
        

        /**$calendar=array();
        
       foreach ($verJovens as $events) {
           $data [] = array (
            'id'   => $events->id_jovem,
            'Titulo'   => $events->descricao,
            'Data'   => $events->data_disciplina
           );
          }
          //echo json_encode($data);*/
   
    return view('perfil-jovem', compact('data','verJovens','jovemDadosUser','sobreJovem','jovemSobreUser',
    'evolucoes', 'jovemEvolucaoUser','usuarios','frequencias','frequenciaUser'));
    }



    public function JovemGestor(Request $request, Jovem $jovem)
        {  
            $gestores = Jovem::where('id_usuario', Auth::id())->get();
            $relatorioJovem = $jovem->RelacaoJovemGestor();
            $nome = $jovem->nomeGestor();
            
            $dashSatisfacao = $jovem->satisfacao();
            $dashFrequencia = $jovem->frequencia();
            $dashOcorrencias = $jovem->ocorrencia();


            $pesquisa = $jovem->testePesquisa();
            
            $competencias=array();
            $competencias['combo1'] = 0;
            $competencias['combo2'] = 0;
            $competencias['combo3'] = 0;
            $competencias['combo4'] = 0;
            $competencias['total'] = 0;
           
           
            foreach($pesquisa as $p){
               if (
                   $p->resposta == "Criatividade" || 
                   $p->resposta == "Trabalho em equipe" ||
                   $p->resposta == "Pensamento"               
                ) {
                    $competencias['combo1'] += $p->qtd;
                } elseif (
                    $p->resposta ==  "Orientação para o trabalho" || 
                    $p->resposta == "Falar em público" ||
                    $p->resposta == "Aprender a aprender"   
                ) {
                    $competencias['combo2'] += $p->qtd;
                }   elseif (
                    $p->resposta ==  "Negociação"|| 
                    $p->resposta == "Comunicação oral e escrita"||
                    $p->resposta ==  "Conduta ética"  
                ) {
                    $competencias['combo3'] += $p->qtd;
                }   else {
                    $competencias['combo4'] += $p->qtd;
                }
               
                $competencias['total'] += $p->qtd;

            } 
            
            $competencias['combo1'] = round(($competencias['combo1'] * 100)  / $competencias['total'], 2); 
            $competencias['combo2'] = round(($competencias['combo2'] * 100) / $competencias['total'], 2); 
            $competencias['combo3'] = round(($competencias['combo3'] * 100) / $competencias['total'], 2); 
            $competencias['combo4'] = round(($competencias['combo4'] * 100) / $competencias['total'], 2); 
            $competencias['total'] = 100;


                
            
           return view('perfil-gestor', compact('gestores','relatorioJovem','RelacaoJovemGestor', 'nome', 'nomeGestor','dashSatisfacao',
           'satisfacao','frequencia','dashFrequencia','ativos','dashOcorrencias','ocorrencia','pesquisa','testePesquisa','competencias'));
        }
   
        public function jovemCalendario (Request $request, Jovem $jovem)
        {  
        
        
            return view('calendario-jovem');
    
        }
        
        
        public function avaliacaoPrograma(Request $request, Jovem $jovem)
        {
           
            $gestores = Jovem::where('id_usuario', Auth::id())->get();
            $relatorioJovem = $jovem->RelacaoJovemGestor();
            $nome = $jovem->nomeGestor();
            
            $dashSatisfacao = $jovem->satisfacao();
            $dashFrequencia = $jovem->frequencia();
            $dashOcorrencias = $jovem->ocorrencia();


            $dataIni = date('Y-m-d', strtotime('-180 days', strtotime('now')));
            $dataFim = date('Y-m-d');

            $pesquisa01 =$jovem->getResultadoAvaliacao(2,$dataIni, $dataFim);
            $pesquisa02 =$jovem->getResultadoAvaliacao(1,$dataIni, $dataFim);
            $pesquisa03 =$jovem->getResultadoAvaliacao(6,$dataIni, $dataFim);
            $pesquisa04 =$jovem->getResultadoAvaliacao(5,$dataIni, $dataFim);
            $pesquisa05 =$jovem->getResultadoAvaliacao(4,$dataIni, $dataFim);
            $pesquisa06 =$jovem->getResultadoAvaliacao(3,$dataIni, $dataFim);

            return view('avaliacao-programa', compact('pesquisa06','pesquisa05','pesquisa04','pesquisa03','pesquisa01','pesquisa02','gestores','relatorioJovem','RelacaoJovemGestor', 'nome', 'nomeGestor','dashSatisfacao',
            'satisfacao','frequencia','dashFrequencia','ativos','dashOcorrencias','ocorrencia','pesquisa','competencias'));
         }
    
    }