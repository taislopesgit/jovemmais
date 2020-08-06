<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Jovem;


class Contato extends Model
{

    protected $table = 'tb_contato';
    protected $primaryKey = 'id_contato';

    protected $fillable = ['id_contato','nome','id_matricula','telefone','celular','email','atualizado_por'];
    protected $guarded = [ 'atualizado_em','criado_em',];

    public $timestamps = false;



}
