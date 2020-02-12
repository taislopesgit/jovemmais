<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $table = 'tb_cronograma';
    protected $primaryKey = 'id_cronograma';

    public function jovem () {
        return $this->belongsTo ('App\Jovem','id_jovem','id_jovem');
    }
    public function matriculas () {
        return $this->hasMany('App\Matricula','id_matricula','id_matricula');
    }

    public function disciplinas () {
        return $this->hasMany('App\Disciplina','id_disciplina','id_disciplina');
    }
    
   
    
}




