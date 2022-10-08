<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewInsert;
use App\Model\ModelProduto;

use App\Db\Connection;

class ControllerInsert extends ControllerPadrao
{
    function processPage()
    {
        //var_dump(Connection::get());
        
        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();
        
        $sTitle = 'PRODUCT';

        $sContent = ViewInsert::render([
            'IViewInsertContent' => "<h1>$sTitle</h1>",
            'tabelaInsert' => ViewInsert::getHtmlTabelaInsert($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processInsert(){
        $NomProduto = $_GET['prodnome'];
        $PrecProduto = $_GET['prodpreco'];
        $DescProduto = $_GET['proddescricao'];

        $oModelProduto = new ModelProduto;
        $oControllerProduto = new ControllerProduto;

        if($oModelProduto->insertProduto($NomProduto,$PrecProduto,$DescProduto)){
            $oControllerProduto->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto Inserido com Sucesso!
              </div>
              '
            ];
        }else{
            $oControllerProduto ->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Produto não foi inserido!'
            ];
        }
       
        return $oControllerProduto -> processPage();
    }
}
