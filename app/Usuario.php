<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissao;
use App\Jovem;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_usuario';
    protected $primaryKey = 'id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function jovens()
    {
        
        return $this->belongsTo('App\Jovem', 'tb_jovem', 'id_usuario', 'id_usuario'); 
    }


    public function papeis() {
        return $this->belongsToMany('App\Papel', 'tb_usuario_papel', 'id_usuario', 'id_papel');
    }

    public function getPermissao(Permissao $permissao) {
        
        return $this->getPapelPermissao($permissao->papeis);
    }

    public function getPapelPermissao($papeis) {
        if ( is_array($papeis) || is_object($papeis) ) {
                return !! $papeis->intersect($this->papeis)->count();
        }
        return $this->papeis->contains('nome', $papeis);
    }

}