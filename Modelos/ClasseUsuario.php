<?php

abstract class ClasseUsuario {

    protected $nome;
    protected $email;
    protected $cpf;
    protected $senha;
    protected $datanascimento;
    protected $sexo;
    protected $imagem;

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataNascimento() {
        return $this->datanascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDataNascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}
