<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Permission;


class AuthServiceProvider extends ServiceProvider
{
    /**
     *
     * @var array
     */
    protected $policies = [
        \App\Jovem::class => App\Policies\JovemPolicy::class
        
    ];
  
    

    //busca papeis e permissoes
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission)
        //dd($permissions);
             
        {
            $gate->define($permission->name, function(User $user) use ($permission){

                return $user->hasPermission($permission);
            });
        }   

    }
}
