<?php

namespace App\Model;

use App\Db\Connection;
use App\Model\ModelPadrao;

class ModelLogin extends ModelPadrao
{
    function getTable(){
        return 'projetin.tbusuario';
    }

    function insertLogin($logUser,$logSenha)
    {
        return parent::insertLogin(
            $logUser,$logSenha
        );
    }
    
}