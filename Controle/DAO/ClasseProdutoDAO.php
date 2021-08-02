<?php

require_once 'conexao.php';

class ClasseProdutoDAO {

    public function cadastrarProduto(ClasseProduto $produto, CLasseHistoricoFuncionarioProduto $historicoProd) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO produto(nome,descricao,valor,imagem,categoria,quantidade)"
                    . "VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getDescricao());
            $stmt->bindValue(3, $produto->getValor());
            $stmt->bindValue(4, $produto->getImagem());
            $stmt->bindValue(5, $produto->getCategoria());
            $stmt->bindValue(6, $produto->getQuantidade());
            $stmt->execute();

            $codproduto = $pdo->lastInsertId();
            $sql1 = "INSERT INTO historicofuncionarioproduto(idFuncionario, dataacao, horaacao, acao, codProduto) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historicoProd->getIdFuncionario());
            $stmt1->bindValue(2, $historicoProd->getDataAcao());
            $stmt1->bindValue(3, $historicoProd->getHoraacao());
            $stmt1->bindValue(4, $historicoProd->getAcao());
            $stmt1->bindValue(5, $codproduto);
            $stmt1->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarProduto() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM produto ORDER BY codProduto DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $produtos = array();
            While ($Produto = $stmt->fetchObject(__CLASS__)) {
                $Produtos[] = $Produto;
            }

            return $Produtos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function removerProduto($codProduto, CLasseHistoricoFuncionarioProduto $historicoProd) {
        try {
            $estatusprod = "Removido";
            $pdo = conexao::getInstance();
            $sql = "UPDATE produto SET estatusprod = ? WHERE codProduto = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatusprod);
            $stmt->bindValue(2, $codProduto);
            $stmt->execute();

            $sql1 = "INSERT INTO historicofuncionarioproduto(idFuncionario, dataacao, horaacao, acao, codProduto) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historicoProd->getIdFuncionario());
            $stmt1->bindValue(2, $historicoProd->getDataAcao());
            $stmt1->bindValue(3, $historicoProd->getHoraacao());
            $stmt1->bindValue(4, $historicoProd->getAcao());
            $stmt1->bindValue(5, $codProduto);
            $stmt1->execute();

            return true;
        } catch (Exception $ex) {
            
        }
    }

    public function excluirProduto($codProduto) {
        try {
            $pdo = conexao::getInstance();
            
            $sql1 = "DELETE  FROM historicofuncionarioproduto WHERE codProduto = ?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $codProduto);
            $stmt1->execute();
            
            $sql2 = "DELETE  FROM produto WHERE codProduto = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindValue(1, $codProduto);
            $stmt2->execute();
            return true;
        } catch (Exception $ex) {
            
        }
    }
    public function adicionarProdutonovamente($codProduto, CLasseHistoricoFuncionarioProduto $historicoProd) {
        try {
            $estatusprod = "Ativo";
            $pdo = conexao::getInstance();
            $sql = "UPDATE produto SET estatusprod = ? WHERE codProduto = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $estatusprod);
            $stmt->bindValue(2, $codProduto);
            $stmt->execute();

            $sql1 = "INSERT INTO historicofuncionarioproduto(idFuncionario, dataacao, horaacao, acao, codProduto) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historicoProd->getIdFuncionario());
            $stmt1->bindValue(2, $historicoProd->getDataAcao());
            $stmt1->bindValue(3, $historicoProd->getHoraacao());
            $stmt1->bindValue(4, $historicoProd->getAcao());
            $stmt1->bindValue(5, $codProduto);
            $stmt1->execute();

            return true;
        } catch (Exception $ex) {
            
        }
    }

    public function alterarProduto(ClasseProduto $produto, CLasseHistoricoFuncionarioProduto $historicoProd) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE produto SET nome = ?,descricao = ?,valor = ?,imagem = ?,categoria = ?, quantidade = quantidade + ? WHERE codProduto = " . $produto->getCodProduto();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getDescricao());
            $stmt->bindValue(3, $produto->getValor());
            $stmt->bindValue(4, $produto->getImagem());
            $stmt->bindValue(5, $produto->getCategoria());
            $stmt->bindValue(6, $produto->getQuantidade());
            $stmt->execute();

            $sql1 = "INSERT INTO historicofuncionarioproduto(idFuncionario, dataacao, horaacao, acao, codProduto) VALUES (?,?,?,?,?)";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $historicoProd->getIdFuncionario());
            $stmt1->bindValue(2, $historicoProd->getDataAcao());
            $stmt1->bindValue(3, $historicoProd->getHoraacao());
            $stmt1->bindValue(4, $historicoProd->getAcao());
            $stmt1->bindValue(5, $produto->getCodProduto());
            $stmt1->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
