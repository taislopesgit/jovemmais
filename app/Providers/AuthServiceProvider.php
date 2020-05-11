<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;
use App\Usuario;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot( GateContract $gate )
    {
        $this->registerPolicies($gate);

        $permissoes = Permissao::with('papeis')->get();
        
        foreach ( $permissoes as $permissao ) {
            $gate->define($permissao->nome, function(Usuario $usuario) use ($permissao) {
                return $usuario->getPermissao($permissao);
            });
        }
       
/** Permitir acesso integral ao administrador */

            //$gate->before(function(Usuario $usuario, $ability){

               // if ( $usuario->getPapelPermissao('adm') )
                 //   return true;

           // });
    }
}   