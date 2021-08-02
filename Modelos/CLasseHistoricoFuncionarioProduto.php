<?php

class CLasseHistoricoFuncionarioProduto {
    
    private $idFuncionario;
    private $codProduto;
    private $acao;
    private $dataacao;
    private $horaacao;

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getCodProduto() {
        return $this->codProduto;
    }

    function getAcao() {
        return $this->acao;
    }

    function getDataAcao() {
        return $this->dataacao;
    }

    function getHoraacao() {
        return $this->horaacao;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setCodProduto($codProduto) {
        $this->codProduto = $codProduto;
    }

    function setAcao($acao) {
        $this->acao = $acao;
    }
    
    function setDataAcao($dataacao) {
        $this->dataacao = $dataacao;
    }
    
    function setHoraacao($horaacao) {
        $this->horaacao = $horaacao;
    }

}
