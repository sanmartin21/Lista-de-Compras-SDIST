<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewUsuario extends ViewPadrao
{

    static function getHtmlTabelaUsuario()
  {
    $sHtml = '
    <div class="container"
    <div class="row g-3">
    <div>
    <h1>Checkagem de Login</h1>
    </div>
        <div class="col-12">
        <fieldset>
            <form action="index.php" method="GET">
                <input required type="number" name="userlogin" class="form-control" placeholder="Insira o Login do Usuário:" aria-label="First name"></br>
                <input required type="text" name="usersenha" class="form-control" placeholder="Insira a senha:" aria-label="First name"></br>
                <input type="hidden" name="pg" value="usuario">
                <input type="hidden" name="act" value="checkLogin">
                <input class="btn btn-secondary" type="submit" value="Verificar Usuário!"><br><br><br><br>
                <a href="index.php?pg=login" class="btn btn-primary" role="button" aria-disabled="true">CRIAR CONTA AQUI!</a>
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