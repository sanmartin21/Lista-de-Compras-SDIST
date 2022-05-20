<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;

class ControllerHome extends ControllerPadrao
{

    protected function processPage()
    {
        $sTitle = 'Jovens Talentos';

        $sContent = ViewHome::render([
            // Passar aqui os parâmetros do conteúdo da página
            'homeContent' => '<h1>IPMercado Livre</h1>'
        ]);

        $this->footerVars = [
            // Passar aqui os parametros do footer da página
            'footerContent' => '<h5>Welcome!</h5>'
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}
