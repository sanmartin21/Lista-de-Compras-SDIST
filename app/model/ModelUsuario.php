<?php

namespace App\Model;

use App\Db\Connection;
use App\Model\ModelPadrao;

class ModelUsuario extends ModelPadrao
{
    function getTable(){
        return 'projetin.tbusuario';
    }

    
    function checkLogin($logUser,$logSenha)
    {
        return parent::checkLogin(
            $logUser,$logSenha
        );
    }

    
}