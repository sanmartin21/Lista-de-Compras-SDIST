<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao
{

    static function getHtmlTabelaProduto(array $a)
    {
      $sHtml = '';
    foreach ($a as $x) {
      
      $sHtml .= '

  
      <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><b>' . $x["prodnome"] . '</b></h5>
        <p class="card-text">'."Descrição = ". $x["proddescricao"]. '</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>' ."Preço = ". $x["prodpreco"] . '</b>'.'</li>
        <li class="list-group-item"><b>' ."Código = ". $x["prodcodigo"]. '</b>'.'</li>
      </ul>
    </div>
    '
      ;
  }

  return $sHtml;
}
}

?>


<style type="text/css">
  .card {
padding: 20px;    
margin: 20px;
border: 20px solid red !important;
  }
</style>