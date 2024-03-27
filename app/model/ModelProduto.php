<?php

namespace App\Model;

use App\Model\ModelPadrao;

class ModelProduto extends ModelPadrao
{
    public $id;

    function getAll()
    {
        $jsonFile = 'listacompras.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            return json_decode($jsonData, true);
        }
        return [];
    }

    function insertProduto($iNomProduto, $iPrecProduto, $iQuantidade)
    {
        $newProduct = [
            'prodcodigo' => uniqid(),
            'prodnome' => $iNomProduto,
            'prodpreco' => $iPrecProduto,
            'prodquantidade' => $iQuantidade
        ];

        $products = $this->getAll();
        $products[] = $newProduct;

        $this->saveToJsonFile($products);
    }

    function deleteProduto()
    {
        $products = $this->getAll();
        $products = array_filter($products, function ($product) {
            return $product['prodcodigo'] != $this->id;
        });

        $this->saveToJsonFile($products);
    }

    static function calculateTotalForAllProducts($products)
    {
        $total = 0;
        foreach ($products as $product) {
            $total += $product['prodquantidade'] * $product['prodpreco'];
        }
        return $total;
    }

    function saveToJsonFile($data)
    {
        $jsonFile = 'listacompras.json';
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);
    }
}
