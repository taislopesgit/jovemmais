<?php



namespace App\Providers;



use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Usuario;
use App\Permissao;

class AppServiceProvider extends ServiceProvider
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

      
    }
}