<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewUpdate extends ViewPadrao
{

  static function getHtmlTabelaUpdate(array $a)
  {
    $sHtml = '
        <div class="row g-3">
        <div class="col">
        <fieldset>
            <legend>Alteração de Produtos: </legend></br></br>
            <form action="index.php" method="GET">
                <input type="hidden" name="prodcodigo" value = "'.$_GET['prodcodigo'].'">
                <input required type="text" name="prodnome" class="form-control" placeholder="Insira o nome do Produto:" aria-label="First name"></br></br>
                <input required type="number" name="prodpreco" class="form-control" placeholder="Insira o Preço do Produto:" aria-label="First name"></br></br>
                <div class="form-group shadow-textarea">
                <textarea name="proddescricao" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Insira a Descrição do Produto"></textarea>
                </div>
                <input type="hidden" name="pg" value="update"><br>
                <input type="hidden" name="act" value="update"><br>
                <input class="btn btn-primary" type="submit" value="Alterar!"><br>
            </form>
        </fieldset>
    <br><br><br>

    </div>
    </div>
    <br><br>';
    return $sHtml;
  }
}
