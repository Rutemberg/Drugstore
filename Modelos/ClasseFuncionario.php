<?php

require_once 'ClasseUsuario.php';

class ClasseFuncionario extends ClasseUsuario {

    private $idFuncionario;
    private $dataAdmissao;
    private $cargo;
    private $perfil;
    private $estatus;

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getDataAdmissao() {
        return $this->dataAdmissao;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setDataAdmissao($dataAdmissao) {
        $this->dataAdmissao = $dataAdmissao;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function getEstatus() {
        return $this->estatus;
    }

}
