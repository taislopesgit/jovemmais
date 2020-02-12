<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'tb_disciplina';
    protected $primaryKey = 'id_disciplina';

    public function jovem () {
        return $this->belongsTo ('App\Jovem','id_jovem','id_jovem');
    }
    public function matriculas () {
        return $this->hasMany('App\Matricula','id_matricula','id_matricula');
    }

    public function cronograma () {
        return $this->hasMany('App\Cronograma','id_cronograma','id_cronograma');
    }


}




