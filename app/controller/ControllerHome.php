<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;
use App\Model\ModelProduto;

class ControllerHome extends ControllerPadrao
{

    function processPage()
    {
        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();
        
        $sTitle = '';

        $sContent = Viewhome::render([
            'homeContent' => "<h1>$sTitle</h1>",
            'cardHome' => Viewhome::getHtmlTabelaProduto($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}
