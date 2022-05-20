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
            <th scope="col"><a href="index.php?pg=insert&proid=" class="btn btn-secondary btn-lg" role="button" aria-disabled="true">CADASTRAR!</a></th>  
          </tr>
        </thead>';

    foreach ($a as $x) {
      $sHtml .= '
        <tr>
          <td>' . $x["prodcodigo"] . '</td>
          <td>' . $x["prodnome"] . '</td>
          <td>' . $x["prodpreco"] . '</td>
          <td>' . $x["proddescricao"] . '</td>
          <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg><a  href="index.php?pg=produtos&act=delete&prodcodigo='.$x["prodcodigo"].'" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">deletar</a></td>
          <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z"/>
        </svg><a href="index.php?pg=update&prodcodigo='.$x["prodcodigo"].'" class="btn btn-secondary btn-sm" role="button" aria-disabled="true">alterar</a></td>
        </tr>
        ';
    }
    $sHtml .= ' </table>
      </tbody>';
    return $sHtml;
  }
}
