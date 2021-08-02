<?php

require_once 'ClasseUsuario.php';

class ClasseCliente extends ClasseUsuario {

    private $idCliente;
    private $perfil;
    private $dataCadastro;
    private $telefone;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $estatus;
            
    
    
    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
    
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    
    function setCep($cep) {
        $this->cep = $cep;
    }
    
    function setRua($rua) {
        $this->rua = $rua;
    }
    
    function setNumero($numero) {
        $this->numero = $numero;
    }
    
    function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    
    function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function getTelefone() {
        return $this->telefone;
    }
    function getCep() {
        return $this->cep;
    }
    function getRua() {
        return $this->rua;
    }
    function getNumero() {
        return $this->numero;
    }
    function getBairro() {
        return $this->bairro;
    }
    function getCidade() {
        return $this->cidade;
    }
    function getEstado() {
        return $this->estado;
    }
    function getEstatus() {
        return $this->estatus;
    }

}
