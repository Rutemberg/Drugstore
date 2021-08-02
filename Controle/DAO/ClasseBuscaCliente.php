<?php

require_once 'conexao.php';

class ClasseBuscaCliente {

    public function listarCliente() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM cliente where cpf like '$_GET[valor]%' or nome like '$_GET[valor]%' or sexo like '$_GET[valor]%' or estatus like '$_GET[valor]%' or telefone like '$_GET[valor]%' or cep like '$_GET[valor]%' ORDER BY idCliente DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientes = array();
            While ($Cliente = $stmt->fetchObject(__CLASS__)) {
                $Clientes[] = $Cliente;
            }
            if (isset($Clientes)) {
                return $Clientes;
            } else {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
