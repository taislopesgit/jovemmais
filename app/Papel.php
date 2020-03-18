<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $table = 'tb_papel';
    protected $primaryKey = 'id_papel';

   
}