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
       //var_dump($a);
        
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

        if($oModelProduto->insertProduto($NomProduto,$PrecProduto,$DescProduto)){
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto Inserido com Sucesso!
              </div>
              '
            ];
        }else{
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Produto não foi inserido!'
            ];
        }
        $oControllerProduto = new ControllerProduto;
        return $oControllerProduto -> processPage();
    }
}
