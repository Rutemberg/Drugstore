<?php

class ClasseProduto {

    private $codProduto;
    private $nome;
    private $descricao;
    private $valor;
    private $imagem;
    private $categoria;
    private $estatusprod;
    private $quantidade;
    private $quantidadevendida;

    function setCodProduto($codProduto) {
        $this->codProduto = $codProduto;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    function setEstatusProd($estatusprod) {
        $this->estatusprod = $estatusprod;
    }
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    function setQuantidadeVendida($quantidadevendida) {
        $this->quantidadevendida = $quantidadevendida;
    }

    function getCodProduto() {
        return $this->codProduto;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getImagem() {
        return $this->imagem;
    }
    function getCategoria() {
        return $this->categoria;
    }
    function getEstatusProd() {
        return $this->estatusprod;
    }
    function getQuantidade() {
        return $this->quantidade;
    }
    function getQuantidadeVendida() {
        return $this->quantidadevendida;
    }

}
