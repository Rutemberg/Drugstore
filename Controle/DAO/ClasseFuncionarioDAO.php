<?php

require_once 'conexao.php';

class ClasseFuncionarioDAO {

    public function cadastrarFuncionario(ClasseFuncionario $funcionario) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO funcionario(nome,cpf,email,senha,dataadmissao,cargo,perfil,sexo,datanascimento,foto)"
                    . "VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $funcionario->getNome());
            $stmt->bindValue(2, $funcionario->getCpf());
            $stmt->bindValue(3, $funcionario->getEmail());
            $stmt->bindValue(4, $funcionario->getSenha());
            $stmt->bindValue(5, $funcionario->getDataAdmissao());
            $stmt->bindValue(6, $funcionario->getCargo());
            $stmt->bindValue(7, $funcionario->getPerfil());
            $stmt->bindValue(8, $funcionario->getSexo());
            $stmt->bindValue(9, $funcionario->getDataNascimento());
            $stmt->bindValue(10, $funcionario->getImagem());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionario() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM funcionario ORDER BY idFuncionario DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $funcionarios = array();
            While ($funcionario = $stmt->fetchObject(__CLASS__)) {
                $funcionarios[] = $funcionario;
            }
            return $funcionarios;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function excluirFuncionario($idFuncionario) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE  FROM historicofuncionario WHERE idFuncionario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idFuncionario);
            $stmt->execute();
            
            $sql1 = "DELETE  FROM historicofuncionarioproduto WHERE idFuncionario = ?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $idFuncionario);
            $stmt1->execute();
            
            $sql2 = "DELETE  FROM funcionario WHERE idFuncionario = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindValue(1, $idFuncionario);
            $stmt2->execute();
            return true;
            
        } catch (Exception $ex) {
            
        }
    }
    public function DesativarFuncionario($idFuncionario) {
        try {
            $estatus = "Desativo";
            $pdo = conexao::getInstance();
            $sql = "UPDATE funcionario SET estatus = ? WHERE idFuncionario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatus);
            $stmt->bindValue(2, $idFuncionario);
            $stmt->execute();

            return true;
            
        } catch (Exception $ex) {
            
        }
    }
    public function AtivarFuncionario($idFuncionario) {
        try {
            $estatus = "Ativo";
            $pdo = conexao::getInstance();
            $sql = "UPDATE funcionario SET estatus = ? WHERE idFuncionario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatus);
            $stmt->bindValue(2, $idFuncionario);
            $stmt->execute();

            return true;
            
        } catch (Exception $ex) {
            
        }
    }
        public function alterarFuncionario(ClasseFuncionario $funcionario) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE funcionario SET nome = ?,cpf = ?,email = ?,senha = ?,dataadmissao = ?,cargo = ?,perfil = ?,sexo = ?,datanascimento = ?,foto = ?  WHERE idFuncionario = ".$funcionario->getIdFuncionario();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $funcionario->getNome());
            $stmt->bindValue(2, $funcionario->getCpf());
            $stmt->bindValue(3, $funcionario->getEmail());
            $stmt->bindValue(4, $funcionario->getSenha());
            $stmt->bindValue(5, $funcionario->getDataAdmissao());
            $stmt->bindValue(6, $funcionario->getCargo());
            $stmt->bindValue(7, $funcionario->getPerfil());
            $stmt->bindValue(8, $funcionario->getSexo());
            $stmt->bindValue(9, $funcionario->getDataNascimento());
            $stmt->bindValue(10, $funcionario->getImagem());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
