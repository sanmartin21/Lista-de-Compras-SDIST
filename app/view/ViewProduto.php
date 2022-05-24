<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProduto extends ViewPadrao
{

  static function getHtmlTabelaProduto(array $a)
  {
    $sHtml = '
    
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Descrição</th>  
            <th scope="col"></th>          
            <th scope="col"><a href="index.php?pg=insert&prodcodigo=" class="btn btn-secondary btn-lg" role="button" aria-disabled="true">CADASTRAR!</a></th>  
          </tr>
        </thead>';

    foreach ($a as $x) {
      $sHtml .= '
        <tr>
          <td>' . $x["prodcodigo"] . '</td>
          <td>' . $x["prodnome"] . '</td>
          <td>' . $x["prodpreco"] . '</td>
          <td>' . $x["proddescricao"] . '</td>
          <td><i class="fa fa-trash " aria-hidden="true"></i><a  href="index.php?pg=produtos&act=delete&prodcodigo='.$x["prodcodigo"].'" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">deletar</a></td>
          <td><i class="fa fa-upload" aria-hidden="true"></i><a href="index.php?pg=update&prodcodigo='.$x["prodcodigo"].'" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">alterar</a></td>
        </tr>
        ';
    }
    $sHtml .= ' </table>
      </tbody>';
    return $sHtml;
  }
}
