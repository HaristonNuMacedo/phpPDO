<?php

class Pessoa {
    
    private $idpessoa;
    private $nome;
    private $dtNasc;
    private $login;
    private $senha;
    private $perfil;
    private $email;
    private $cpf;
    
    function getIdpessoa() {
        return $this->idpessoa;
    }

    function getNome() {
        return $this->nome;
    }

    function getDtNasc() {
        return $this->dtNasc;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setIdpessoa($idpessoa) {
        $this->idpessoa = $idpessoa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDtNasc($dtNasc) {
        $this->dtNasc = $dtNasc;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

}
