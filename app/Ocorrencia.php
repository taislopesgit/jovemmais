<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use App\Permissao;
use App\Jovem;
use App\Usuario;

class Ocorrencia extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_ocorrencia';
    protected $primaryKey = 'id_ocorrencia';

   


    

   

}