<?php

session_start();
require_once 'conexao.php';

class ClasseLoginDAO {

    public function fazerLogin($email, $senha) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT idFuncionario,nome,email,cargo,perfil,foto FROM funcionario f
                    WHERE f.email = ? AND f.senha = ? and estatus = 'Ativo' or f.cpf = ? AND f.senha = ? and estatus = 'Ativo'";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->bindValue(3, $email);
            $stmt->bindValue(4, $senha);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($funcionario == NULL) {
                try {
                    $sql = "SELECT nome,perfil,email,foto,idCliente FROM cliente c
                    WHERE c.email = ? AND c.senha = ? and estatus = 'Ativo' or c.cpf = ? AND c.senha = ? and estatus = 'Ativo'";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $email);
                    $stmt->bindValue(2, $senha);
                    $stmt->bindValue(3, $email);
                    $stmt->bindValue(4, $senha);
                    $stmt->execute();
                    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($cliente != NULL) {
                        $_SESSION['ClienteLogado'] = 1;
                        $_SESSION['NomeClienteLogado'] = $cliente['nome'];
                        $_SESSION['EmailClienteLogado'] = $cliente['email'];
                        $_SESSION['PerfilClienteLogado'] = $cliente['perfil'];
                        $_SESSION['fotoClienteLogado'] = $cliente['foto'];
                        $_SESSION['idClienteLogado'] = $cliente['idCliente'];
                        return $cliente;
                    }
                } catch (Exception $ex) {
                    echo "erro" . $exc->getMessage();
                }
            } else {
                $_SESSION['FuncionarioLogado'] = 1;
                $_SESSION['NomeFuncionarioLogado'] = $funcionario['nome'];
                $_SESSION['EmailFuncionarioLogado'] = $funcionario['email'];
                $_SESSION['CargoFuncionarioLogado'] = $funcionario['cargo'];
                $_SESSION['PerfilFuncionarioLogado'] = $funcionario['perfil'];
                $_SESSION['fotoFuncionarioLogado'] = $funcionario['foto'];
                $_SESSION['idFuncionarioLogado'] = $funcionario['idFuncionario'];

                return $funcionario;
            }
        } catch (Exception $exc) {
            echo "erro" . $exc->getMessage();
        }
    }

}
