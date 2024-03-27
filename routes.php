<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'listaDeCompras':
            return (new App\Controller\ControllerProduto)->render();
            break;
        case 'insert':
            return (new App\Controller\ControllerInsert)->render();
            break;
    }

    return 'Página não encontrada!';
}
