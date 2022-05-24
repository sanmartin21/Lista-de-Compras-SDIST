<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewUsuario;
use App\Model\ModelUsuario;

class ControllerUsuario extends ControllerPadrao
{
    function processPage()
    {

        
        $sTitle = '';

        $sContent = ViewUsuario::render([
            'usuarioContent' => "<h1>$sTitle</h1>",
            'tabelaUsuario' => ViewUsuario::getHtmlTabelaUsuario()
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processCheckLogin(){
        $logUser = $_GET['userlogin'];
        $logSenha = $_GET['usersenha'];

        $oModelUsuario = new ModelUsuario;
        $oControllerUsuario = new ControllerUsuario;

        if($oModelUsuario->checkLogin($logUser,$logSenha)){
            $oControllerUsuario->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Usuário está cadastrado!
              </div>
              '
            ];
        }else{
            $oControllerUsuario ->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Usuário não está cadastrado!'
            ];
        }
       
        return $oControllerUsuario -> processPage();
    }

   
}
