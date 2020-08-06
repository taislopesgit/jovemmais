<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ocorrencia;
use App\Tipo_ocorrencia;
use App\Jovem;
use App\User;
use App\Cliente;
use App\Curso;
use App\Polo;
use App\Disciplina;
use App\Disciplina_diaria;



class OcorrenciaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $ocorrencia;
    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function cadastraOcorrencia (Request $request, Ocorrencia $ocorrencia, Jovem $jovem, Tipo_ocorrencia $tipo_ocorrencia)
    {

      $dadosTipoOcorrencia = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21];
      $dadoOcorrencia=$jovem->dadosOcorrencia();
      $verOcorrencia = $jovem ->ocorrenciaJovem();

      return view('cadastra-ocorrencia',compact('dadosTipoOcorrencia','verOcorrencia','ocorrenciaJovem','dadoOcorrencia','dadosOcorrencia'));

    }

    public function salvaOcorrencia(Request $request, Ocorrencia $ocorrencia)
    {


      $insert = $ocorrencia->create($request->all());
      //dd($insert);

      if ($insert)
          return redirect()
                      ->route('cadastrar')
                      ->with('success', 'Ocorrência inserida com sucesso!');


      return redirect()
                  ->back()
                  ->with('error', 'Falha ao inserir');
    }


    public function buscaOcorrencia(Request $request, Ocorrencia $ocorrencia, Jovem $jovem)
    {

      $dadosFiltro = $request->except('_token');
      $ocorre = $ocorrencia->filtroOcorrencia($dadosFiltro);
      //dd($ocorre);



      $dadoOcorrencia=$jovem->dadosOcorrencia();
      $verOcorrencia = $jovem ->ocorrenciaJovem();


      return view('busca-ocorrencia',compact('filtroOcorrencia','dadosFiltro','ocorre','ocorrencia','totalPage','dadosTipoOcorrencia','verOcorrencia','ocorrenciaJovem','dadoOcorrencia','dadosOcorrencia'));

    }

    public function relacaoOcorrencia(Request $request, Ocorrencia $ocorrencia, Jovem $jovem)
    {


      $dadoOcorrencia=$jovem->dadosOcorrencia();
      $verOcorrencia = $jovem ->ocorrenciaJovem();


      return view('relacao-ocorrencia',compact('dadosTipoOcorrencia','verOcorrencia','ocorrenciaJovem','dadoOcorrencia','dadosOcorrencia'));

    }


}

