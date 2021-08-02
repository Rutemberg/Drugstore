<?php

require_once 'conexao.php';

class ClasseBuscaProduto {

    public function listarProduto() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM produto WHERE nome like '$_GET[valor]%' or  categoria like '$_GET[valor]%' ORDER BY codProduto DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $produtos = array();
            While ($Produto = $stmt->fetchObject(__CLASS__)) {
                $Produtos[] = $Produto;
            }
            if (isset($Produtos)) {
                return $Produtos;
            } else {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
