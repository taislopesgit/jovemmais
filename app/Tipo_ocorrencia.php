<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_ocorrencia extends Model
{

    protected $table = 'tb_tipo_ocorrencia';
    protected $primaryKey = 'id_tipo_ocorrencia';

    protected $fillable = ['id_natureza_ocorrencia','nome','id_tipo_ocorrencia','descricao','referencia','criado_por'];
    protected $guarded = [ 'atualizado_em', 'atualizado_por', 'criado_em'];

    public $timestamps = false;

    public function ocorrencia () {
      return $this->belongsTo ('App\Ocorrencia','id_jovem','id_jovem');
  }








}
