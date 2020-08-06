<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Ocorrencia;
use App\Cliente;
use App\Gestor;

class Jovem extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'sexo', 'email', 'raca', 'deficiente', 'cep'];
    protected $guarded = ['id_jovem', 'criado_em', 'atualizado_em'];
    protected $table = 'tb_jovem';
    protected $primaryKey = 'id_jovem';




    public function usuario()

    {

        return $this->belongsTo('App\Usuario', 'tb_usuario', 'id_usuario', 'id_usuario');
    }


    public function matriculas()
    {
        return $this->hasMany('App\Matricula', 'id_jovem', 'id_jovem');
    }


    public function getNomeAttribute($value)
    {
        return ucwords($value);
    }


    public function getDataNascimentoAttribute($value)
    {
        return date(
            'd/m/Y',
            strtotime(
                $value
            )
        );
    }



    public function filtroDados(array $dados)
    {
        $jovens = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_grupo', 'tb_matricula.id_grupo', '=', 'tb_grupo.id_grupo')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_curso', 'tb_grupo.id_curso', '=', 'tb_curso.id_curso')
            ->select(
                'tb_cliente.nome_fantasia',
                'tb_jovem.nome',
                'tb_jovem.id_jovem',
                'tb_jovem.sexo',
                'tb_jovem.data_nascimento',
                'tb_matricula.data_inicio',
                'tb_matricula.data_desligamento',
                'tb_jovem.email',
                'tb_grupo.nome as nome_grupo',
                'tb_curso.nome as nome_curso'
            );


        $jovens = $jovens->where(function ($query) use ($dados) {
            if (isset($dados['id']))
                $query->where('tb_jovem.id_jovem', $dados['id']);
            if (isset($dados['nome']))
                $query->where('tb_jovem.nome', 'LIKE', '%' . $dados['nome'] . '%');
            if (isset($dados['sexo']))
                $query->where('sexo', $dados['sexo']);
            if (isset($dados['cliente']))
                $query->where('nome_fantasia', $dados['cliente']);
            if (isset($dados['curso']))
                $query->where('tb_curso.nome', $dados['curso']);
            if (isset($dados['status']))
                $query->where('tb_matricula.data_inicio', $dados['status']);
            if (isset($dados['data-inicio']))
                $query->where('tb_matricula.data_inicio', $dados['data-inicio']);
            if (isset($dados['data-fim']))
                $query->where('tb_matricula.data_desligamento', $dados['data-fim']);
        })

            ->OrderBy('tb_matricula.data_inicio', 'DESC')
            ->Paginate(10);
        return $jovens;
    }



    //informações via Usuário logado

    public function jovemDadosUser()
    {

        $verJovens = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
            ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')

            ->select(
                'tb_jovem.id_jovem',
                'tb_jovem.nome',
                'tb_jovem.email',
                'tb_disciplina.nome',
                'tb_disciplina.descricao',
                'tb_cronograma.data_disciplina',
                'tb_justificativa.descricao as justificativa',
                'tb_cronograma.hora_primeira_marcacao',
                'tb_cronograma.hora_segunda_marcacao',
                'tb_cronograma.hora_terceira_marcacao',
                'tb_cronograma.hora_quarta_marcacao'

            )
            ->orderBy('tb_cronograma.data_disciplina', 'desc')
            ->where('tb_jovem.id_usuario', Auth::id())->Paginate(10);


        //dd($verJovens);
        return $verJovens;
    }


    public function jovemSobreUser()
    {

        $sobreJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_grupo', 'tb_matricula.id_grupo', '=', 'tb_grupo.id_grupo')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_curso', 'tb_grupo.id_curso', '=', 'tb_curso.id_curso')
            ->join('tb_polo', 'tb_grupo.id_polo', '=', 'tb_polo.id_polo')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(
                'tb_jovem.id_usuario',
                'tb_matricula.data_inicio',
                'tb_matricula.data_fim',
                'tb_jovem.id_jovem',
                'tb_polo.nome as nomePolo',
                'tb_cliente.nome_fantasia as empresa',
                'tb_contato.nome as gestor'
            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_jovem.id_usuario', Auth::id())->Paginate(1);
        return $sobreJovem;
    }


    public function jovemEvolucaoUser()
    {

        $evolucoes = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
            ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')

            ->select(

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina) *
                (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                  / 100)  as aulaconcluida'),

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina ) -
                  (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula  AND c.data_disciplina  <= CURRENT_DATE())
                  )as aulafim'),

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula) *
                  (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.id_justificativa=1 <= CURRENT_DATE())
                  / 100 )  as aulapresenca'),


                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina AND c.hora_primeira_marcacao AND c.hora_segunda_marcacao)*
                (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.atraso_entrada AND c.atraso_almoco <= CURRENT_DATE()) / 100)  as atraso')
            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_jovem.id_usuario', Auth::id())->simplePaginate(1);
        return  $evolucoes;
    }



    public function RelacaoJovemGestor()
    {
        $relatorioJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(

                'tb_jovem.data_nascimento',
                'tb_matricula.data_inicio',
                'tb_matricula.data_desligamento',
                'tb_jovem.email',
                'tb_jovem.nome as jovem',
                'tb_jovem.sexo',
                'tb_jovem.id_jovem',
                'tb_contato.id_contato',
                'tb_contato_cliente.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_cliente.nome_fantasia as empresa',

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula AND c.data_disciplina) *
            (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
              / 100)  as aulaconcluida'),


                DB::raw('(SELECT REVERSE(SUBSTRING(GROUP_CONCAT(c.id_justificativa ORDER BY c.data_disciplina DESC) FROM 1 FOR 9))
              FROM
              tb_cronograma AS c
              INNER JOIN tb_matricula AS m ON m.id_matricula = c.id_matricula
              INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
              WHERE
              c.id_matricula = tb_matricula.id_matricula
              AND c.data_disciplina <= CURRENT_DATE)as presenca')


            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_contato.id_usuario', Auth::id())->paginate(12);
        //dd($relatorioJovem);


        return $relatorioJovem;
    }


    public function satisfacao()
    {
        $dashSatisfacao = DB::select('SELECT CEIL(AVG(r.resposta)) AS satisfacao FROM tb_matricula AS m
                        INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
                        INNER JOIN tb_cronograma AS c ON c.id_matricula = m.id_matricula
                        INNER JOIN tb_contato_matricula AS cm ON cm.id_matricula = m.id_matricula
                        INNER JOIN tb_contato_cliente AS cc ON cc.id_contato_cliente = cm.id_contato_cliente AND cc.id_tipo_cargo = 5
                        INNER JOIN tb_contato AS co ON co.id_contato = cc.id_contato
                        INNER JOIN tb_sala_alocacao AS sa ON sa.id_sala_alocacao = c.id_sala_alocacao
                        INNER JOIN tb_resposta AS r ON r.id_sala_alocacao = sa.id_sala_alocacao
                        INNER JOIN tb_pergunta AS p ON p.id_pergunta = r.id_pergunta
                        WHERE m.data_desligamento IS NULL
                         AND c.data_disciplina < CURRENT_DATE()
                         AND p.id_pergunta = 6
                         AND co.id_usuario = ?', [Auth::id()]);


       //dd($dashSatisfacao);
        return $dashSatisfacao;
    }


    public function frequencia()
    {
        $dashFrequencia = DB::select('SELECT
                COUNT(DISTINCT j.id_jovem) AS jovens,
                CEIL (
                100 -
                (
                (
                SUM(
                CASE
                WHEN c.id_justificativa = 2 THEN 1
                ELSE 0
                END
                ) * 100
                ) / COUNT(c.id_cronograma)
                )
                ) AS frequencia
                FROM
                tb_matricula AS m
                INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
                INNER JOIN tb_cronograma AS c ON c.id_matricula = m.id_matricula
                INNER JOIN tb_contato_matricula AS cm ON cm.id_matricula = m.id_matricula
                INNER JOIN tb_contato_cliente AS cc ON cc.id_contato_cliente = cm.id_contato_cliente AND cc.id_tipo_cargo = 5
                INNER JOIN tb_contato AS co ON co.id_contato = cc.id_contato
                WHERE
                m.data_desligamento IS NULL
                AND c.data_disciplina < CURRENT_DATE()
                AND co.id_usuario = ?', [Auth::id()]);

        //dd($dashFrequencia);
        return $dashFrequencia;
    }




    public function frequenciaUser()
    {
        $frequencias = DB::select('SELECT COUNT(DISTINCT j.id_jovem) AS jovens, CEIL ( 100 -(( SUM( CASE WHEN c.id_justificativa = 2 THEN 1 ELSE 0 END) * 100
            ) / COUNT(c.id_cronograma))) as frequencia FROM tb_matricula AS m
            INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
            INNER JOIN tb_cronograma AS c ON c.id_matricula = m.id_matricula
            WHERE
            m.data_desligamento IS NULL
            AND c.data_disciplina < CURRENT_DATE()
            AND j.id_usuario = ?', [Auth::id()]);

        //dd($frequencias);
        return $frequencias;
    }


    public function nomeGestor()
    {
        $nome = DB::table('tb_matricula')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')
            ->select(
                'tb_contato.nome'
            )

            ->where('tb_contato.id_usuario', Auth::id())->Paginate(1);
        //dd($nome);
        return $nome;
    }

    public function qtdOcorrencia()
    {
        $dashOcorrencias = DB::table('tb_ocorrencia')

            ->join('tb_matricula', 'tb_matricula.id_matricula', '=', 'tb_ocorrencia.id_matricula')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


            ->select('*')

            ->where('tb_contato.id_usuario', Auth::id())
            ->where('tb_matricula.data_desligamento', null)
            ->count();
            //->toSql();
             //dd($dashOcorrencias);
        return $dashOcorrencias;
    }



    public function qtdFerias()
    {
        $dataDeHoje = date( 'Y-m-d');
        $ferias = DB::table('tb_interrupcao')

            ->join('tb_matricula', 'tb_matricula.id_matricula', '=', 'tb_interrupcao.id_matricula')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


            ->select('*')

            ->where('tb_contato.id_usuario', Auth::id())
            ->where('tb_interrupcao.id_tipo_interrupcao', 1)
            ->where('tb_interrupcao.data_inicio', '<=', $dataDeHoje)
            ->where('tb_interrupcao.data_fim', '>=',  $dataDeHoje)
            ->where('tb_matricula.data_desligamento', null)
            ->count();
            //->toSql();
            //dd($ferias);
        return $ferias;
    }





    public function jovemEvolucaoId(int $id)
    {

        $evolucoes = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
            ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')

            ->select(

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina) *
                (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                  / 100)  as aulaconcluida'),

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina ) -
                  (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula  AND c.data_disciplina  <= CURRENT_DATE())
                  )as aulafim'),


                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina AND c.hora_primeira_marcacao AND c.hora_segunda_marcacao)*
                (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.atraso_entrada AND c.atraso_almoco <= CURRENT_DATE()) / 100)  as atraso')
            )

            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_jovem.id_jovem', $id)
            ->simplePaginate(1);
        //dd($evolucoes);
        return  $evolucoes;
    }


    public function frequenciaJovem(int $id)
    {
        $frequencia = DB::select('SELECT COUNT(DISTINCT j.id_jovem) AS jovens, CEIL ( 100 -(( SUM( CASE WHEN c.id_justificativa = 2 THEN 1 ELSE 0 END) * 100
            ) / COUNT(c.id_cronograma))) as frequencia FROM tb_matricula AS m
            INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
            INNER JOIN tb_cronograma AS c ON c.id_matricula = m.id_matricula
            WHERE
            m.data_desligamento IS NULL
            AND c.data_disciplina < CURRENT_DATE()
            AND j.id_jovem = ?', [$id]);

        //dd($frequencia);
        return $frequencia;
    }

    public function filtroGestor(array $dados)
    {
        $contato = DB::table('tb_contato')
            ->join('tb_contato_cliente', 'tb_contato.id_contato', '=', 'tb_contato_cliente.id_contato')
            ->join('tb_cliente', 'tb_contato_cliente.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_holding', 'tb_cliente.id_holding', '=', 'tb_holding.id_holding')
            ->select(
                'tb_contato.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_contato.nome',
                'tb_holding.nome_fantasia'
            );
        $contato = $contato->where(function ($query) use ($dados) {
            if (isset($dados['id_contato']))
                $query->where('tb_contato.id_contato', $dados['id_contato']);
            if (isset($dados['nome']))
                $query->where('tb_contato.nome', 'LIKE', '%' . $dados['nome'] . '%');
            if (isset($dados['nome_fantasia']))
            $query->where('tb_cliente.nome_fantasia', 'LIKE', '%' . $dados['nome_fantasia'] . '%');
        })
            ->groupBy(
                'tb_contato.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_contato.nome',
                'tb_holding.nome_fantasia'
            )
            ->orderBy('tb_contato.nome', 'ASC')
            ->paginate(10);
        //dd($contato);
        return $contato;
    }


    public function Gestor(int $id)
    {
        $gestores = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(

                'tb_jovem.data_nascimento',
                'tb_matricula.data_inicio',
                'tb_matricula.data_desligamento',
                'tb_jovem.email',
                'tb_jovem.nome as jovem',
                'tb_jovem.sexo',
                'tb_jovem.id_jovem'

            )

            ->where('tb_contato.id_contato', $id)
            ->paginate(10);
        return $gestores;
    }

    public function gestorNome(int $id)
    {
        $nome = DB::table('tb_matricula')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(
                'tb_contato.id_contato',
                'tb_contato_cliente.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_cliente.nome_fantasia as empresa',
                'tb_contato.nome'
            )

            ->where('tb_contato.id_contato', $id)
            ->paginate(1);
        //dd($nome);
        return $nome;
    }


    public function jovemDadosId(int $id)
    {

        $verJovens = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
            ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')

            ->select(
                'tb_jovem.id_jovem',
                'tb_disciplina.nome',
                'tb_disciplina.descricao',
                'tb_cronograma.data_disciplina',
                'tb_justificativa.descricao as justificativa',
                'tb_cronograma.hora_primeira_marcacao',
                'tb_cronograma.hora_segunda_marcacao',
                'tb_cronograma.hora_terceira_marcacao',
                'tb_cronograma.hora_quarta_marcacao'

            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_jovem.id_jovem', $id)
            ->orderBy('tb_cronograma.data_disciplina')

            ->Paginate(10);
        //dd($verJovens);
        return $verJovens;
    }



    public function jovemSobreId(int $id)
    {

        $sobreJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_grupo', 'tb_matricula.id_grupo', '=', 'tb_grupo.id_grupo')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_curso', 'tb_grupo.id_curso', '=', 'tb_curso.id_curso')
            ->join('tb_polo', 'tb_grupo.id_polo', '=', 'tb_polo.id_polo')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(
                'tb_matricula.data_inicio',
                'tb_matricula.data_fim',
                'tb_jovem.id_jovem',
                'tb_polo.nome as nomePolo',
                'tb_cliente.nome_fantasia',
                'tb_contato.nome as gestor'
            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_jovem.id_jovem', $id)

            ->simplePaginate(1);
        //dd($sobreJovem);
        return $sobreJovem;
    }


    public function programaSobre()
    {

        $sobre = DB::table('tb_jovem', 'tb_cliente', 'tb_beneficio', 'tb_cronograma')
            ->select(

                DB::raw('(SELECT COUNT(*) FROM tb_jovem as j WHERE j.id_jovem) as jovens '),
                DB::raw('ROUND((((SELECT COUNT(*) FROM tb_beneficio as b WHERE b.id_beneficio) * (SELECT COUNT(*) FROM tb_beneficio as b WHERE b.id_beneficio)) /100), 2) as valor '),
                DB::raw('(SELECT COUNT(*) FROM tb_cronograma as c WHERE c.data_disciplina <= CURRENT_DATE()) as aulas'),
                DB::raw('(SELECT COUNT(*) FROM tb_cliente as c WHERE c.id_cliente) as cliente ')

            )
            ->paginate(1);
        //dd($sobre);
        return $sobre;
    }



    public function testePesquisa()
    { {

            $dataIni = date('Y-m-d', strtotime('-180 days', strtotime('now')));
            $dataFim = date('Y-m-d');
            $pesquisa = DB::table('tb_matricula')
                ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
                ->join('tb_sala_alocacao', 'tb_cronograma.id_sala_alocacao', '=', 'tb_sala_alocacao.id_sala_alocacao')
                ->join('tb_resposta', 'tb_sala_alocacao.id_sala_alocacao', '=', 'tb_resposta.id_sala_alocacao')
                ->join('tb_pergunta', 'tb_resposta.id_pergunta', '=', 'tb_pergunta.id_pergunta')
                ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
                ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
                ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')
                ->select(

                    DB::raw('count(tb_resposta.id_resposta) as qtd, tb_resposta.resposta')
                )

                ->where('tb_matricula.data_desligamento', null)
                ->where('tb_pergunta.id_pergunta', 1)
                ->whereBetween('tb_resposta.data_referencia', [$dataIni, $dataFim])
                ->where('tb_contato.id_usuario', Auth::id())
                ->groupBy('resposta')
                ->get();
            //->toSql();
            //dd($pesquisa);
            return $pesquisa;
        }
    }
    public static function getResultadoAvaliacao($idPergunta, $dataInicio, $dataFim ) {

        $pesquisa = DB::table('tb_matricula')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_sala_alocacao', 'tb_cronograma.id_sala_alocacao', '=', 'tb_sala_alocacao.id_sala_alocacao')
            ->join('tb_resposta', 'tb_sala_alocacao.id_sala_alocacao', '=', 'tb_resposta.id_sala_alocacao')
            ->join('tb_pergunta', 'tb_resposta.id_pergunta', '=', 'tb_pergunta.id_pergunta')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')
            ->select(

                DB::raw('count(tb_resposta.id_resposta) as qtd, tb_resposta.resposta')
            )

            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_pergunta.id_pergunta', $idPergunta)
            ->whereBetween('tb_resposta.data_referencia', [ $dataInicio, $dataFim])
            ->where('tb_contato.id_usuario', Auth::id())
            ->groupBy('resposta')
            ->get();
            //->toSql();
             //dd($pesquisa);
        return $pesquisa;

    }
    public function faceToface()
    {
        $face = DB::table('tb_jovem')
            ->select(
                'tb_jovem.id_jovem',
                'tb_jovem.nome'

            )
            ->paginate(10);
        //dd($face);
        return $face;
    }


    public function ocorrenciaJovem()
    {
        $verOcorrencia = DB::table('tb_ocorrencia')

        ->join('tb_matricula', 'tb_matricula.id_matricula', '=', 'tb_ocorrencia.id_matricula')
        ->join('tb_tipo_ocorrencia','tb_ocorrencia.id_tipo_ocorrencia', '=', 'tb_tipo_ocorrencia.id_tipo_ocorrencia')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


        ->select('tb_ocorrencia.id_ocorrencia',
                 'tb_ocorrencia.id_tipo_ocorrencia',
                'tb_ocorrencia.responsavel',
                'tb_tipo_ocorrencia.nome',
                 'tb_tipo_ocorrencia.descricao',
                 'tb_ocorrencia.id_jovem'


                )

        ->where('tb_contato.id_usuario', Auth::id())
        ->where('tb_matricula.data_desligamento', null)
        ->OrderBy('tb_matricula.id_jovem')
        ->OrderBy('tb_tipo_ocorrencia.nome')
        ->paginate(10);
       //->toSql();
       //dd($verOcorrencia);
      return $verOcorrencia ;
    }

    public function ocorrenciaJovemId()
    {
        $verOcorrenciaId = DB::table('tb_ocorrencia')

        ->join('tb_matricula', 'tb_matricula.id_matricula', '=', 'tb_ocorrencia.id_matricula')
        ->join('tb_jovem', 'tb_matricula.id_jovem', '=', 'tb_jovem.id_jovem')


        ->select('tb_ocorrencia.id_ocorrencia',
                'tb_ocorrencia.id_tipo_ocorrencia',
                'tb_ocorrencia.responsavel',
                 'tb_ocorrencia.descricao',
                 'tb_ocorrencia.id_jovem'


                )
        ->where('tb_jovem.id_usuario', Auth::id())
        ->where('tb_matricula.data_desligamento', null)
        ->paginate(10);
       //->toSql();
       //dd($verOcorrenciaId);
      return $verOcorrenciaId;
    }



    public function participante()
    {
        $jovemParticipante = DB::table('tb_matricula')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


        ->select('*')

        ->where('tb_contato.id_usuario', Auth::id())

        ->count();
        //->toSql();
         //dd($jovemParticipante);
    return $jovemParticipante;
    }

    public function desligamento()
    {
        $jovemDesligado = DB::table('tb_matricula')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


        ->select('*')

        ->where('tb_contato.id_usuario', Auth::id())
        ->whereNotNull('tb_matricula.data_desligamento')
        ->count();
        //->toSql();
        //dd($jovemDesligado);
         return $jovemDesligado;
    }



    public function RelacaoProgresso()
    {
        $progressoJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(

                'tb_jovem.data_nascimento',
                'tb_matricula.data_inicio',
                'tb_matricula.data_desligamento',
                'tb_jovem.email',
                'tb_jovem.nome as jovem',
                'tb_jovem.sexo',
                'tb_jovem.id_jovem',
                'tb_contato.id_contato',
                'tb_contato_cliente.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_cliente.nome_fantasia as empresa',

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula AND c.data_disciplina) *
                   (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                     / 100)  as aulaconcluida'),




                DB::raw('(SELECT REVERSE(SUBSTRING(GROUP_CONCAT(c.id_justificativa ORDER BY c.data_disciplina DESC) FROM 1 FOR 9))
                     FROM
                     tb_cronograma AS c
                     INNER JOIN tb_matricula AS m ON m.id_matricula = c.id_matricula
                     INNER JOIN tb_jovem AS j ON j.id_jovem = m.id_jovem
                     WHERE
                     c.id_matricula = tb_matricula.id_matricula
                     AND c.data_disciplina <= CURRENT_DATE)as presenca')


            )
            ->where('tb_matricula.data_desligamento', null)
            ->where('tb_contato.id_usuario', Auth::id())->paginate(1);
        //dd($progressoJovem);


        return $progressoJovem;
    }

    public function RelacaoConcluido()
    {
        $concluidoJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(

                'tb_jovem.data_nascimento',
                'tb_matricula.data_inicio',
                'tb_matricula.data_desligamento',
                'tb_jovem.email',
                'tb_jovem.nome as jovem',
                'tb_jovem.sexo',
                'tb_jovem.id_jovem',
                'tb_contato.id_contato',
                'tb_contato_cliente.id_contato',
                'tb_contato.email',
                'tb_contato.celular',
                'tb_cliente.nome_fantasia as empresa',

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula AND c.data_disciplina) *
                      (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                        / 100)  as aulaconcluida'),

                DB::raw('(SELECT(c.id_matricula) FROM tb_matricula AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula AND c.data_desligamento) <
                      (SELECT(c.id_matricula) FROM tb_matricula AS c WHERE c.id_matricula = tb_contato_matricula.id_matricula AND c.data_fim ) <= CURRENT_DATE()  as fim')


            )
            ->where('tb_matricula.data_desligamento')
            ->where('tb_contato.id_usuario', Auth::id())
            ->paginate(30);
        //dd($concluidoJovem);


        return $concluidoJovem;
    }

    public function chartEvolucao()
    {
        $evolucoesJovem = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
            ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
            ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
            ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')

            ->select(



                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina) *
                (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                  / 100)  as aulaconcluida')

            )
            ->where('tb_matricula.data_desligamento')
            ->where('tb_contato.id_usuario', Auth::id())
            ->get();
        //dd($evolucoesJovem);


        return $evolucoesJovem;
    }


    public function admEvolucao()
    {

        $evolucoes = DB::table('tb_jovem')
            ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
            ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
            ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
            ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')

            ->select(

                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina) *
                            (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula	AND c.data_disciplina <= CURRENT_DATE())
                              / 100)  as aulaconcluida'),


                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina ) -
                              (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula  AND c.data_disciplina  <= CURRENT_DATE())
                              )as aulafim'),


                DB::raw('CEIL((SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.data_disciplina AND c.hora_primeira_marcacao AND c.hora_segunda_marcacao)*
                            (SELECT COUNT(c.id_matricula) FROM tb_cronograma AS c WHERE c.id_matricula = tb_matricula.id_matricula AND c.atraso_entrada AND c.atraso_almoco <= CURRENT_DATE()) / 100)  as atraso')
            )

            ->where('tb_matricula.data_desligamento', null)
            ->simplePaginate(1);
        //dd($evolucoes);
        return  $evolucoes;
    }

    public function dadosOcorrencia()
    {
        $dadoOcorrencia = DB::table('tb_ocorrencia')

        ->join('tb_matricula', 'tb_matricula.id_matricula', '=', 'tb_ocorrencia.id_matricula')
        ->join('tb_tipo_ocorrencia','tb_ocorrencia.id_tipo_ocorrencia', '=', 'tb_tipo_ocorrencia.id_tipo_ocorrencia')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')


        ->select('tb_ocorrencia.id_ocorrencia',
                 'tb_ocorrencia.id_tipo_ocorrencia',
                'tb_ocorrencia.responsavel',
                'tb_tipo_ocorrencia.nome',
                 'tb_tipo_ocorrencia.descricao',
                 'tb_ocorrencia.id_jovem',
                 'tb_ocorrencia.criado_por',
                 'tb_ocorrencia.criado_em'


                )

        ->where('tb_matricula.data_desligamento', null)
        ->OrderBy('tb_matricula.id_jovem')
        ->OrderBy('tb_tipo_ocorrencia.nome')
        ->paginate(10);
       //->toSql();
       //dd($dadoOcorrencia);
      return $dadoOcorrencia ;
    }



}
