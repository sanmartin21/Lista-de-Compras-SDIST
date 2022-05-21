<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewProduto;
use App\Model\ModelProduto;

use App\Db\Connection;

class ControllerProduto extends ControllerPadrao
{
    function processPage()
    {
        //var_dump(Connection::get());
        
        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();
       //var_dump($a);
        
        $sTitle = 'PRODUCT';

        $sContent = ViewProduto::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewProduto::getHtmlTabelaProduto($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processDelete(){
        $iId = $_GET['prodcodigo'] ??= '';

        $oModelProduto = new ModelProduto;
        $oModelProduto->id = $iId;
        

        if($oModelProduto->deleteProduto()){
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto Excluído com Sucesso!
              </div>
              '
            ];
        }else{
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Produto não foi excluído!'
            ];
        }

        return $this-> processPage();
    }
   
}
