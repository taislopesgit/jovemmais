<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Ocorrencia;
use App\Matricula;
use App\Cliente;
use App\Gestor;

class Matricula extends Model
{
    protected $fillable = ['data_inicio','registro_folha','centro_custo','data_inicio','data_fim','id_jovem','id_grupo',];
    protected $guarded = ['id_matricula', 'criado_em', 'atualizado_em'];
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
