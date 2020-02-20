<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Permission;
use App\Jovem;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   
    public function jovem () {
        return $this->belongsTo(Jovem::class);
    }


    //regra que o usuário está vinculado
    public function roles()
    {
         return $this->belongsToMany(\App\Role::class);
    }

    //recuperar papeis
    public function hasPermission (Permission $permission) 
    {
        
        return $this->hasAnyRoles($permission->roles);
        
    }
    //autorizacao do usuario
    public function hasAnyRoles($roles)
    {
        if(is_array($roles) || is_object($roles) ) {
            
            return !! $roles->intersect($this->roles)->count();
        }
        
        return $this->roles->contains('name', $roles);
    }

   

    



    
}