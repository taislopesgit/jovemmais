<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Jovem;
use App\Matricula;
use App\Familia;
use App\Parentesco;
use App\Perfil;
use App\Cliente;
use App\Usuario;
use App\Papel;
use App\Permissao;
use App\Ocorrencia;
use App\Grupo;
use App\Disciplina_diaria;
use Carbon\Carbon;


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
        $ferias = $jovem->qtdFerias();
        $jovemDesligado = $jovem->desligamento();


        return view('face', compact('jovemDesligado','desligamento','ferias','qtdFerias','face','faceToface','relatorioJovem','RelacaoJovemGestor',
        'dashFrequencia', 'frequencia', 'dashSatisfacao', 'satisfacao','jovemParticipante','participante',
    'nome','nomeGestor','RelacaoProgresso','progressoJovem','concluidoJovem', 'RelacaoConcluido'));

    }

    public function ocorrenciaJovem(Request $request, Jovem $jovem)
    {



        $face = $jovem->faceToface();
        $relatorioJovem = $jovem->RelacaoJovemGestor();
        $verOcorrencia = $jovem ->ocorrenciaJovem();

        return view('ocorrencia-jovem', compact('verOcorrencia','ocorrenciaJovem','face','faceToface','relatorioJovem','RelacaoJovemGestor'));

    }


    public function jovemDesempenho(Request $request, Jovem $jovem)

{

    $face = $jovem->faceToface();
    $relatorioJovem = $jovem->RelacaoJovemGestor();
    $dashFrequencia = $jovem->frequencia();
    $dashSatisfacao = $jovem->satisfacao();
    $jovemParticipante = $jovem->participante();
    $nome = $jovem->nomeGestor();
    $progressoJovem = $jovem->RelacaoProgresso();
    $concluidoJovem = $jovem->RelacaoConcluido();
    $ferias = $jovem->qtdFerias();
    $jovemDesligado = $jovem->desligamento();
    $evolucoesJovem = $jovem->chartEvolucao();


    return view('desempenho-jovem', compact('evolucoesJovem','chartEvolucao','jovemDesligado','desligamento','ferias','qtdFerias','face','faceToface','relatorioJovem','RelacaoJovemGestor',
    'dashFrequencia', 'frequencia', 'dashSatisfacao', 'satisfacao','jovemParticipante','participante',
    'nome','nomeGestor','RelacaoProgresso','progressoJovem','concluidoJovem', 'RelacaoConcluido'));

}




    public function jovemPerfil(Request $request, Jovem $jovem)
    {

        $usuarios = Jovem::where('id_usuario', Auth::id())->get();
        $verJovens = $jovem->jovemDadosUser();
        $sobreJovem = $jovem->jovemSobreUser();
        $evolucoes = $jovem->jovemEvolucaoUser();
        $frequencias = $jovem->frequenciaUser();

        $verOcorrenciaId = $jovem->ocorrenciaJovemId();


    return view('perfil-jovem', compact('ocorrenciaJovemId','verOcorrenciaId','data','verJovens','jovemDadosUser','sobreJovem','jovemSobreUser',
    'evolucoes', 'jovemEvolucaoUser','usuarios','frequencias','frequenciaUser'));
    }



    public function JovemGestor(Request $request, Jovem $jovem)
        {
            $gestores = Jovem::where('id_usuario', Auth::id())->get();
            $relatorioJovem = $jovem->RelacaoJovemGestor();
            $nome = $jovem->nomeGestor();

            $dashSatisfacao = $jovem->satisfacao();
            $dashFrequencia = $jovem->frequencia();
            $dashOcorrencias = $jovem->qtdOcorrencia();


            $pesquisa = $jovem->testePesquisa();

            $competencias=array();
            $competencias['combo1'] = 1;
            $competencias['combo2'] = 1;
            $competencias['combo3'] = 1;
            $competencias['combo4'] = 1;
            $competencias['total'] = 1;


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
           'satisfacao','frequencia','dashFrequencia','ativos','dashOcorrencias','qtdOcorrencia','pesquisa','testePesquisa','competencias'));
        }


        public function avaliacaoPrograma(Request $request, Jovem $jovem)
        {

            $gestores = Jovem::where('id_usuario', Auth::id())->get();
            $relatorioJovem = $jovem->RelacaoJovemGestor();
            $nome = $jovem->nomeGestor();

            $dashSatisfacao = $jovem->satisfacao();
            $dashFrequencia = $jovem->frequencia();
            $dashOcorrencias = $jovem->qtdOcorrencia();


            $dataIni = date('Y-m-d', strtotime('-180 days', strtotime('now')));
            $dataFim = date('Y-m-d');

            $pesquisa01 =$jovem->getResultadoAvaliacao(2,$dataIni, $dataFim);
            $pesquisa02 =$jovem->getResultadoAvaliacao(1,$dataIni, $dataFim);
            $pesquisa03 =$jovem->getResultadoAvaliacao(6,$dataIni, $dataFim);
            $pesquisa04 =$jovem->getResultadoAvaliacao(5,$dataIni, $dataFim);
            $pesquisa05 =$jovem->getResultadoAvaliacao(4,$dataIni, $dataFim);
            $pesquisa06 =$jovem->getResultadoAvaliacao(3,$dataIni, $dataFim);

            return view('avaliacao-programa', compact('pesquisa06','pesquisa05','pesquisa04','pesquisa03','pesquisa01','pesquisa02','gestores','relatorioJovem','RelacaoJovemGestor', 'nome', 'nomeGestor','dashSatisfacao',
            'satisfacao','frequencia','dashFrequencia','ativos','dashOcorrencias','qtdOcorrencia','pesquisa','competencias'));
         }




    public function cadastraJovem( Request $request, Jovem $jovem, Matricula $matricula)
    {

        $idUsuario = Usuario::where('id_usuario', Auth::id())->get();

        return view('cadastra-jovem', compact('idUsuario'));

    }


    public function salvaJovem( Request $request, Jovem $jovem, Matricula $matricula)
    {

      $novoJovem = $jovem ->insert($request->except('_token'));


      if ($novoJovem)
          return redirect()
                      ->route('cadastra-jovem')
                      ->with('success', 'Jovem inserido com sucesso!');


      return redirect()
                  ->back()
                  ->with('error', 'Falha ao inserir');
    }





    public function cadastraFamilia( Request $request, Jovem $jovem, Familia $familia, Parentesco $parentesco)
    {
      $idJovem = Jovem::all();
      $idUsuario = Usuario::where('id_usuario', Auth::id())->get();
      $idParentesco = Parentesco::all();

      return view('cadastra-familia', compact('idUsuario','idJovem','idParentesco'));

    }
    public function salvaFamilia( Request $request, Jovem $jovem, Familia $familia)
    {


      $novoFamilia = $familia ->insert($request->except('_token'));


      if ($novoFamilia)
          return redirect()
                      ->route('cadastra-familia')
                      ->with('success', 'Dados inseridos com sucesso!');


      return redirect()
                  ->back()
                  ->with('error', 'Falha ao inserir');
    }





    public function matricularJovem(  Request $request, Jovem $jovem, Matricula $matricula)
    {

      $jovem = jovem::all();
      $usuario =Usuario::where('id_usuario', Auth::id())->get();
      $grupo = grupo::all();
      $cliente = cliente::all();
      $disciplina = disciplina_diaria::all();


      return view('matricula-jovem', compact('jovem','usuario','grupo','cliente','disciplina'));

    }

    public function salvarMatricula( Request $request, Jovem $jovem)

    {
      $idGrupo = $request->input('id_grupo');
      $definicaoCiclo = $jovem->getCicloseCuros($idGrupo);

      $dataInicial = $request->input('data_inicio');
      $grupo = $jovem->dadosGrupo($idGrupo);



    $ciclos = array();
    $cronograma = array();
    $i=0;

      foreach ($definicaoCiclo as $ciclo) {
        $ciclos[$ciclo->id_ciclo]['nome'] = $ciclo->nome;
        $ciclos[$ciclo->id_ciclo]['tipo'] = $ciclo->tipo;
        $ciclos[$ciclo->id_ciclo]['sigla'] =
        $ciclos[$ciclo->id_ciclo]['id_ciclo'] = $ciclo->id_ciclo;
        $ciclos[$ciclo->id_ciclo]['id_ciclo_anterior'] = $ciclo->id_ciclo_anterior;
        $ciclos[$ciclo->id_ciclo]['nivel'] = $ciclo->nivel;
        $ciclos[$ciclo->id_ciclo]['intervalo'] = $ciclo->intervalo;
        $ciclos[$ciclo->id_ciclo]['qtd'] = $ciclo->qtd;


        if($ciclo->intervalo == 1){
          $cicloData = $jovem->getDisciplinasPorCicloEDiaSemana($ciclo->id_ciclo, $ciclo->qtd, $dataInicial);
        }
        else{
          $dtInicial = date('Y-m-d', strtotime('+1 day', strtotime($ciclos[$ciclo->id_ciclo_anterior]['data_fim'])));

            if($ciclo->intervalo == 7){
              $cicloData = $jovem->getDisciplinasPorCicloEDiaSemana($ciclo->id_ciclo, $ciclo->qtd,  $dtInicial, $grupo->dia_fixo);
            }
            else{
              $cicloData = $jovem->getDisciplinasPorCicloEDiaSemana($ciclo->id_ciclo, $ciclo->qtd, $dtInicial,  $grupo->dia_complementar);
            }
        }

        $j=0;

        foreach($cicloData as $dataDisciplina){
          if ($j==0){
            $ciclos[$ciclo->id_ciclo]['data_inicio'] = $dataDisciplina->data;
          }
          if($j == count($cicloData) - 1) {
            $ciclos[$ciclo->id_ciclo]['data_fim'] = $dataDisciplina->data;
          }

          $cronograma[$dataDisciplina->data] = $dataDisciplina->id_disciplina;
          $j++;
        }

      }


    ksort($cronograma);
      dd($cronograma);


  }
    }


