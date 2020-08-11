<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = ['data_inicio','registro_folha','centro_custo','data_inicio','data_fim'];
    protected $guarded = ['id_matricula','id_jovem','id_grupo', 'criado_em', 'atualizado_em'];
    protected $table = 'tb_matricula';
    protected $primaryKey = 'id_matricula';

    public function jovem () {
        return $this->belongsTo ('App\Jovem','id_jovem','id_jovem');
    }
    public function cronograma () {
        return $this->hasMany('App\Cronograma','id_cronograma','id_cronograma');
    }

    public function disciplinas () {
        return $this->hasMany('App\Disciplina','id_disciplina','id_disciplina');
    }

    public function getDataInicioAttribute($value){
        return date(
            'd/m/Y',
            strtotime(
                $value
            )
        );
    }
}
