<?php

namespace App\Model;

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();


    function getAll()
    {
        $oConection = Connection::get();
        $sSelect = 'select * from ' . $this->getTable();
        $oResult = pg_query($oConection, $sSelect);
        $aData = [];

        while ($aResultado = pg_fetch_assoc($oResult)) {
            $aData[] = $aResultado;
        }
        return $aData;
    }

    protected function insert($iNomProduto,$iPrecProduto,$iDescProduto)
    {
        $oConection = Connection::get();

        $sSql = 'INSERT INTO '.$this ->getTable()." (prodnome,prodpreco,proddescricao) values ('$iNomProduto','$iPrecProduto','$iDescProduto')";
     
        return pg_query($oConection,$sSql);
    
    }



    protected function delete($aWhere)
    {
        $oConection = Connection::get();

        $sSql = 'delete from '.$this ->getTable().' where 1=1 
        ';
        foreach($aWhere as $sNomeColuna => $sValor){
            $sSql .= ' and '. $sNomeColuna .' = '.$sValor; 
        }

        return pg_query($oConection,$sSql);
    }

    protected function update($codProduto,$NomProduto,$PrecProduto,$DescProduto)
    {
        $oConection = Connection::get();

        $sSql = 'UPDATE '.$this ->getTable()." SET prodnome = '$NomProduto', prodpreco = '$PrecProduto', proddescricao ='$DescProduto' WHERE prodcodigo = $codProduto";
     
        return pg_query($oConection,$sSql);
    }

    protected function insertLogin($logUser,$logSenha)
    {
        $oConection = Connection::get();

        $sSql = 'INSERT INTO '.$this ->getTable()." (userlogin, usersenha) values ('$logUser','$logSenha')";
     
        return pg_query($oConection,$sSql);
    
    }

    function checkLogin($logUser, $logSenha){
        $oConnection = Connection::get();

        $sSql = 'SELECT * FROM '.$this ->getTable().' WHERE userlogin ='. "'$logUser'" . 'AND usersenha ='. "'$logSenha'";
        $resultado = pg_query($oConnection, $sSql);
        $logado = pg_fetch_assoc($resultado);


        if (!$logado){
            return false;
        }

        return true ;
    }

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }
}
