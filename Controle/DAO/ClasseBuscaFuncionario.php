<?php

require_once 'conexao.php';
class ClasseBuscaFuncionario {

    public function listarFuncionario() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM funcionario WHERE cpf like '$_GET[valor]%' or nome like '$_GET[valor]%' or sexo like '$_GET[valor]%' or estatus like '$_GET[valor]%' ORDER BY idFuncionario DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $funcionarios = array();
            While ($funcionario = $stmt->fetchObject(__CLASS__)) {
                $funcionarios[] = $funcionario;
            }            
            
            if (isset($funcionarios)) {
                return $funcionarios;
            } else {
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
