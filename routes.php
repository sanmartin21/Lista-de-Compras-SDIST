<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
            break;
        case 'produtos':
            return (new App\Controller\ControllerProduto)->render();
            break;
        case 'insert':
            return (new App\Controller\ControllerInsert)->render();
            break;
        case 'update':
            return (new App\Controller\ControllerUpdate)->render();
    }

    return 'Página não encontrada!';
}
