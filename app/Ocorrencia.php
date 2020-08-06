<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Ocorrencia extends Model
{

    protected $table = 'tb_ocorrencia';
    protected $primaryKey = 'id_ocorrencia';

    protected $fillable = ['id_tipo_ocorrencia','id_jovem','id_matricula','id_cronograma','descricao','responsavel','criado_por'];
    protected $guarded = [ 'id_ocorrencia','atualizado_em', 'atualizado_por', 'criado_em',];

    public $timestamps = false;

    public function id_tipo_ocorrencia () {
      return $this->hasMany('App\Tipo_ocorrencia','id_tipo_ocorrencia','id_tipo_ocorrencia');
  }



  public function filtroOcorrencia(array $dados)
  {
    $ocorrencia = DB::table('tb_ocorrencia')

            ->select(
                'tb_ocorrencia.id_jovem',
                'tb_ocorrencia.id_ocorrencia',
                'tb_ocorrencia.id_tipo_ocorrencia',
                'tb_ocorrencia.responsavel',
                'tb_ocorrencia.criado_em',
                'tb_ocorrencia.descricao'

            );

    $ocorrencia = $ocorrencia->where(function($query) use ($dados){
          if (isset($dados['id_jovem']))
            $query->where('id_jovem', $dados['id_jovem']);
          if (isset($dados['id_ocorrencia']))
            $query->where('id_ocorrencia', $dados['id_ocorrencia']);
          if (isset($dados['id_tipo_ocorrencia']))
            $query->where('id_tipo_ocorrencia', $dados['id_tipo_ocorrencia']);
          if (isset($dados['responsavel']))
            $query->where('tb_ocorrencia.responsavel', 'LIKE', '%' . $dados['responsavel'] . '%');
          if (isset($dados['criado_em']))
            $query->where('criado_em', $dados['criado_em']);
          if (isset($dados['descricao']))
            $query->where('descricao', $dados['descricao']);
      })
       ->OrderBy('tb_ocorrencia.criado_em')
      ->Paginate(10);
  return $ocorrencia;
    }




}
