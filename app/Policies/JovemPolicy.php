<?php

namespace App\Policies;

use App\User;
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

    public function index(User $user, Jovem $jovem)
    {
        return $user->id == $jovem->user_id;
        
    }


}
