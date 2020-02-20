<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Cliente;
use App\Gestor;

class Jovem extends Model
{
    protected $fillable = ['nome','data_nascimento','sexo','email','raca','deficiente','cep'];
    protected $guarded = ['id_jovem', 'criado_em', 'atualizado_em'];
    protected $table = 'tb_jovem';
    protected $primaryKey = 'id_jovem';



<<<<<<< HEAD
    public function usuario()
=======
    public function user()
>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee
    {
        
        return $this->belongsTo('App\Usuario', 'tb_usuario', 'id_usuario', 'id_usuario'); 
    }


    public function matriculas () {
        return $this->hasMany('App\Matricula','id_jovem','id_jovem');
    }


    public function getNomeAttribute($value){
        return ucwords($value);
    }


    public function getDataNascimentoAttribute($value){
        return date(
            'd/m/Y',
            strtotime(
                $value
            )
        );
    }

    public function filtroDados (Array $dados ) {
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
              
            
            $jovens = $jovens->where(function($query) use ($dados){
                if (isset($dados['id']))
                    $query->where('tb_jovem.id_jovem',$dados['id']);
                if (isset($dados['nome']))
                    $query->where('tb_jovem.nome', 'LIKE', '%' . $dados['nome'] . '%');
                if (isset($dados['sexo']))
                    $query->where('sexo',$dados['sexo']);     
                if (isset($dados['cliente']))
                    $query->where('nome_fantasia',$dados['cliente']);    
                if (isset($dados['curso']))
                    $query->where('tb_curso.nome',$dados['curso']); 
                if (isset($dados['status']))
                    $query->where('tb_matricula.data_inicio',$dados['status']);        
                if (isset($dados['data-inicio']))
                    $query->where('tb_matricula.data_inicio',$dados['data-inicio']);   
                if (isset($dados['data-fim']))
                    $query->where('tb_matricula.data_desligamento',$dados['data-fim']);
               
                    
                             
            })
            
            ->OrderBy('tb_matricula.data_inicio', 'DESC')
            ->Paginate(10);       
           return $jovens;
    }

    public function jovemDados2 () {
      
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
               
            -> where('tb_jovem.id_usuario', Auth::id())->Paginate(10);
            //dd($verJovens);
            return $verJovens;
    }


    public function jovemSobre2 () {
      
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
          
            -> where('tb_jovem.id_usuario', Auth::id())->Paginate(1);
            return $sobreJovem;
    }
    

    public function jovemEvolucao (int $id) {
      
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
                  
            ->where('tb_jovem.id_jovem', $id)
            ->simplePaginate(1);
             //dd($evolucoes);
            return  $evolucoes;
    }

    public function programaSobre () {
      
        $sobre = DB::table('tb_jovem','tb_cliente','tb_beneficio', 'tb_cronograma')
            ->select(
                
                DB::raw('(SELECT COUNT(*) FROM tb_jovem as j WHERE j.id_jovem) as jovens '),

                DB::raw('(SELECT COUNT(*) FROM tb_beneficio as b WHERE b.id_beneficio) * (SELECT COUNT(*) FROM tb_beneficio as b WHERE b.id_beneficio) /100 as valor '),

                DB::raw('(SELECT COUNT(*) FROM tb_cronograma as c WHERE c.data_disciplina <= CURRENT_DATE()) as dias'),
                
                DB::raw('(SELECT COUNT(*) FROM tb_cliente as c WHERE c.id_cliente) as cliente ')
                  
                )  
            ->paginate(1);
            return $sobre;
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
            'tb_jovem.id_jovem',
            'tb_contato.id_contato',
            'tb_contato_cliente.id_contato',
            'tb_contato.email',
            'tb_contato.celular',
            'tb_cliente.nome_fantasia as empresa',  
            'tb_contato.nome'
        )
    
        ->where('tb_contato.id_contato', $id)
        ->orderBy('tb_contato.nome')
        ->paginate(50);
      
        return $gestores;
        }


        public function jovemDados1 (int $id) {
      
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
                   
                ->where('tb_jovem.id_jovem', $id)
                ->orderBy('tb_cronograma.data_disciplina')
                
                ->simplePaginate(10); 
                return $verJovens;
        }

<<<<<<< HEAD

        public function jovemSobre1 (int $id) {
      
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
                   
                ->where('tb_jovem.id_jovem', $id)
                ->simplePaginate(1); 
                
                return $sobreJovem;
        }

        
    public function jovemEvolucao2 () {
      
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
            //->simplePaginate(1)
            -> where('tb_jovem.id_usuario', Auth::id())->simplePaginate(1);
            return  $evolucoes;
    }

    public function perfilJovem()
    { 
        $jovemPerfil = DB::table('tb_jovem')
        ->join('tb_matricula', 'tb_jovem.id_jovem', '=', 'tb_matricula.id_jovem')
        ->join('tb_cronograma', 'tb_matricula.id_matricula', '=', 'tb_cronograma.id_matricula')
        ->join('tb_cliente', 'tb_matricula.id_cliente', '=', 'tb_cliente.id_cliente')
        ->join('tb_contato_matricula', 'tb_matricula.id_matricula', '=', 'tb_contato_matricula.id_matricula')
        ->join('tb_contato_cliente', 'tb_contato_matricula.id_contato_cliente', '=', 'tb_contato_cliente.id_contato_cliente')
        ->join('tb_contato', 'tb_contato_cliente.id_contato', '=', 'tb_contato.id_contato')
        ->join('tb_justificativa', 'tb_cronograma.id_justificativa', '=', 'tb_justificativa.id_justificativa')
        ->join('tb_disciplina', 'tb_cronograma.id_disciplina', '=', 'tb_disciplina.id_disciplina')
        ->join('tb_grupo', 'tb_matricula.id_grupo', '=', 'tb_grupo.id_grupo')
        ->join('tb_polo', 'tb_grupo.id_polo', '=', 'tb_polo.id_polo')
        ->join('tb_curso', 'tb_grupo.id_curso', '=', 'tb_curso.id_curso')
        
        ->select(

                    'tb_contato.id_usuario',
                    'tb_jovem.id_jovem',
                    'tb_jovem.nome as jovem',
                    'tb_jovem.data_nascimento',
                    'tb_jovem.sexo',
                    'tb_jovem.email',
                    'tb_contato.id_contato',
                    'tb_contato_cliente.id_contato',
                    'tb_contato.email',
                    'tb_contato.celular',
                    'tb_cliente.nome_fantasia as empresa',  
                    'tb_contato.nome',
                    'tb_polo.nome as polo',
                    'tb_matricula.data_inicio',
                    'tb_matricula.data_desligamento',
                    'tb_cronograma.data_disciplina',
                    'tb_justificativa.descricao as justificativa',
                    'tb_disciplina.nome as disciplina',
                    'tb_disciplina.descricao',
                    'tb_cronograma.data_disciplina',
                    'tb_cronograma.hora_primeira_marcacao',
                    'tb_cronograma.hora_segunda_marcacao',
                    'tb_cronograma.hora_terceira_marcacao',
                    'tb_cronograma.hora_quarta_marcacao',

                    DB::raw('(SELECT COUNT(*) FROM tb_jovem as j WHERE j.id_jovem) as jovens ')
        )
    
        -> where('tb_contato.id_usuario', Auth::id())->Paginate(10); 
        return $jovemPerfil;
        }


    
=======
       
>>>>>>> ed3e3108c46b3ab9969a6adfa7ee778cb1176bee
}

