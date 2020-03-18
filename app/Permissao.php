<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $table = 'tb_permissao';
    protected $primaryKey = 'id_permissao';

    public function papeis() {
        return $this->belongsToMany('App\Papel', 'tb_papel_permissao', 'id_permissao', 'id_papel');
    }
    
}