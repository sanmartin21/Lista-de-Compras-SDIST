<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewInsert extends ViewPadrao
{
  static function getHtmlTabelaInsert(array $a)
  {
    $sHtml = '
        <div class="row g-3">
        <div class="col">
        <fieldset>
            <legend>Cadastro de Produtos: </legend></br></br>
            <form action="index.php" method="GET">
                <input required type="text" name="prodnome" class="form-control" placeholder="Insira o nome do Produto:" aria-label="First name"></br>
                <input required type="number" name="prodpreco" class="form-control" placeholder="Insira o Preço do Produto:" aria-label="First name" step="0.01" min="0"></br>
                <input required type="number" name="prodquantidade" class="form-control" placeholder="Insira a Quantidade do Produto:" aria-label="First name"></br>
                <input type="hidden" name="pg" value="insert"><br>
                <input type="hidden" name="act" value="insert"><br>
                <input class="btn btn-primary" type="submit" value="Cadastrar!"><br>
            </form>
        </fieldset>
    <br><br><br>

    </div>
    </div>
    <br><br>';
    return $sHtml;
  }
}
