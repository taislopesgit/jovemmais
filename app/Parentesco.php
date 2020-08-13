<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Parentesco extends Model
{
  protected $table = 'tb_parentesco';
  protected $primaryKey = 'id_parentesco';

  protected $fillable = ['id_parentesco','nome'];
  protected $guarded = [ 'atualizado_em', 'atualizado_por', 'criado_em','criado_por'];


  public $timestamps = false;

  public function jovem()

  {
      return $this->belongsTo('App\Jovem', 'tb_jovem', 'id_jovem', 'id_jovem');
  }


  public function familia()
  {
      return $this->belongsTo('App\Familia', 'id_parentesco', 'id_parentesco');
  }


}
