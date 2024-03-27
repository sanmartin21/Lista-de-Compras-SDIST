<?php

namespace App\Model;

abstract class ModelPadrao
{
    function getAll()
    {
        $jsonFile = 'listacompras.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            return json_decode($jsonData, true);
        }
        return [];
    }

    protected function insert($iNomProduto, $iPrecProduto, $iQuantProduto)
    {
    }

    protected function delete($aWhere)
    {
    }

    function saveToJsonFile($data)
    {
        $jsonFile = 'listacompras.json';
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);
    }
}
