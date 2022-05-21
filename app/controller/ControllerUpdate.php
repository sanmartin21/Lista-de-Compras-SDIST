<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewUpdate;
use App\Model\ModelProduto;

use App\Db\Connection;

class ControllerUpdate extends ControllerPadrao
{
    function processPage()
    {
        //var_dump(Connection::get());
        
        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();
       //var_dump($a);
        
        $sTitle = 'PRODUCT';

        $sContent = ViewUpdate::render([
            'IViewUpdateContent' => "<h1>$sTitle</h1>",
            'tabelaUpdate' => ViewUpdate::getHtmlTabelaUpdate($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processUpdate(){
        
        $codProduto = $_GET['prodcodigo'];
        $NomProduto = $_GET['prodnome'];
        $PrecProduto = $_GET['prodpreco'];
        $DescProduto = $_GET['proddescricao'];

        $oModelProduto = new ModelProduto;
        $oControllerProduto = new ControllerProduto;

        if($oModelProduto->updateProduto($codProduto,$NomProduto,$PrecProduto,$DescProduto)){
            $oControllerProduto->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto alterado com Sucesso!
              </div>
              '
            ];
        }else{
            $oControllerProduto->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Produto não foi alterado!'
            ];
        }
        return $oControllerProduto -> processPage();
    }
}
