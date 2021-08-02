<?php
require_once 'conexao.php';
class ClasseBuscaFoto_email {
        public function mostrarfoto() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT foto FROM cliente where email = '$_GET[valor]' or cpf = '$_GET[valor]' limit 1";
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
