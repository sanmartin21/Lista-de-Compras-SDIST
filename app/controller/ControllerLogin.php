<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewLogin;
use App\Model\ModelLogin;

class ControllerLogin extends ControllerPadrao
{
    function processPage()
    {

        
        $sTitle = '';

        $sContent = ViewLogin::render([
            'loginContent' => "<h1>$sTitle</h1>",
            'tabelaLogin' => ViewLogin::getHtmlTabelaLogin()
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processInsertLogin(){
        $logUser = $_GET['userlogin'];
        $logSenha = $_GET['usersenha'];

        $oModelLogin = new ModelLogin;
        $oControllerLogin = new ControllerLogin;

        if($oModelLogin->insertLogin($logUser,$logSenha)){
            $oControllerLogin->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Login Inserido com Sucesso!
              </div>
              '
            ];
        }else{
            $oControllerLogin ->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Login não foi inserido!'
            ];
        }
       
        return $oControllerLogin -> processPage();
    }

   
}
