<?php

class CLasseHistoricoFuncionario {

    private $idFuncionario;
    private $idCliente;
    private $acao;
    private $dataacao;
    private $horaacao;

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getIdCliente() {
        return $this->idCliente;
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

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
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
