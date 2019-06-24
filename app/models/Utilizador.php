<?php


 class Utilizador {
     
    private $idUlizador;
    private $nome;
    private $sobrenome;
    private $telefone;
    private $genero;
    private $dataNascimento;
    private $email;
    private $senha;
    private $nivel;
    private $foto;

    function _getNivel() {
        return $this->nivel;
    }

    function _getFoto() {
        return $this->foto;
    }

    function _getIdUlizador() {
        return $this->idUlizador;
    }

    function _getNome() {
        return $this->nome;
    }

    function _getSobrenome() {
        return $this->sobrenome;
    }

    function _getTelefone() {
        return $this->telefone;
    }

    function _getGenero() {
        return $this->genero;
    }

    function _getDataNascimento() {
        return $this->dataNascimento;
    }

    function _getEmail() {
        return $this->email;
    }

    function _getSenha() {
        return $this->senha;
    }

    function setIdUlizador($idUlizador) {
        $this->idUlizador = $idUlizador;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}
