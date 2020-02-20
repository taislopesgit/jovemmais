<?php

namespace App\Policies;

use App\Usuario;
use App\Jovem;
use Illuminate\Auth\Access\HandlesAuthorization;

class JovemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
/*
    public function index($usuario, Jovem $jovem)
    {
        return $usuario->id == $jovem->id;
        
    }*/


}
