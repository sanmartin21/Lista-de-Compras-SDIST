<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProduto extends ViewPadrao
{
  static function getHtmlTabelaProduto(array $a, $total)
  {
    $sHtml = '
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Item</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>  
                <th scope="col">Total</th>
                <th scope="col"></th>          
                <th scope="col"><a href="index.php?pg=insert&prodcodigo=" class="btn btn-secondary btn-lg" role="button" aria-disabled="true">CADASTRAR!</a></th>  
              </tr>
            </thead>';

    foreach ($a as $x) {
      $totalProduto = $x["prodquantidade"] * $x["prodpreco"];
      $sHtml .= '
                <tr>
                 <td>' . $x["prodcodigo"] . '</td>
                 <td>' . $x["prodnome"] . '</td>
                 <td>' . $x["prodpreco"] . '</td>
                 <td>' . $x["prodquantidade"] . '</td>
                 <td>' . $totalProduto . '</td>
                 <td><i class="fa fa-trash " aria-hidden="true"></i><a href="index.php?pg=listaDeCompras&act=delete&prodcodigo=' . $x["prodcodigo"] . '" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">deletar</a></td>
                </tr>';
    }

    $sHtml .= '
            <tfoot>
              <tr>
                <td colspan="4">Somatório Total</td>
                <td>' . $total . '</td>
                <td colspan="2"></td>
              </tr>
            </tfoot>
          </table>';
    return $sHtml;
  }
}

?>

<style>
  tfoot {
    background-color: #f2f2f2;
    /* Cor de fundo para destacar */
    font-weight: bold;
    /* Fazer o texto em negrito */
  }
</style>