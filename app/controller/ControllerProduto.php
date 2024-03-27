<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewProduto;
use App\Model\ModelProduto;

class ControllerProduto extends ControllerPadrao
{
    function processPage()
    {
        $oModelProduto = new ModelProduto;
        $a = $oModelProduto->getAll();
        $total = ModelProduto::calculateTotalForAllProducts($a);

        $sTitle = 'Lista de Compras';

        $sContent = ViewProduto::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewProduto::getHtmlTabelaProduto($a, $total)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    function processDelete()
    {
        $iId = $_GET['prodcodigo'] ?? '';

        $oModelProduto = new ModelProduto;
        $oModelProduto->id = $iId;

        if ($oModelProduto->deleteProduto()) {
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Produto Excluído com Sucesso!
              </div>
              '
            ];
        } else {
            $this->footerVars = [
                'footerContent' => '<div class="alert alert-success" role="alert">
                Erro! Produto não foi excluído!'
            ];
        }

        return $this->processPage();
    }
}
