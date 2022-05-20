<?php

namespace App\Model;

use App\Db\Connection;
use App\Model\ModelPadrao;

class ModelProduto extends ModelPadrao
{
    public $id;
    function getTable(){
        return 'projetin.tbproduto';
    }

    function insertProduto($iNomProduto,$iPrecProduto,$iDescProduto)
    {
        return parent::insert(
            $iNomProduto,$iPrecProduto,$iDescProduto
        );
    }

    function deleteProduto()
    {
        $iId = $this->id;

        return parent::delete([
            'prodcodigo' => $this-> id
        ]);

    }

    function updateProduto($codProduto,$NomProduto,$PrecProduto,$DescProduto)
    {

        return parent::update(
            $codProduto ,$NomProduto,$PrecProduto,$DescProduto
        );
    }

    
}
