<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Familia extends Model
{
  protected $table = 'tb_familia';
  protected $primaryKey = 'id_familia';

  protected $fillable = ['id_jovem','id_parentesco','nome','email','telefone','celular','data_nascimento','sexo','raca','criado_por'];
  protected $guarded = [ 'id_familia','atualizado_em', 'atualizado_por', 'criado_em',];

  public $timestamps = false;

  public function jovem()

    {
        return $this->belongsTo('App\Jovem', 'tb_jovem', 'id_jovem', 'id_jovem');
    }


    public function parente()
    {
        return $this->hasMany('App\Parentesco', 'id_parentesco', 'id_parentesco');
    }

    public function editJovem(int $id)

    {

        $jovemEdicao = DB::table('tb_jovem')
            ->join('tb_familia', 'tb_jovem.id_jovem', '=', 'tb_familia.id_jovem')
            ->join('tb_parentesco', 'tb_familia.id_parentesco', '=', 'tb_parentesco.id_parentesco')


            ->select(
              'tb_jovem.id_jovem as id' ,
              'tb_jovem.nome as jovem' ,
              'tb_familia.nome as nome',
              'tb_familia.celular',
              'tb_parentesco.nome as parente',
              'tb_parentesco.id_parentesco'

            )

           ->where('tb_jovem.id_jovem', $id)
            ->Paginate(10);
        //dd($jovemEdicao);
        return  $jovemEdicao;
    }


}
