<?php

require_once 'conexao.php';

class ClasseClienteDAO {

    public function cadastrarCliente(ClasseCliente $cliente) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO cliente(nome,cpf,email,senha,datacadastro,telefone,datanascimento,sexo,cep,rua,numero,bairro,cidade,estado,foto)"
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getCpf());
            $stmt->bindValue(3, $cliente->getEmail());
            $stmt->bindValue(4, $cliente->getSenha());
            $stmt->bindValue(5, $cliente->getDataCadastro());
            $stmt->bindValue(6, $cliente->getTelefone());
            $stmt->bindValue(7, $cliente->getDataNascimento());
            $stmt->bindValue(8, $cliente->getSexo());
            $stmt->bindValue(9, $cliente->getCep());
            $stmt->bindValue(10, $cliente->getRua());
            $stmt->bindValue(11, $cliente->getNumero());
            $stmt->bindValue(12, $cliente->getBairro());
            $stmt->bindValue(13, $cliente->getCidade());
            $stmt->bindValue(14, $cliente->getEstado());
            $stmt->bindValue(15, $cliente->getImagem());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function cadastroCH(ClasseCliente $cliente, CLasseHistoricoFuncionario $historico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO cliente(nome,cpf,email,senha,datacadastro,telefone,datanascimento,sexo,cep,rua,numero,bairro,cidade,estado,foto,estatus)"
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getCpf());
            $stmt->bindValue(3, $cliente->getEmail());
            $stmt->bindValue(4, $cliente->getSenha());
            $stmt->bindValue(5, $cliente->getDataCadastro());
            $stmt->bindValue(6, $cliente->getTelefone());
            $stmt->bindValue(7, $cliente->getDataNascimento());
            $stmt->bindValue(8, $cliente->getSexo());
            $stmt->bindValue(9, $cliente->getCep());
            $stmt->bindValue(10, $cliente->getRua());
            $stmt->bindValue(11, $cliente->getNumero());
            $stmt->bindValue(12, $cliente->getBairro());
            $stmt->bindValue(13, $cliente->getCidade());
            $stmt->bindValue(14, $cliente->getEstado());
            $stmt->bindValue(15, $cliente->getImagem());
            $stmt->bindValue(16, $cliente->getEstatus());
            $stmt->execute();

            $idCliente = $pdo->lastInsertId();
            $sql1 = "INSERT INTO historicofuncionario(idFuncionario, dataacao, horaacao, acao, idCliente) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historico->getIdFuncionario());
            $stmt1->bindValue(2, $historico->getDataAcao());
            $stmt1->bindValue(3, $historico->getHoraacao());
            $stmt1->bindValue(4, $historico->getAcao());
            $stmt1->bindValue(5, $idCliente);
            $stmt1->execute();

            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarCliente() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM cliente ORDER BY idCliente DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientes = array();
            While ($Cliente = $stmt->fetchObject(__CLASS__)) {
                $Clientes[] = $Cliente;
            }

            return $Clientes;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function DesativarCliente($idCliente, CLasseHistoricoFuncionario $historico) {
        try {
            $estatus = "Desativo";
            $pdo = conexao::getInstance();
            $sql = "UPDATE cliente SET estatus = ? WHERE idCliente = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatus);
            $stmt->bindValue(2, $idCliente);
            $stmt->execute();
            
            $sql1 = "INSERT INTO historicofuncionario(idFuncionario, dataacao, horaacao, acao, idCliente) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historico->getIdFuncionario());
            $stmt1->bindValue(2, $historico->getDataAcao());
            $stmt1->bindValue(3, $historico->getHoraacao());
            $stmt1->bindValue(4, $historico->getAcao());
            $stmt1->bindValue(5, $idCliente);
            $stmt1->execute();

            return true;
        } catch (Exception $ex) {
            
        }
    }
    public function ExcluirCliente($idCliente) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE  FROM historicofuncionario WHERE idCliente = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idCliente);
            $stmt->execute();
            
            $sql2 = "DELETE  FROM cliente WHERE idCliente = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindValue(1, $idCliente);
            $stmt2->execute();

            return true;
        } catch (Exception $ex) {
            
        }
    }
    
    public function AtivarCliente($idCliente, CLasseHistoricoFuncionario $historico) {
        try {
            $estatus = "Ativo";
            $pdo = conexao::getInstance();
            $sql = "UPDATE cliente SET estatus = ? WHERE idCliente = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatus);
            $stmt->bindValue(2, $idCliente);
            $stmt->execute();
            
            $sql1 = "INSERT INTO historicofuncionario(idFuncionario, dataacao, horaacao, acao, idCliente) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historico->getIdFuncionario());
            $stmt1->bindValue(2, $historico->getDataAcao());
            $stmt1->bindValue(3, $historico->getHoraacao());
            $stmt1->bindValue(4, $historico->getAcao());
            $stmt1->bindValue(5, $idCliente);
            $stmt1->execute();

            return true;
        } catch (Exception $ex) {
            
        }
    }

    public function alterarCliente(ClasseCliente $cliente, CLasseHistoricoFuncionario $historico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE cliente SET nome = ?,cpf = ?,email = ?,senha = ?,telefone = ?,cep = ?,rua = ?,numero = ?,bairro = ?,cidade = ?,estado = ?,sexo = ?,datanascimento = ?,foto = ? WHERE idCliente = " . $cliente->getIdCliente();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getCpf());
            $stmt->bindValue(3, $cliente->getEmail());
            $stmt->bindValue(4, $cliente->getSenha());
            $stmt->bindValue(5, $cliente->getTelefone());
            $stmt->bindValue(6, $cliente->getCep());
            $stmt->bindValue(7, $cliente->getRua());
            $stmt->bindValue(8, $cliente->getNumero());
            $stmt->bindValue(9, $cliente->getBairro());
            $stmt->bindValue(10, $cliente->getCidade());
            $stmt->bindValue(11, $cliente->getEstado());
            $stmt->bindValue(12, $cliente->getSexo());
            $stmt->bindValue(13, $cliente->getDataNascimento());
            $stmt->bindValue(14, $cliente->getImagem());
            $stmt->execute();

            $sql1 = "INSERT INTO historicofuncionario(idFuncionario, dataacao, horaacao, acao, idCliente) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historico->getIdFuncionario());
            $stmt1->bindValue(2, $historico->getDataAcao());
            $stmt1->bindValue(3, $historico->getHoraacao());
            $stmt1->bindValue(4, $historico->getAcao());
            $stmt1->bindValue(5, $cliente->getIdCliente());
            $stmt1->execute();

            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function ClienteAlterar(ClasseCliente $cliente) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE cliente SET nome = ?,cpf = ?,email = ?,senha = ?,telefone = ?,cep = ?,rua = ?,numero = ?,bairro = ?,cidade = ?,estado = ?,sexo = ?,datanascimento = ?,foto = ? WHERE idCliente = " . $cliente->getIdCliente();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getCpf());
            $stmt->bindValue(3, $cliente->getEmail());
            $stmt->bindValue(4, $cliente->getSenha());
            $stmt->bindValue(5, $cliente->getTelefone());
            $stmt->bindValue(6, $cliente->getCep());
            $stmt->bindValue(7, $cliente->getRua());
            $stmt->bindValue(8, $cliente->getNumero());
            $stmt->bindValue(9, $cliente->getBairro());
            $stmt->bindValue(10, $cliente->getCidade());
            $stmt->bindValue(11, $cliente->getEstado());
            $stmt->bindValue(12, $cliente->getSexo());
            $stmt->bindValue(13, $cliente->getDataNascimento());
            $stmt->bindValue(14, $cliente->getImagem());
            $stmt->execute();

            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
