<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewLogin extends ViewPadrao
{

    static function getHtmlTabelaLogin()
  {
    $sHtml = '
    <div class="container"
    <div class="row g-3">
    <div>
    <h1>CADASTRO DE USUÁRIO</h1>
    </div>
        <div class="col-12">
        <fieldset>
            <form action="index.php" method="GET">
                <input required type="number" name="userlogin" class="form-control" placeholder="Insira o Login do Usuário:" aria-label="First name"></br>
                <input required type="text" name="usersenha" class="form-control" placeholder="Insira a senha:" aria-label="First name"></br>
                <input type="hidden" name="pg" value="login"><br>
                <input type="hidden" name="act" value="insertLogin"><br>
                <input class="btn btn-primary" type="submit" value="Cadastrar Usuário!"><br>
            </form>
        </fieldset>
    <br><br><br>

    </div>
    </div>
    </div>
    <br><br>'
    ;
    return $sHtml;
}
}